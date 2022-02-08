<?php

namespace App\Http\Resources;

use App\Models\PaymentMethod;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentMethodResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var PaymentMethod $this */
        return [
            'id' => $this->id,
            'name' => $this->name,
            'thumbnail_address' => $this->image->thumbnail_address,
            'file_address' => $this->image->file_address,
        ];
    }
}
