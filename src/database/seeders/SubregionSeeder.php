<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\Subregion;
use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class SubregionSeeder extends Seeder
{
    public function run(): void
    {
        $filePath = base_path('vendor/dualklip/laravel-csc/src/database/yml/subregions.yml');

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['subregion'] as $region) {
            Subregion::firstOrCreate([
                "id" => $region['id']],[
                "name" => $region['name'],
                "translations" => json_encode($region['translations']),
                "region_id" => $region['region_id'],
                "flag" => 1,
                "wikiDataId" => $region['wikiDataId'],
            ]);
        }
    }
}
