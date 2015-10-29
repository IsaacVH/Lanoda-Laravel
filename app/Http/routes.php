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

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


Route::group(['middleware' => 'auth'], function () {

	// Route Models
	Route::model('contact', 'Lanoda\Contact');
	Route::model('image', 'Lanoda\Image');
	Route::model('note', 'Lanoda\Note');
	Route::model('tag', 'Lanoda\Tag');
	Route::model('user', 'Lanoda\User');

	// Auth
	Route::get('auth/logout', 'Auth\AuthController@getLogout');


	// Users
	Route::get('/user/settings', 'User\UserController@configSettings');
	Route::get('/user/profile', 'User\UserController@showCurrentUser');


	// Contacts
	Route::get('/contacts/{contact_name}', 'Contact\ContactController@showContactDetail');
	Route::get('/', 'Contact\ContactController@showContactsForCurrentUser');


	// Notes
	Route::get('/contacts/{contact_name}/notes/{note}', 'Note\NoteController@showNoteDetail');
	Route::get('/contacts/{contact}/notes', 'Note\NoteController@showNotesForContact');


	// Tags
	Route::get('/tags/{tag}', 'Tag\TagController@showTag');
	Route::get('/tags', 'Tag\TagController@showTagsForCurrentUser');


	// Images
	Route::get('/images/{image}', 'Image\ImageController@showImage');
	Route::get('/images', 'Image\ImageController@showImagesForCurrentUser');
});


// API
Route::group(['middleware' => 'auth', 'prefix' => 'api'], function() {

	// Contacts
	Route::delete('/contacts/{contact}', 'Contact\ContactController@deleteContact');
	Route::get('/contacts/{contact}', 'Contact\ContactController@getContact');
	Route::get('/contacts', 'Contact\ContactController@getContacts');
	Route::post('/contacts', 'Contact\ContactController@createContact');
	Route::put('/contacts/{contact}', 'Contact\ContactController@updateContact');


	// Images
	Route::delete('/images/{image}', 'Image\ImageController@deleteImage');
	Route::get('/images/{image}', 'Image\ImageController@getImage');
	Route::get('/images', 'Image\ImageController@getImages');
	Route::post('/images', 'Image\ImageController@createImage');
	Route::put('/images{image}', 'Image\ImageController@updateImage');


	// Notes
	Route::delete('/notes/{note}', 'Note\NoteController@deleteNote');
	Route::get('/notes/{note}', 'Note\NoteController@getNote');
	Route::get('/notes', 'Note\NoteController@getNotes');
	Route::post('/notes', 'Note\NoteController@createNote');
	Route::put('/notes/{note}', 'Note\NoteController@updateNote');


	// Tags
	Route::delete('/tags/{tag}', 'Tag\TagController@deleteTag');
	Route::get('/tags/{tag}', 'Tag\TagController@getTag');
	Route::get('/tags', 'Tag\TagController@getTags');
	Route::post('/tags', 'Tag\TagController@createTag');
	Route::put('/tags{tag}', 'Tag\TagController@updateTag');


	// Users
	Route::delete('/user/{user}', 'User\UserController@deleteUser');
	Route::put('/user/{user}', 'User\UserController@updateUser');
});

