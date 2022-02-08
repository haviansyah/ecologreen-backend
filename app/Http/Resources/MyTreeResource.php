<?php

namespace App\Http\Resources;

use App\Models\PlantTreeTransaction;
use Illuminate\Http\Resources\Json\JsonResource;

class MyTreeResource extends JsonResource
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
        $plantTreeTransaction = $this;
        /** @var TreeCatalog */
        $treeCatalog = $plantTreeTransaction->treeCatalog;
        return [
            'id' => $treeCatalog->id,
            'local_name' => $treeCatalog->treeSpecies->local_name,
            'scientific_name' => $treeCatalog->treeSpecies->scientific_name,
            'quantity' => (int) $plantTreeTransaction->quantity,
            'plant_location' => (int) $treeCatalog->plantLocation->name,
            'thumbnail_address' => $treeCatalog->images->first()->thumbnail_address,
            'file_address' => $treeCatalog->images->first()->file_address,
        ];
    }

}
