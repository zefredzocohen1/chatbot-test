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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('test', 'HomeController@test');
Route::get('/', 'Auth\LoginController@showLoginForm');
Route::get('/logout', 'Auth\LoginController@logout');
Route::resource('user', 'UserController');
Route::get('/account/edit', 'UserController@accountEdit');
Route::post('/account/update', 'UserController@accountUpdate');
Route::resource('master', 'MasterController');
Route::any('dashboard/{service_code}/{user?}', 'ServiceController@dashboard');
Route::post('dashboard/graph/{service_code}/{user}', ['uses' => 'ServiceController@getGraphData', 'as' => 'dashboard.graph']);
Route::resource('page', 'PageController');
Route::post('/page/{id}/social/graph', ['uses' => 'PageController@getGraphData', 'as' => 'site.analytic.graph']);
Route::post('/page/{id}/social/graphPost', ['uses' => 'PageController@getGraphDataPost', 'as' => 'site.analytic.graphPost']);
Route::post('/', ['uses' => 'Auth\ResetPasswordController@sendMail', 'as' => 'user.reset']);

// router config twitter
Route::get('/social/handleFacebook/{logout?}', 'SocialNetworkController@handleFacebook');
Route::get('/social/handleFacebookCallback/{logout?}', 'SocialNetworkController@handleFacebookCallback');
Route::get('/social/logoutFacebookCallback', 'SocialNetworkController@logoutFacebookCallback');
Route::get('/social/handleTwitter', 'SocialNetworkController@handleTwitter');
Route::get('/social/handleTwitterCallback', 'SocialNetworkController@handleTwitterCallback');
Route::get('/social/handleInstagramCallback', 'SocialNetworkController@handleInstagramCallback');
Route::get('/social/handleInstagram/{logout?}', 'SocialNetworkController@handleInstagram');
Route::get('/social/handleSnapchat', 'SocialNetworkController@handleSnapchat');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');

//router check acc
Route::resource('benchmark', 'BenchmarkController');

