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

Route::auth();

Route::get('/home', 'HomeController@index');


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

// Password Reset Routes...
Route::get('password/reset', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::get('/home', 'HomeController@index');
Route::get('/reporting/payments', 'ReportingController@payments');
Route::get('/reporting/tracking', 'ReportingController@tracking');
Route::get('/reporting/producers', 'ReportingController@producers');
Route::get('/reporting/payments/export', 'ReportingController@payment_export');
Route::get('/reporting/producers/export', 'ReportingController@producers_export');
Route::get('/reporting/tracking/export', 'ReportingController@tracking_export');

Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');

Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');

Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');

Route::resource('producers', 'ProducerController');
Route::get('producers/json/all', 'ProducerController@getJson');

Route::resource('clients', 'ClientController');
Route::get('clients/json/all', 'ClientController@getJson');

Route::resource('contracts', 'ContractController');

Route::get('payment/multi', 'PaymentController@multi');
Route::get('payment/create/{id}', 'PaymentController@create');
Route::resource('payments', 'PaymentController');

Route::get('providers/json/all', 'ProviderController@getJson');
Route::get('services/json/all', 'ServiceController@getJson');

Route::get('contracts/{contract_id}/terms/', 'TermController@getJsonContract');
Route::get('contracts/json/all', 'ContractController@getJson');
Route::post('contracts/json/save', 'ContractController@postJson');
Route::post('terms/json/save', 'TermController@postJson');

Route::resource('terms', 'TermController');
Route::resource('services', 'ServiceController');
Route::resource('providers', 'ProviderController');
