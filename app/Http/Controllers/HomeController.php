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
		// Get my repo list from GitHub
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/users/DuckThom/repos?sort=pushed');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, 'DuckThom');

		$json = curl_exec($ch);

		// Get the HTTP code
		$code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);

		if ($code === 200) {
			$github_projects = json_decode($json);
		} else {
			$github_projects = [];
		}

		return view('home.projects', ['github_projects' => $github_projects]);
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
