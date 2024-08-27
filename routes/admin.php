<?php


use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\SettingController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'role:1'])->prefix('/admin')->group(function () {
    Route::get('/', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::controller(RestaurantController::class)->group(function () {
        Route::get('/restaurant', 'viewRestaurants')->name('admin.restaurants');
        Route::get('/restaurant/create', 'createRestaurant')->name('create.restaurant');
        Route::post('/restaurant/store', 'storeRestaurant')->name('store.restaurant');
        Route::get('/restaurant/edit/{restaurant}', 'editRestaurant')->name('edit.restaurant');
        Route::post('/restaurant/updare/{restaurant}', 'updateRestaurant')->name('update.restaurant');
        Route::delete('/restaurant/delete/{restaurant}', 'destroyRestaurant')->name('delete.restaurant');
    });
    Route::resource('categories', CategoryController::class);
    Route::patch('categories/check/submit/{category}', [CategoryController::class, 'toggle'])->name('check.submit');


    Route::controller(ProductController::class)->group(function () {
        Route::get('/products/list', 'index')->name('products.index');
        Route::get('/products/create', 'createProduct')->name('create.product');
        Route::post('/products/store', 'storeProduct')->name('store.product');
        Route::get('/product/{product}', 'showProduct')->name('show.product');
        Route::get('/product/edit/{product}', 'editProduct')->name('edit.product');
        Route::post('/product/update/{product}', 'updateProduct')->name('update.product');
        Route::delete('/product/delete/{product}', 'deleteProduct')->name('delete.product');
        Route::delete('/option/delete/{productOption}', 'deleteOption')->name('delete.option');

    });

    Route::controller(SettingController::class)->group(function () {
        Route::get('/settings', 'index')->name('settings.index');
        Route::post('/settings/update', 'updateSettings')->name('setting.update');
    });
    Route::controller(PageController::class)->group(function () {
        Route::get('/pages', 'adminPages')->name('admin.pages');
        Route::get('/pages/create', 'pagesCreate')->name('pages.create');
        Route::post('/pages/store', 'pagesStore')->name('pages.store');
        Route::delete('/pages/delete/{page}', 'destroyPage')->name('delete.page');
        Route::get('/pages/edit/{page}', 'pagesEdit')->name('edit.page');
        Route::post('/pages/update/{page}', 'pagesUpdate')->name('update.page');
    });
    Route::resource('customers', CustomerController::class);

    Route::controller(OrderController::class)->group(function () {
        Route::get('/orders/list', 'index')->name('orders.index');
        Route::post('/orders/pay', 'duepay')->name('orders.due.pay');
        Route::get('/orders/invoice/{order}', 'invoice')->name('orders.invoice');
        Route::get('/orders/mark-as-delivered/{order}', 'mark_delivered')->name('orders.mark.delivered');
    });
    Route::get('/test', function () {
        $months = [
            0,
            1,
            2,
            3,
            4,
            5,
            6,
            7,
            8,
            9,
            10,
            11,
        ];
        
        $currentMonth = (int) date('n', strtotime('now'));

        $months = array_merge(array_slice($months, $currentMonth), array_slice($months, 0, $currentMonth));

        dd($months);
       
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