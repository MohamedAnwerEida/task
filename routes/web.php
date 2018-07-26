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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/c/{idcode}/{id}', 'UsersController@active_idcode');
Route::get('/profile/edit', 'UsersController@ShowProfile')->middleware('auth');
Route::post('/profile/edit', 'UsersController@EditProfile')->middleware('auth');
Route::get('/close', 'UsersController@close')->middleware('auth');
Route::post('/close', 'UsersController@PostClose')->middleware('auth');
Route::get('/users', 'UsersController@users');
