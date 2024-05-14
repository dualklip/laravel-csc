<?php

namespace Dualklip\Csc\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Dualklip\Csc\CscServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
        //$this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Dualklip\\Csc\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app): array
    {
        return [
            CscServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__.'/../database/migrations/create_regions_table.php.stub';
        $migration->up();
        $migration = include __DIR__.'/../database/migrations/create_subregions_table.php.stub';
        $migration->up();
        $migration = include __DIR__.'/../database/migrations/create_countries_table.php.stub';
        $migration->up();
        $migration = include __DIR__.'/../database/migrations/create_states_table.php.stub';
        $migration->up();
        $migration = include __DIR__.'/../database/migrations/create_cities_table.php.stub';
        $migration->up();
    }
}
