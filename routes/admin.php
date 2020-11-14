<?php

use App\Admin;
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

Route::group([
    'prefix' => 'dashboard',
    'namespace' => 'Auth'
], function () {

    //Login Routes
    Route::get('/login', 'LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'LoginController@login');
    Route::post('/logout', 'LoginController@logout')->name('admin.logout');

    //Register Routes
    // Route::get('/register','RegisterController@showRegistrationForm')->name('register');
    // Route::post('/register','RegisterController@register');

    //Forgot Password Routes
    // Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    // Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');

    //Reset Password Routes
    // Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    // Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.update');

    // Email Verification Route(s)
    // Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
    // Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    // Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
});
Route::group([
    'prefix' => 'dashboard',
    'middleware' => 'auth:admin'
], function () {
    Route::get('/', 'DashBoardController')->name('dashboard');

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@index')->name('dashboard.users');
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

    Route::group(['prefix' => 'admins'], function () {
        Route::get('/list', 'AdminController@list')->name('dashboard.admins.list');
        Route::get('/create', 'AdminController@create')->name('dashboard.admins.create');
        Route::post('/', 'AdminController@store')->name('dashboard.admins.store');
        Route::get('/{adminID}/edit', 'AdminController@edit')->name('dashboard.admins.edit');
        Route::put('/{adminID}', 'AdminController@update')->name('dashboard.admins.update');
        Route::delete('/{adminID}', 'AdminController@destroy')->name('dashboard.admins.destroy');
    });

    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', 'CategoryController@index')->name('dashboard.categories');
        Route::get('/list', 'CategoryController@list')->name('dashboard.categories.list');
        Route::get('/create', 'CategoryController@create')->name('dashboard.categories.create');
        Route::get('/{categoryID}/create-attribute-values', 'CategoryController@createAttrValuesForm')->name('dashboard.categories.createAttrValuesForm');
        Route::post('/', 'CategoryController@store')->name('dashboard.categories.store');
        Route::get('/{categorySlug}/edit', 'CategoryController@edit')->name('dashboard.categories.edit');
        Route::put('/{categorySlug}', 'CategoryController@update')->name('dashboard.categories.update');
        Route::delete('/{categorySlug}', 'CategoryController@destroy')->name('dashboard.categories.destroy');
    });

    Route::group(['prefix' => 'attributes'], function () {
        Route::get('/', 'AttributeController@index')->name('dashboard.attributes');
        Route::get('/list', 'AttributeController@list')->name('dashboard.attributes.list');
        Route::get('/create', 'AttributeController@create')->name('dashboard.attributes.create');
        Route::post('/', 'AttributeController@store')->name('dashboard.attributes.store');
        Route::get('/{attrID}/edit', 'AttributeController@edit')->name('dashboard.attributes.edit');
        Route::put('/{attrID}', 'AttributeController@update')->name('dashboard.attributes.update');
        Route::delete('/{attrID}', 'AttributeController@destroy')->name('dashboard.attributes.destroy');
    });

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index')->name('dashboard.products');
        Route::get('/{productSlug}/show-list-image', 'ProductController@listImage')->name('dashboard.products.listImage');
        Route::get('/search', 'SearchProductController')->name('dashboard.products.search');
        Route::get('/create', 'ProductController@create')->name('dashboard.products.create');
        Route::post('/', 'ProductController@store')->name('dashboard.products.store');
        Route::post('/{productID}/create-image', 'ProductController@createImage')->name('dashboard.products.createImage');
        Route::get('/{productSlug}/edit', 'ProductController@edit')->name('dashboard.products.edit');
        Route::put('/{productSlug}', 'ProductController@update')->name('dashboard.products.update');
        Route::delete('/{productSlug}', 'ProductController@destroy')->name('dashboard.products.destroy');
        Route::delete('/{productImageID}/remove-image', 'ProductController@removeImage')->name('dashboard.products.removeImage');
    });

    Route::group(['prefix' => 'bills'], function () {
        Route::get('/', 'BillController@index')->name('dashboard.bills');
        Route::get('/list', 'BillController@list')->name('dashboard.bills.list');
        Route::get('/search', 'SearchBillController')->name('dashboard.bills.search');
        Route::get('/{billID}/show-detail-bill', 'BillController@showDetailBill')->name('dashboard.bills.show');
        Route::get('/{billDate}/bills-of-day', 'BillController@billsOfDay')->name('dashboard.bills.billsOfDay');
        Route::patch('/{billID}', 'BillController@update')->name('dashboard.bills.update');
    });

    Route::get('/media-manager', 'MediaController')->name('dashboard.media');
});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['auth:admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
