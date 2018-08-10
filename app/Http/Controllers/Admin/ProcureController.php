<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Model\Vendor;
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
        return view('admin.procurement.index', compact('admin', 'vendors'));
        
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
        $id = Vendor::where('company_name', $request->vendorname)->first();

        /***FROM INPUTS***/
        $data  = Input::only('item', 'quantity', 'uom', 'description', 'uppeso', 'updollar', 'tppeso', 'tpdollar');

        $item = $data['item'];
        $quantity = $data['quantity'];
        $uom = $data['uom'];
        $description = $data['description'];
        $uppeso = $data['uppeso'];
        $updollar = $data['updollar'];
        $tppeso = $data['tppeso'];
        $tpdollar = $data['tpdollar'];

        /***SAVE PO REQUEST***/
        foreach( $item as $key => $i ) {
            $save = DB::table('procures')->insert(
                array(
                    'groupid' => $groupID,
                    'groupnum' => $newNum,
                    'vendor_id' => $id->id,
                    'request_date' => Carbon::now(),
                    'company_name' => $request->coname,
                    'contact_person' => $request->ctperson,
                    'designation' => $request->designation,
                    'email_address' => $request->emailadd,
                    'contact_number' => $request->ctnumber,
                    'company_address' => $request->coaddress,
                    'phone' => $request->phone,          
                    'item' => $item[$key],
                    'quantity' => $quantity[$key],
                    'uom' => $uom[$key],
                    'description' => $description[$key],
                    'unitprice_php' => $uppeso[$key],
                    'unitprice_usd' => $updollar[$key],
                    'item_totalprice_php' => $tppeso[$key],
                    'item_totalprice_usd' => $tpdollar[$key],
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
