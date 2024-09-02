<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:api')->group(function(){
    Route::get('product',[ProductController::class,'index']);  
});


Route::post('user/login',[AuthController::class,'login']);