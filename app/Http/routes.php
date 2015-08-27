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
	return "This is the main";
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => 'auth'], function () {

	// Auth
	Route::get('auth/logout', 'Auth\AuthController@getLogout');

	// Users
	Route::get('/user/profile', 'User\UserController@showProfile');
	Route::get('/user/list', 'User\UserController@listUsers');

	// Contacts
	Route::get('/contacts', 'Contact\ContactController@listContacts');
	Route::get('/contacts/{contactId}', 'Contact\ContactController@showContact');
	Route::post('/contacts', 'Contact\ContactController@createContact');

	// Notes
	Route::get('/contacts/{contactId}/notes', function() {
		return "You're looking at notes.";
	});


});

