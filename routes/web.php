<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Jobs\PutFile;
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

Auth::routes(['register' => false]);


Route::get('/', 'UserController@index');
Route::get('/report/user/{auth}', 'ReportMarketController@intergration');

Route::get('/home', 'UserController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('apartments', 'ApartmentController');
Route::get('user-profile', 'UserController@profile');
Route::resource('report/market', 'ReportMarketController');

Route::get('/category/{slug}', 'HomeController@category');
Route::get('/test', 'ReportMarketController@test');

// Route::resource('categories', 'CategoryController');
Route::post('/put', function(Request $request) {
	if ($request->hasFile('file')) {
		$name = time()."-".$request->file->getClientOriginalExtension();
		$request->file->storeAs('/', $name, 'public');
        
        PutFile::dispatch($name);
	return "OK";
	}
	return $request;
});


// Get data Table group
Route::group(['prefix' => 'api/v1'], function() {

	Route::get('category/table', 'DataBaseApi\DataTableController@anyData')->name('category.api.data');
	Route::get('users/table', 'DataApi\UserApiController@anyData')->name('users.api.data');
	Route::get('apartments/table', 'DataApi\ApartmentApiController@anyData')->name('apartments.api.data');
	Route::get('report/market/table', 'DataApi\ReportMarketController@anyData')->name('report_market.api.data');


});

// Set Status group

Route::group(['prefix' => 'api/status'], function() {

	Route::get('categories/{id}', 'status\StatusController@categories')->name('categories.api.status');

	Route::post('users/{id}', 'DataApi\UserApiController@status')->name('users.api.status');

});


