<?php namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helper;
use App\Image;
use Img;

/**
 * Class UploadController
 * @package App\Http\Controllers\Api
 */
class UploadController extends ApiController
{

    /**
     * Upload an image via the api
     *
     * @param Request $request
     * @return string|Redirect
     * @throws \Exception
     */
    public function image(Request $request) {
        $validator = \Validator::make($request->all(), [
            'image' => 'required|image',
            'name'  => 'min:3|max:50',
            'key'   => 'required'
        ]);

        if ($validator->passes()) {
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

            return $this->returnInSuccess([
                'url' => url("s/{$image_hash}/full")
            ]);
        } else {
            return $this->returnInFail($validator->errors());
        }
    }
    
}