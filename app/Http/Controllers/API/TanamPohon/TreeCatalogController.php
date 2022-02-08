<?php

namespace App\Http\Controllers\API\TanamPohon;

use App\Http\Controllers\API\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\PaginatorResource;
use App\Http\Resources\TreeCatalogDetailResource;
use App\Http\Resources\TreeCatalogResource;
use App\Models\TreeCatalog;
use Illuminate\Http\Request;

use const App\Http\Helpers\STATUS_PUBLISH;

class TreeCatalogController extends BaseController
{

    /**
     * 
     * @method index() Get All Tree Catalog
     * GET api/tanam-pohon/tree-catalog
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $treeCatalogs = TreeCatalog::whereStatus(STATUS_PUBLISH)->paginate();
        $response = new PaginatorResource($treeCatalogs, TreeCatalogResource::class);
        return $this->sendResponse($response);
    }

    /**
     * 
     * @method show() Get Detail Tree Catalog
     * GET api/tanam-pohon/tree-catalog/{id}
     * AUTH
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $treeCatalog = TreeCatalog::findOrFail($id);
        return $this->sendResponse(new TreeCatalogDetailResource($treeCatalog));
    }
}
