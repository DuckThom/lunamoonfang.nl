<?php namespace App\Http\Controllers;

use Redirect, Auth, Input, Session, Validator, Img, File;

use App\Image;

class ImageController extends Controller
{

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
        public function showFullImage($image_hash)
        {
                $data = Image::where('hash', $image_hash)->firstOrFail();
                $img_location = public_path() . "/img/" . $data->hash;

                if (Input::get('thumb'))
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
}
