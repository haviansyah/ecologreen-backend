<?php

use App\Http\Controllers\Admin\TanamPohon\CanopyShapeController;
use App\Http\Controllers\Admin\TanamPohon\PlantLocationController;
use App\Http\Controllers\Admin\TanamPohon\PlantLocationTypeController;
use App\Http\Controllers\Admin\TanamPohon\TreeSpeciesController;
use App\Models\PlantLocationType;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::middleware('auth')->group(function(){

    Route::prefix('admin')->group(function(){
        Route::prefix('tanam-pohon')->group(function(){

            Route::resource('tree-species',TreeSpeciesController::class);
            Route::resource('canopy-shape',CanopyShapeController::class);
            Route::resource('plant-location-type',PlantLocationTypeController::class);
            Route::resource('plant-location',PlantLocationController::class);
        });
    });

    Route::get('/', function(){
        return view('app');
    } )->name('home');

});

