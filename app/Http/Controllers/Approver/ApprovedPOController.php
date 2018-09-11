<?php

namespace App\Http\Controllers\Approver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Procure;
use App\Model\Payment;
use Auth;
use DB;
use Session;

class ApprovedPOController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    } 
    
    public function index()
    {
        $procures = Procure::select('group_id', 'request_date', 'requested_by', 'status', 'po_id', 'vendor_id', DB::raw('group_concat(item) as item'))->where('status', 'Approved')->groupBy('group_id', 'request_date', 'requested_by', 'status', 'po_id', 'vendor_id')->orderBy('updated_at','DESC')->get();
        $count = $procures->count();
        $payments = Payment::All();
        $approver = Auth::guard('web')->user();
        return view('approver.approved-po.index', compact('procures', 'count', 'payments', 'approver'));
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
        $procures = Procure::where('group_id', $id)->get();
        $payments = Payment::where('group_id', $id)->first();
        $ids = Procure::where('group_id', '=' , $id)->firstOrFail();
        $comment = Procure::select('comments', 'approver_id')->where('group_id', $id)->groupBy('comments', 'approver_id')->first();
        return view('approver.approved-po.show', compact('procures', 'payments', 'ids', 'comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
       
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
}
