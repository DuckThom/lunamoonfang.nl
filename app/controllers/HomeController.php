<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller will handle all the basic pages like
	| Home, Music and About me
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

        /**
	 * Social buttons like Google+, GitHub and YouTube
	 *
	 * @return \Illuminate\View\View
	 */
	public function social()
	{
		return View::make('home.social');
	}
}
