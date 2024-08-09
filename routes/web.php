<?php

use App\Facades\Settings\SettingsFacade;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenericsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\PriscriptionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\ScrapController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\User\UserController;
use App\Mail\CustomerReport;
use App\Mail\DueClearReminder;
use App\Mail\DuePaidMail;
use App\Mail\MonthlyDueReport;
use App\Mail\OrderConfirmationMail;
use App\Mail\PurchasesMailForShopOwner;
use App\Models\Customer;
use App\Models\User;
use App\Models\Order;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\ScrapController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/admin/dashboard', function () {
//     dd(auth()->user());
// });

Auth::routes();

//user routes

Route::controller(PageController::class)->group(function () {
    Route::get('/', 'userIndex')->name('restaurant.home');
    Route::get('/menu/{slug}', 'menu')->name('restaurant.menu');
    Route::get('/product/{restaurant}/{product}', 'singleProduct')->name('single.restaurant');
    Route::get('/restaurants', 'restaurant')->name('user.restaurants');
    Route::get('/check-out', 'userCheckOut')->name('restaurant.checkout');
    Route::get('/contact', 'contact')->name('restaurant.contact');
    Route::get('/cart', 'cart')->name('restaurant.cart');
    Route::post('/check-location', 'checkLocation')->name('check.location');
    Route::get('/thank-you', 'thank_you')->name('thank_you');
});

//cart routes
Route::post('/add-cart', [CartController::class, 'add'])->name('cart.store');
Route::post('/buynow', [CartController::class, 'buynow'])->name('cart.buynow');
Route::post('/add-update', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/update-variation', [CartController::class, 'updateVaritaiton'])->name('cart.variation');
Route::get('/cart-destroy/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/extras', [CartController::class, 'extras'])->name('extras');

Route::get('/test', function () {

})->middleware('role:1');
Route::post('/order-update', [OrderController::class, 'store'])->name('order_store');

//pos backend routes

Route::get('snapshop/customer/delete', [CustomerController::class, 'customerDelete'])->name('customer.delete');
Route::middleware(['auth', 'role:2'])->group(function () {
    Route::get('/snapshop/customer/Dashaboard', [CustomerController::class, 'dashboardForCustomer'])->name('customer.dashboard');
    Route::post('/customer/Dashaboard', [CustomerController::class, 'customerInfoDelete'])->name('customer.infoDelete');
});

Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/admin', [DashboardController::class, 'dashboard'])->name('dashboard');


    Route::group(
        [
            'as' => 'orders.',
            'prefix' => 'orders',
            'controller' => OrderController::class
        ],
        function () {
            Route::get('list', 'index')->name('index');
            Route::post('pay', 'duepay')->name('due.pay');
            Route::post('mark-as-pay', 'mark_pay')->name('mark.pay');
            Route::get('mark-as-delivered/{order}', 'mark_delivered')->name('mark.delivered');
            Route::get('invoice/{order}', 'invoice')->name('invoice');
        }
    );
    Route::group(
        [
            'as' => 'products.',
            'prefix' => 'products',
            'controller' => ProductController::class
        ],
        function () {
            Route::get('edit/{product}', 'edit')->name('edit');
            // Route::get('create', 'create')->name('create');
            Route::get('create-or-edit/{product?}', 'createOrEdit')->name('createOrEdit');
            Route::post('duplicate', 'duplicateProduct')->name('duplicate');
            Route::post('save/{product?}', 'save')->name('save');
            // Route::get('list', 'index')->name('index');
            Route::delete('delete/{product}', 'destroy')->name('delete');
        }
    );

    Route::resource('generics', GenericsController::class);
    Route::resource('customers', CustomerController::class);
    Route::post('deposite-full/{user}', [CustomerController::class, 'deposite_full'])->name('deposite.full');
    // Route::get('/invoice/{customer}', [CustomerController::class, 'invoice'])->name('invoice');
    // Route::get('/point-of-sale', [POSController::class, 'index'])->name('pos');
    // Route::view('react-component', 'react-component');

    Route::resource('purchase', PurchaseController::class)->names('purchase');
    Route::resource('units', UnitController::class)->names('units');
    Route::resource('suppliers', SupplierController::class)->parameters(['suppliers' => 'supplier'])->names('suppliers');



    Route::resource('settings', SettingController::class);
    Route::resource('priscription', PriscriptionController::class);

    Route::post('change-password', [SettingController::class, 'changePassword'])->name('settings.change-password');

    Route::get('/get-chart-data', [OrderController::class, 'getChartData']);
    Route::get('/get-chart-data-month', [OrderController::class, 'getChartDataMonth']);
    Route::post('/customer/store', [POSController::class, 'customerStore'])->name('customer.store');
    Route::get('purchase/invoice/{purchase}', [PurchaseController::class, 'invoice'])->name('purchase.invoice');

    Route::get('reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('send-reports/{customer}', [ReportsController::class, 'send_report'])->name('reports.send');
    Route::get('scrap', [ScrapController::class, 'scrap'])->name('scrap');
    Route::get('/test-email', function () {
        $customers = User::where('role_id', 2)->where(function ($query) {
            $query->whereNull('last_reminder_date')
                ->orWhere('last_reminder_date', '<=', now()->subDays(30));
        })
            ->whereHas('orders', function ($query) {
                $query->where('due', '>', 0);
            })
            ->whereNotNull('email')
            ->take(10)
            ->get();
        foreach ($customers as $customer) {

            $orders = $customer->orders()->where('due', '>', 0)->get();
            if ($customer->email) {
                return (new DueClearReminder($orders, $customer));
                $customer->update(['last_reminder_date' => now()]);
            }
        }
    });
});
Route::get('/error', function () {
    return $wrongvar;
});

require ('sushi_old.php');
require ('admin.php');
require ('user.php');
