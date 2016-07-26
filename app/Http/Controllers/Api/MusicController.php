<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

/**
 * Class MusicController.
 */
class MusicController extends ApiController
{
    /**
     * Fetch LastFM API data.
     *
     * @param  Request $request
     * @return mixed
     */
    public function lastfm(Request $request)
    {
        if ($request->ajax()) {
            $client = new Client([
                'base_uri' => 'https://ws.audioscrobbler.com/',
            ]);

            $albums = $client->get('2.0', [
                'query' => [
                    'user' => 'duckthom',
                    'api_key' => config('api.lastfm'),
                    'format' => 'json',
                    'method' => 'user.gettopalbums',
                    'period' => '1month',
                    'limit' => '5',
                ],
            ]);

            $tracks = $client->request('GET', 'https://ws.audioscrobbler.com/2.0/', [
                'query' => [
                    'user' => 'duckthom',
                    'api_key' => config('api.lastfm'),
                    'format' => 'json',
                    'method' => 'user.gettoptracks',
                    'period' => '1month',
                    'limit' => '5',
                ],
            ]);

            $playing = $client->request('GET', 'https://ws.audioscrobbler.com/2.0/', [
                'query' => [
                    'user' => 'duckthom',
                    'api_key' => config('api.lastfm'),
                    'format' => 'json',
                    'method' => 'user.getrecenttracks',
                    'limit' => '1',
                ],
            ]);

            return $this->returnInSuccess([
                json_decode($albums->getBody()->getContents()),
                json_decode($tracks->getBody()->getContents()),
                json_decode($playing->getBody()->getContents()),
            ]);
        } else {
            return $this->returnInFail('Invalid request type');
        }
    }
}
