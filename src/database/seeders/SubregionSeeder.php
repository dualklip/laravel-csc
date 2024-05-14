<?php

namespace Database\Seeders;

use Dualklip\Csc\Models\Subregion;
use Symfony\Component\Yaml\Yaml;

class SubregionSeeder
{
    public function run(): void
    {
        $filePath = __DIR__ . '/../yml/subregions.yml';

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['subregion'] as $region) {
            Subregion::create([
                "id" => $region['id'],
                "name" => $region['name'],
                "translations" => json_encode($region['translations']),
                "region_id" => $region['region_id'],
                "flag" => 1,
                "wikiDataId" => $region['wikiDataId'],
            ]);
        }
    }
}
