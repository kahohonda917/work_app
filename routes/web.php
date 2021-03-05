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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@calender_register')->name('calender_register');
//Route::get('/home', 'HomeController@calender_edit')->name('calender_edit');





Route::get('/calender', 'HomeController@calender')->name('calender');
//Route::put('/calender/{id}', 'HomeController@calender_edit')->name('calender_edit');
Route::delete('/calender/{id}', 'HomeController@calender_delete')->name('calender_delete');
Route::get('/customer', 'HomeController@customer')->name('customer');
Route::post('/customer/{id}', 'HomeController@customer_register')->name('customer_register');
Route::put('/customer/{id}', 'HomeController@customer_edit')->name('customer_edit');
Route::delete('/customer/{id}', 'HomeController@customer_delete')->name('customer_delete');
Route::get('/worker', 'HomeController@worker')->name('worker');
Route::post('/worker/{id}', 'HomeController@worker_register')->name('worker_register');
Route::put('/worker/{id}', 'HomeController@worker_edit')->name('worker_edit');
Route::delete('/worker/{id}', 'HomeController@worker_delete')->name('worker_delete');
