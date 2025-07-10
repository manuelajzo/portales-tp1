<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;


// USER ROUTES
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [ProductsController::class, 'products']);
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

// ADMIN ROUTES
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('posts', PostController::class)->names('admin.posts');
    Route::resource('users', App\Http\Controllers\Admin\UserController::class)->names('admin.users');
    
    // Profile routes
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'show'])->name('admin.profile.show');
    Route::get('/profile/edit', [App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::put('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');
});

// AUTH ROUTES
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// REGISTER ROUTES
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');
