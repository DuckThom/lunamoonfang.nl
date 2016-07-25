<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use GitHub;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * Index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home.index');
    }

    /**
     * About me & Contact.
     *
     * @return \Illuminate\View\View
     */
    public function about()
    {
        return view('home.aboutme');
    }

    /**
     * Music.
     *
     * @return \Illuminate\View\View
     */
    public function music()
    {
        return view('home.music', [
            'lastmonth' => Carbon::parse('-1 month')->format('F jS'),
        ]);
    }

    /**
     * Projects.
     *
     * @return \Illuminate\View\View
     */
    public function projects()
    {
        return view('home.projects', [
            'github_projects' => GitHub::me()->repositories($type = 'public', $sort = 'pushed', $direction = 'desc'),
        ]);
    }

    /**
     * Licenses.
     *
     * @return \Illuminate\View\View
     */
    public function licenses()
    {
        return view('home.licenses');
    }

    /**
     * Bootstrap clock.
     *
     * @return \Illuminate\View\View
     */
    public function clock()
    {
        return view('home.clock');
    }

    /**
     * Social buttons like Google+, GitHub and YouTube.
     *
     * @return \Illuminate\View\View
     */
    public function social()
    {
        return view('home.social');
    }

    /**
     * A page showing an outdated IE warning.
     *
     * @return mixed
     */
    public function ie()
    {
        return view('home.ie_warning');
    }
}
