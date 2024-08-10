<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:1'])->prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::controller(RestaurantController::class)->group(function () {
        Route::get('/restaurant', 'viewRestaurants')->name('admin.restaurants');
        Route::get('/restaurant/create', 'createRestaurant')->name('create.restaurant');
        Route::post('/restaurant/store', 'storeRestaurant')->name('store.restaurant');
        Route::get('/restaurant/edit/{restaurant}', 'editRestaurant')->name('edit.restaurant');
        Route::post('/restaurant/updare/{restaurant}', 'updateRestaurant')->name('update.restaurant');
        Route::delete('/restaurant/delete/{restaurant}', 'destroyRestaurant')->name('delete.restaurant');
    });
    Route::resource('categories', CategoryController::class);


    Route::controller(ProductController::class)->group(function () {
        Route::get('/products/list', 'index')->name('products.index');
        Route::get('/products/create', 'createProduct')->name('create.product');
        Route::post('/products/store', 'storeProduct')->name('store.product');
        Route::get('/product/{product}', 'showProduct')->name('show.product');
        Route::get('/product/edit/{product}', 'editProduct')->name('edit.product');
        Route::post('/product/update/{product}', 'updateProduct')->name('update.product');
        Route::delete('/product/delete/{product}', 'deleteProduct')->name('delete.product');
    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings.index');
        Route::post('/settings/update', 'updateSettings')->name('setting.update');
    });





    // Route::group(
    //     [
    //         'as' => 'products.',
    //         'prefix' => 'products',
    //         'controller' => ProductController::class
    //     ],
    //     function () {
    //         Route::get('edit/{product}', 'edit')->name('edit');
    //         // Route::get('create', 'create')->name('create');
    //         Route::get('create-or-edit/{product?}', 'createOrEdit')->name('createOrEdit');
    //         Route::post('duplicate', 'duplicateProduct')->name('duplicate');
    //         Route::post('save/{product?}', 'save')->name('save');
    //         Route::get('list', 'index')->name('index');
    //         Route::delete('delete/{product}', 'destroy')->name('delete');
    //     }
    // );
});