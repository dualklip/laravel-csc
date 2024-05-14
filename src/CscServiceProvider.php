<?php

namespace Dualklip\Csc;

use Dualklip\Csc\Commands\CscEndWithInstallerCommand;
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
                    ->endWith(CscEndWithInstallerCommand::class);
            });
    }
    public function packageBooted()
    {

    }
}
