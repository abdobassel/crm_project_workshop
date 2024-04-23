<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\CustomerController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('auth:sanctum')->group(function () {
    // customers
    Route::post("customers/{id}", [CustomerController::class, "update"]);
    Route::get("customers/{id}", [CustomerController::class, "show"]);
    Route::delete("customers/{id}", [CustomerController::class, "delete"]);
    Route::get("customers", [CustomerController::class, "index"]);
    Route::post("customers", [CustomerController::class, "create"]);
    // projects 
    Route::post("projects", [ProjectController::class, "createProject"]);
    Route::get("projects/{customer_id}", [ProjectController::class, "projectByCustomer"]);

    Route::post("projects/{id}/{customer_id}", [ProjectController::class, "updateProject"]);

    Route::post("projects/{id}/{customer_id}", [ProjectController::class, "deleteProject"]);
});
Route::post("users", [UserController::class, "createUser"]);
