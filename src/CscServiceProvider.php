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

    public function packageBooted()
    {

    }
}
