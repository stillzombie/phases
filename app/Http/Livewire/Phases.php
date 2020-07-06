<?php

namespace App\Http\Livewire;

use App\Phase;
use Livewire\Component;

class Phases extends Component
{
    public $filter;
    public $phases;

    protected $listeners = ['projectUpdated' => 'filterPhases'];

    public function mount()
    {
        $this->filter = Phase::FILTER_ACTIVE;
        $this->filterPhases($this->filter);
    }

    public function render()
    {
        return view('livewire.phases');
    }

    public function activeFilter($filter)
    {
        $this->filter = $filter;
        $this->filterPhases($filter);
    }

    public function filterPhases($filter)
    {
        $this->phases = Phase::$filter()->get();
    }
}
