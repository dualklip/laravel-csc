<?php

namespace Dualklip\Csc\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class CscEndWithInstallerCommand extends Command
{
    public $signature = 'csc';

    public $description = 'My command';

    public function handle(): int
    {
        $this->info('Installing laravel CSC...');

        // publish migrations
        Artisan::call('vendor:publish --tag=laravel-csc --force');
        // migrate new tables
        Artisan::call('migrate');
        // re-seed the world data
        $this->info('seeding regions...');
        Artisan::call('db:seed --class=RegionSeeder ', array(), $this->getOutput());
        $this->info('seeding subregions...');
        Artisan::call('db:seed --class=SubregionSeeder ', array(), $this->getOutput());
        $this->info('seeding countries...');
        Artisan::call('db:seed --class=CountrySeeder ', array(), $this->getOutput());
        $this->info('seeding states...');
        Artisan::call('db:seed --class=StateSeeder ', array(), $this->getOutput());
        $this->info('seeding cities...');
        Artisan::call('db:seed --class=CitySeeder ', array(), $this->getOutput());

        return self::SUCCESS;
    }
}
