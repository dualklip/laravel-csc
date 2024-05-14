<?php

namespace Dualklip\Csc\database\seeders;

use Dualklip\Csc\Models\Country;
use Symfony\Component\Yaml\Yaml;

class CountrySeeder
{
    public function run(): void
    {
        $filePath = __DIR__ . '/../yml/countries.yml';

        $regions = Yaml::parseFile($filePath);
        foreach ($regions['country'] as $region) {
            Country::create([
                "id" => $region['id'],
                "name" => $region['name'],
                "iso3" => $region['iso3'],
                "numeric_code" => $region['numeric_code'],
                "iso2" => $region['iso2'],
                "phonecode" => $region['phone_code'],
                "capital" => $region['capital'],
                "currency" => $region['currency'],
                "currency_name" => $region['currency_name'],
                "currency_symbol" => $region['currency_symbol'],
                "tld" => $region['tld'],
                "native" => $region['native'],
                "region" => $region['region'],
                "region_id" => $region['region_id'],
                "subregion" => $region['subregion'],
                "subregion_id" => $region['subregion_id'],
                "nationality" => $region['nationality'],
                "timezones" => json_encode($region['timezones']),
                "translations" => json_encode($region['translations']),
                "latitude" => $region['latitude'],
                "longitude" => $region['longitude'],
                "emoji" => $region['emoji'],
                "emojiU" => $region['emojiU'],
                "flag" => 1,
                "wikiDataId" => '',
            ]);
        }
    }
}
