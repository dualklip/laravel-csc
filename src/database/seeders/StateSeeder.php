<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\State;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class StateSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = base_path('vendor/dualklip/laravel-csc/src/database/yml/states.yml');

        $regions = Yaml::parseFile($filePath);
        $this->command->getOutput()->progressStart(count($regions['state']));
        foreach ($regions['state'] as $region) {
            State::firstOrCreate([
                "id" => $region['id']],[
                "name" => $region['name'],
                "country_id" => $region['country_id'],
                "country_code" => $region['country_code'],
                "type" => $region['type'],
                "latitude" => $region['latitude'],
                "longitude" => $region['longitude'],
                "flag" => 1,
                "wikiDataId" => '',
            ]);
            $this->command->getOutput()->progressAdvance();
        }
        $this->command->getOutput()->progressFinish();
    }
}
