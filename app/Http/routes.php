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

Route::resource('loan','LoanController');
Route::resource('users','UserController');
Route::resource('audiovisual-equipment', 'AudiovisualEquipmentController');
Route::resource('brand','BrandController');
Route::resource('model','AudiovisualModelController');
Route::resource('type','TypeController');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
