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

Route::get('/user', 'UsersController@getUser');

Route::group(['middleware' => 'guest'], function() {
    Route::post('register', 'Auth\RegisterController@register');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('projects', 'ProjectsController@index');
});

Route::group(['middleware' => 'auth:api'], function() {
    Route::get('projects/{id}', 'ProjectsController@show');
    Route::post('projects', 'ProjectsController@store');
    Route::put('projects/{id}', 'ProjectsController@update');
    Route::delete('projects/{id}', 'ProjectsController@delete');
});

