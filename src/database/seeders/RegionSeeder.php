<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\Region;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = base_path('vendor/dualklip/laravel-csc/src/database/yml/regions.yml');

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['region'] as $region) {
            Region::firstOrCreate([
                "id" => $region['id'],
                "name" => $region['name'],
                "translations" => json_encode($region['translations']),
                "flag" => 1,
                "wikiDataId" => $region['wikiDataId'],
            ]);
        }
    }
}
