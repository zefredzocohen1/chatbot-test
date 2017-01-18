<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('user', 'UserController');
Route::get('/account/edit', 'UserController@accountEdit');
Route::post('/account/update', 'UserController@accountUpdate');
Route::post('/', ['uses' => 'Auth\ResetPasswordController@sendMail', 'as' => 'user.reset']);

Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::post('/', ['uses' => 'Auth\ResetPasswordController@sendMail', 'as' => 'user.reset']);

