<?php

namespace Dualklip\Csc\Database\Factories;

use Dualklip\Csc\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class RegionFactory extends Factory
{
    protected $model = Region::class;

    public function definition(): array
    {
        return [
            'id' => 1,
            'name' => 'Africa',
            'translations' => '{"kr":"\uc544\ud504\ub9ac\uce74","pt-BR":"\u00c1frica","pt":"\u00c1frica","nl":"Afrika","hr":"Afrika","fa":"\u0622\u0641\u0631\u06cc\u0642\u0627","de":"Afrika","es":"\u00c1frica","fr":"Afrique","ja":"\u30a2\u30d5\u30ea\u30ab","it":"Africa","cn":"\u975e\u6d32","tr":"Afrika"}',
            'flag' => 1,
            'wikiDataId' => 'Q15',
        ];
    }
}
