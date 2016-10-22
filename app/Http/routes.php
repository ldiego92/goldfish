<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('stat','StatisticsController@getStatistics');
Route::resource('loan','LoanController');
Route::resource('users','UserController');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('loan', 'LoanController@store');
Route::post('search-by-identification','UserController@searchByIdentification');
Route::get('search-by-identification','UserController@searchByIdentification');
Route::resource('audiovisual-equipment', 'AudiovisualEquipmentController');
Route::resource('brand','BrandController');
Route::resource('model','AudiovisualModelController');
Route::resource('type','TypeController');
Route::resource('cartographic-material','CartographicMaterialController');
Route::resource('three-dimensional-object','ThreeDimensionalObjectController');

Route::get('store','UserController@store');
Route::get('update/{id}','UserController@update');
Route::get('search-by-name','UserController@searchByName');


Route::get('loan-by-id','LoanController@returnLoanById');
Route::get('return', "LoanController@returnLoan");
Route::get('gets', "LoanController@gets");
Route::get('updateEq/{id}', 'AudiovisualEquipmentController@update');
