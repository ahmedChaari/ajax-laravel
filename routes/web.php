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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'CarController@index')->name('home');

Route::get('create', 'CarController@create')->name('create');

Route::post('store', 'CarController@store')->name('store');

Route::get('getData', 'CarController@getData')->name('getData');

Route::get('viewData/{id}', 'CarController@show')->name('viewData');

Route::get('editData/{id}', 'CarController@edit')->name('editData');

Route::post('updateData/{id}', 'CarController@update')->name('updateData');

Route::get('delete', 'CarController@destroy')->name('destroy');