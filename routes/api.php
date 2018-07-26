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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/user', 'ApiUserController@index');
Route::get('/user/{id}', 'ApiUserController@show');
Route::post('/user', 'ApiUserController@store');
Route::put('/user/{id}', 'ApiUserController@update');
Route::delete('/user/{id}', 'ApiUserController@delete');
