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

        return view('image.show', [
            'data' => $data
        ]);
    }

    /**
     * Try to show the image that was requested (full size)
     *
     * @param $image_hash
     */
    public function showFullImage(Request $request, $image_hash, $width = "auto", $height = "auto")
    {
        $data = Image::where('hash', $image_hash)->firstOrFail();
        $img_location = public_path() . "/img/" . $data->hash;

        if ($request->get('thumb')) {
            if ($data->thumbnail === "") {
                $imagedata = (string) Img::make($img_location)->resize(250, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg', 90);

                // Save the thumbnail to the database for caching
                Image::where('hash', $image_hash)->update([
                    'thumbnail' => $imagedata
                ]);
            } else {
                $imagedata = $data->thumbnail;
            }
        } else {
            // Put the raw image data in a variable
            $imagedata = file_get_contents($img_location);
        }

        // Echo the image data
        // Optional height and width
        if ($width !== "auto" || $height !== "auto") {
            // Set the content type header to png
            header("Content-Type: image/png");

            // Either width or height or both must be set
            // ie. $width = 500; $height = 250; image dimensions: 2560x1440 will be resized to 399x250
            // ie. $width = 500; $height = 500; image dimensions: 2560x1440 will be resized to 500x313
            echo (string) Img::make($img_location)->resize(($width === "auto" ? null : (int) $width), ($height === "auto" ? null : (int) $height), function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->encode('png');
        } else {
            // Set the content type header to the mime type of the original image
            header("Content-Type: " . image_type_to_mime_type(exif_imagetype($img_location)));

            echo $imagedata;
        }
    }

    /**
     * Show a list of all the stored images
     *
     * @return \Illuminate\View\View
     */
    public function list()
    {
        $data = Image::orderBy('id', 'desc')->paginate(15);

        return view('image.list', [
            'images' => $data
        ]);
    }

    /**
     * Image overview page
     *
     * @return \Illuminate\View\View
     */
    public function overview()
    {
        $data = Image::all();

        return view('image.overview', [
            'images' => $data
        ]);
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
