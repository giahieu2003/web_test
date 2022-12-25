<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::group(['prefix' => ''], function() {
    Route::get('/', [HomeController::class,'index'])->name('home.index');
    Route::get('/about-us', [HomeController::class, 'about'])->name('home.about');
    // Route::get('/contact-us', [HomeController::class, 'contact'])->name('home.contact');
    Route::get('/product', [HomeController::class, 'product'])->name('home.product');
    Route::get('/category/{cat}', [HomeController::class, 'category'])->name('home.category');
    Route::get('/product-detail/{product}-{slug}', [HomeController::class, 'productDetail'])->name('home.productDetail');
    Route::get('/login', [HomeController::class, 'login'])->name('home.login');
    Route::get('/logout', [HomeController::class, 'logout'])->name('home.logout');
    Route::get('/profile', [HomeController::class, 'profile'])->name('home.profile')->middleware('cus');
    Route::post('/login', [HomeController::class, 'check_login']);
    Route::post('/register', [HomeController::class, 'check_register'])->name('home.register');
    Route::post('/about-us', [HomeController::class, 'send_contact']);
    Route::get('/verify-account/{token}', [HomeController::class, 'verifyAccount'])->name('home.verify_account');
});

Route::group(['prefix' => 'cart'], function() {
    Route::get('/view', [CartController::class, 'view'])->name('cart.view');
    Route::get('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/update/{id}/{quantity?}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/update-all', [CartController::class, 'updateAll'])->name('cart.updateAll');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout')->middleware('cus');
    Route::post('/checkout', [CartController::class, 'order_checkout'])->middleware('cus');
    Route::get('/verify-order/{token}', [CartController::class, 'verifyOrder'])->name('cart.verify_order');
});

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);

Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::put('/profile', [AdminController::class, 'update_profile']);
    Route::get('/change_password', [AdminController::class, 'change_password'])->name('admin.change_password');
    Route::put('/change_password', [AdminController::class, 'update_password']);

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class
    ]);
});
