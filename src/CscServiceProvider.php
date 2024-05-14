<?php

namespace Dualklip\Csc;

use Dualklip\Csc\Commands\CscEndWithInstallerCommand;
use Illuminate\Support\Facades\Artisan;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class CscServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-csc')
            ->hasConfigFile('csc')
            ->hasMigrations(['create_regions_table', 'create_subregions_table', 'create_countries_table', 'create_states_table', 'create_cities_table'])
            ->runsMigrations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->publish()
                    ->askToRunMigrations()
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Installing laravel CSC...');


                        // publish migrations
                        $command->call('vendor:publish --tag=laravel-csc --force');
                        // migrate new tables
                        $command->call('migrate');
                        // re-seed the world data
                        $command->info('seeding regions...');
                        $command->call('db:seed --class=RegionSeeder');
                        $command->info('seeding subregions...');
                        $command->call('db:seed --class=SubregionSeeder');
                        $command->info('seeding countries...');
                        $command->call('db:seed --class=CountrySeeder');
                        $command->info('seeding states...');
                        $command->call('db:seed --class=StateSeeder');
                        $command->info('seeding cities...');
                        $command->call('db:seed --class=CitySeeder');
                    });
            });
    }

    public function packageBooted(): void
    {
        $this->publishes([
            __DIR__ . '/database/seeders/CitySeeder.php' => database_path('seeders/CitySeeder.php'),
            __DIR__ . '/database/seeders/CountrySeeder.php' => database_path('seeders/CountrySeeder.php'),
            __DIR__ . '/database/seeders/RegionSeeder.php' => database_path('seeders/RegionSeeder.php'),
            __DIR__ . '/database/seeders/StateSeeder.php' => database_path('seeders/StateSeeder.php'),
            __DIR__ . '/database/seeders/SubregionSeeder.php' => database_path('seeders/SubregionSeeder.php'),
        ], 'csc');
    }
}
