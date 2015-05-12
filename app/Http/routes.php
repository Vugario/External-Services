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

Route::get('/', 'WelcomeController@index');

Route::post('/shipment_methods', 'ShipmentsController@index');
Route::post('/shipment', 'ShipmentsController@create');
Route::post('/payment_methods', 'PaymentsController@index');
Route::post('/payment', 'PaymentsController@create');
Route::get('/payment/pay/{id}/{status}', 'PaymentsController@update');
Route::get('/pay/{id}', 'PaymentsController@show');
Route::get('/payment/{id}', 'PaymentsController@one');

// For testing
Route::get('/shipment_methods', 'ShipmentsController@index');
Route::get('/shipment', 'ShipmentsController@create');
Route::get('/payment_methods', 'PaymentsController@index');
Route::get('/payment', 'PaymentsController@create');