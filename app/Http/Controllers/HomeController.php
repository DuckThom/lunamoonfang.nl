<?php namespace App\Http\Controllers;

class HomeController extends Controller
{

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
		return view('home.index');
	}

	/**
	 * About me & Contact
	 *
	 * @return \Illuminate\View\View
	 */
	public function info()
	{
		return view('home.aboutme');
	}

	/**
	 * Music
	 *
	 * @return \Illuminate\View\View
	 */
	public function music()
	{
		return view('home.music');
	}

	/**
	 * Projects
	 *
	 * @return \Illuminate\View\View
	 */
	public function projects()
	{
		return view('home.projects');
	}

	/**
	 * Licenses
	 *
	 * @return \Illuminate\View\View
	 */
	public function licenses()
	{
		return view('home.licenses');
	}

	/**
	 * Bootstrap clock
	 *
	 * @return \Illuminate\View\View
	 */
	public function clock()
	{
		return view('home.clock');
	}

        /**
	 * Social buttons like Google+, GitHub and YouTube
	 *
	 * @return \Illuminate\View\View
	 */
	public function social()
	{
		return view('home.social');
	}
}
