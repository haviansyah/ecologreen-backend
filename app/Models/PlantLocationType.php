<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantLocationType
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantLocationType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PlantLocationType extends Model
{
    use HasFactory;

    protected $guarded = [];
}
