<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Status;
use Auth;
use Session;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $statuses = Status::all();
        /*return view('admin.manage-users.manage')->withUsers($users);*/
        return view('admin.manage-statuses.manage',compact('admin', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-statuses.create');
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
        'status' => 'required|unique:statuses',
        ]);

            //CREATE STATUS
         $status = new Status();
         $status->status = $request->status;

         if ($status->save()) {
             return redirect()->route('statuses.show', $status->id);
          } else{
              return redirect()->route('statuses.create');
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
        $status = Status::findOrFail($id);
        return view('admin.manage-statuses.show')->withStatus($status);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status = Status::findOrFail($id);
        return view('admin.manage-statuses.edit')->withStatus($status);
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
            'status' => 'required|unique:statuses,status,'.$id,
        ]);

        $status = Status::findOrFail($id);
        $status->status = $request->status;

        if ($status->save()) {
            return redirect()->route('statuses.show', $id);
        } else{
            return redirect()->route('statuses.edit', $id);
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
        $status = Status::where('id',$id)->delete();
        return redirect()->back();
    }
}
