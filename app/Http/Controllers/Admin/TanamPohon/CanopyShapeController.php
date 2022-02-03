<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\CanopyShapeDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\CanopyShape;
use Illuminate\Http\Request;

class CanopyShapeController extends BaseAdminController
{
    protected $model = CanopyShape::class;
    protected $view = 'tanam-pohon.canopy-shape';
    protected $rule = [
        'name' => 'required',
    ];
    protected $route = 'canopy-shape';

    public function index(CanopyShapeDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.canopy-shape.index');
    }
}
