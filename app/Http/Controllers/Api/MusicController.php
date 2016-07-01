<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

/**
 * Class MusicController.
 */
class MusicController extends ApiController
{
    /**
     * Fetch LastFM API data.
     *
     * @param Request $request
     * @return mixed
     */
    public function lastfm(Request $request)
    {
        if ($request->ajax()) {
            $albumsUrl = 'https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=duckthom&api_key='.env('LASTFM_API_KEY').'&format=json&period=1month&limit=5';
            $tracksUrl = 'https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=duckthom&api_key='.env('LASTFM_API_KEY').'&format=json&period=1month&limit=5';
            $playingUrl = 'https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=duckthom&api_key='.env('LASTFM_API_KEY').'&format=json&limit=1';

            return $this->returnInSuccess([
                json_decode(file_get_contents($albumsUrl)),
                json_decode(file_get_contents($tracksUrl)),
                json_decode(file_get_contents($playingUrl)),
            ]);
        } else {
            return $this->returnInFail('Invalid request type');
        }
    }
}
