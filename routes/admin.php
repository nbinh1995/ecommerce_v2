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
    Route::get('/list', 'UserController@list')->name('dashboard.users.list');
    Route::get('/create', 'UserController@create')->name('dashboard.users.create');
    Route::get('/search', 'SearchUserController')->name('dashboard.users.search');
    Route::post('/', 'UserController@store')->name('dashboard.users.store');
    Route::get('/{categorySlug}/edit', 'UserController@edit')->name('dashboard.users.edit');
    Route::patch('/{userID}', 'UserController@update')->name('dashboard.users.update');
    Route::delete('/{userID}', 'UserController@destroy')->name('dashboard.users.destroy');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('dashboard.categories');
    Route::get('/list', 'CategoryController@list')->name('dashboard.categories.list');
    Route::get('/create', 'CategoryController@create')->name('dashboard.categories.create');
    Route::post('/', 'CategoryController@store')->name('dashboard.categories.store');
    Route::get('/{categorySlug}/edit', 'CategoryController@edit')->name('dashboard.categories.edit');
    Route::patch('/{categorySlug}', 'CategoryController@update')->name('dashboard.categories.update');
    Route::delete('/{categorySlug}', 'CategoryController@destroy')->name('dashboard.categories.destroy');
});

Route::group(['prefix' => 'sizes'], function () {
    Route::get('/', 'SizeController@index')->name('dashboard.sizes');
    Route::get('/list', 'SizeController@list')->name('dashboard.sizes.list');
    Route::get('/create', 'SizeController@create')->name('dashboard.sizes.create');
    Route::post('/', 'SizeController@store')->name('dashboard.sizes.store');
    Route::get('/{categorySlug}/edit', 'SizeController@edit')->name('dashboard.sizes.edit');
    Route::patch('/{sizeID}', 'SizeController@update')->name('dashboard.sizes.update');
    Route::delete('/{sizeID}', 'SizeController@destroy')->name('dashboard.sizes.destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('dashboard.products');
    Route::get('/list', 'ProductController@list')->name('dashboard.products.list');
    Route::get('/create', 'ProductController@create')->name('dashboard.products.create');
    Route::get('/search', 'SearchProductController')->name('dashboard.products.search');
    Route::post('/', 'ProductController@store')->name('dashboard.products.store');
    Route::get('/{categorySlug}/edit', 'ProductController@edit')->name('dashboard.products.edit');
    Route::patch('/{productSlug}', 'ProductController@update')->name('dashboard.products.update');
    Route::delete('/{productSlug}', 'ProductController@destroy')->name('dashboard.products.destroy');
});

Route::group(['prefix' => 'bills'], function () {
    Route::get('/', 'BillController@index')->name('dashboard.bills');
    Route::get('/list', 'BillController@list')->name('dashboard.bills.list');
    Route::get('/create', 'BillController@create')->name('dashboard.bills.create');
    Route::get('/search', 'SearchBillController')->name('dashboard.bills.search');
    Route::post('/', 'BillController@store')->name('dashboard.bills.store');
    Route::get('/{billID}', 'BillController@show')->name('dashboard.bills.show');
    Route::get('/{categorySlug}/edit', 'BillController@edit')->name('dashboard.bills.edit');
    Route::patch('/{billID}', 'BillController@update')->name('dashboard.bills.update');
    Route::delete('/{billID}', 'BillController@destroy')->name('dashboard.bills.destroy');
});
