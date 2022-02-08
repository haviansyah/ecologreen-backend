<?php

namespace App\Http\Resources;

use App\Models\TreeCatalog;
use Illuminate\Http\Resources\Json\JsonResource;

class TreeCatalogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var TreeCatalog */
        $treeCatalog = $this;
        return [
            'id' => $treeCatalog->id,
            'local_name' => $treeCatalog->treeSpecies->local_name,
            'scientific_name' => $treeCatalog->treeSpecies->scientific_name,
            'price' => (int) $treeCatalog->price,
            'plant_location' => (int) $treeCatalog->plantLocation->name,

            'thumbnail_address' => $treeCatalog->images->first()->thumbnail_address,
            'file_address' => $treeCatalog->images->first()->file_address,
        ];
    }
}
