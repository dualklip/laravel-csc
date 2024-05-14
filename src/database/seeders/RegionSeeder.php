<?php

namespace Dualklip\Csc\database\seeders;

use Dualklip\Csc\Models\Region;
use Symfony\Component\Yaml\Yaml;

class RegionSeeder
{
    public function run(): void
    {
        $filePath = __DIR__ . '/../yml/regions.yml';

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['region'] as $region) {
            Region::create([
                "id" => $region['id'],
                "name" => $region['name'],
                "translations" => json_encode($region['translations']),
                "flag" => 1,
                "wikiDataId" => $region['wikiDataId'],
            ]);
        }
    }
}
