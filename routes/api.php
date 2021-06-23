<?php

use App\Http\Controllers\bus_routesController;
use App\Http\Controllers\routesController;
use App\Http\Controllers\super_adminsController;
use App\Http\Controllers\busController;
use App\Http\Controllers\bus_seatesController;
use App\Http\Controllers\bus_schedulesController;
use App\Http\Controllers\bus_schedule_bookingsController;
use App\Http\Controllers\usersController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\super_adminAuthController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('User_register', [AuthController::class, 'User_register']);
Route::post('User_login', [AuthController::class, 'User_login']);

Route::post('super_admin_register', [super_adminAuthController::class, 'super_admin_register']);
Route::post('super_admin_login', [super_adminAuthController::class, 'super_admin_login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('User_logout', [AuthController::class, 'User_logout']);
    
    

//----------------bus_schedules-------------------

//Get API Code
Route::get('bus_schedules',[bus_schedulesController::class, 'index']);

//Show ID API Code
Route::get('bus_schedules/{id}/show',[bus_schedulesController::class, 'show']);

//insert API Code
Route::post('bus_schedules/add',[bus_schedulesController::class, 'store']);

//Update API Code
Route::put('bus_schedules/{id}/update',[bus_schedulesController::class, 'update']);

//Delete API Code
Route::delete('bus_schedules/{id}/delete',[bus_schedulesController::class, 'destroy']);


//----------------bus_schedule_bookings-------------------

//Get API Code
Route::get('bus_schedule_bookings',[bus_schedule_bookingsController::class, 'index']);

//Show ID API Code
Route::get('bus_schedule_bookings/{id}/show',[bus_schedule_bookingsController::class, 'show']);

//insert API Code
Route::post('bus_schedule_bookings/add',[bus_schedule_bookingsController::class, 'store']);

//Update API Code
Route::put('bus_schedule_bookings/{id}/update',[bus_schedule_bookingsController::class, 'update']);

//Delete API Code
Route::delete('bus_schedule_bookings/{id}/delete',[bus_schedule_bookingsController::class, 'destroy']);


/*----------------Users-------------------

//Get API Code
Route::get('users',[usersController::class, 'index']);

//Show ID API Code
Route::get('users/{id}/show',[usersController::class, 'show']);

//insert API Code
Route::post('users/add',[usersController::class, 'store']);

//Update API Code
Route::put('users/{id}/update',[usersController::class, 'update']);

//Delete API Code
Route::delete('users/{id}/delete',[usersController::class, 'destroy']);
*/

});

Route::middleware('auth:sanctum')->group(function () {

    Route::post('super_admin_logout', [super_adminAuthController::class, 'super_admin_logout']);
    

/*----------------super_admins-------------------

//Get API Code
Route::get('super_admins',[super_adminsController::class, 'index']);

//Show ID API Code
Route::get('super_admins/{id}/show',[super_adminsController::class, 'show']);

//insert API Code
Route::post('super_admins/add',[super_adminsController::class, 'store']);

//Update API Code
Route::put('super_admins/{id}/update',[super_adminsController::class, 'update']);

//Delete API Code
Route::delete('super_admins/{id}/delete',[super_adminsController::class, 'destroy']);
*/

//----------------routes-------------------

//Get API Code
Route::get('routes',[routesController::class, 'index']);

//Show ID API Code
Route::get('routes/{id}/show',[routesController::class, 'show']);

//insert API Code
Route::post('routes/add',[routesController::class, 'store']);

//Update API Code
Route::put('routes/{id}/update',[routesController::class, 'update']);

//Delete API Code
Route::delete('routes/{id}/delete',[routesController::class, 'destroy']);


//----------------Bus routes-------------------

//Get API Code
Route::get('bus_routes',[bus_routesController::class, 'index']);

//Show ID API Code
Route::get('bus_routes/{id}/show',[bus_routesController::class, 'show']);

//insert API Code
Route::post('bus_routes/add',[bus_routesController::class, 'store']);

//Update API Code
Route::put('bus_routes/{id}/update',[bus_routesController::class, 'update']);

//Delete API Code
Route::delete('bus_routes/{id}/delete',[bus_routesController::class, 'destroy']);


//----------------Bus-------------------

//Get API Code
Route::get('buses',[busController::class, 'index']);

//Show ID API Code
Route::get('buses/{id}/show',[busController::class, 'show']);

//insert API Code
Route::post('buses/add',[busController::class, 'store']);

//Update API Code
Route::put('buses/{id}/update',[busController::class, 'update']);

//Delete API Code
Route::delete('buses/{id}/delete',[busController::class, 'destroy']);


//----------------bus_seates-------------------

//Get API Code
Route::get('bus_seates',[bus_seatesController::class, 'index']);

//Show ID API Code
Route::get('bus_seates/{id}/show',[bus_seatesController::class, 'show']);

//insert API Code
Route::post('bus_seates/add',[bus_seatesController::class, 'store']);

//Update API Code
Route::put('bus_seates/{id}/update',[bus_seatesController::class, 'update']);

//Delete API Code
Route::delete('bus_seates/{id}/delete',[bus_seatesController::class, 'destroy']);

});

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});
