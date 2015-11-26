<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// ### Auth Routes ###
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', ['as' => 'forgetPassword', 'uses' => 'Auth\PasswordController@getEmail']);
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');


// ### Front Routes ###
Route::get('/', ['as' => 'home', 'uses' => 'FrontController@home']);


// ### Back Routes ###
Route::group(['prefix' => 'admin', 'as' => 'admin:'], function () {
    Route::get('/', ['as' => 'admin','uses' => 'BackController@dashboard']);
    Route::get('/dashboard', ['as' => 'dashboard','uses' => 'BackController@dashboard']);

});

Route::post('users/activate', 'UserController@postActivate');

Route::resource('roles', 'RoleController', ['only' => ['index', 'show']]);
Route::resource('users', 'UserController');



