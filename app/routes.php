<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array(
	'as' => 'home',
	'uses' => 'HomeController@home'
	
));

Route::get('user/{username}', array(
	'as' => 'profile-user',
	'uses' => 'ProfileController@user'
));

/*
|	Authenticated groupe
*/
Route::group(array('before' => 'auth'), function(){

	Route::group(array('before' => 'csrf'), function(){

		/*
		|	Change password (POST)
		*/
		Route::post('account/change-password', array(
			'as' => 'account-change-password-post',
			'uses' => 'AccountController@postChangePassword'
			));

	});

	/*
	|	Change password (GET)
	*/
	Route::get('account/change-password', array(
		'as' => 'account-change-password',
		'uses' => 'AccountController@getChangePassword'
		));


	/*
	|	Sing out (GET)
	*/
	Route::get('account-sing-out', array(
		'as' => 'account-sing-out',
		'uses' => 'AccountController@getSingOut'
	));
});

/*
|	Unauthenticated groupe
*/
Route::group(array('before' => 'guest'), function(){


	/*
	|CSRF  Protection groupe
	*/
	Route::group(array('before' => 'csrf'), function(){
		
		/*
		| Create account (POST)
		*/
		Route::post('/account/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		/*
		| Sing in (POST)
		*/		
		Route::post('/account/sing-in', array(
			'as' => 'account-sing-in-post',
			'uses' => 'AccountController@postSingIn'
			));
	});

	/*
	| Sing in (GET)
	*/
	Route::get('/account/sing-in', array(
		'as' => 'account-sing-in',
		'uses' => 'AccountController@getSingIn'
		));


	/*
	| Create account (GET)
	*/
	Route::get('/account/create', array(
		'as' => 'account-create',
		'uses' => 'AccountController@getCreate'
	));

	Route::get('/account/activate/{code}', array(
		'as' => 'account-activate',
		'uses' => 'AccountController@getActivate'
	));


});