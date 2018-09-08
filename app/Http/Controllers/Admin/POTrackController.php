<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Request;
/*use Illuminate\Http\Request;*/
use App\Http\Controllers\Controller;
use App\Model\Procure;
use App\Model\Payment;
use App\Model\Po_number;
use App\Model\Group_number;
use App\Model\Log;
use App\Model\Notif;
use Auth;
use DB;
use Session;

class POTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::table('notifs')->update(['count' => 0]);

        $admin = Auth::guard('admin')->user();
        $procures = Procure::select('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id', DB::raw('group_concat(item) as item'))->groupBy('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id')->orderBy('created_at','DESC')->get();
         $count = $procures->count();
        $payments = Payment::All();
        return view('admin.po-tracking.index', compact('admin', 'procures', 'payments', 'count'));


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
    
    }


    public function show($id)
    { 
           
            $save = DB::table('procures')->where('group_id', $id)->update(array('status' => 'Pending'));

            if ($save){
                Session::flash('success', 'PO Request Successfully Re-route for Approval');
                return redirect()->back();
            }else{
                 Session::flash('errror', 'Error Encountered');
                return redirect()->back();
            }
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
        $comment = Procure::select('comments')->where('group_id', $id)->groupBy('comments')->first();
        return view('admin.po-tracking.show', compact('procures', 'payments', 'ids', 'comment'));
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
        

         if(Input::get('submit') == 'update')
         {       
                foreach(Request::input('idlists') as $key => $value){ 

                  $save = Procure::find(Request::input('idlists')[$key]); 
                  $save->item = Request::input('item')[$key]; 
                  $save->quantity =Request::input('quantity')[$key]; 
                  $save->uom = Request::input('uom')[$key]; 
                  $save->description = Request::input('description')[$key]; 
                  $save->unit_price = Request::input('unitprice')[$key]; 
                  $save->total_price = Request::input('totalprice')[$key]; 
                  $save->save(); 
                }

                if ($save){

                    /*** SAVE PAYMENTS ***/
                    $payment =  Payment::where('group_id', $id)->first();
                    $payment->vat_inc = Request::input('vatinclusive');/*$request->vatinclusive;*/
                    $payment->vat_ex = Request::input('vatexclusive');/*$request->vatexclusive;*/
                    $payment->less_discount = Request::input('lessdiscount');/*$request->lessdiscount;*/
                    $payment->vat = Request::input('vat');/*$request->vat;*/
                    $payment->total_price = Request::input('total');/*$request->total;*/
                    $payment->remarks = Request::input('remarks');/*$request->remarks;*/
                    $payment->payment_terms = Request::input('paymentterms');/*$request->paymentterms;*/
                    if ($payment->save()) {

                        /*** CREATE EVENT LOG ***/
                        $eventLogs = new Log();
                        $eventLogs->action = 'Update';
                        $eventLogs->description = 'Update PO request';
                        $eventLogs->user = Auth::guard('admin')->user()->name;
                        $eventLogs->save();

                        Session::flash('success', 'PO Request Successfully Updated');
                        return redirect()->back();

                    }else{
                        Session::flash('error', 'Error Encountered');
                        return redirect()->back();
                    }

                }else{
                    Session::flash('error', 'Error Encountered');
                    return redirect()->back();
                }

        }else{

            $checked = Request::input('itemid',[]);
            Procure::whereIn("id",$checked)->delete(); 

            if ($checked){

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Delete';
                $eventLogs->description = 'Delete item from PO request';
                $eventLogs->user = Auth::guard('admin')->user()->name;
                $eventLogs->save();

                Session::flash('success', 'Item Successfully Deleted');
                return redirect()->back();  

            }else{
                Session::flash('error', 'Error Encountered');
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
        $Delete = Procure::where('id',$id);
        if ($Delete->delete()) {
            Session::flash('success', 'Item Successfully Deleted');
            return redirect()->back();
        } else{
            return redirect()->back();
        }
    }

    /***  FILTER ***/
    public function FilterPO(Request $request)
    {
        if (Request::input('status') !== 'All'){
            $procures = Procure::select('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id', DB::raw('group_concat(item) as item'))->where('status', Request::input('status'))->groupBy('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id')->paginate(25);
            $count = $procures->count();
        }else{
            $procures = Procure::select('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id', DB::raw('group_concat(item) as item'))->groupBy('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id')->paginate(25);
             $count = $procures->count();
        }

        $admin = Auth::guard('admin')->user();
        $payments = Payment::All();
        return view('admin.po-tracking.index', compact('admin', 'procures', 'payments', 'count'));
    }

    /*** SEARCH ***/
    public function Search(Request $request)
    {   
        $admin = Auth::guard('admin')->user();

        $poid = Po_number::where('po_number', Request::input('search'))->first();

        if($poid){
            
            $procures = Procure::select('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id', DB::raw('group_concat(item) as item'))->where('po_id', 'like', '%' . $poid->id . '%')->groupBy('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id')->get();
            $count = $procures->count();

            /*return $procures;*/
            if($procures){
                return view('admin.po-tracking.index',compact('admin', 'procures', 'count'));
            }else{
                /*Session::flash('warning', 'No record found');*/
                return view('admin.po-tracking.index',compact('admin', 'procures', 'count'));
            }

        }else{
            $procures = NULL;
            $count = 0;
            Session::flash('warning', 'No record found');
            return view('admin.po-tracking.index',compact('admin', 'procures', 'count'));
        }


    }
}
