<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyAPI;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FileController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => 'auth:sanctum'], function () {
    // first simple api
    Route::get("data", [dummyAPI::class, 'getData']);

    // simple api from database
    Route::get('list', [DeviceController::class, 'list']);

    // simple api with param
    Route::get('list/{id?}', [DeviceController::class, 'list']);

    // post method api
    Route::post('add', [DeviceController::class, 'add']);

    // put method api
    Route::put('update', [DeviceController::class, 'update']);

    // search method api
    Route::get('search/{name?}', [DeviceController::class, 'search']);

    // delete method api
    Route::delete('delete/{id}', [DeviceController::class, 'delete']);

    // api validation
    Route::post('save', [DeviceController::class, 'testData']);
});

// use resource
// Route::apiResource('member', MemberController::class); use App\Http\Resources\UserResource;

// API auth with sanctum
Route::post('login', [UserController::class, 'index']);

// upload with APi
Route::post('upload', [FileController::class, 'upload']);
