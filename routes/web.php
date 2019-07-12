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

Route::get('messages', 'MessagesController@index');
Route::get('messages/{task}', 'MessagesController@show');

Route::get('auth', 'AuthController@install');
Route::get('auth/callback', 'AuthController@callback');
