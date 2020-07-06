<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\CreateProject;
use App\Phase;
use App\Project;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateProjectTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_project()
    {
        Livewire::test(CreateProject::class)
            ->set('name', 'Awesome')
            ->set('client', 'Moonshiner')
            ->call('create')
            ->assertRedirect('/projects');

        $this->assertCount(1, Project::all());
        $project = Project::first();
        $this->assertEquals('Awesome', $project->name);
        $this->assertEquals('Moonshiner', $project->client);
    }

    /** @test */
    public function the_name_field_is_required()
    {
        Livewire::test(CreateProject::class)
            ->set('name', '')
            ->set('client', 'Moonshiner')
            ->call('create')
            ->assertHasErrors(['name']);

        $this->assertCount(0, Project::all());
    }

    /** @test */
    public function the_name_field_should_be_unique()
    {
        factory(Project::class)->create([
            'name' => 'Awesome'
        ]);
        $this->assertCount(1, Project::all());

        Livewire::test(CreateProject::class)
            ->set('name', 'Awesome')
            ->set('client', 'Moonshiner')
            ->call('create')
            ->assertHasErrors(['name']);

        $this->assertCount(1, Project::all());
    }

    /** @test */
    public function the_client_field_is_required()
    {
        Livewire::test(CreateProject::class)
            ->set('name', 'Awesome')
            ->set('client', '')
            ->call('create')
            ->assertHasErrors(['client']);

        $this->assertCount(0, Project::all());
    }

    /** @test */
    public function canceling_the_form_redirect_to_the_list()
    {
        Livewire::test(CreateProject::class)
            ->call('cancel')
            ->assertRedirect('projects');

        $this->assertCount(0, Project::all());
    }

    /** @test */
    public function it_creates_and_assign_a_phase_if_defined()
    {
        Livewire::test(CreateProject::class)
            ->set('name', 'Awesome')
            ->set('client', 'Moonshiner')
            ->set('phaseName', 'Sprint 1')
            ->set('phaseTime', 110)
            ->set('phaseBillable', false)
            ->call('create')
            ->assertRedirect('projects');

        $this->assertCount(1, Phase::all());
        $phase = Phase::first();
        $this->assertEquals('Sprint 1', $phase->name);
        $this->assertEquals(110, $phase->assigned_hours);
        $this->assertFalse($phase->billable == 1);
    }
}
