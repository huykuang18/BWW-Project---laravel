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
Route::get('shop/{type}/{id}','PageController@search');
Route::get('product/{id}','PageController@getProductDetail');

Route::get('about','PageController@getAbout');
Route::get('contact','PageController@getContact');

Route::post('cart/{action?}/{id?}','PageController@cart');
Route::get('cart/{action?}/{id?}','PageController@cart');

Route::get('checkout','PageController@getCheckout');
Route::post('checkout','PageController@postOrder');
Route::get('order/follow','PageController@followOrder');
Route::get('order/detail/{id}','PageController@orderDetail');
Route::get('order/delete/{id}','PageController@deleteOrder');

Route::get('login','PageController@getLogin');
Route::post('login','PageController@postLogin');
Route::get('logout','PageController@getLogout');

Route::get('register', 'PageController@getRegister')->name('register')->middleware('guest');
Route::post('register','PageController@postRegister')->name('guest.register');

Route::get('blog','PageController@getBlog');

Route::prefix('admin')->middleware('adminLogin')->group(function(){
	Route::get('/','AdminController@getIndex');

	Route::get('login','PageController@getLogin');
	Route::post('login','PageController@postLogin');

	Route::get('productedit/{
		id}','AdminController@productEdit');
	Route::post('productedit/{id}','AdminController@postProductEdit');

	Route::get('products','AdminController@products');
	Route::get('products/brandID/{id}','AdminController@product');
	
	Route::get('logout','AdminController@logout');
});