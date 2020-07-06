<?php

namespace App\Http\Livewire;

use App\Project;
use Livewire\Component;

class Projects extends Component
{
    public $filter;
    public $projects;

    protected $listeners = ['projectUpdated' => 'filterProjects'];

    public function mount()
    {
        $this->filter = Project::FILTER_ACTIVE;
        $this->filterProjects($this->filter);
    }

    public function render()
    {
        return view('livewire.projects');
    }

    public function activeFilter($filter)
    {
        $this->filter = $filter;
        $this->filterProjects($filter);
    }

    public function filterProjects($filter)
    {
        $this->projects = Project::$filter()->get();
    }
}
