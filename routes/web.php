<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RestaurantController;
// Admin Controllers
use App\Http\Controllers\Backoffice\DashboardController;

// begin admin routes
Route::prefix('admin')->group(function()   {
    // admins login routes
    Route::get('login', [AdminController::class,'index'])->name('admin.login');
    Route::post('login', [AdminController::class,'login'])->name('admin.login');

    // Route::middleware('auth:admin')->group(function()   {
        Route::get('/', [DashboardController::class,'index'])->name('admin.home');
        Route::get('restaurant/add', [RestaurantController::class,'create'])->name('restaurant.add');  
        Route::post('restaurant/store', [RestaurantController::class,'store'])->name('restaurant.insert');
    // });
});

// end admin routes

// begin visitors routes
Route::middleware('auth:admin')->group(function()   {
});
//end visitors routes


Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
