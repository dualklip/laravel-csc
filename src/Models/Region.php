<?php

namespace Dualklip\Csc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Region extends Model
{
    protected $guarded = [];

    public function subregions(): HasMany
    {
        return $this->hasMany(Subregion::class);
    }

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
