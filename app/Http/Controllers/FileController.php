<?php namespace App\Http\Controllers;

use Redirect, Auth, Input, Session, Validator, Img, File, Response, App, Zipper, URL;

use App\Image;
use App\Download;

class FileController extends Controller
{

    /**
     * Show the image upload page if the user is logged in
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('home.upload');
    }

    /**
     * Serve a file for downloading
     *
     * @return mixed
     */
    public function serve($version, $name)
    {
        $file = Download::where(['version' => $version, 'name' => urldecode($name)])->firstOrFail();

        return Response::download($file->path, $file->name);
    }

    /**
     * Show a list of all the stored files
     *
     * @return \Illuminate\View\View
     */
    public function filelist()
    {
        $files = Download::orderBy('name', 'asc')->get();

        return view('files.filelist', ['files' => $files]);
    }

    /**
     * Show a list of all the stored images
     *
     * @return \Illuminate\View\View
     */
    public function imagelist()
    {
            $data = Image::orderBy('id', 'desc')->get();

            return view('files.imagelist', array('images' => $data));
    }

    /**
     * Image overview page
     *
     * @return \Illuminate\View\View
     */
    public function imageoverview()
    {
            $data = Image::all();

            return view('files.overview', array('images' => $data));
    }

    /**
     * Save the uploaded file to the disk
     * and create a shortend link for it
     *
     * @return mixed
     */
    public function saveFile()
    {
        if (Input::hasFile('file')) {

            $file = Input::file('file');
            $key  = Input::get('key');
            $name = $file->getClientOriginalName();
            $hash = self::createFileHash();

            // Check if the file that was sent is actually an file
            $validator = Validator::make(
                array('file' => $file),
                array('file' => 'required|mimes:zip')
            );

            // Check whether the validation has failed or not
            if (!$validator->fails()) {
                $manifest = \Zipper::make($file->getRealPath())->getFileContent('manifest.json');

                $zipValidator = Validator::make(
                    ['manifest' => $manifest],
                    ['manifest' => 'JSON']
                );

                if (!$zipValidator->fails()) {
                    $manifest = json_decode($manifest);

                    $path = storage_path() . "/dl/" . $manifest->name . "/" . $manifest->version;

                    Download::create([
                        'name'    => $name,
                        'descr'   => $manifest->description,
                        'hash'    => $hash,
                        'version' => $manifest->version,
                        'author'  => $manifest->author,
                        'path'    => $path . "/" . $hash
                    ]);

                    $url  = URL::to('/f/' . $manifest->version . '/' . urlencode($name));

                    $file->move($path, $hash);

                    return Redirect::intended('upload')->with(array('file_name' => $name, 'url' => $url));
                } else {
                    return Redirect::back()->with(['type' => 'danger', 'message' => 'Invalid or missing manifest.json']);
                }
            } else {
                Redirect::back()->with(['type' => 'danger', 'message' => 'Invalid file']);
            }
        }

        return Redirect::to('upload')->with(['type' => 'danger', 'message' => 'No file attached']);
    }

    /**
     * Save the uploaded image to the disk
     * and create a shortend link for it
     *
     * @return mixed
     */
    public function saveImage()
    {
            if (Input::hasFile('image')) {

                    $image          = Input::file('image');
                    $name           = (Input::has('name') ? Input::get('name') : "");
                    $key            = Input::get('key');
                    $image_name     = $image->getClientOriginalName();
                    $image_hash     = self::createImageHash();

                    if ($key === env('APP_KEY') || Session::token() === Input::get('_token')) {
                            // Check if the file that was sent is actually an image
                            $validator = Validator::make(
                                    array('image' => $image),
                                    array('image' => 'image')
                            );

                            // Check whether the validation has failed or not
                            if (!$validator->fails()) {
                                    $imagedata = (string) Img::make($image)->resize(250, 250, function ($constraint) {
                                            $constraint->aspectRatio();
                                    })->encode('jpg', 90);

                                    Image::create([
                                        'name'      => ($name === "" ? $image_name : $name),
                                        'hash'      => $image_hash,
                                        'thumbnail' => $imagedata
                                    ]);

                                    $image->move(public_path() . "/img/", $image_hash);

                                    if (Input::has('_token'))
                                            return Redirect::intended('upload')->with(array('hash' => $image_hash));
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
     * Create a hash from the filename for images
     *
     * @return string
     */
    private function createImageHash()
    {
            $fc = count(scandir(public_path() . "/img"));

            // Run until the end of times
            while (true) {
                    $hash = base64_encode($fc * mt_rand(2, $fc * $fc));

                    // Stop the loop if the hash doesn't exist
                    if (!file_exists(public_path() . "/img/" . $hash)) {
                            break;
                    }
            }

            return $hash;
    }

    /**
     * Create a hash from the filename for files
     *
     * @return string
     */
    private function createFileHash()
    {
            $fc = count(scandir(storage_path() . "/dl"));

            // Run until the end of times
            while (true) {
                    $hash = base64_encode($fc * mt_rand(2, $fc * $fc));

                    // Stop the loop if the hash doesn't exist
                    if (!file_exists(storage_path() . "/dl/" . $hash)) {
                            break;
                    }
            }

            return $hash;
    }

}