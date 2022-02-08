<?php


use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ConfigurationController;
use App\Http\Controllers\API\PaymentMethodController;
use App\Http\Controllers\API\TanamPohon\OwnedTreeController;
use App\Http\Controllers\API\TanamPohon\PaymentConfirmationController;
use App\Http\Controllers\API\TanamPohon\TanamPohonTransactionController;
use App\Http\Controllers\API\TanamPohon\TreeCatalogController;
use Illuminate\Support\Facades\Route;
use williamcruzme\FCM\Facades\Device;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/** Auth Routes */
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::get('resend-verification', [AuthController::class, 'resend_verification'])
->middleware(['auth:api', 'throttle:6,1'])->name('verification.send');


Route::get('config', [ConfigurationController::class, 'get_config']);

Route::middleware(['auth:api','verified'])->group(function () {
    Device::routes('App\Http\Controllers\API');

    Route::get('me', [AuthController::class, 'me']);

    Route::post('account', [AuthController::class, 'update_account']);
    Route::post('account/password', [AuthController::class, 'update_password']);


    Route::get('payment-method',[PaymentMethodController::class, 'index'])->name('payment-method.index');
    /**
     * ==================
     * Tanam Pohon
     * ==================
     */
    Route::prefix('tanam-pohon')->group(function(){
        Route::get('tree-catalog',[TreeCatalogController::class, 'index'])->name('tree-catalog.index');
        Route::get('tree-catalog/{id}',[TreeCatalogController::class, 'show'])->name('tree-catalog.show');
        
        Route::post('transaction',[TanamPohonTransactionController::class, 'store'])->name('transaction.store');
        Route::get('transaction/{id}',[TanamPohonTransactionController::class, 'show'])->name('transaction.show');
        Route::post('confirmation/',[PaymentConfirmationController::class, 'store'])->name('confirmation.store');
        Route::get('transaction',[TanamPohonTransactionController::class, 'index'])->name('transaction.index');
       
        Route::get('my-tree',[OwnedTreeController::class, 'myTree'])->name('my-tree');
        Route::get('tree-tracking',[OwnedTreeController::class, 'treeTracking'])->name('tree-tracking');

    });
});
