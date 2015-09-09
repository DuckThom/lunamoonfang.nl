<?php

class ImageController extends BaseController
{

        /**
         * Try to show the image that was requested
         *
         * @param $image_hash
         * @return mixed
         */
        public function showImage($image_hash)
        {
                $data = ImageModel::where('Hash', $image_hash)->firstOrFail();

                return View::make('images.image', array('data' => $data));
        }

        /**
         * Try to show the image that was requested (full size)
         *
         * @param $image_hash
         */
        public function showFullImage($image_hash)
        {
                $data = ImageModel::where('Hash', $image_hash)->firstOrFail();
                $img_location = public_path() . "/img/" . $data->Hash;

                if (Input::get('thumb'))
                {
                        if ($data->thumbnail == "")
                        {
                                $imagedata = (string) Img::make($img_location)->resize(null, 250, function ($constraint) {
                                        $constraint->aspectRatio();
                                })->encode('jpg', 90);

                                // Save the thumbnail to the database for caching
                                ImageModel::where('Hash', $image_hash)->update(array('thumbnail' => $imagedata));
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
         * Show a list of all the stored images
         *
         * @return \Illuminate\View\View
         */
        public function listImages()
        {
                $data = ImageModel::orderBy('id', 'desc')->get();

                return View::make('images.imgList', array('images' => $data));
        }

        /**
         * Show the image upload page if the user is logged in
         *
         * @return \Illuminate\View\View
         */
        public function upload()
        {
                if (Auth::check())
                        return View::make('home.upload');
                else
                        return Redirect::to('/');
        }

        /**
         * Save the uploaded image to the disk
         * and create a shortend link for it
         *
         * @return String
         */
        public function saveImage()
        {
                if (Input::hasFile('image')) {

                        $image          = Input::file('image');
                        $name           = (Input::has('name') ? Input::get('name') : "");
                        $key            = Input::get('key');
                        $image_name     = $image->getClientOriginalName();
                        $image_hash     = ImageController::createHash($image_name);

                        if ($key === $_ENV['secret_key'] || Session::token() === Input::get('_token')) {
                                // Check if the file that was sent is actually an image
                                $validator = Validator::make(
                                        array('image' => $image),
                                        array('image' => 'image')
                                );

                                // Check whether the validation has failed or not
                                if (!$validator->fails()) {
                                        $imagedata = (string) Img::make($image)->resize(null, 250, function ($constraint) {
                                                $constraint->aspectRatio();
                                        })->encode('jpg', 90);

                                        ImageModel::create(array(
                                                        'Name'          => ($name === "" ? $image_name : $name),
                                                        'Hash'          => $image_hash,
                                                        'thumbnail'     => $imagedata
                                                )
                                        );

                                        $image->move(public_path() . "/img/", $image_hash);

                                        File::prepend(public_path() . "/imgList", $image_hash . " .......... " . $image_name . "\r\n");

                                        if (Input::has('_token'))
                                                return View::make('home.upload', array('hash' => $image_hash));
                                        else
                                                // Return the hashed url for ScreenCloud
                                                return URL::to('/s') . "/" . $image_hash;
                                } else {
                                        die("Unsupported extension!");
                                }
                        } else {
                                die("Incorrect token/key!");
                        }
                } else {
                        die("No file attached!");
                }
        }

        /**
         * Image overview page
         *
         * @return \Illuminate\View\View
         */
        public function overview()
        {
                $data = ImageModel::all();

                return View::make('images.overview', array('images' => $data));
        }

        /**
         * Create a hash from the filename
         *
         * @param $filename
         * @return string
         */
        private function createHash($filename)
        {
                $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
                $len = strlen($str) - 1;
                $hash = "";

                // Run until the end of times
                while (true) {
                        $salt = "";

                        for ($i = 0; $i < 8; $i++) {
                                $salt .= $str[mt_rand(0, $len)];
                        }

                        // Create a hash
                        $hash = (string)substr(md5($filename . $salt), 0, 8);

                        // Stop the loop if the hash doesn't exist
                        if (!file_exists("/var/www/lunamoonfang.nl/public/img" . $hash)) {
                                break;
                        }
                }

                return $hash;
        }
}
