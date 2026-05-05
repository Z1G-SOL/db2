<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SupplierController;

Route::middleware(['auth'])->group(function(){

    Route::get('/dashboard',[DashboardController::class,'index']);

    Route::get('/order/create',[OrderController::class,'create']);
    Route::post('/order/store',[OrderController::class,'store']);

    Route::post('/stock-in',[SupplierController::class,'stockIn']);
});