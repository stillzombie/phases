<?php

namespace App\Http\Livewire;

use App\Project;
use Livewire\Component;

class ProjectItem extends Component
{
    public $project;
    public $client;
    public $name;

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->name = $project->name;
        $this->client = $project->client;
    }

    public function render()
    {
        return view('livewire.project-item');
    }

    public function updatedName($name)
    {
        $this->project->update([
            'name' => $name
        ]);
    }

    public function updatedClient($client)
    {
        $this->project->update([
            'client' => $client
        ]);
    }

    public function archive()
    {
        $this->archiveProject(true);
    }

    public function activate()
    {
        $this->archiveProject(false);
    }

    public function archiveProject($status)
    {
        $this->project->update([
            'archive' => $status
        ]);
        $this->emit('projectUpdated', $status ? Project::FILTER_ACTIVE : Project::FILTER_ARCHIVE);
    }
}
