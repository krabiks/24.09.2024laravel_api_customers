<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\http\Controllers\OrderController;
use App\http\Controllers\AuthController;
//Route::get('/user', function (Request $request) {
    //return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('customers', CustomerController::class);
Route::apiResource('customers.orders', OrderController::class);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

//Route::get('/', function(){
    //return'API';
//});
