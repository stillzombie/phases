<?php

use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'client' => $faker->name,
    ];
});

$factory->state(App\Project::class, 'active', [
    'archive' => false,
]);


$factory->state(App\Project::class, 'archive', [
    'archive' => true,
]);
