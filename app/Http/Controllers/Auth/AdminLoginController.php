<?php 

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Log;
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
			/*** SUCCESS LOGIN ***/
			$eventLogs = new Log();
	        $eventLogs->action = 'Login';
	        $eventLogs->description = 'Login admin account';
	        $eventLogs->user = Auth::guard('admin')->user()->name;
	        $eventLogs->save();

			return redirect()->intended(route('dashboard'));
		}
			/*** FAILED LOGIN ***/
			Session::flash('warning', 'Invalid Credentials');
			return redirect()->back()->withInput($request->only('username'));
	}

	public function logout()
	{
		/*** Event Log ***/
		$eventLogs = new Log();
        $eventLogs->action = 'Logout';
        $eventLogs->description = 'Logout admin account';
        $eventLogs->user = Auth::guard('admin')->user()->name;

        if ($eventLogs->save()) {
        	Auth::guard('admin')->logout();
        	return redirect(route('admin.login'));
        }
	}
}