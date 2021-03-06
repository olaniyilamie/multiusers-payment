<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\PaymentController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'redirectTo'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['free.user' , 'paid.user']], function () {
        Route::get('/dashboard', [HomeController::class, 'userIndex'])->name('user');
        Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
        Route::get('/payment/callback',[ PaymentController::class, 'handleGatewayCallback']);
    });

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    });
});


require __DIR__.'/auth.php';
