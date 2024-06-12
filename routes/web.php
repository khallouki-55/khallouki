<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\AdminController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\ArticlesContrl;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


 
Route::get('/', function () {
    return view('welcome');
});


 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
Route::middleware('auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::match(['get', 'post'], '', [AdminController::class, 'index'])->name('admin.index');
        Route::match(['get', 'post'], 'create', [AdminController::class, 'create'])->name('admin.create');
        Route::post('store', [AdminController::class, 'store'])->name('admin.store');
        Route::get('show/{id}', [AdminController::class, 'show'])->name('admin.show');
        Route::match(['get', 'post'],'edit/{var}/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::put('edit/{var}/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::delete('destroy/{var}/{id}/{nam}', [AdminController::class, 'destroy'])->name('admin.destroy');
    });

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});
Route::middleware('auth')->group(function () {
    Route::controller(ProductController::class)->prefix('products')->group(function () {
        Route::get('', 'index')->name('products');
        Route::get('create', 'create')->name('products.create');
        Route::post('store', 'store')->name('products.store');
        Route::get('show/{id}', 'show')->name('products.show');
        Route::get('edit/{id}', 'edit')->name('products.edit');
        Route::put('edit/{id}', 'update')->name('products.update');
        Route::delete('destroy/{id}', 'destroy')->name('products.destroy');
    });
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});





