<?php

namespace Dualklip\Csc;

use Dualklip\Csc\Commands\CscEndWithInstallerCommand;
use Dualklip\Csc\database\seeders\CitySeeder;
use Dualklip\Csc\database\seeders\CountrySeeder;
use Dualklip\Csc\database\seeders\RegionSeeder;
use Dualklip\Csc\database\seeders\StateSeeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CscServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('csc')
            ->hasConfigFile('csc')
            ->hasMigrations(['create_regions_table', 'create_subregions_table', 'create_countries_table', 'create_states_table', 'create_cities_table'])
            ->runsMigrations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations();
            });
        /*$this->publishes([
            __DIR__ . '/database/seeders/CitySeeder.php' => database_path('seeders/CitySeeder.php'),
            __DIR__ . '/database/seeders/CountrySeeder.php' => database_path('seeders/CountrySeeder.php'),
            __DIR__ . '/database/seeders/RegionSeeder.php' => database_path('seeders/RegionSeeder.php'),
            __DIR__ . '/database/seeders/StateSeeder.php' => database_path('seeders/StateSeeder.php'),
            __DIR__ . '/database/seeders/SubregionSeeder.php' => database_path('seeders/SubregionSeeder.php'),
        ], 'csc');*/
    }

    public function registeringPackage(): void
    {
        $this->app->bind(CitySeeder::class);
        $this->app->bind(CountrySeeder::class);
        $this->app->bind(RegionSeeder::class);
        $this->app->bind(StateSeeder::class);
        $this->app->bind(RegionSeeder::class);
    }
}
