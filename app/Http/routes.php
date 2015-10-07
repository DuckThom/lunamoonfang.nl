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
 * Image uploading and viewing routes
 */
Route::get('/s/list', 'ImageController@listImages');
Route::get('/s/overview', 'ImageController@overview');
Route::get('/s/upload', 'ImageController@upload');
Route::get('/s/{image_name}', 'ImageController@showImage');
Route::get('/s/{image_name}/full', 'ImageController@showFullImage');

Route::post('/s/upload', 'ImageController@saveImage');

/**
 * The main site routes
 */
Route::get('/', 'HomeController@index');
Route::get('/music', 'HomeController@music');
Route::get('/info', 'HomeController@info');
Route::get('/projects', 'HomeController@projects');
Route::get('/licenses', 'HomeController@licenses');
Route::get('/clock', 'HomeController@clock');
Route::get('/social', 'HomeController@social');

/**
 * User related routes
 */
Route::get('/logout', 'UserController@logout');

Route::match(array('GET', 'POST'), '/login', 'UserController@login');
