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
                    ->endWith(CscEndWithInstallerCommand::class)
                    ->endWith(function (InstallCommand $command) {
                        $command->info('Installing laravel CSC...');

                        // publish migrations
                        Artisan::call('vendor:publish --tag=laravel-csc --force');
                        // migrate new tables
                        Artisan::call('migrate');
                        // re-seed the world data
                        $command->info('seeding regions...');
                        Artisan::call('db:seed --class=RegionSeeder ', array(), $command->getOutput());
                        $command->info('seeding subregions...');
                        Artisan::call('db:seed --class=SubregionSeeder ', array(), $command->getOutput());
                        $command->info('seeding countries...');
                        Artisan::call('db:seed --class=CountrySeeder ', array(), $command->getOutput());
                        $command->info('seeding states...');
                        Artisan::call('db:seed --class=StateSeeder ', array(), $command->getOutput());
                        $command->info('seeding cities...');
                        Artisan::call('db:seed --class=CitySeeder ', array(), $command->getOutput());
                    });
            });
    }

    public function packageBooted()
    {

    }
}
