<?php

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

Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('index');
Route::post('/', [\App\Http\Controllers\IndexController::class, 'find'])->name('index.find.transport');
Route::post('/send', [\App\Http\Controllers\IndexController::class, 'send'])->name('index.send.form');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('company')->name('company.')->middleware(['auth', 'is.company'])->group(function(){
    Route::get('/', [\App\Http\Controllers\Company\IndexController::class, 'index'])->name('index');
    Route::post('/add-car', [\App\Http\Controllers\Company\IndexController::class, 'create'])->name('create.car');
    Route::get('/waypoints', [\App\Http\Controllers\Company\IndexController::class, 'waypoints'])->name('waypoints');
    Route::post('/add-client', [\App\Http\Controllers\Company\IndexController::class, 'addClient'])->name('add.client');
});

Route::prefix('client')->name('client.')->middleware(['auth'])->group(function(){
    Route::get('/', [\App\Http\Controllers\Client\IndexController::class, 'index'])->name('index');
    Route::post('/get-car', [\App\Http\Controllers\Client\IndexController::class, 'get'])->name('get.car');
    Route::post('/send-order', [\App\Http\Controllers\Client\IndexController::class, 'send'])->name('send.order');
    Route::get('/orders', [\App\Http\Controllers\Client\IndexController::class, 'orders'])->name('orders');
});

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])->group(function(){
    Route::get('/', [\App\Http\Controllers\Admin\IndexController::class, 'index'])->name('index');
    Route::get('/accept/{id}', [\App\Http\Controllers\Admin\IndexController::class, 'accept'])->name('accept');
    Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\IndexController::class, 'delete'])->name('delete');
    Route::get('/waypoints', [\App\Http\Controllers\Admin\WaypointsController::class, 'index'])->name('waypoints');
    Route::get('/create', [\App\Http\Controllers\Admin\IndexController::class, 'create'])->name('create');
    Route::get('/orders', [\App\Http\Controllers\Admin\IndexController::class, 'orders'])->name('orders');
});

Route::get('/account', [\App\Http\Controllers\AccountController::class, 'check'])->name('account');

Route::post('/logout', function (){
    \Session::flush();
    \Auth::logout();
    return redirect('login');
})->name('logout');
