<?php

namespace Dualklip\Csc;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Dualklip\Csc\Commands\CscCommand;

class CscServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-csc')
            ->hasConfigFile()
            ->hasMigrations(['create_cities_table','create_countries_table','create_regions_table','create_states_table','create_subregions_table'])
            ->runsMigrations();
            //->hasCommand(CscCommand::class);
    }
}
