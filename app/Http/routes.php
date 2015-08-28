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
	return redirect('/contacts');
});


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => 'auth'], function () {

	// Route Models
	Route::model('contact', 'Contact');
	Route::model('image', 'Image');
	Route::model('note', 'Note');
	Route::model('tag', 'Tag');
	Route::model('user', 'User');

	// Auth
	Route::get('auth/logout', 'Auth\AuthController@getLogout');


	// Users
	Route::get('/user/profile', 'User\UserController@showCurrentUser');
	Route::get('/user/list', 'User\UserController@showAllUsers');

	Route::delete('/user/{user}', 'User\UserController@deleteUser');
	Route::put('/user/{user}', 'User\UserController@updateUser');


	// Contacts
	Route::get('/contacts/{contact}', 'Contact\ContactController@showContact');
	Route::get('/contacts', 'Contact\ContactController@showContactsForCurrentUser');

	Route::delete('/contacts/{contact}', 'Contact\ContactController@deleteContact');
	Route::post('/contacts', 'Contact\ContactController@createContact');
	Route::put('/contacts/{contact}', 'Contact\ContactController@updateContact');


	// Notes
	Route::get('/contacts/{contact}/notes/{note}', 'Note\NoteController@showNote');
	Route::get('/contacts/{contact}/notes', 'Note\NoteController@showNotesForContact');

	Route::delete('/notes/{note}', 'Note\NoteController@deleteNote');
	Route::post('/notes', 'Note\NoteController@createNote');
	Route::put('/notes/{note}', 'Note\NoteController@updateNote');


	// Tags
	Route::get('/tags/{tag}', 'Tag\TagController@showTag');
	Route::get('/tags', 'Tag\TagController@showTagsForCurrentUser');

	Route::delete('/tags/{tag}', 'Tag\TagController@deleteTag');
	Route::post('/tags', 'Tag\TagController@createTag');
	Route::put('/tags{tag}', 'Tag\TagController@updateTag');


	// Images
	Route::get('/images/{image}', 'Image\ImageController@showImage');
	Route::get('/images', 'Image\ImageController@showImagesForCurrentUser');

	Route::delete('/images/{image}', 'Image\ImageController@deleteImage');
	Route::post('/images', 'Image\ImageController@createImage');
	Route::put('/images{image}', 'Image\ImageController@updateImage');
});

