<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Aboutcontroller;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
 use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [ HomeController::class, 'index'])->name('home.index');

Route::get('/search', [SearchController::class, 'search'])->name('search');
Route::get('/product/{id}', [SearchController::class, 'show'])->name('product.show');
 
Route::post('login', [AuthController::class, 'login'])->name('auth.login');
Route::post('register', [AuthController::class, 'register'])->name('register');

Route::get('/', [ HomeController::class, 'index'])->name('home.index');
 
Route::middleware('auth')->group(function () {

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/contact', function () {
    return view('bages.contact');
     })->name('contact');
Route::get('/about', [ Aboutcontroller::class, 'about'])->name('about');
Route::get('/location', function () {
    return view('bages.location');
})->name('location');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

Route::get('/sales', [ProductController::class, 'sales'])->name('sales.page');
// Route::get('/collection',[ HomeController::class, 'collection'] )->name('collection');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/cart/toggle/{product}', [CartController::class, 'toggle'])->name('cart.toggle');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.index');
Route::post('/cart/increase/{product}', [CartController::class, 'increase'])->name('cart.increase');
Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/new-arrivals', [ProductController::class, 'newArrivals'])->name('new.arrivals');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/toggle/{product}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
 
});

Route::middleware('guest')->group(function () {

      Route::get('/login', function () {
    return view('bages.login');
    })->name('login');
  
    Route::get('/register', function () {
        return view('bages.register');
    })->name('register');
});

 