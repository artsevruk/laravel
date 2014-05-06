<?php 
class ProfileController extends BaseController{

	public function user($username){

		/*if (Auth::check()){
			$username = Auth::user()->username;
			$user = User::where('username', '=', $username);
			
			if($user->count()) {	
				$user = $user->first();
				return View::make('profile.user')
						->with('user', $user);
			}

		} else { */

			$user = User::where('username', '=', $username);
			
			if($user->count()) {	
				$user = $user->first();
				return View::make('profile.user')
						->with('user', $user);
			}
			
		/*}

		echo 'не понятно авторизовался пользователь или нет...';*/
	} 

	public function users(){

		return View::make('profile.users');
	}
}