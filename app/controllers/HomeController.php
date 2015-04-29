<?php

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	/**
	 * Index
	 *
	 * @return \Illuminate\View\View
	 */
	public function index()
	{
		return View::make('home.index');
	}

	/**
	 * About me & Contact
	 *
	 * @return \Illuminate\View\View
	 */
	public function info()
	{
		return View::make('home.aboutme');
	}

	/**
	 * Music
	 *
	 * @return \Illuminate\View\View
	 */
	public function music()
	{
		return View::make('home.music');
	}

	/**
	 * Projects
	 *
	 * @return \Illuminate\View\View
	 */
	public function projects()
	{
		return View::make('home.projects');
	}

	/**
	 * Licenses
	 *
	 * @return \Illuminate\View\View
	 */
	public function licenses()
	{
		return View::make('home.licenses');
	}

	/**
	 * Bootstrap clock
	 *
	 * @return \Illuminate\View\View
	 */
	public function clock()
	{
		return View::make('home.clock');
	}
}
