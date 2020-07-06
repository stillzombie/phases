<?php

namespace Tests;

use App\Tenant;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'database.connections.landlord' => [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ],

            'database.connections.tenant' => [
                'driver' => 'sqlite',
                'database' => ':memory:'
            ]
        ]);

        $this->artisan('migrate --database=landlord --path=database/migrations/landlord');
        $this->artisan('migrate --database=tenant');

        $tenant = factory(Tenant::class)->create();
        $tenant->use();
    }
}
