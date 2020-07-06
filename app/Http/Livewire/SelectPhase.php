<?php

namespace App\Http\Livewire;

use App\Phase;
use Livewire\Component;

class SelectPhase extends Component
{
    public $phases;
    public $stacked;
    public $search;

    public function mount()
    {
        $this->phases = Phase::get();
    }

    public function selectPhase($phaseId)
    {
        $this->emitUp('phaseSelected', $phaseId);
        // Browser events :D
        $this->dispatchBrowserEvent('notify', 'phase selected');
    }

    public function render()
    {
        if (! $this->phases->count()) {
            $this->stacked = [];
            return view('livewire.select-phase');
        }
        $this->stacked = $this->phases->stack()->toArray();
        if ($this->search) {
            $this->stacked = $this->phases->byName($this->search)->toArray();
        }

        return view('livewire.select-phase');
    }
}
