<?php

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
// Dashboard
Route::get('/', 'DashboardController@index');

//Product
Route::resource('/products', 'ProductController');

//Order
Route::resource('/orders', 'OrderController');

Route::get('/confirm/{id}', 'OrderController@confirm')->name('order.confirm');
Route::get('/pending/{id}', 'OrderController@pending')->name('order.pending');

//Users
Route::resource('/users', 'UserController');
Route::get('/block/{id}', 'UserController@block')->name('user.block');
Route::get('/active/{id}', 'UserController@active')->name('user.active');



