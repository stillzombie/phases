<?php

namespace Tests\Feature\Livewire;

use App\Project;
use Tests\TestCase;
use Livewire\Livewire;
use App\Http\Livewire\Projects as LiveProjects;
use Illuminate\Foundation\Testing\RefreshDatabase;

class Projects extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_filters_active_projects()
    {
        factory(Project::class)->create(['name' => 'Super']);
        factory(Project::class)->create(['name' => 'Awesome']);
        factory(Project::class, 4)->states('archive')->create(['name' => 'Oldies']);

        Livewire::test(LiveProjects::class)
            ->call('activeFilter', 'archive')
            ->call('activeFilter', 'active')
            ->assertSet('filter', 'active')
            ->assertSee('Super')
            ->assertSee('Awesome')
            ->assertDontSee('Oldies');
    }

    /** @test */
    public function it_filters_archive_projects()
    {
        factory(Project::class)->create(['name' => 'Super']);
        factory(Project::class)->create(['name' => 'Awesome']);
        factory(Project::class, 4)->states('archive')->create(['name' => 'Oldies']);

        Livewire::test(LiveProjects::class)
            ->call('activeFilter', 'archive')
            ->assertSet('filter', 'archive')
            ->assertSee('Oldies')
            ->assertDontSee('Super')
            ->assertDontSee('Awesome');
    }
}
