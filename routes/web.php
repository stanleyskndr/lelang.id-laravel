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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search_shoes');

Route::middleware('admin')->group(function () {
    Route::get('/shoeDetail/{id}', 'ShoesController@show')->withoutMiddleware('admin');
    Route::get('/createShoes', 'ShoesController@create');
    Route::post('/storeShoes', 'ShoesController@store')->name('store_shoes');
    Route::get('/deleteShoes/{id}', 'ShoesController@delete');
    Route::post('/destroyShoes/{id}', 'ShoesController@destroy')->name('destroy_shoes');
    // Route::post('/addCart/{id}', 'CartController@store')->name('add_to_cart');
    Route::get('/editShoes/{id}', 'ShoesController@edit')->name('bid_shoes');
});

Route::middleware('admin')->group(function () {

    Route::get('/viewAllUser', 'AdminController@index');
    Route::get('/viewUserTransaction', 'AdminController@viewAllTransaction');
});

Route::middleware('member')->group(function () {
    Route::get('/editShoes/{id}', 'ShoesController@edit')->name('bid_shoes');
    Route::post('/updateShoes/{id}', 'ShoesController@update')->name('update_shoes');
    Route::get('/viewCart', 'ShoesController@indexbid');
    Route::get('/viewTransactionHistory', 'TransactionController@index');
    Route::post('/createTransaction', 'TransactionController@store')->name('create_transaction');
});

Route::get('/viewTransactionDetail/{id}', 'TransactionController@show')->middleware('auth');
