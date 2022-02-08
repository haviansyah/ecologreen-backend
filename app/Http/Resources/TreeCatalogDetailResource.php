<?php

namespace App\Http\Resources;

use App\Models\TreeCatalog;
use Illuminate\Http\Resources\Json\JsonResource;

class TreeCatalogDetailResource extends JsonResource
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

            'max_height' => (float) $treeCatalog->treeSpecies->max_height,
            'max_crown_width' => (float) $treeCatalog->treeSpecies->max_crown_width,
            'sequestration' => (float) $treeCatalog->treeSpecies->sequestration,
            'canopy_shape' => (float) $treeCatalog->treeSpecies->canopyShape->name,

            'about' => $treeCatalog->treeSpecies->about,

            'images' => $treeCatalog->images
        ];
    }
}
