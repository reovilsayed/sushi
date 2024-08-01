<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RestaurantController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:1'])->prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/restaurant', [RestaurantController::class, 'viewRestaurants'])->name('restaurants');
    Route::get('/restaurant/create', [RestaurantController::class, 'createRestaurant'])->name('create.restaurant');
});