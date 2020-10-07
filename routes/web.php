<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::group([
    'namespace' => 'Pages'
], function () {
    Route::get('/', 'HomeController')->name('home');

    Route::get('/shop', 'ShopController')->name('shop.all');
    Route::get('/shop/new-arrivals', 'ShopNewArrivalsController')->name('shop.new');
    Route::get('/shop/{categorySlug}', 'ShopCategoryController')->name('shop.category');
    Route::get('/shop/{categorySlug}/{productSlug}', 'DetailController')->name('detail');

    Route::get('/checkout', 'CheckoutController')->name('checkout');
    Route::post('/checkout', 'OrderController')->name('order');

    Route::get('/cart', 'CartController')->name('cart.show');
    Route::post('/cart/add', 'AddCartController')->name('cart.add');
    Route::post('/cart/update', 'UpdateCartController')->name('cart.update');
    Route::delete('/cart/remove', 'RemoveCartController')->name('cart.remove');
    Route::delete('/cart/clear', 'ClearCartController')->name('cart.clear');
});
