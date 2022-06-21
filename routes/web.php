<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

//Route::get('/dashboard', [HomeController::class, 'afterAuthRedirect'])->middleware(['auth'])->name('dashboard');

Route::get('/admin/dashboard', [HomeController::class, 'adminIndex'])->middleware(['admin'])->name('admin');

Route::get('free_user/dashboard', [HomeController::class, 'limitedUserIndex'])->middleware(['free.user'])->name('free.user');

Route::get('/dashboard', [HomeController::class, 'userIndex'])->middleware(['paid.user'])->name('paid.user');

require __DIR__.'/auth.php';
