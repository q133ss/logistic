<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/get-cities', [App\Http\Controllers\Api\v1\CityController::class, 'getCities']);
Route::get('/get-city/{id}', [App\Http\Controllers\Api\v1\CityController::class, 'getCity']);
Route::get('/get-types/', [App\Http\Controllers\Api\v1\TypeController::class, 'getTypes']);
Route::get('/get-type/{id}', [App\Http\Controllers\Api\v1\TypeController::class, 'getType']);

Route::post('/find-transport/{type_id}/{from_id}/{to_id}', [App\Http\Controllers\Api\v1\SearchController::class, 'findTransport']); //Поиск транспорта на главной
Route::post('/get-data-from-form/{type}/{from}/{to}', [App\Http\Controllers\Api\v1\SearchController::class, 'findFromForm']);
