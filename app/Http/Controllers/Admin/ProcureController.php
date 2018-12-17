<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Notifications\PORequest;
use App\Mail\poRouteMail;
use App\Model\Vendor;
use App\Model\Requestor;
use App\Model\Procure;
use App\Model\Payment;
use App\Model\Po_number;
use App\Model\Group_number;
use App\User;
use App\Model\Log;
use Carbon\Carbon;
use Auth;
use DB;
use Session;


class ProcureController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
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
        $valCount = "00001";
        $val = "ID". $year. $valCount;
        
        /***Check GROUP NUMBER - NEW or INCREMENT***/
        $idCheck = Group_number::where('groupid', $val)->first();
        if (!$idCheck){
            $groupID = $val;
            $newCount = 1;
        }else{
            $getCount = Group_number::whereYear('created_at', $year)->max('count');
            $n = str_pad($getCount + 1, 5, 0, STR_PAD_LEFT);
            $groupID = "ID". $year. $n;
            $newCount = $getCount + 1; 
        }

        /***SAVE ITEM GROUP-NUMBER***/
        $groupNumber = new Group_number();
        $groupNumber->groupid = $groupID;
        $groupNumber->count = $newCount;

        if ($groupNumber->save()) {
            $lastInsertedId = $groupNumber->id;
        } else{
            $lastInsertedId ="";
        }


        /***GET Admin***/
        $admin = Auth::guard('admin')->user();

        /***GET REQUESTOR ID***/
        $requestor = Requestor::where('requestor_name', $request->requestor)->first();

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
                    'group_id' =>$lastInsertedId,
                    'request_date' => Carbon::today()->toDateString(),
                    'vendor_id' => $vendor->id, //
                    'requestor_id' => $requestor->id, //         
                    'item' => $item[$key],
                    'quantity' => $quantity[$key],
                    'uom' => $uom[$key],
                    'description' => $description[$key],
                    'unit_price' => $unitprice[$key],
                    'total_price' => $totalprice[$key],
                    'requested_by' => $requestor->requestor_name, //
                    'prepared_by' => $admin->id,
                    'status' => 'Pending',
                    'created_at' => now(),
                    'updated_at' => now(),
                )
            );
        }

        if ($save){

            /*** SAVE PAYMENTS ***/
            $payment = new Payment();
            $payment->group_id = $lastInsertedId;
            $payment->vat_inc = $request->vatinclusive;
            $payment->vat_ex = $request->vatexclusive;
            $payment->less_discount = $request->lessdiscount;
            $payment->vat = $request->vat;
            $payment->total_price = $request->total;
            $payment->remarks = $request->remarks;
            $payment->payment_terms = $request->paymentterms;

            if ($payment->save()) {

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Create';
                $eventLogs->description = 'Created PO request';
                $eventLogs->user = Auth::guard('admin')->user()->name;
                $eventLogs->save();

                // $adminE = Auth::guard('admin')->user()->email;
                // $emails = User::where('id', 1)->first();
                // $to = explode(',',$emails);
                // Mail::send(['text'=>'admin.emails.poRoute'],['name','PTS'],function($message)
                // {
                //     $message->to('assetandprocurement@outlook.com', 'To Approver')->subject('PO Request Notif');
                //     $message->from('assetandprocurement@gmail.com','Admin');
                // });

                $deal='';
                $users = User::all();
                $when = Carbon::now()->addSecond();
                foreach($users as $user){
                     $user->notify((new PORequest($deal))->delay($when));
                }


                Session::flash('success', 'PO Request Successfully Created');
                return redirect()->back();
                // return $emails;

            }
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
