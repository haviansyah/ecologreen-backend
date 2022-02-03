<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantLocation
 *
 * @property int $id
 * @property int $plant_location_type_id
 * @property string $name
 * @property string $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation wherePlantLocationTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlantLocation extends Model
{
    use HasFactory;

    protected $guarded = [];
}
