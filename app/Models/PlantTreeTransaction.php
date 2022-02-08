<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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
 * @property int $payment_method_id
 * @method static \Illuminate\Database\Eloquent\Builder|PlantTreeTransaction wherePaymentMethodId($value)
 * @property-read \App\Models\PaymentMethod $paymentMethod
 * @property-read \App\Models\PaymentStatus $paymentStatus
 * @property-read \App\Models\TreeCatalog $treeCatalog
 * @property-read \App\Models\User $user
 * @property-read mixed $due_date
 * @property-read float $total_price
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tree[] $tree
 * @property-read int|null $tree_count
 * @property-read bool $is_full_marked
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Tree[] $trees
 * @property-read int|null $trees_count
 */
class PlantTreeTransaction extends Model
{
    use HasFactory;


    /**
     * Get the user that owns the PlantTreeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    /**
     * Get the paymentMethod that owns the PlantTreeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    /**
     * Get the paymentStatus that owns the PlantTreeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentStatus(): BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class);
    }

    /**
     * Get the treeCatalog that owns the PlantTreeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function treeCatalog(): BelongsTo
    {
        return $this->belongsTo(TreeCatalog::class);
    }


    public function getDueDateAttribute(){
        return $this->created_at->addDay();
    }


    /**
     * @return float
     */
    public function getTotalPriceAttribute(){
       return ($this->quantity * $this->unit_price) + $this->unique_code;
    }

    /**
     * The tree that belong to the PlantTreeTransaction
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function trees(): BelongsToMany
    {
        return $this->belongsToMany(Tree::class, 'transaction_tree', 'plant_tree_transaction_id', 'tree_id');
    }


    /**
     * @return bool
     */
    public function getIsFullMarkedAttribute(){
        return $this->trees->count() == $this->quantity;
    }
}
