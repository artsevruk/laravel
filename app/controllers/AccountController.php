<?php
class AccountController extends BaseController {

	public function getSingIn(){
		return View::make('account.singin');
	}

	public function postSingIn(){
		$validator = Validator::make(Input::all(),
			array(
				'email' 		=> 'required|email',
				'password' 		=> 'required'
				)
			);

			if($validator->fails()) {
				return 	Redirect::route('account-sing-in')
						->withErrors($validator)
						->withInput();
			} else{


				$auth = Auth::attempt(array(
					'email' => Input::get('email'),
					'password' => Input::get('password'),
					'active' => 1
					));



				if ($auth) {
					//Redirect to the intended page
					return Redirect::intended('/');


				} else{
					return 	Redirect::route('account-sing-in')
							->with('global', 'Email/Password wrong, or account not activated.');
				}

			}
			return 	Redirect::route('account-sing-in')
					->with('global', 'There was a problem singin you in. Have you activated?');

	}


	public function getSingOut() {
		Auth::logout();
		return Redirect::route('home');
	}

	public function getCreate() {
		return View::make('account.create');

	}

	public function postCreate() {

		/*
		|print_r(Input::all());
		*/
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username' 			=> 'required|max:20|min:3|unique:users',
				'password' 			=> 'required|min:6',
				'password_again' 	=> 'required|same:password'

			)
		);

		if($validator -> fails()) {
			return 	Redirect::route('account-create')
					-> withErrors($validator)
					-> withInput();
		} else {
			$email 			= Input::get('email');
			$username 		= Input::get('username');
			$password 		= Input::get('password');

			//Activation code
			$code 			= str_random(60);
			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'password' => Hash::make($password),
				'code' => $code,
				'active' => 0
				));
			if($user){

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Activate your account');

				});

				return 	Redirect::route('home')
						->with('global', 'Your accout has been created! We have sent you an email to activate your account.');
			}
		}
	}

	public function getActivate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()) {
			$user = $user->first();

			//Update user to active state
			$user->active 		= 1;
			$user->code 		= '';

			if($user->save()){
				return 	Redirect::route('home')
						->with('global', 'WOWOWOWOW! Activated! You can now sing in!');

			}
		}

		return 	Redirect::route('home')
				->with('global', 'We could not activate your account. Try again later.');

	}

	public function getChangePassword(){
		return View::make('account.password');	
	}

	public function postChangePassword(){
		$validator = Validator::make(Input::all(),
			array(	
				'old_password'  	=> 'required',
				'new_password'  	=> 'required|min:6',
				'password_again' 	=> 'required|same:new_password'
			)
		);

		if($validator->fails()){
			return 	Redirect::route('account-change-password')
					->withErrors($validator);

		}else{

			$user = User::find(Auth::user()->id);

			$old_password = Input::get('old_password');
			$new_password = Input::get('new_password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				$user->password = Hash::make($new_password);

				if($user->save()){
					return Redirect::route('home')
						->with('global', 'Woqoqo');		
				}


			}else{	
				return 	Redirect::route('account-change-password')
						->with('global', 'You old password is incorrect!');
				}
			}

		return 	Redirect::route('account-change-password')
				->with('global', 'You password could not be changed!!!!!');
	}

	public function getForgotPassword(){
		return View::make('account.forgot');
	}

	public function postForgotPassword(){
		$validator =  Validator::make(Input::all(), 
			array(
				'email' => 'required|email'
			)
		);

		if($validator->fails()){

				return 	Redirect::route('account-forgot-password')
						->withErrors($validator)
						->withInput();

		} else {

			$user = User::where('email', '=', Input::get('email'));

			if($user->count()){
				$user 					= $user->first();

				//Generate a new code and password
				$code 					= str_random(60);
				$password 				= str_random(10);

				$user->code 			= $code;
				$user->password_temp 	= Hash::make($password);


				if($user->save()){
					Mail::send('emails.auth.forgot', array( 'link' => URL::route('account-recover', $code), 'username' => $user->username, 'password' => $password ), function($message) use ($user){
					$message->to($user->email, $user->username)->subject('Your new password');
					
				});

				return 	Redirect::route('home')
						->with('global', 'We have sent you a new password by email.');
				}
			}
		}

		return 	Redirect::route('account-forgot-password')
				->with('global', 'Could not request password.');

	}

	public function getRecover($code){
		$user = User::where('code', '=', $code)
				->where('password_temp', '!=', ' ');

		if($user->count()){
			$user = $user->first();

			$user->password 			= $user->password_temp;
			$user->password_temp 		= ' ';
			$user->code 				= ' ';

			if($user->save()){
				return Redirect::route('home')
					->with('global', 'Your account has been recovered and you can sing in with your new password.');
			}
		}

		return Redirect::route('home')
				->with('global', 'Could not recover your account.');
	}

}





