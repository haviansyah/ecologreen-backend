<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TreeDiseaseRate
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property int $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeDiseaseRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TreeDiseaseRate extends Model
{
    use HasFactory;
}
