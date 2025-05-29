<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index']);
Route::get('/products', [ProductsController::class, 'products']);
Route::get('/blog', function () {
    return view('blog');
});
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class);
});
