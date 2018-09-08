<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Vendor;
use Auth;
use Session;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $vendors = Vendor::orderBy('created_at','DESC')->paginate(25);
        return view('admin.vendors.index', compact('admin', 'vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.vendors.create');
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
        'coname' => 'required|unique:vendors,company_name',
        'ctperson' => 'required',
        'emailadd' => 'required|unique:vendors,email_address',
        'ctnumber' => 'unique:vendors,contact_number',
        'phone' => 'unique:vendors,phone',
        'fax' => 'unique:vendors,fax',
        'vat' => 'unique:vendors,vat_number',
        ]);

        $vendors = new Vendor();
        $vendors->company_name = $request->coname;
        $vendors->contact_person = $request->ctperson;
        $vendors->designation = $request->designation;
        $vendors->email_address = $request->emailadd;
        $vendors->contact_number = $request->ctnumber;
        $vendors->company_address = $request->coaddress;
        $vendors->phone = $request->phone;
        $vendors->fax = $request->fax;
        $vendors->vat_number = $request->vat;


        if ($vendors->save()) {
            Session::flash('success', 'Vendor Successfully Added');
            return redirect()->back();
        } else{
            return redirect()->route('vendor.create');
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
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendors.show',compact('vendor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendor = Vendor::findOrFail($id);
        return view('admin.vendors.edit',compact('vendor'));
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
        'coname' => 'required|unique:vendors,company_name,'.$id,
        'ctperson' => 'required',
        'emailadd' => 'required|unique:vendors,email_address,'.$id,
        'ctnumber' => 'unique:vendors,contact_number,'.$id,
        'phone' => 'unique:vendors,phone,'.$id,
        'fax' => 'unique:vendors,fax,'.$id,
        'vat' => 'unique:vendors,vat_number,'.$id,
        ]);

        $vendors = Vendor::findOrFail($id);
        $vendors->company_name = $request->coname;
        $vendors->contact_person = $request->ctperson;
        $vendors->designation = $request->designation;
        $vendors->email_address = $request->emailadd;
        $vendors->contact_number = $request->ctnumber;
        $vendors->company_address = $request->coaddress;
        $vendors->phone = $request->phone;
        $vendors->fax = $request->fax;
        $vendors->vat_number = $request->vat;


        if ($vendors->save()) {
            Session::flash('success', 'Vendor Successfully Updated');
            return redirect()->back();
        } else{
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
        $vendor = Vendor::where('id',$id)->delete();
        return redirect()->back();
    }
}
