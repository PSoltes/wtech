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
Route::get('checkout1/deleteFromCart', 'CheckoutController@deleteFromCart');
Route::get('checkout1/updateCart', 'CheckoutController@updateCart');
Route::get('checkout1/addToCart', 'CheckoutController@addToCart');
Route::get('checkout1', 'CheckoutController@index');
Route::get('checkout2', 'CheckoutController@index2');
Route::get('checkout3', 'CheckoutController@index3');
Route::post('orders', 'OrderController@store');
Auth::routes();
Route::get('/', 'IndexController@index');
Route::post('/products', 'ProductController@store');
Route::get('/{categoryName}', 'IndexController@show');
Route::delete('/products/delete', 'ProductController@destroy');
Route::get('/products/product/{id}', 'ProductController@getProduct');
Route::get('products/list/categories', 'ProductController@categories');
Route::get('products/list/{page}', 'ProductController@list');
Route::post('products/ImageUpload', 'ProductController@ImageUpload');
Route::patch('products/{id}', 'ProductController@update');
Route::get('products/{product}', 'ProductController@show');
