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
 * The main site routes.
 */
Route::get('/', 'HomeController@index');
Route::get('music', 'HomeController@music');
Route::get('about', 'HomeController@about');
Route::get('projects', 'HomeController@projects');
Route::get('licenses', 'HomeController@licenses');
Route::get('clock', 'HomeController@clock');
Route::get('social', 'HomeController@social');
Route::get('ie_warning', 'HomeController@ie');

/*
 * API Routes
 */
Route::group(['prefix' => 'api'], function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('list', 'ApiController@list');
        Route::get('create', 'ApiController@new');

        Route::post('create', 'ApiController@create');
    });

    Route::group(['namespace' => 'Api'], function () {
        Route::get('lastfm', 'MusicController@lastfm');

        Route::group(['middleware' => 'api'], function () {
            Route::post('upload', 'UploadController@image');
        });
    });
});

/*
 * Routes that are only accessable to guests
 */
Route::group(['middleware' => 'guest'], function () {
    Route::match(['GET', 'POST'], '/login', 'UserController@login');
});

/*
 * Routes that are only accessable when logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::get('account', 'UserController@account');

    Route::group(['prefix' => 'f'], function () {
        Route::get('upload', 'FileController@index');
        Route::get('list', 'FileController@list');

        Route::post('upload', 'FileController@save');
    });

    Route::group(['prefix' => 's'], function () {
        Route::get('upload', 'ImageController@index');
        Route::get('list', 'ImageController@list');
        Route::get('overview', 'ImageController@overview');

        Route::post('upload', 'ImageController@save');
    });

    Route::get('logout', 'UserController@logout');
});

/*
 * Image viewing, needs to be AFTER the middleware auth block
 */
Route::group(['prefix' => 's'], function () {
    Route::get('{image_name}', 'ImageController@show');
    Route::get('{image_name}/full/{width?}/{height?}', 'ImageController@full');
});
