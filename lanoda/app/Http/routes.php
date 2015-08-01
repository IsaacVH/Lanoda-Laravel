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

Route::get('/', function () {
	return view('welcome');
});

Route::get('/auth/login', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function () {
	Route::get('user/{id}', 'User\UserController@showProfile');

	Route::get('/contacts', function () {
		// Uses Auth Middleware
		return "You're looking at contacts.";
	});

	Route::get('/contacts/{contactId}/notes', function() {
		// Users Auth Middleware
		return "You're looking at notes.";
	});
});

