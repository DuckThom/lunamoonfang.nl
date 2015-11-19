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

/**
 * Image viewing
 */
 Route::group(['prefix' => 's'], function () {
     Route::get('list', ['middleware' => 'auth', 'uses' => 'FileController@imagelist']);
     Route::get('overview', ['middleware' => 'auth', 'uses' => 'FileController@imageoverview']);
     Route::get('{image_name}', 'ImageController@showImage');
     Route::get('{image_name}/full', 'ImageController@showFullImage');
});

/**
 * File and image uploading
 */
Route::group(['prefix' => 'u', 'middleware' => 'auth'], function () {
    Route::post('image', 'FileController@saveImage');
    Route::post('file', 'FileController@saveFile');
});

/**
 * File and image uploading
 */
Route::group(['prefix' => 'f'], function () {
    Route::get('list', ['middleware' => 'auth', 'uses' => 'FileController@filelist']);
    Route::get('{version}/{name}', 'FileController@serve');
});


/**
 * The main site routes
 */
Route::get('/', 'HomeController@index');
Route::get('music', 'HomeController@music');
Route::get('info', 'HomeController@info');
Route::get('projects', 'HomeController@projects');
Route::get('licenses', 'HomeController@licenses');
Route::get('clock', 'HomeController@clock');
Route::get('social', 'HomeController@social');

Route::get('upload', ['middleware' => 'auth', 'uses' => 'FileController@index']);

/**
 * User related routes
 */
Route::get('logout', ['middleware' => 'auth', 'uses' => 'UserController@logout']);

Route::match(['GET', 'POST'], '/login', 'UserController@login');
