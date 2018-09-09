<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Requestor;
use DB;
use Auth;
use Session;

class RequestorController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $requestors = Requestor::orderBy('created_at','DESC')->paginate(25);
        return view('admin.requestors.index',compact('admin', 'requestors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.requestors.create');
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
        'reqname' => 'required',
        'comname' => 'required',
        'comaddress' => 'required',
        'designation' => 'required',
        'emailadd' => 'required|unique:requestors,email_address',
        'contactnum' => 'required|unique:requestors,contact_number',
        'phonenum' => 'required',
        ]);

        $requestors = new Requestor();
        $requestors->company_name = $request->comname;
        $requestors->company_address = $request->comaddress;
        $requestors->requestor_name = $request->reqname;
        $requestors->designation = $request->designation;
        $requestors->email_address = $request->emailadd;
        $requestors->contact_number = $request->contactnum;
        $requestors->phone = $request->phonenum;

        if ($requestors->save()) {
            Session::flash('success', 'Requestor Successfully Added');
            return redirect()->back();
        } else{
            Session::flash('warning', 'Error Encountered');
            return redirect()->back();
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
        $requestor = Requestor::findOrFail($id);
        return view('admin.requestors.show',compact('requestor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $requestor = Requestor::findOrFail($id);
        return view('admin.requestors.edit', compact('requestor'));
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
        'reqname' => 'required',
        'comname' => 'required',
        'comaddress' => 'required',
        'designation' => 'required',
        'emailadd' => 'required|unique:requestors,email_address,'.$id,
        'contactnum' => 'required|unique:requestors,contact_number,'.$id,
        'phonenum' => 'required',
        ]);

        $requestors = Requestor::findOrFail($id);
        $requestors->company_name = $request->comname;
        $requestors->company_address = $request->comaddress;
        $requestors->requestor_name = $request->reqname;
        $requestors->designation = $request->designation;
        $requestors->email_address = $request->emailadd;
        $requestors->contact_number = $request->contactnum;
        $requestors->phone = $request->phonenum;

        if ($requestors->save()) {
            Session::flash('success', 'Requestor Successfully Added');
            return redirect()->back();
        } else{
            Session::flash('warning', 'Error Encountered');
            return redirect()->back();
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
        $requestor = Requestor::where('id',$id);
        if ($requestor->delete()) {
            Session::flash('success', 'Requestor Info Successfully Deleted');
            return redirect()->back();
        } else{
            Session::flash('warning', 'Error Encountered');
            return redirect()->back();
        }
    }
}
