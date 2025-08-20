<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/admin{any}', function () {
    return view('admin');
})->where('any', '.*');

Route::get('/', [IndexController::class, 'index'])->name('index');
Route::get('/services/{slug}', [CategoryController::class, 'index'])->name('services');
