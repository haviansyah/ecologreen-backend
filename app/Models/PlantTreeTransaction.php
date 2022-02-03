<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PlantTreeTransaction
 *
 * @property int $id
 * @property string $code
 * @property int $user_id
 * @property int $tree_catalog_id
 * @property int $quantity
 * @property float $unit_price
 * @property int $unique_code
 * @property int $payment_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction wherePaymentStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereTreeCatalogId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUniqueCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUnitPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction whereUserId($value)
 * @mixin \Eloquent
 */
class PlantTreeTransaction extends Model
{
    use HasFactory;
}
