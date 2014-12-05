<?php

/** HomeController */
Route::get('/', 'HomeController@index');
Route::get('flash', 'HomeController@flash');
Route::get('back', 'HomeController@back');
Route::get('secure', 'HomeController@secure');
Route::get('session/{message}', 'HomeController@session');
Route::match(['get', 'post'], 'form', 'HomeController@form');

Route::resource('posts', 'PostsController');
Route::resource('api/posts', 'Api\PostsController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
