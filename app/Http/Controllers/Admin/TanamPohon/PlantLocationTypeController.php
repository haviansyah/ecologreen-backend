<?php

namespace App\Http\Controllers\Admin\TanamPohon;

use App\DataTables\TanamPohon\PlantLocationTypeDataTable;
use App\Http\Controllers\Admin\BaseAdminController;
use App\Http\Controllers\Controller;
use App\Models\PlantLocationType;
use Illuminate\Http\Request;

class PlantLocationTypeController extends BaseAdminController
{
    protected $model = PlantLocationType::class;
    protected $view = 'tanam-pohon.plant-location-type';
    protected $rule = [
        'name' => 'required',
    ];
    protected $route = 'plant-location-type';

    public function index(PlantLocationTypeDataTable $dataTable)
    {
        return $dataTable->render('admin.tanam-pohon.plant-location-type.index');
    }
}
