<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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
			return view('user.login');
		} elseif ($request->isMethod('post')) {
			if ($request->has('username') && $request->has('password')) {
				if (Auth::attempt(['username' => $request->get('username'), 'password' => $request->get('password')])) {
					return redirect()
                        ->intended('/');
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
		if (Auth::check()) {
            Auth::logout();

			return intended('/')->with([
                'message' => 'You are now logged out'
            ]);
		} else
			return back();
	}

    /**
     * Account
     *
     * @return \Illuminate\View\View
     */
    public function account()
    {
        return view('user.account');
    }
}
