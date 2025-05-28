<?php

use Illuminate\Support\Facades\Route;



Route::get('/', [\App\Http\Controllers\HomeController::class, 'home']);
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'about']);
Route::get('/blog', function () {
    return view('blog');
});
