<?php

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

Route::get('/', 'DashBoardController')->name('dashboard');

Route::group(['prefix' => 'users'], function () {
    Route::get('/', 'UserController@index')->name('dashboard.users');
    Route::get('/listAdmin', 'UserController@listAdmin')->name('dashboard.users.listAdmin');
    Route::get('/create', 'UserController@create')->name('dashboard.users.create');
    Route::get('/search', 'SearchUserController')->name('dashboard.users.search');
    Route::post('/', 'UserController@store')->name('dashboard.users.store');
    Route::get('/{userID}/bills-of-user', 'UserController@show')->name('dashboard.users.show');
    Route::get('/{userID}/edit', 'UserController@edit')->name('dashboard.users.edit');
    Route::put('/{userID}', 'UserController@update')->name('dashboard.users.update');
    Route::delete('/{userID}', 'UserController@destroy')->name('dashboard.users.destroy');

    Route::get('/listCustomer', 'UserController@listCustomer')->name('dashboard.users.listCustomer');
    Route::get('/listBanned', 'UserController@listBanned')->name('dashboard.users.listBanned');
    Route::patch('/{userID}', 'UserController@restore')->name('dashboard.users.restore');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('dashboard.categories');
    Route::get('/list', 'CategoryController@list')->name('dashboard.categories.list');
    Route::get('/create', 'CategoryController@create')->name('dashboard.categories.create');
    Route::post('/', 'CategoryController@store')->name('dashboard.categories.store');
    Route::get('/{categorySlug}/edit', 'CategoryController@edit')->name('dashboard.categories.edit');
    Route::put('/{categorySlug}', 'CategoryController@update')->name('dashboard.categories.update');
    Route::delete('/{categorySlug}', 'CategoryController@destroy')->name('dashboard.categories.destroy');
});

Route::group(['prefix' => 'sizes'], function () {
    Route::get('/', 'SizeController@index')->name('dashboard.sizes');
    Route::get('/list', 'SizeController@list')->name('dashboard.sizes.list');
    Route::get('/create', 'SizeController@create')->name('dashboard.sizes.create');
    Route::post('/', 'SizeController@store')->name('dashboard.sizes.store');
    Route::get('/{sizeID}/edit', 'SizeController@edit')->name('dashboard.sizes.edit');
    Route::put('/{sizeID}', 'SizeController@update')->name('dashboard.sizes.update');
    Route::delete('/{sizeID}', 'SizeController@destroy')->name('dashboard.sizes.destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('dashboard.products');
    Route::get('/list', 'ProductController@list')->name('dashboard.products.list');
    Route::get('/create', 'ProductController@create')->name('dashboard.products.create');
    Route::get('/search', 'SearchProductController')->name('dashboard.products.search');
    Route::post('/', 'ProductController@store')->name('dashboard.products.store');
    Route::get('/{productSlug}/edit', 'ProductController@edit')->name('dashboard.products.edit');
    Route::put('/{productSlug}', 'ProductController@update')->name('dashboard.products.update');
    Route::delete('/{productSlug}', 'ProductController@destroy')->name('dashboard.products.destroy');
});

Route::group(['prefix' => 'bills'], function () {
    Route::get('/', 'BillController@index')->name('dashboard.bills');
    Route::get('/list', 'BillController@list')->name('dashboard.bills.list');
    Route::get('/search', 'SearchBillController')->name('dashboard.bills.search');
    Route::get('/{billID}/show-detail-bill', 'BillController@showDetailBill')->name('dashboard.bills.show');
    Route::get('/{billDate}/bills-of-day', 'BillController@billsOfDay')->name('dashboard.bills.billsOfDay');
    Route::patch('/{billID}', 'BillController@update')->name('dashboard.bills.update');
});
