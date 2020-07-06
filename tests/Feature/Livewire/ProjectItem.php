<?php

namespace Tests\Feature\Livewire;

use App\Project;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\ProjectItem as Item;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectItem extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_archive_an_active_project()
    {
        $project = factory(Project::class)->states('active')->create();

        Livewire::test(Item::class, ['project' => $project])
            ->call('archive')
            ->assertEmitted('projectUpdated', Project::FILTER_ACTIVE);

        $project->refresh();
        $this->assertTrue($project->archive == 1);
    }

    /** @test */
    public function it_can_activate_an_archive_project()
    {
        $project = factory(Project::class)->states('archive')->create();

        Livewire::test(Item::class, ['project' => $project])
            ->call('activate')
            ->assertEmitted('projectUpdated', Project::FILTER_ARCHIVE);

        $project->refresh();
        $this->assertFalse($project->archive == 1);
    }

    /** @test */
    public function it_can_update_the_name_of_the_project()
    {
        $project = factory(Project::class)->create(['name' => 'Bad']);

        Livewire::test(Item::class, ['project' => $project])
            ->set('name', 'Awesome');

        $project->refresh();
        $this->assertTrue($project->name == 'Awesome');
    }

    /** @test */
    public function it_can_update_the_client_of_the_project()
    {
        $project = factory(Project::class)->create(['client' => 'Bad client']);

        Livewire::test(Item::class, ['project' => $project])
            ->set('client', 'Moonshiner');

        $project->refresh();
        $this->assertTrue($project->client == 'Moonshiner');
    }
}
