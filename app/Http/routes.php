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

//Route::resource('loan','LoanController');
Route::resource('users','UserController');
Route::get('login','UserController@login');
Route::get('logout','UserController@logout');
Route::get('loan', 'LoanController@store');
Route::post('search-by-identification','UserController@searchByIdentification');
Route::get('search-by-identification','UserController@searchByIdentification');