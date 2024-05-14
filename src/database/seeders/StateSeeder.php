<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\State;
use Symfony\Component\Yaml\Yaml;

class StateSeeder
{
    public function run(): void
    {
        $filePath = __DIR__ . '/../yml/states.yml';

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['state'] as $region) {
            State::create([
                "id" => $region['id'],
                "name" => $region['name'],
                "country_id" => $region['country_id'],
                "country_code" => $region['country_code'],
                "type" => $region['type'],
                "latitude" => $region['latitude'],
                "longitude" => $region['longitude'],
                "flag" => 1,
                "wikiDataId" => '',
            ]);
        }
    }
}
