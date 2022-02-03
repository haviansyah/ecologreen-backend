<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CanopyShape
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape query()
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CanopyShape whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CanopyShape extends Model
{
    use HasFactory;

    protected $guareded = [];
}
