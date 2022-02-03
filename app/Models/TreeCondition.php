<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TreeCondition
 *
 * @property int $id
 * @property int $tree_id
 * @property float $height
 * @property float $dbh
 * @property float $crown_width
 * @property int $top_disease_id
 * @property int $bottom_disease_id
 * @property int $mechanic_disease_id
 * @property string $inspection_at
 * @property int|null $inspector_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition query()
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereBottomDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereCrownWidth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereDbh($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereHeight($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereInspectionAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereInspectorUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereMechanicDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereTopDiseaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereTreeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TreeCondition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TreeCondition extends Model
{
    use HasFactory;
}
