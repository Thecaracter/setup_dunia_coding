<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

//Landing Page Routes
Route::get('/', function () {
    return view('landing.landing-page');
})->name('home');

Route::get('/cart', function () {
    return view('landing.shopping-cart');
})->name('cart');

//Auth Routes
Route::get('/auth/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/auth/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/search', function () {
    return view('search');
});
Route::get('/products', function () {
    return view('products');
});

// Admin Routes
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/admin/products', [ProductController::class, "index"])->name('admin.products');