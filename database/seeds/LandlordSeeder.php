<?php

use Illuminate\Database\Seeder;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Tenant::create([
            'name' => 'Moonphasing',
            'domain' => 'moonphasing.test',
            'database' => database_path('moonphasing.sqlite'),
        ]);

        \App\Tenant::create([
            'name' => 'Phases',
            'domain' => 'phases.test',
            'database' => database_path('phases.sqlite'),
        ]);

        \App\Tenant::create([
            'name' => 'moonsharing',
            'domain' => 'phases-sharing.test',
            'database' => database_path('sharing.sqlite'),
        ]);
    }
}
