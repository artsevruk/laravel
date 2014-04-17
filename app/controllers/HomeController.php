<?php

class HomeController extends BaseController {

	public function home(){

		echo $user = User::find(1) -> username;

		return View::make('home');
	}

} 