<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Model\Log;
use Auth;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index() {
        return view('auth.login');   
    }

    public function login(Request $request)
    {
        // Validatation of input
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        // Login attempt
        if (Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password]))
        {
            /*** SUCCESS LOGIN ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Login';
            $eventLogs->description = 'Login approver account';
            $eventLogs->user = Auth::guard('web')->user()->name;
            $eventLogs->save();

            return redirect()->intended(route('home'));
        }
            //if failed login
            Session::flash('warning', 'Invalid Credentials');
            return redirect()->back()->withInput($request->only('username'));
    }

    public function logout() {

        /*** Event Log ***/
        $eventLogs = new Log();
        $eventLogs->action = 'Logout';
        $eventLogs->description = 'Logout approver account';
        $eventLogs->user = Auth::guard('web')->user()->name;

        if ($eventLogs->save()) {
            Auth::guard('web')->logout();
            return redirect('/');
        }
    }
}
