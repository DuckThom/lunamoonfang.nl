<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use GitHub;
use File;

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
     * Fetch and show a list of my YouTube subscriptions.
     *
     * @param Request $request
     * @param string $page_id pageToken
     * @return View
     */
    public function sublist(Request $request, $page_id = null)
    {
        $filePath = storage_path().'/api/sublist'.$page_id.'.json';
        $fileAge = (File::exists($filePath) ? date_diff(date_create(date('c', File::lastModified($filePath))), date_create(date('c')))->format('%i') : 1440);

        // Renew the data if the file is more than a day old
        if (! File::exists($filePath) || $fileAge >= 1440) {
            $api_url = 'https://www.googleapis.com/youtube/v3/subscriptions'.
                '?part=snippet'.
                '&channelId=UCj71iN5nbRNMErhPaq0qQjA'.
                '&maxResults=10'.
                ($page_id !== null ? '&pageToken='.urlencode($page_id) : '').
                '&key='.env('YOUTUBE_API_KEY').
                '&userIp='.$request->ip();

            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, $api_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);

            $json = curl_exec($ch);

            // Get the HTTP code
            $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            if ($code === 200) {
                \Log::debug('Created/Updated YouTube API data file.');
                File::put($filePath, $json);

                $sublist = json_decode($json);
            } else {
                \Log::debug('YouTube API returned '.$code.'. Loading from file...');
                $sublist = json_decode(File::get($filePath));
            }
        } else {
            \Log::debug('Loading YouTube API data from file... (File age: '.$fileAge.' minutes)');
            $sublist = json_decode(File::get($filePath));
        }

        return view('home.sublist', ['sublist' => $sublist]);
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
