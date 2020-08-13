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

Route::get('/','PageController@getIndex');
Route::get('shop','PageController@getShop');
Route::get('shop/brand/{id?}','PageController@getShop_brand');
Route::get('about','PageController@getAbout');
Route::get('contact','PageController@getContact');
Route::get('login','PageController@getLogin');
Route::get('cart','PageController@getCart');
Route::get('register','PageController@getRegister');
Route::get('checkout','PageController@getCheckout');
Route::get('blog','PageController@getBlog');