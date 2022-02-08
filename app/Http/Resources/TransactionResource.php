<?php

namespace App\Http\Resources;

use App\Models\PlantTreeTransaction;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var PlantTreeTransaction */
        $transaction = $this;
        return [
            'id' => $transaction->id,
            'code' => $transaction->code,
            'created_at' => $transaction->created_at->format('d M Y H:i'),
            'status_name' => $transaction->paymentStatus->name,
            'status_id' => (int) $transaction->paymentStatus->id,
            'total_price' => (float) $transaction->total_price,
            'quantity' => (int) $transaction->quantity,
        ];
    }
}
