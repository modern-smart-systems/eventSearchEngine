<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['namespace' => 'Api', 'middleware' => 'api'], function () {
    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/register', 'AuthController@register');
    Route::post('forgot/password', 'ForgotPasswordController@reset');

    Route::get('events', 'EventController@index');
    Route::get('events/test', 'EventController@test');
    Route::get('events/{event}', 'EventController@show');
});


