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

Route::get('/', 'AppController@home');

// App installation
Route::get('/install', 'AppController@install');
Route::get('/uninstall', 'AppController@uninstall');
Route::get('/cancel', 'AppController@cancel');

// Shipping integration
Route::post('/shipment_methods', 'ShipmentsController@index');

// Payment service integration
Route::post('/payment_methods', 'PaymentsController@index');
Route::post('/payment', 'PaymentsController@create');
Route::get('/payment/{id}', 'PaymentsController@one');

// Authenticated routes
Route::group(['middleware' => ['auth']], function()
{
    Route::get('/dashboard', 'AppController@dashboard');
});

// Other routes
Route::get('/payment/pay/{id}/{status}', 'PaymentsController@update');
Route::get('/pay/{id}', 'PaymentsController@show');

// For testing purposes
Route::get('/shipment_methods', 'ShipmentsController@index');
Route::get('/shipment', 'ShipmentsController@create');
Route::get('/payment_methods', 'PaymentsController@index');
Route::get('/payment', 'PaymentsController@create');