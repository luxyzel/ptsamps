<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\User;
use Session;
use Hash;

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
        $admin = Auth::guard('admin')->user();
        return view('admin.dashboard')->with('admin', $admin);
    }

    public function accountInfo()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.acc-settings')->with('admin', $admin);
    }

    public function updateInfo(request $request)
    {
        //NOT CHANGING PASSWORD
        if(empty($request->currentpass) && empty($request->password)) {
            
            $id = Auth::guard('admin')->user()->id;

            $this->validateWith([
            'username' => 'required|unique:admins|max:64',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            ]);

            $admin = Admin::findOrFail($id);
            $usermatch = Admin::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                $admin->username = $request->username;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->save();
                Session::flash('success', 'Update Changed Successfully');
                return redirect()->back();


        //WILL CHANGE PASSWORD
        }else{
            
            $id = Auth::guard('admin')->user()->id;

            $this->validateWith([
            'username' => 'required|unique:admins|max:64',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'currentpass' => 'required|max:255',
            'password' => 'required|confirmed|min:8',
            ]);

            $admin = Admin::findOrFail($id);
            $curpass = $request->currentpass;

            $usermatch = Admin::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                if(Hash::check($curpass, $admin->password)) {

                $admin->username = $request->username;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->save();
                Session::flash('success', 'Password Changed Successfully');
                return redirect()->back();

            } else {
                Session::flash('warning', 'Current Password Did Not Match!');
                return redirect()->back();
            }
        }
    }

    //ADMIN CREATE

    public function create()
    {
        return view('admin.manage-admins.create');
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'username' => 'required|unique:admins|max:64',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:8',
        ]);

        $adminnew = new Admin();
        $adminnew->username = $request->username;
        $adminnew->name = $request->name;
        $adminnew->email = $request->email;
        $adminnew->password = bcrypt($request->password);

        if ($adminnew->save()) {
            Session::flash('success', 'New Admin Created Successfully');
            return redirect()->back();
        } else{
            return redirect()->route('admin.create');
        }
    }

}