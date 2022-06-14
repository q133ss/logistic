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

Route::get('/', function () {
    return view('index');
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('company')->middleware(['auth'])->group(function(){
    Route::get('/', [\App\Http\Controllers\Company\IndexController::class, 'index'])->name('company.index');
    Route::post('/add-car', [\App\Http\Controllers\Company\IndexController::class, 'create'])->name('company.create.car');
    Route::get('/waypoints', [\App\Http\Controllers\Company\IndexController::class, 'waypoints'])->name('company.waypoints');
});

Route::post('/logout', function (){
    \Session::flush();
    \Auth::logout();
    return redirect('login');
})->name('logout');
