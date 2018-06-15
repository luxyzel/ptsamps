<?php 

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

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
			'email' => 'required|email',
			'password' => 'required'
		]);

		// Login attempt
		if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password]))
		{
			// if success login
			return redirect()->intended(route('dashboard'));
		}
			//if failed login
			return redirect()->back()->withInput($request->only('email'));
	}

	public function logout()
	{
		Auth::guard('admin')->logout();
		return redirect(route('admin.login'));
	}
}