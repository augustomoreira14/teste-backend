<?php

use Illuminate\Http\Request;

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

Route::post('/auth/get_token', "ApiTokenController@getToken");
Route::post('/users', "UserController@store");

Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/users', "UserController@index");
    Route::put('/users/{user}', "UserController@update");
    Route::delete('/users/{user}', "UserController@delete");
    Route::get('/users/{user}', "UserController@show");
});

