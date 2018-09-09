<?php

namespace App\Http\Controllers\Approver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Log;
use App\User;
use Auth;
use Session;
use Hash;

class AccountController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $approver = Auth::guard('web')->user();
        return view('approver.account')->with('approver', $approver);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
                //NOT CHANGING PASSWORD
        if(empty($request->currentpass) && empty($request->password)) {

            $this->validateWith([
            'username' => 'required|unique:users,username,'.$id,
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            ]);

            $user = User::findOrFail($id);
            $usermatch = User::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                $user->username = $request->username;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Update';
                $eventLogs->description = 'Updated account info';
                $eventLogs->user = Auth::guard('web')->user()->name;
                $eventLogs->save();

                Session::flash('success', 'Update Changed Successfully');
                return redirect()->back();


        //WILL CHANGE PASSWORD
        }else{

            $this->validateWith([
            'username' => 'required|unique:users,username,'.$id,
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'currentpass' => 'required|max:255',
            'password' => 'required|confirmed|min:8',
            ]);

            $user = User::findOrFail($id);
            $curpass = $request->currentpass;

            $usermatch = User::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                if(Hash::check($curpass, $user->password)) {

                $user->username = $request->username;
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->save();

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Update';
                $eventLogs->description = 'Updated account password';
                $eventLogs->user = Auth::guard('web')->user()->name;
                $eventLogs->save();

                Session::flash('success', 'Password Changed Successfully');
                return redirect()->back();

            } else {
                Session::flash('warning', 'Current Password Did Not Match!');
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
