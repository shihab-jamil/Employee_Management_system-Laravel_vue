<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;

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

Route::post("/login", [LoginController::class, 'login']);


Route::middleware('auth:sanctum')->group(function () {

    Route::post("/logout", [LoginController::class, 'logout']);

    Route::post("/user-details", [UserController::class, "userDetailsShow"]);
    Route::put("/update-user/{id}", [UserController::class, "updateUser"]);
    Route::post("/change-password", [UserController::class, "changePassword"]);
    Route::get("/employees", [UserController::class, "getAllEmployees"]);
    Route::get("/employees/{id}", [UserController::class, "getSingleEmployees"]);
    Route::delete("/employees/{id}", [UserController::class, "destroy"]);
    Route::get("/cards-count", [UserController::class, "cardsValueCount"]);
    Route::get("/dropdown-values", [UserController::class, "allDropdownValues"]);

    // Route::apiResource("/roles", [RoleController::class]);
    // Route::apiResource("/departments", [RoleController::class]);
    // Route::apiResource("/designations", [RoleController::class]);
});