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
            ->name('csc')
            ->hasConfigFile()
            ->hasMigration('create_skeleton_table')
            ->hasCommand(CscCommand::class);
    }
}
