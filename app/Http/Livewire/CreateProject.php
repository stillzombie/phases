<?php

namespace App\Http\Livewire;

use App\Phase;
use App\Project;
use Livewire\Component;
use Illuminate\Support\Str;

class CreateProject extends Component
{
    public $name;
    public $client;
    public $phaseName;
    public $phaseTime;
    public $phaseBillable = true;


    public function create()
    {
        $data = $this->validate([
            'name' => 'required|unique:projects',
            'client' => 'required'
        ]);

        $project = Project::Create($data);

        if ($this->phaseName) {
            Phase::create([
                'name' => $this->phaseName,
                'assigned_hours' => $this->phaseTime,
                'billable' => $this->phaseBillable,
                'project_id' => $project->id
            ]);
        }

        $this->redirect('/projects');
    }

    public function cancel()
    {
        $this->redirect('/projects');
    }

    public function updatedName()
    {
        $this->validate([
            'name' => 'required|unique:projects'
        ]);
    }

    public function render()
    {
        return view('livewire.create-project');
    }
}
