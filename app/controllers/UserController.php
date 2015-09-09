<?php

class UserController extends BaseController {

	/**
	 * Login
	 *
	 * @return \Illuminate\View\View
	 */
	public function login()
	{
		if(Request::isMethod('get'))
			return View::make('home.login');
		elseif (Request::isMethod('post')) {
			if (Input::has('username') && Input::has('password'))
			{
				if (Auth::attempt(array('username' => Input::get('username'), 'password' => Input::get('password'))))
				    return Redirect::intended('/');
				else
					return Redirect::to('/login')->with(array('message' => 'Invalid username and/or password', 'type' => 'danger', 'username' => Input::get('username')));
			} else
				return Redirect::to('/login')->with('username', Input::get('username'));
		} else
			return Redirect::to('/');
	}

	/**
	 * Logout
	 */
	public function logout()
	{
		if (Auth::check())
		{
			Auth::logout();
			return Redirect::intended('/')->with(array('message' => 'Logout successful', 'type' => 'success'));
		} else
			return Redirect::back();
	}
}
