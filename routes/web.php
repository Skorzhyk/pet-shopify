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

Route::get('/', 'MessagesController@index');
Route::post('messages/save', 'MessagesController@save');
Route::post('messages/respond/{message}', 'MessagesController@respond');
Route::get('messages/{message}', 'MessagesController@show');

Route::get('auth', 'AuthController@install');
Route::get('auth/callback', 'AuthController@callback');

Route::post('config/save', 'ConfigController@save');
