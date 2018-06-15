<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Input;
use Auth;
use App\Admin;
use Session;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    public function accountInfo()
    {
         /*return view('admin.acc-info');*/
        $admin = Auth::user();
        return view('admin.acc-settings')->with('admin', $admin);
    }

    public function updateInfo(request $request)
    {
         $id = Auth::user()->id;

         $this->validateWith([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:admins,email,'.$id,
        'currentpass' => 'required|max:255',
        'password' => 'required|confirmed|min:8',
        ]);

        $matchpass = Admin::where('password', bcrypt($request->currentpass))->where('id', $id)->first();
        if (!$matchpass) {
            Session::flash('warning', 'Current Password Did Not Match');
        }
            $admin = Admin::findOrFail($id);
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->password = bcrypt($request->password);
            $admin->save();
            Session::flash('success', 'Password Changed Successfully');
            return redirect()->back();

    }

}