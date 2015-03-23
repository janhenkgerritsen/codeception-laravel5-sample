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

Route::get('/', 'HomeController@index');
Route::get('flash', 'HomeController@flash');
Route::get('back', 'HomeController@back');
Route::get('secure', 'HomeController@secure');
Route::get('session/{message}', 'HomeController@session');
Route::get('special-characters', 'HomeController@specialCharacters');
Route::match(['get', 'post'], 'form', 'HomeController@form');

Route::resource('posts', 'PostsController');
Route::resource('api/posts', 'Api\PostsController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('domain-route', ['domain' => 'example.com', 'as' => 'domain', 'uses' => function() {
    return 'Domain route';
}]);
