<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Model\Log;
use Auth;
use Session;

class ManageUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $users = User::all();
        /*return view('admin.manage-users.manage')->withUsers($users);*/
        return view('admin.manage-users.manage',compact('admin', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateWith([
            'username' => 'required|unique:users|max:64',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
        ]);

        $user = new User();
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);

        if ($user->save()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Create';
            $eventLogs->description = 'Created new approvers account';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Account Successfully Created');
            return redirect()->route('users.show', $user->id);

        } else{
            return redirect()->route('users.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manage-users.show')->withUser($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.manage-users.edit')->withUser($user);
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
        $this->validateWith([
            'username' => 'required|unique:users,username,'.$id,
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->username = $request->username;
        $user->name = $request->name;
        $user->email = $request->email;

        if ($user->save()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Update';
            $eventLogs->description = 'Updated approvers account';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Account Successfully Updated');
            return redirect()->route('users.show', $id);

        } else{
            return redirect()->route('users.edit', $id);
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
        $user = User::where('id',$id);

        if ($user->delete()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Delete';
            $eventLogs->description = 'Deleted approvers account';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Account Successfully Deleted');
            return redirect()->back();

        }else{
            return redirect()->back();
        }
    }
}
