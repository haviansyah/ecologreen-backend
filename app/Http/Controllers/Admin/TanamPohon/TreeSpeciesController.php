<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\TreeSpeciesDataTable;
use App\Http\Controllers\Admin\BaseAdminController;

use App\Http\Controllers\Controller;
use App\Models\TreeSpecies;
use Illuminate\Http\Request;

class TreeSpeciesController extends BaseAdminController
{
    protected $model = TreeSpecies::class;
    protected $view = 'tanam-pohon.tree-species';
    protected $rule = [
        'local_name' => 'required',
        'scientific_name' => 'required',
    ];
    protected $route = 'tree-species';

    public function index(TreeSpeciesDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.tree-species.index');
    }
}
