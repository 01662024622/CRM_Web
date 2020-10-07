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

Auth::routes(['register' => false,'request' => false, 'reset' => false]);


Route::get('/', 'ReportMarketController@index');
Route::get('/report/user/{auth}', 'CustomerController@intergration');
Route::get('/review/user/{auth}', 'CustomerController@review360');
Route::get('/review/user/success/{auth}', 'CustomerController@success');

Route::get('/home', 'Admin\UserController@index')->name('home');

Route::resource('users', 'Admin\UserController');
Route::resource('apartments', 'Admin\ApartmentController');
Route::get('profile', 'UserEditController@profile');
Route::get('change-password', 'UserEditController@password');
Route::post('change-password', 'UserEditController@changePassword');
Route::post('user-profile', 'UserEditController@updateProfile');
Route::resource('report/market', 'ReportMarketController');
Route::resource('/review/report', 'ReviewController');
Route::resource('/feedback/report', 'FeedbackController');

Route::resource('/customer/feedback/report', 'CustomerFeedbackController');
Route::get('/customer/feedback/link/{code}', 'CustomerFeedbackController@indexCode');


Route::get('/review/feedback', 'ReviewViewController@feedbackMe');
Route::get('/review/feedback/apartment', 'ReviewViewController@feedbackApartment');
Route::get('/review/warehouse/report', 'ReviewViewController@warehouse');
Route::get('/review/warehouse/manager/report', 'ReviewViewController@warehouseManager');
Route::get('/review/public/relationship/report', 'ReviewViewController@publicRelationship');
Route::get('/review/public/relationship/manager/report', 'ReviewViewController@publicRelationshipManager');
Route::get('/review/feedback/customer/report', 'ReviewViewController@feedbackCustomer');
Route::get('/review/feedback/customer/manager/report', 'ReviewViewController@feedbackCustomerManager');


Route::post('/feedback/PR', 'FeedbackPRController@store');
Route::post('/feedback/warehouse', 'FeedbackWareHouseController@store');

Route::get('/category/{slug}', 'HomeController@category');
// Route::get('/profile', 'CustomerController@profile');

 Route::resource('categories', 'Admin\CategoryController');



// Get data Table group
Route::group(['prefix' => 'api/v1'], function() {
	Route::get('category/table', 'DataApi\CategoryApiController@anyData')->name('category.api.data');
	Route::get('users/table', 'DataApi\UserApiController@anyData')->name('users.api.data');
	Route::get('apartments/table', 'DataApi\ApartmentApiController@anyData')->name('apartments.api.data');
	Route::get('report/market/table', 'DataApi\ReportMarketController@anyData')->name('report_market.api.data');
	Route::get('report/review/table', 'DataApi\ReportApiController@reviewData')->name('report_review.api.data');
	Route::get('report/review/feedbackme/table', 'DataApi\ReportApiController@feedbackMeData')->name('report_feedbackme.api.data');
	Route::get('report/review/feedback/apartment/table', 'DataApi\ReportApiController@feedbackApartmentData')->name('report_feedback_apartment.api.data');
	Route::get('report/review/feedback/warehouse/table', 'DataApi\ReportApiController@feedbackWarehouseData')->name('report_feedback_warehouse.api.data');
    Route::get('report/review/feedback/warehouse/manager/table', 'DataApi\ReportApiController@feedbackWarehouseDataManager')->name('report_feedback_warehouse_manager.api.data');
    Route::get('report/review/feedback/public/relationship/table', 'DataApi\ReportApiController@feedbackPRData')->name('report_feedback_pr.api.data');
    Route::get('report/review/feedback/public/relationship/manager/table', 'DataApi\ReportApiController@feedbackPRDataManager')->name('report_feedback_pr_manager.api.data');
    Route::get('report/review/feedback/customer/table', 'DataApi\ReportApiController@feedbackCustomerData')->name('report_feedback_customer.api.data');
    Route::get('report/review/feedback/customer/manager/table', 'DataApi\ReportApiController@feedbackCustomerDataManager')->name('report_feedback_customer_manager.api.data');

});

// Set Status group

Route::group(['prefix' => 'api/status'], function() {

	Route::get('categories/{id}', 'status\StatusController@categories')->name('categories.api.status');

	Route::post('users/{id}', 'DataApi\UserApiController@status')->name('users.api.status');

});


