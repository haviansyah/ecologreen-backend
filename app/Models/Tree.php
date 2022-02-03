<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tree
 *
 * @property int $id
 * @property int $tree_species_id
 * @property float $lon
 * @property float $lat
 * @property string $planting_date
 * @property int $plant_location_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereLat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereLon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree wherePlantLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree wherePlantingDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereTreeSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tree whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tree extends Model
{
    use HasFactory;
}
