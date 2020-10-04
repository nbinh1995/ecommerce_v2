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
    'prefix' => 'dashboard',
    'namespace' => 'Admin',
    'middleware' => 'isAdmin'
], function () {
    Route::get('/', 'DashBoardController')->name('dashboard');
});

Route::group([
    'namespace' => 'Site'
], function () {
    Route::get('/', 'HomeController')->name('home');

    Route::get('/shop', 'ShopController')->name('shop');
    Route::get('/shop/{category}', 'ShopController')->name('shop.category');
    Route::get('/shop/{category}/{product}', 'DetailController')->name('detail');

    Route::get('/checkout', 'CheckoutController')->name('checkout');

    Route::get('/cart', 'CartController@index')->name('cart');
    Route::post('/cart/add', 'CartController@addCart')->name('cart.add');
    Route::post('/cart/update', 'CartController@updateCart')->name('cart.update');
    Route::get('/cart/clear', 'CartController@clearCart')->name('cart.clear');
    Route::get('/cart/remove/{id}', 'CartController@removeCart')->name('cart.remove');
});
