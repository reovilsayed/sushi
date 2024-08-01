<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->prefix('/user/dashboard')->group(function () {

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/', 'userIndex')->name('restaurant.home');
    });
});
