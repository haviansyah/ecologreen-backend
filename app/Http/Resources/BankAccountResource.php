<?php

namespace App\Http\Resources;

use App\Models\BankAccount;
use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var BankAccount */
        $bankAccount = $this;
        return [
            'id' => $bankAccount->id,
            'file_address' => $bankAccount->image->file_address,
            'account_number' => $bankAccount->account_number,
            'account_holder_name' => $bankAccount->account_holder_name,
            'bank_name' => $bankAccount->bank_name,
        ];
    }
}
