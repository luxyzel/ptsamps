<?php 

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

/**
 * 
 */
class AdminLoginController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('guest:admin')->except('logout');
	}

	public function showLoginForm()
	{
		return view('auth.admin-login');
	}

	public function login(Request $request)
	{
		// Validatation of input
		$this->validate($request, [
			'username' => 'required',
			'password' => 'required'
		]);

		// Login attempt
		if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password]))
		{
			// if success login
			return redirect()->intended(route('dashboard'));
		}
			//if failed login
			Session::flash('warning', 'Invalid Credentials');
			return redirect()->back()->withInput($request->only('username'));
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect(route('admin.login'));
	}
}