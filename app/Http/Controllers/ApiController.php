<?php

namespace App\Http\Controllers;

use App\Key;
use Illuminate\Http\Request;

/**
 * Class ApiController.
 */
class ApiController extends Controller
{
    /**
     * Show a list of every API key.
     *
     * @return Illuminate\View\View
     */
    public function list()
    {
        return view('api.list', [
            'keys'  => Key::all(),
        ]);
    }

    /**
     * Show form to create a new key.
     *
     * @return Illuminate\View\View
     */
    public function new()
    {
        return view('api.create');
    }

    /**
     * Add a new API key.
     *
     * @param Request $request
     * @return Redirect
     */
    public function create(Request $request)
    {
        $key = str_random(48);

        Key::create([
            'key'   => $key,
            'name'  => $request->get('name') ?: '',
        ]);

        return redirect()
            ->intended('api/list');
    }
}
