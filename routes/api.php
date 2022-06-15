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

Route::post('/register/company', [\App\Http\Controllers\Api\v1\RegisterController::class, 'register']);

//Route::post('/create-company', [\App\Http\Controllers\Api\v1\CompanyController::class, 'create']);
Route::post('/create-user', [\App\Http\Controllers\Api\v1\UserController::class, 'create']);

Route::get('/get-waypoint-data/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_data']);
Route::get('/get-statuses', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_statuses']);
Route::get('/get-status/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_status']);

Route::post('/update-waypoint/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'update']);
Route::delete('/delete-waypoint/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'delete']);

//Admin
Route::post('/accept/{id}', [\App\Http\Controllers\Api\v1\AdminController::class, 'accept']);
Route::delete('/delete/{id}', [\App\Http\Controllers\Api\v1\AdminController::class, 'delete']);
