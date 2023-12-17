<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

/** Routes For Store Home Page */
Route::get('/', function () {
    return redirect()->route('store');
});
Route::get('/store', [App\Http\Controllers\HomeController::class, 'store'])->name('store');
/********************************************************************************************************* */


/** Routes For User */
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('/cart/add-item/{product}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/show', [App\Http\Controllers\ProductController::class, 'showCart'])->name('cart.show');
Route::get('/cart/increase/{product}', [App\Http\Controllers\ProductController::class, 'increaseQty'])->name('cart.increase');
Route::get('/cart/decrease/{product}', [App\Http\Controllers\ProductController::class, 'decreaseQty'])->name('cart.decrease');
Route::delete('/cart/remove-item/{product}', [App\Http\Controllers\ProductController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/order/user/all', [App\Http\Controllers\OrderController::class, 'index'])->name('order.user.all')->middleware('auth');
Route::get('/order/confirm', [App\Http\Controllers\OrderController::class, 'confirmOrder'])->name('order.confirm')->middleware('auth');

/********************************************************************************************************* */


/** Routes For Admin */
Route::prefix('admin')->group(function () {
    Route::get('/home', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin/home');
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'showLoginForm'])->name('admin/login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin/login');
    Route::post('/logout', [App\Http\Controllers\Admin\LoginController::class, 'logout'])->name('admin/logout');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/order/all', [App\Http\Controllers\OrderController::class, 'allOrders'])->name('order.all');
        Route::get('/order/do/{id}', [App\Http\Controllers\OrderController::class, 'doingOrder'])->name('order.do');
        Route::get('/order/show/{id}', [App\Http\Controllers\OrderController::class, 'show'])->name('order.show');

        Route::get('/product/all', [App\Http\Controllers\ProductController::class, 'allProducts'])->name('product.all');
        Route::get('/product/create', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
        Route::post('/product/store', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
        Route::get('/product/edit/{id}', [App\Http\Controllers\ProductController::class, 'edit'])->name('product.edit');
        Route::put('/product/update/{id}', [App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
        Route::delete('/product/destroy/{id}', [App\Http\Controllers\ProductController::class, 'destroy'])->name('product.destroy');

        Route::get('/user/all', [App\Http\Controllers\Admin\HomeController::class, 'allUsers'])->name('user.all');
    });
});
/********************************************************************************************************* */
