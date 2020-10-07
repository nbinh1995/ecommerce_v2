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
    Route::get('/', 'UserController@index')->name('dashboard.users.all');
    Route::get('/search', 'SearchUserController')->name('dashboard.users.search');
    Route::post('/', 'UserController@store')->name('dashboard.users.store');
    Route::patch('/{userID}', 'UserController@update')->name('dashboard.users.update');
    Route::delete('/{userID}', 'UserController@destroy')->name('dashboard.users.destroy');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', 'CategoryController@index')->name('dashboard.categories.all');
    Route::post('/', 'CategoryController@store')->name('dashboard.categories.store');
    Route::patch('/{categorySlug}', 'CategoryController@update')->name('dashboard.categories.update');
    Route::delete('/{categorySlug}', 'CategoryController@destroy')->name('dashboard.categories.destroy');
});

Route::group(['prefix' => 'sizes'], function () {
    Route::get('/', 'SizeController@index')->name('dashboard.sizes.all');
    Route::post('/', 'SizeController@store')->name('dashboard.sizes.store');
    Route::patch('/{sizeID}', 'SizeController@update')->name('dashboard.sizes.update');
    Route::delete('/{sizeID}', 'SizeController@destroy')->name('dashboard.sizes.destroy');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', 'ProductController@index')->name('dashboard.products.all');
    Route::get('/search', 'SearchProductController')->name('dashboard.products.search');
    Route::post('/', 'ProductController@store')->name('dashboard.products.store');
    Route::patch('/{productSlug}', 'ProductController@update')->name('dashboard.products.update');
    Route::delete('/{productSlug}', 'ProductController@destroy')->name('dashboard.products.destroy');
});

Route::group(['prefix' => 'bills'], function () {
    Route::get('/', 'BillController@index')->name('dashboard.bills.all');
    Route::get('/search', 'SearchBillController')->name('dashboard.bills.search');
    Route::post('/', 'BillController@store')->name('dashboard.bills.store');
    Route::get('/{billID}', 'BillController@show')->name('dashboard.bills.show');
    Route::patch('/{billID}', 'BillController@update')->name('dashboard.bills.update');
    Route::delete('/{billID}', 'BillController@destroy')->name('dashboard.bills.destroy');
});
