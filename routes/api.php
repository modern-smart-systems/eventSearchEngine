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

Route::group(['namespace' => 'Api'], function () {
    Route::post('users/login', 'AuthController@login');
    Route::post('user', 'AuthController@register');

    Route::get('events', 'EventController@index');
    Route::get('events/{event}', 'EventController@show');
});