<?php

class HomeController extends BaseController {

	public function home(){

		/*
		| echo $user = User::find(1) -> username;
		


		    $users = User::all()->first();
		 
		    echo $users->username;
		    echo '------------------';
		    echo $users->email;
		    echo '------------------';
		*/

		
		return View::make('home');
	}
} 