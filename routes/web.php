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

Route::get('/', 'HomeController@home');
Route::get('/gioi-thieu', 'HomeController@infor');
Route::get('/contact', 'HomeController@contact');
Route::get('/category/{slug}', 'HomeController@category');
Route::get('/product/{slug}', 'HomeController@product');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('products', 'ProductController');

Route::resource('users', 'UserController');

Route::resource('categories', 'CategoryController');

Route::resource('apartments', 'ApartmentController');

Route::resource('orders', 'OrderController');

Route::resource('staff', 'StaffController');

Route::post('categories/{id}', 'CategoryController@update');
Route::post('products/{id}', 'ProductController@update');



Route::group(['prefix' => 'api/v1'], function() {

	Route::get('product/table', 'DataBaseApi\DataTableController@product')->name('product.api.data');
	Route::get('category/table', 'DataBaseApi\DataTableController@category')->name('category.api.data');
	Route::get('users/table', 'DataBaseApi\DataTableController@users')->name('users.api.data');

	Route::get('apartments/table', 'DataBaseApi\DataTableController@apartments')->name('apartments.api.data');

	Route::get('orders/table', 'DataBaseApi\DataTableController@orders')->name('orders.api.data');
	
	Route::get('staff/table', 'DataBaseApi\DataTableController@staff')->name('staff.api.data');
	Route::get('staff/table', 'DataBaseApi\DataTableController@staff')->name('staff.api.data');
	Route::get('staff/manager/table/{id}', 'DataBaseApi\DataTableController@staffmanager')->name('staffv1.api.data');


	Route::post('/product/orders/{id}', 'HomeController@oderProduct')->name('oder.product.api.data');
	


	Route::get('consts/table', 'DataBaseApi\AiController@consts')->name('consts.api.data');
	Route::get('rating/table', 'DataBaseApi\AiController@rating')->name('rating.api.data');

});

Route::group(['prefix' => 'api/status'], function() {


	Route::get('categories/{id}', 'status\StatusController@categories')->name('categories.api.status');
	Route::get('products/{id}', 'status\StatusController@products')->name('products.api.status');
		Route::get('apartments/{id}', 'status\StatusController@apartments')->name('apartments.api.status');

	Route::post('users/{id}', 'status\StatusController@users')->name('users.api.status');
	Route::post('orders/{id}', 'status\StatusController@orders')->name('orders.api.status');

	Route::post('staffProduct', 'status\StatusController@staffProduct')->name('staffProduct.api.status');

	Route::get('staff/{id}', 'status\StatusController@staff')->name('staff.api.status');
	Route::get('staff/{id}', 'status\StatusController@staff')->name('staff.api.status');



});





Route::view('dashboard', 'ai.chart');
Route::get('chart/avg', 'DataBaseApiChart@average');
Route::get('pie/avg', 'DataBaseApiChart@average2');

Route::resource('rates', 'RatingController');
Route::resource('consts', 'ConstController');
Auth::routes(['verify' => true]);
