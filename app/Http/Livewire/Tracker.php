<?php

namespace App\Http\Livewire;

use App\Phase;
use App\Track;
use App\LiveTrack;
use Carbon\Carbon;
use Livewire\Component;

class Tracker extends Component
{
    public $title;
    public $graph = [];
    public $phase;
    public $spend = 0;
    public $onBreak;
    public $liveTrack;
    public $description;

    protected $listeners = [
        'phaseSelected' => 'selectPhase'
    ];

    public function mount()
    {
        $this->description = "Start a Live-Track with a name and phase.";

        if (! $liveTrack = LiveTrack::first()) {
            return;
        }



        $this->liveTrack = $liveTrack;
        $this->phase = $liveTrack->phase;
        $this->title = $liveTrack->title;

        $this->resetBreak();
        $this->onBreak = $this->liveTrack->in_break;
        $this->spend = Carbon::create($this->liveTrack->started_at)->diffInMinutes(Carbon::now());
    }

    public function selectPhase($phaseId)
    {
        $this->phase = Phase::find($phaseId);
    }

    public function start()
    {
        if (!$this->title || !$this->phase) {
            return;
        }

        $this->liveTrack = LiveTrack::create([
            'title' => $this->title,
            'phase_id' => $this->phase->id,
            'started_at' =>  Carbon::now()->toDateTimeString(),
            'breaks' => []
        ]);

        $this->description = "Tracking";
    }
    public function end()
    {
        $this->getWorkedTime()->each(function ($worked) {
            Track::create([
                'phase_id' => $this->liveTrack->phase_id,
                'title' => $this->liveTrack->title,
                'started_at' =>  Carbon::create($worked['starts']),
                'ended_at' =>  Carbon::create($worked['ends'])
            ]);
        });

        $this->liveTrack->delete();
        $this->redirect('/projects');
    }

    public function break()
    {
        $this->onBreak = true;
        $this->liveTrack->update([
            'in_break' => LiveTrack::BREAK_IN_PROGRESS,
            'breaks' => $this->liveTrack->breaks->push([
                Carbon::now()->toDateTimeString(),
            ])
        ]);
    }

    public function pastBreak()
    {
    }

    public function manualBreak($starts, $ends)
    {
        $breaks = $this->liveTrack->breaks
            ->push([
                Carbon::create($starts)->toDateTimeString(),
                Carbon::create($ends)->toDateTimeString()
            ])
            ->sortBy(function ($break) {
                return $break[0];
            })
            ->values()
            ->all();

        $this->liveTrack->update([
            'breaks' => $breaks
        ]);
    }


    public function fixedBreak($minutes = 60)
    {
        $this->onBreak = true;
        $this->liveTrack->update([
            'in_break' => LiveTrack::BREAK_FIXED,
            'breaks' => $this->liveTrack->breaks->push([
                Carbon::now()->toDateTimeString(),
                Carbon::now()->addMinutes($minutes)->toDateTimeString()
            ])
        ]);
    }

    public function finishBreak()
    {
        $this->onBreak = false;
        $breaks = $this->liveTrack->breaks;
        $currentBreak = $breaks->pop();
        $currentBreak[1] =  Carbon::now()->toDateTimeString();
        $this->liveTrack->update([
            'in_break' => null,
            'breaks' =>  $breaks->push($currentBreak)
        ]);
    }

    public function tick()
    {
        if (!$this->liveTrack || ! $this->liveTrack->started_at) {
            return;
        }

        $this->graph = $this->makeGraph();
        $this->spend = $this->getSpendTime();
        $this->resetBreak();
    }

    public function render()
    {
        return view('livewire.tracker');
    }
    protected function calculateGauge($from, $to = null)
    {
        $to = $to ? Carbon::create($to) : Carbon::now();
        $maxMinutes = 720;
        return round((100 * $to->diffInMinutes($from)) /  $maxMinutes, 2);
    }
    protected function getWorkedTime()
    {
        $breaks = $this->liveTrack->breaks;
        $started = $this->liveTrack->started_at;

        if (! $breaks->count()) {
            return collect(
                [
                    ['active'=> true, 'value'=> $this->calculateGauge($started)],
                ]
            );
        }

        $breaksStarts = $breaks->map(function ($item) {
            return $item[0];
        });

        $breaksEnds = $breaks->map(function ($item) {
            return isset($item[1]) ? $item[1] : null;
        });

        $breaksEnds->shift();

        return $breaksStarts
            ->zip($breaksEnds)
            ->map(function ($item) {
                return [
                    'starts' => $item[0],
                    'ends' => $item[1],
                    'active'=> true,
                    'value'=>$this->calculateGauge($item[0], $item[1])
                ];
            })
            ->prepend([
                'starts' => $started,
                'ends' => $breaksStarts[0],
                'active'=> true,
                'value'=>$this->calculateGauge($started, $breaksStarts[0])
            ]);
    }

    protected function makeGraph()
    {
        $breaks = $this->liveTrack->breaks;
        $worked = $this->getWorkedTime();

        $first = $worked->shift();

        return $breaks->flatMap(function ($item, $key) use ($worked) {
            return[
                ['active'=> false, 'value'=>$this->calculateGauge($item[0], isset($item[1]) ? $item[1] : null)],
                isset($worked[$key]) ? $worked[$key] : null
            ];
        })->prepend($first)->toArray();
    }

    protected function getSpendTime()
    {
        return Carbon::create($this->liveTrack->started_at)->diffInMinutes(Carbon::now());
    }

    protected function resetBreak()
    {
        if (!$this->liveTrack->in_break || $this->liveTrack->in_break == LiveTrack::BREAK_IN_PROGRESS) {
            return;
        }

        $currentBreak = $this->liveTrack->breaks->last();
        if (Carbon::now()->lt($currentBreak[1])) {
            return;
        }

        $this->onBreak = false;
        $this->liveTrack->update([
            'in_break' => null
        ]);
    }
}
