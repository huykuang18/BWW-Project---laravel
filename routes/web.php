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
Route::get('shop/product/{id?}','PageController@getProductDetail');

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

Route::get('shop/{type}/{id}','PageController@search');


Route::prefix('admin')->middleware('adminLogin')->group(function(){

	Route::get('productedit/{
		id}','AdminController@productEdit');
	Route::post('productedit/{id}','AdminController@postProductEdit');

	Route::get('products','AdminController@products');
	Route::get('products/brandID/{id}','AdminController@product');
	
	Route::get('logout','AdminController@logout');

	Route::get('product/delete/{id?}','AdminController@productDelete');
	Route::get('product/search/keyword','AdminController@searchProducts');

	Route::get('/','AdminController@index');

	Route::get('productInsert','AdminController@insert');
	Route::post('productInsert','AdminController@postInsert');

	//rate
	
	Route::get('rateDetail/{id?}','AdminController@rateDetail');
	Route::get('delete/rate/{id}','AdminController@rateDelete');

	Route::get('rates','AdminController@rates');
	Route::get('rate/brandID/{id}','AdminController@rate');

	//brand
	Route::get('brands','AdminController@brands');
	Route::get('brands/insert','AdminController@getBrandInsert');
	Route::post('brands/insert','AdminController@postBrandInsert');
	Route::get('delete/brand/{id}','AdminController@brandDelete');
	Route::get('edit/brand/{id}','AdminController@getBrandEdit');
	Route::post('edit/brand/{id}','AdminController@postBrandEdit');

	//ordermethods
	Route::get('ordermethods','AdminController@ordermethods');
	Route::get('ordermethods/insert','AdminController@getOrderMethodInsert');
	Route::post('ordermethods/insert','AdminController@postOrderMethodInsert');
	Route::get('delete/ordermethod/{id}','AdminController@ordermethodDelete');
	Route::get('edit/ordermethod/{id}','AdminController@getOrderMethodEdit');
	Route::post('edit/ordermethod/{id}','AdminController@postOrderMethodEdit');

	//order
	Route::get('order/status/{id}','AdminController@order');
	Route::get('order','AdminController@orders');
	Route::get('delete/order/{id}','AdminController@orderDelete');
	Route::get('edit/order/{id}','AdminController@getOrderEdit');
	Route::post('edit/order/{id}','AdminController@postOrderEdit');

	//admin
	Route::get('/users','AdminController@admins');

	Route::get('useredit/{id}','AdminController@getEdit');
	Route::post('useredit/{id}','AdminController@adminEdit');

	Route::get('/userinsert','AdminController@getInsert');
	Route::post('/userinsert','AdminController@adminInsert');

	Route::get('admin/delete/{id?}','AdminController@adminDelete');

	//mức giá
	Route::get('/prices','AdminController@prices');

	Route::get('/priceInsert','AdminController@priceInsert');
	Route::post('/priceInsert','AdminController@postPriceInsert');

	Route::get('priceEdit/{id}','AdminController@priceEdit');
	Route::post('priceEdit/{id}','AdminController@postPriceEdit');

	Route::get('price/delete/{id?}','AdminController@priceDelete');

	//mức sale
	Route::get('/sales','AdminController@sales');

	Route::get('/saleInsert','AdminController@saleInsert');
	Route::post('/saleInsert','AdminController@postSaleInsert');

	Route::get('saleEdit/{id}','AdminController@saleEdit');
	Route::post('saleEdit/{id}','AdminController@postSaleEdit');

	Route::get('sale/delete/{id?}','AdminController@saleDelete');

	//product_size
	Route::get('productSizeDetail/{id}','AdminController@productSizeDetail');
	Route::get('productSizes/brandID/{id}','AdminController@productSizes');
	Route::get('productSizes','AdminController@productSize');

	Route::get('/productSizeEdit/{id}','AdminController@productSizeEdit');
	Route::post('/productSizeEdit/{id}','AdminController@postProductSizeEdit');

});