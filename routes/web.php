<?php

use App\Http\Controllers\Admin\AppConfig\BankAccountController;
use App\Http\Controllers\Admin\AppConfig\PaymentMethodController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\TanamPohon\CanopyShapeController;
use App\Http\Controllers\Admin\TanamPohon\PaymentConfirmationController;
use App\Http\Controllers\Admin\TanamPohon\PlantLocationController;
use App\Http\Controllers\Admin\TanamPohon\PlantLocationTypeController;
use App\Http\Controllers\Admin\TanamPohon\PlantTreeTransactionController;
use App\Http\Controllers\Admin\TanamPohon\TreeCatalogController;
use App\Http\Controllers\Admin\TanamPohon\TreeInventoryController;
use App\Http\Controllers\Admin\TanamPohon\TreeSpeciesController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use williamcruzme\FCM\Facades\Device;

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

Auth::routes(["verify" => true]);

/** 
 * ===========================
 * Email Verification Part 
 * ===========================
 * */
Route::get('/password-change-success', function(){
    return view('auth.change-success');
});

Route::get('/email-verify-success', function(){
    return view('auth.verify-success');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    auth()->logout();
    return redirect('/email-verify-success');
})->middleware(['auth', 'signed'])->name('verification.verify');
/** 
 * ===========================
 * Admin 
 * ===========================
 * */
Route::middleware('auth')->group(function () {
    Device::routes();

    Route::prefix('admin')->middleware('role')->group(function () {
        Route::prefix('tanam-pohon')->group(function () {
            Route::resource('tree-catalog', TreeCatalogController::class);
            Route::resource('tree-inventory', TreeInventoryController::class);
            Route::resource('tree-species', TreeSpeciesController::class);
            Route::resource('canopy-shape', CanopyShapeController::class);
            Route::resource('plant-location-type', PlantLocationTypeController::class);
            Route::resource('plant-location', PlantLocationController::class);

            Route::post('transaction/{id}', [PlantTreeTransactionController::class,'addTree']);
            Route::delete('transaction/{id}/{tree}', [PlantTreeTransactionController::class,'removeTree']);
            Route::resource('transaction', PlantTreeTransactionController::class);
            Route::resource('payment-confirmation', PaymentConfirmationController::class);
        });

        Route::prefix('app-config')->group(function () {
            Route::resource('bank-account', BankAccountController::class);
            Route::resource('payment-method', PaymentMethodController::class);
        });

      
    });
    Route::get('notifications/get', [NotificationController::class, 'getNotificationsData'])->name('notifications.get');
    Route::get('notifications/read', [NotificationController::class, 'readNotif'])->name('notifications.read');
    Route::get('notifications/show', [NotificationController::class, 'show'])->name('notifications.show');

    Route::get('/', function () {
        return view('app');
    })->name('home')->middleware('role');    
});


