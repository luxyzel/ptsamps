<?php

namespace App\Http\Controllers\Approver;

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Notifications\ApprovedPO;
use App\Notifications\RejectedPO;
use Illuminate\Support\Facades\Mail;
use App\Mail\poRouteMail;
use App\Model\Procure;
use App\Model\Payment;
use App\Model\Po_number;
use App\Model\Log;
use App\Model\Notif;
use App\User;
use App\Admin;
use Carbon\Carbon;
use Auth;
use DB;
use Session;

class PendingPOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    
    public function index()
    {
        $procures = Procure::select('group_id', 'request_date', 'requested_by', 'status','vendor_id', DB::raw('group_concat(item) as item'))->where('status', 'Pending')->groupBy('group_id', 'request_date', 'requested_by', 'status', 'vendor_id')->orderBy('updated_at','DESC')->get();
        $count = $procures->count();
        $payments = Payment::All();
        $approver = Auth::guard('web')->user();
        return view('approver.pending-po.index', compact('procures', 'count', 'payments', 'approver'));
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
        $procures = Procure::where('group_id', $id)->get();
        $payments = Payment::where('group_id', $id)->first();
        $ids = Procure::where('group_id', '=' , $id)->firstOrFail();
        return view('approver.pending-po.edit', compact('procures', 'payments', 'ids'));
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

        if(Input::get('submit') == 'approved')
        {   
            $year = Carbon::now()->year;
            $valCount = "00001";
            $val = "PO". $year. $valCount;
            
            /***Check PO NUMBER - NEW or INCREMENT***/
            $idCheck = Po_number::where('po_number', $val)->first();
            if (!$idCheck){
                $orderID = $val;
                $newCount = 1;
            }else{
                $getCount = Po_number::whereYear('created_at', $year)->max('count');
                $n = str_pad($getCount + 1, 5, 0, STR_PAD_LEFT);
                $orderID = "PO". $year. $n;
                $newCount = $getCount + 1; 
            }

            /***SAVE ITEM PO-NUMBER***/
            $poNumber = new Po_number();
            $poNumber->po_number = $orderID;
            $poNumber->count = $newCount;

            if ($poNumber->save()) {
                $lastInsertedId = $poNumber->id;
            } else{
                $lastInsertedId ="";
            }

            foreach(Request::input('idlists') as $key => $value){ 
                $save = Procure::find(Request::input('idlists')[$key]); 
                $save->po_id = $lastInsertedId;
                $save->approver_id = $approver = Auth::guard('web')->user()->id;
                $save->status = 'Approved';
                $save->date = Carbon::today()->toDateString();
                $save->comments = Request::input('comments'); 
                $save->save(); 
            }

            if ($save) {
                $payment = Payment::findOrFail(Request::input('paymentid'));
                $payment->po_id = $lastInsertedId;
                $payment->save();

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Approve';
                $eventLogs->description = 'Approved PO request';
                $eventLogs->user = Auth::guard('web')->user()->name;
                $eventLogs->save();

                $UserFind = Auth::guard('web')->user()->id;
                $NotifSave = Notif::where('user_id', $UserFind)->first();
                $NotifSave->count = $NotifSave->count + 1;
                $NotifSave->save();

                // User::all()->notify(new ApprovedPO);
                $deal='';
                $admins = Admin::all();
                $when = Carbon::now()->addSecond();
                 foreach($admins as $admin){
                     $admin->notify((new ApprovedPO($deal))->delay($when));
                 }

                // Notification::send(User::all(), new NewPost($post));

                // Mail::send(['text'=>'admin.emails.poApprove'],['name','PTS'],function($message){
                //     $message->to('ptsamps@outlook.com', 'To Admin')->subject('PO Request Notif');
                //     $message->from('assetandprocurement@gmail.com','Approver');
                // });

                Session::flash('success', 'PO Request Successfully Approved');
                return redirect()->route('approved-po.index');
            }

        }else{

            foreach(Request::input('idlists') as $key => $value){ 
                $save = Procure::find(Request::input('idlists')[$key]); 
                $save->approver_id = $approver = Auth::guard('web')->user()->id;
                $save->status = 'Rejected'; 
                $save->date = Carbon::today()->toDateString();
                $save->comments = Request::input('comments'); 
                $save->save(); 
                }

                if ($save) {

                    /*** CREATE EVENT LOG ***/
                    $eventLogs = new Log();
                    $eventLogs->action = 'Reject';
                    $eventLogs->description = 'Rejected PO request';
                    $eventLogs->user = Auth::guard('web')->user()->name;
                    $eventLogs->save();

                    $UserFind = Auth::guard('web')->user()->id;
                    $NotifSave = Notif::where('user_id', $UserFind)->first();
                    $NotifSave->count = $NotifSave->count +  1;
                    $NotifSave->save();

                    $deal='';
                    $admins = Admin::all();
                    $when = Carbon::now()->addSecond();
                    foreach($admins as $admin){
                         $admin->notify((new RejectedPO($deal))->delay($when));
                    }
                    // Mail::send(['text'=>'admin.emails.poReject'],['name','PTS'],function($message){
                    // $message->to('ptsamps@outlook.com', 'To Admin')->subject('PO Request Notif');
                    // $message->from('assetandprocurement@gmail.com','Approver');
                    // });

                    Session::flash('success', 'PO Request Rejected');
                    return redirect()->route('rejected-po.index');
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
