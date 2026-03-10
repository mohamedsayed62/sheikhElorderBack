<?php

use App\Http\Controllers\groups\getGroupController;
use App\Http\Controllers\groups\joinGroupController;
use App\Http\Controllers\groups\storeGroupController;
use App\Http\Controllers\orders\storeOrderController;
use App\Http\Controllers\users\storeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('storeUser', [storeController::class, "store"]);
Route::get('getUser/{id}/{name}', [storeController::class, "getUser"]);
Route::post('storeGroup', [storeGroupController::class, "store"]);
Route::post('storeOrder', [storeOrderController::class, "store"]);
Route::get('getOrder/{id}', [storeOrderController::class, "get"]);
Route::get('showOrder/{id}', [storeOrderController::class, "show"]);
Route::get('getGroup/{groupId}', [getGroupController::class, "get"]);
Route::get('setBox/{groupId}', [getGroupController::class, "setBox"]);
Route::get('getBoxs/{groupId}', [getGroupController::class, "getBoxs"]);
Route::get('check/{id}', [getGroupController::class, "checkAdmin"]);
Route::get('joinGroup/{ket}/{id}', [joinGroupController::class, "join"]);