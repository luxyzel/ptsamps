<?php

namespace App\Http\Controllers\Approver;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Procure;
use App\Model\Payment;
use Auth;
use DB;
use Session;


class RejectedPOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procures = Procure::select('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id', DB::raw('group_concat(item) as item'))->where('status', 'Rejected')->groupBy('group_id', 'created_at', 'requested_by', 'status', 'po_id', 'vendor_id', 'po_id')->orderBy('created_at','DESC')->get();
        $count = $procures->count();
        $payments = Payment::All();
        return view('approver.rejected-po.index', compact('procures', 'count', 'payments'));
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
        $comment = Procure::select('comments')->where('group_id', $id)->groupBy('comments')->first();
        return view('approver.rejected-po.show', compact('procures', 'payments', 'ids', 'comment'));
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
}
