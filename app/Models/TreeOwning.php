<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TreeOwning
 *
 * @property int $id
 * @property int|null $user_id
 * @property int $tree_species_id
 * @property int $plant_location_id
 * @property string $owned_at
 * @property string|null $expired_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereExpiredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereOwnedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning wherePlantLocationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereTreeSpeciesId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeOwning whereUserId($value)
 * @mixin \Eloquent
 */
class TreeOwning extends Model
{
    use HasFactory;
}
