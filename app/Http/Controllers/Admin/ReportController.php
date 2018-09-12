<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Procure;
use App\Model\Asset;
use App\Model\Event;
use Carbon\Carbon;
use DB;
use PDF;

class ReportController extends Controller
{
	/**** MONTHLY REPORT ***/
	public function MonthlyReportPdf(Request $request)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;

        $MonthlyReports = Payment::select('po_id', 'total_price')
            ->where('po_id', '!=', '')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('po_id', 'total_price')
            ->get();

        $totalCost = Payment::select(DB::raw('sum(total_price) as total'), DB::raw("DATE_FORMAT(created_at,'%M') as months"))
            ->where('po_id', '!=', '')
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->groupBy('months')
            ->first();
        
        view()->share('MonthlyReports', $MonthlyReports);
        view()->share('totalCost', $totalCost);
        
        $pdf = PDF::loadView('admin.reports.monthly');
        return $pdf->download('admin.reports.monthly.pdf');
    }

    /**** AVAILABLE ASSET REPORT ***/
	 public function AssetsReportPdf(Request $request)
    {
        $AssetReports = Asset::select('category_type', \DB::raw('count(*) as count', 'status'))->where('status', 'Available')->groupBy('category_type')->orderby('count',  'DESC')->get();
        
        view()->share('AssetReports', $AssetReports);
        
        $pdf = PDF::loadView('admin.reports.assets');
        return $pdf->download('admin.reports.assets.pdf');
    }


    /**** APPROVED PO REPORT ***/
    public function ApprovedPOReportPdf(Request $request)
    {
    	$ApprovedPOReports = Procure::select('po_id', 'request_date', 'requestor_id', 'approver_id', 'date', DB::raw('group_concat(item) as item'))->where('status', 'Approved')->groupBy('po_id', 'date', 'request_date', 'requestor_id', 'approver_id')->orderBy('created_at','DESC')->get();

        view()->share('ApprovedPOReports', $ApprovedPOReports);
        
        $pdf = PDF::loadView('admin.reports.POapproved');
        return $pdf->download('admin.reports.POapproved.pdf');
    }

    /**** REJECTED PO REPORT ***/
    public function RejectedPOReportPdf(Request $request)
    {
    	$RejectedPOReports = Procure::select('group_id', 'request_date', 'requestor_id', 'approver_id', 'date', DB::raw('group_concat(item) as item'))->where('status', 'Rejected')->groupBy('group_id', 'date', 'request_date', 'requestor_id', 'approver_id')->orderBy('created_at','DESC')->get();

        view()->share('RejectedPOReports', $RejectedPOReports);
        
        $pdf = PDF::loadView('admin.reports.POrejected');
        return $pdf->download('admin.reports.POrejected.pdf');
    }

    /**** PENDING PO REPORT ***/
    public function PendingPOReportPdf(Request $request)
    {
    	$PendingPOReports = Procure::select('group_id', 'request_date', 'requestor_id', 'date', DB::raw('group_concat(item) as item'))->where('status', 'Pending')->groupBy('group_id', 'date', 'request_date', 'requestor_id')->orderBy('created_at','DESC')->get();

        view()->share('PendingPOReports', $PendingPOReports);
        
        $pdf = PDF::loadView('admin.reports.POpending');
        return $pdf->download('admin.reports.POpending.pdf');
    }

    /**** DELIVERIES REPORT ***/
    public function DeliveryReportPdf(Request $request)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $DeliveryReports = Event::whereYear('start_date', $year)
            ->whereMonth('start_date', $month)
            ->get();


        view()->share('DeliveryReports', $DeliveryReports);
        
        $pdf = PDF::loadView('admin.reports.delivery');
        return $pdf->download('admin.reports.delivery.pdf');
    }
}
