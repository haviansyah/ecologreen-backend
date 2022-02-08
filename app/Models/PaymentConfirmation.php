<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\PaymentConfirmation
 *
 * @property int $id
 * @property int $plant_tree_transaction_id
 * @property float $payment_total
 * @property string $transaction_date
 * @property string|null $note
 * @property int|null $file_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereNote($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation wherePaymentTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation wherePlantTreeTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $bank_account_id
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentConfirmation whereBankAccountId($value)
 */
class PaymentConfirmation extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the transaction that owns the PaymentConfirmation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(PlantTreeTransaction::class,'plant_tree_transaction_id');
    }

    /**
     * Get the bankAccount that owns the PaymentConfirmation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function bankAccount(): BelongsTo
    {
        return $this->belongsTo(BankAccount::class, 'bank_account_id');
    }

}
