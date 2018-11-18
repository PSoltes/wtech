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

Route::resource('users', 'UserController');
//Route::resource('products', 'ProductController');
Route::get('checkout1/deleteFromCart', 'ProductController@deleteFromCart');
Route::patch('checkout1/updateCart', 'ProductController@updateCart');
Route::get('checkout1/addToCart', 'ProductController@addToCart');
Route::get('checkout1', 'CheckoutController@index');
Auth::routes();
Route::get('/', 'IndexController@index');
Route::get('/{categoryName}', 'IndexController@show');
Route::get('products/{product}', 'ProductController@show');
