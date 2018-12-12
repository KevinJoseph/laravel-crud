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

Route::get('/', function () {
    return view('welcome');
});

Route::get('package/create','PackageController@create');
Route::post('package/create','PackageController@store');

Route::get('package/index','PackageController@index');
Route::get('package/show/{id}','PackageController@show');

Route::get('package/edit/{id}','PackageController@edit');
Route::patch('package/edit/{id}','PackageController@update');

Route::delete('package/delete/{id}','PackageController@destroy');



