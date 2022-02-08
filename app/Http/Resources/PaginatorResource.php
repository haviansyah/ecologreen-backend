<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;

class PaginatorResource extends ResourceCollection
{

    public $listClass;
    public function __construct($resource, $listClass)
    {
        parent::__construct($resource);
        $this->listClass = $listClass;
    }
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /** @var LengthAwarePaginator $this */
        return [
            'data' => $this->listClass::collection($this->collection),
            'pagination' => [
                'object_count' => (int) $this->total(),
                'page_count' => (int) $this->get_current_count(),
                'page_size' => (int) $this->count(),
                'page_number' => (int) $this->currentPage(),
                'has_more_item' => (bool) !is_null($this->nextPageUrl()),
                'next_page' => $this->nextPageUrl(),
            ],
        ];
    }
    public function get_current_count()
    {
        /** @var LengthAwarePaginator $this */

        $per_page = $this->perPage();
        $current_page = $this->currentPage();
        $page_count = $this->count();
        return ($per_page * ($current_page - 1)) + $page_count;
    }
}
