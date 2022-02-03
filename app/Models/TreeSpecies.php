<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 */
class TreeSpecies extends Model
{
    use HasFactory;

    protected $guarded = [];
}
