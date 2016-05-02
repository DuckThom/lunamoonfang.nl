<?php namespace App\Http\Controllers;

use Redirect, Auth, Input, Session, Validator, Img, File;
use Illuminate\Http\Request;
use App\Image;

class ImageController extends Controller
{

    /**
     * Form to upload an image
     *
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return view('upload.image');
    }

    /**
     *
     */
    public function save(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'image' => 'image'
        ]);

        if ($validator->passes()) {
            $image      = $request->file('image');
            $name       = $request->has('name') ? $request->get('name') : $image->getClientOriginalName();
            $image_hash = self::createImageHash();

            $imagedata = (string) Img::make($image)->resize(250, 250, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg', 90);

            Image::create([
                'name'      => ($name === "" ? $image_name : $name),
                'hash'      => $image_hash,
                'thumbnail' => $imagedata
            ]);

            $image->move(public_path() . "/img/", $image_hash);

            return redirect()
                ->intended("s/{$image_hash}")
                ->with([
                    'hash' => $image_hash
                ]);
        } else {
            return back()
                ->withErrors($validator->errors());
        }
    }

    /**
     * Try to show the image that was requested
     *
     * @param $image_hash
     * @return mixed
     */
    public function showImage($image_hash)
    {
        $data = Image::where('hash', $image_hash)->firstOrFail();

        return view('files.image', array('data' => $data));
    }

    /**
     * Try to show the image that was requested (full size)
     *
     * @param $image_hash
     */
    public function showFullImage(Request $request, $image_hash)
    {
        $data = Image::where('hash', $image_hash)->firstOrFail();
        $img_location = public_path() . "/img/" . $data->hash;

        if ($request->get('thumb'))
        {
            if ($data->thumbnail === "")
            {
                $imagedata = (string) Img::make($img_location)->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 90);

                // Save the thumbnail to the database for caching
                Image::where('hash', $image_hash)->update(array('thumbnail' => $imagedata));
            } else
                $imagedata = $data->thumbnail;

        } else
        {
            // Put the raw image data in a variable
            $imagedata = file_get_contents($img_location);
        }


        // Set the content type header to the mime type of the image
        header("Content-Type: " . image_type_to_mime_type(exif_imagetype($img_location)));

        // Echo the image data
        echo $imagedata;
    }

    /**
     * Create a hash for images
     *
     * @return string
     */
    private function createImageHash()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!';
        $hash  = '';
        $count = 0;
        $limit = 5;

        // Run until the end of times
        while ($count < $limit) {
            $hash .= $chars[rand(0, strlen($chars)-1)];

            $count++;

            if ($count === 5) {
                // Retry until the limit is 10
                if ($limit === 10) {
                    throw new \Exception('Exhausted possible hashes...?');
                }

                // Restart the loop if the hash is not unique
                if (file_exists(public_path() . "/img/" . $hash)) {
                    $limit++;
                    $count = 0;
                    $hash = '';
                }
            }
        }

        return $hash;
    }
}
