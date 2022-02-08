<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\TreeInventoryDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Models\Tree;

class TreeInventoryController extends BaseAdminController
{
    protected $model = Tree::class;
    protected $view = 'tanam-pohon.tree-inventory';
    protected $rule = [
        'tree_species_id' => 'required',
        'plant_location_id' => 'required',
        'lon' => 'required',
        'lat' => 'required',
    ];
    protected $route = 'tree-inventory';

    public function index(TreeInventoryDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.tree-inventory.index');
    }
}
