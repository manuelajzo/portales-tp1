<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
Route::get('/productos', [ProductosController::class, 'productos']);
Route::get('/blog', function () {
    return view('blog');
});
