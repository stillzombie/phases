<?php

use App\Project;
use Faker\Generator as Faker;

$factory->define(App\Phase::class, function (Faker $faker) {
    return [
        'project_id' => function () {
            return factory(Project::class)->create()->id;
        },
        'name' => $faker->name,
        'billable' => true,
        'assigned_hours' => 100,
        'spend_hours' => 0
    ];
});
