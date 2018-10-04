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
Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'API\UserController@details');
});


Route::get('events', 'API\EventController@index');
Route::get('events/{event}', 'API\EventController@show');
Route::post('events', 'API\EventController@store');
Route::put('events/{event}', 'API\EventController@update');
Route::delete('events/{event}', 'API\EventController@delete');
