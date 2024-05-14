<?php

namespace Dualklip\Csc\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Subregion
 * @package App\Models
 *
 * @property mixed $id
 * @property string $name
 * @property string $translations
 * @property string $region_id
 * @property string $flag
 * @property string $wikiDataId
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Subregion extends Model
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

    public function countries(): HasMany
    {
        return $this->hasMany(Country::class);
    }
}
