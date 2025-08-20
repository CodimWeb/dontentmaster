<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ServiceController;
use Illuminate\Support\Facades\Route;

Route::post('/auth/login', [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/auth/me', [AuthController::class, 'me']);
    Route::post('/auth/logout',  [AuthController::class, 'logout']);

    Route::resource('home', HomeController::class);
    Route::resource('category', CategoryController::class);
    Route::post('/category/update', [CategoryController::class, 'update']);
    Route::get('/service/get-by-category/{category_id}', [ServiceController::class, 'getByCategory']);
    Route::resource('service',ServiceController::class);
});
