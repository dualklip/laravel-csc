<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\City;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $filePath = base_path('vendor/dualklip/laravel-csc/src/database/yml/cities.yml');

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['city'] as $region) {
            City::firstOrCreate([
                "id" => $region['id']],[
                "name" => $region['name'],
                "state_id" => $region['state_id'],
                "state_code" => $region['state_code'],
                "country_id" => $region['country_id'],
                "country_code" => $region['country_code'],
                "latitude" => $region['latitude'],
                "longitude" => $region['longitude'],
                "flag" => 1,
                "wiki_data_id" => $region['wikiDataId'],
            ]);
        }
    }
}
