<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

	/**
	 * Login
	 *
	 * @return \Illuminate\View\View|Redirect
	 */
	public function login(Request $request)
	{
		if ($request->isMethod('get')) {
			return view('home.login');
		} elseif ($request->isMethod('post')) {
			if ($request->has('username') && $request->has('password')) {
				if (auth()->attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
					return intended('/');
				} else {
					return redirect('login')
						->withErrors('Invalid username and/or password')
						->withInput($request->except('password'));
				}
			} else {
				return redirect('login')
					->withInput($request->except('password'));
			}
		} else {
			return redirect('/');
		}
	}

    /**
     * Logout
     *
     * @return Redirect
     */
	public function logout()
	{
		if (auth()->check()) {
            auth()->logout();

			return intended('/')->with([
                'message' => 'You are now logged out'
            ]);
		} else
			return back();
	}
}
