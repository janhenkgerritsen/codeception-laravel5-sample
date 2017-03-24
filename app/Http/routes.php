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

Route::get('', ['domain' => 'example.com', 'as' => 'domain', 'uses' => 'HomeController@domain']);
Route::get('', ['domain' => 'subdomain.example.com', 'as' => 'subdomain', 'uses' => 'HomeController@subdomain']);
Route::get('', ['domain' => '{w}.example.com', 'as' => 'wildcard', 'uses' => 'HomeController@wildcard']);
Route::get('', ['domain' => '{w1}.{w2}.example.com', 'as' => 'multiple-wildcards', 'uses' => 'HomeController@multipleWildcards']);

Route::get('', ['as' => 'homepage', 'uses' => 'HomeController@index']);
Route::get('flash', 'HomeController@flash');
Route::get('back', 'HomeController@back');
Route::get('redirect', 'HomeController@redirect');
Route::get('secure', 'HomeController@secure');
Route::get('session/{message}', 'HomeController@session');
Route::get('special-characters', 'HomeController@specialCharacters');
Route::get('fire-event', 'HomeController@fireEvent');
Route::get('validation', 'HomeController@validation');
Route::get('service-container', 'HomeController@serviceContainer');
Route::get('test-value', 'HomeController@testValue');
Route::post('upload', 'HomeController@upload');
Route::match(['get', 'post'], 'form', 'HomeController@form');

Route::resource('posts', 'PostsController');
Route::resource('api/posts', 'Api\PostsController', ['as' => 'api']);
Route::resource('users', 'UsersController');
Route::auth();
