<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\TreeSpecies
 *
 * @property int $id
 * @property string $local_name
 * @property string $scientific_name
 * @property float $sequestration
 * @property float $max_height
 * @property float $max_crown_width
 * @property int $canopy_shape_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereCanopyShapeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereLocalName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereMaxCrownWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereMaxHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereScientificName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereSequestration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $about
 * @method static \Illuminate\Database\Eloquent\Builder|TreeSpecies whereAbout($value)
 * @property-read \App\Models\CanopyShape $canopyShape
 */
class TreeSpecies extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the canopyShape that owns the TreeSpecies
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function canopyShape(): BelongsTo
    {
        return $this->belongsTo(CanopyShape::class);
    }
}
