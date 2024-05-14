<?php

namespace Dualklip\Csc\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Country extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'translations' =>'array'
        ];
    }

    public function region(): BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function subregion(): BelongsTo
    {
        return $this->belongsTo(Subregion::class);
    }
}
