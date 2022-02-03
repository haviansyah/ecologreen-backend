<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\PlantLocationDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\PlantLocation;
use Illuminate\Http\Request;

class PlantLocationController extends BaseAdminController
{
    protected $model = PlantLocation::class;
    protected $view = 'tanam-pohon.plant-location';
    protected $rule = [
        'name' => 'required',
    ];
    protected $route = 'plant-location';

    public function index(PlantLocationDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.plant-location.index');
    }
}
