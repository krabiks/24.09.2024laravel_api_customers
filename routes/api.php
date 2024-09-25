<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\http\Controllers\OrderController;
//Route::get('/user', function (Request $request) {
    //return $request->user();
//})->middleware('auth:sanctum');

Route::apiResource('customers', CustomerController::class);
Route::apiResource('customers.orders', OrderController::class);

//Route::get('/', function(){
    //return'API';
//});
