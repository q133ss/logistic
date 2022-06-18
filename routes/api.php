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

//Route::group(['middleware' => 'auth:sanctum'], function(){
Route::group([], function(){

    Route::get('/get-cities', [App\Http\Controllers\Api\v1\CityController::class, 'getCities']);
    Route::get('/get-city/{id}', [App\Http\Controllers\Api\v1\CityController::class, 'getCity']);
    Route::get('/get-types/', [App\Http\Controllers\Api\v1\TypeController::class, 'getTypes']);
    Route::get('/get-type/{id}', [App\Http\Controllers\Api\v1\TypeController::class, 'getType']);

    Route::post('/find-transport/{type_id}/{from_id}/{to_id}', [App\Http\Controllers\Api\v1\SearchController::class, 'findTransport']); //Поиск транспорта на главной
    Route::post('/get-data-from-form/{type}/{from}/{to}', [App\Http\Controllers\Api\v1\SearchController::class, 'findFromForm']);

    Route::post('/register/company', [\App\Http\Controllers\Api\v1\RegisterController::class, 'register']);

//Route::post('/create-company', [\App\Http\Controllers\Api\v1\CompanyController::class, 'create']);
    Route::post('/create-user', [\App\Http\Controllers\Api\v1\UserController::class, 'create']);

    Route::get('/get-waypoint-company/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_company']);
    Route::get('/get-waypoint-data/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_data']);
    Route::get('/get-waypoint-data-from-order/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_waypoint_from_order']);
    Route::post('/update-waypoint/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'update']);
    Route::delete('/delete-waypoint/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'delete']);
    Route::post('/create-waypoint', [\App\Http\Controllers\Api\v1\WaypointController::class, 'create']);
    Route::get('/get-waypoint-clients/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_clients']);

    Route::get('/get-waypoints-company/{company_id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'companyWaypoints']);
    Route::get('/get-not-confirm-companies', [\App\Http\Controllers\Api\v1\UserController::class, 'notConfirm']);

    Route::post('/new-order', [\App\Http\Controllers\Api\v1\OrderController::class, 'create']);
    Route::get('/get-orders', [\App\Http\Controllers\Api\v1\OrderController::class, 'getAll']);
    Route::get('/get-order/{id}', [\App\Http\Controllers\Api\v1\OrderController::class, 'getOrder']);
    Route::get('/get-user-orders/{id}', [\App\Http\Controllers\Api\v1\OrderController::class, 'getUserOrders']);
    Route::delete('/delete-order/{id}', [\App\Http\Controllers\Api\v1\OrderController::class, 'delete']);

    Route::get('/get-statuses', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_statuses']);
    Route::get('/get-status/{id}', [\App\Http\Controllers\Api\v1\WaypointController::class, 'get_status']);
//Admin
    Route::post('/accept/{id}', [\App\Http\Controllers\Api\v1\AdminController::class, 'accept']);
    Route::delete('/delete/{id}', [\App\Http\Controllers\Api\v1\AdminController::class, 'delete']);

//Notifications
    Route::post('/read-notifications', [\App\Http\Controllers\Api\v1\NotificationController::class, 'read']);
});
