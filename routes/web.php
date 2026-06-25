<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;

/*
|--------------------------------------------------------------------------
| LOGIN & REGISTER
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('login');

Route::post('/post-login', [AuthController::class, 'login'])->name('post.login');

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/post-register', [AuthController::class, 'post_register'])->name('post.register');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::get('/admin', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

Route::get('/product', [ProductController::class, 'index'])
    ->name('admin.product');

Route::get('/product/create', [ProductController::class, 'create'])
    ->name('product.create');

Route::post('/product/store', [ProductController::class, 'store'])
    ->name('product.store');

Route::get('/admin/logout', [AuthController::class, 'admin_logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get('/user', [UserController::class, 'index'])
    ->name('user.dashboard');

Route::get('/user/logout', [AuthController::class, 'user_logout'])
    ->name('user.logout');

/*
|--------------------------------------------------------------------------
| PRODUCT
|--------------------------------------------------------------------------
*/

Route::get('/product', [ProductController::class, 'index'])->name('admin.product');

Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');

Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');

Route::put('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

Route::delete('/product/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');