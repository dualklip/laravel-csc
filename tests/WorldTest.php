<?php

use Dualklip\Csc\Models\Region;
use Dualklip\Csc\Models\Subregion;
use Dualklip\Csc\database\seeders\RegionSeeder;
use Dualklip\Csc\database\seeders\SubregionSeeder;

describe('world', function () {
    it('create region', function () {
        $region = Region::factory()->create();
        $this->assertDatabaseHas('regions', $region->toArray());
    });
    it('regions', function () {
        $regions = Region::all();
        $this->assertContainsOnlyInstancesOf(Region::class, $regions);
    });
    it('subregions', function () {
        $subregions = Subregion::all();
        $this->assertContainsOnlyInstancesOf(Subregion::class, $subregions);
    });
    it('subregion has region relationship', function () {
        $this->seed([RegionSeeder::class, SubregionSeeder::class]);
        $subregion = Subregion::inRandomOrder()->first();
        $this->assertInstanceOf(Subregion::class, $subregion);
        $this->assertInstanceOf(Region::class, $subregion->region);
    });
});
