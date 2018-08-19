<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\Vendor;
use App\Model\Requestor;
use App\Model\Procure;
use Carbon\Carbon;
use Auth;
use DB;
use Session;


class ProcureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $admin = Auth::guard('admin')->user();
        $vendors = Vendor::All();
        $requestors = Requestor::All();
        return view('admin.procurement.index', compact('admin', 'vendors', 'requestors'));
        
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
        $year = Carbon::now()->year;
        $valNum = "00001";
        $val = "ID". $year. $valNum;
        
        /***Check GROUP NUMBER - NEW or INCREMENT***/
        $idCheck = Procure::where('groupid', $val)->first();
        if (!$idCheck){
            $groupID = $val;
            $newNum = 1;
        }else{
            $getNum = Procure::whereYear('created_at', $year)->max('groupnum');
            $n = str_pad($getNum + 1, 5, 0, STR_PAD_LEFT);
            $groupID = "ID". $year. $n;
            $newNum = $getNum + 1; 
        }

        /***GET VENDOR ID***/
        $vendor = Vendor::where('company_name', $request->vendorname)->first();

        /***FROM INPUTS***/
        $data  = Input::only('item', 'quantity', 'uom', 'description', 'unitprice', 'totalprice');

        $item = $data['item'];
        $quantity = $data['quantity'];
        $uom = $data['uom'];
        $description = $data['description'];
        $unitprice = $data['unitprice'];
        $totalprice = $data['totalprice'];

        /***SAVE PO REQUEST***/
        foreach( $item as $key => $i ) {
            $save = DB::table('procures')->insert(
                array(
                    'groupid' => $groupID,
                    'groupnum' => $newNum,
                    'vendor_id' => $vendor->id, //for update
                    'requestor_id' => $id->id,
                    'request_date' => Carbon::now(),
                    'phone' => $request->phone,          
                    'item' => $item[$key],
                    'quantity' => $quantity[$key],
                    'uom' => $uom[$key],
                    'description' => $description[$key],
                    'item_unitprice' => $unitprice[$key],
                    'item_totalprice' => $totalprice[$key],
                    'status' => 'Pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                )
            );
        }

        if ($save){
            Session::flash('success', 'PO Request Successfully Created');
            return redirect()->back();
        }else{
            Session::flash('error', 'Error Encountered');
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
        //
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
        //
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

    public function VendorDetails(Request $request)
    {


    }

}
