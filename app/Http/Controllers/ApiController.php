<?php namespace App\Http\Controllers;

use App\Exceptions\MissingEnvironmentVariableException;
use App\Helper;
use App\Image;
use Illuminate\Http\Request;
use Img;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller
{

    /**
     * ApiController constructor.
     */
    public function __construct()
    {
        if (!env('API_KEY')) {
            throw new MissingEnvironmentVariableException('API_KEY');
        }
    }

    /**
     * Fetch LastFM API data
     *
     * @return mixed
     */
    public function lastfm(Request $request)
    {
        if ($request->ajax()) {
            $albumsUrl  = "https://ws.audioscrobbler.com/2.0/?method=user.gettopalbums&user=duckthom&api_key=" . env('LASTFM_API_KEY') . "&format=json&period=1month&limit=5";
            $tracksUrl  = "https://ws.audioscrobbler.com/2.0/?method=user.gettoptracks&user=duckthom&api_key=" . env('LASTFM_API_KEY') . "&format=json&period=1month&limit=5";
            $playingUrl = "https://ws.audioscrobbler.com/2.0/?method=user.getrecenttracks&user=duckthom&api_key=" . env('LASTFM_API_KEY') . "&format=json&limit=1";

            return response()->json([
                json_decode(file_get_contents($albumsUrl)),
                json_decode(file_get_contents($tracksUrl)),
                json_decode(file_get_contents($playingUrl)),
            ]);
        } else {
            return response()->json("Only ajax requests are allowed", 405);
        }
    }

    /**
     * Upload an image via the api
     *
     * @param Request $request
     * @return string|Redirect
     * @throws \Exception
     */
    public function uploadImage(Request $request) {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image',
            'name'  => 'min:3|max:50',
            'key'   => 'required'
        ]);

        if ($validator->passes()) {
            $key = $request->get('key');

            if ($key === env('API_KEY')) {
                \Log::info('Uploading image via API...');

                $image      = $request->file('image');
                $name       = $request->has('name') ? $request->get('name') : $image->getClientOriginalName();
                $image_hash = Helper::createHash();

                $imagedata = (string) Img::make($image)->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 90);

                Image::create([
                    'name'      => ($name === "" ? $image_name : $name),
                    'hash'      => $image_hash,
                    'thumbnail' => $imagedata
                ]);

                $image->move(public_path() . "/img/", $image_hash);

                return response()
                    ->json([
                        "url" => url("s/{$image_hash}/full")
                    ]);
            } else {
                return response('Invalid API key');
            }
        } else {
            return json($validator->errors());
        }
    }

}