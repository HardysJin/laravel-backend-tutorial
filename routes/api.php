<?php

use Illuminate\Http\Request;

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

/* version 1 */
Route::group(['prefix' => 'v1'], function () {
    /* auth */
    Route::group(['prefix' => 'auth'], function () {
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');
    });

    /* users */
    Route::group(['prefix' => 'users', 'middleware' => 'auth:api'], function () {
        Route::get('shortlist', 'UserController@shortlistIndex');
        Route::post('shortlist/{postId}', 'UserController@shortlist');
        Route::delete('shortlist/{postId}', 'UserController@unshortlist');
    });

    /* posts */
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', 'PostController@index');
        Route::post('/', 'PostController@create');
    });
});
