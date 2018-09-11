<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Payment;
use App\Model\Procure;
use App\Model\Asset;
use DB;
use PDF;

class ReportController extends Controller
{
	 public function AssetsReportPdf(Request $request)
    {

        $AssetReports = Asset::select('category_type', \DB::raw('count(*) as count', 'status'))->where('status', 'Available')->groupBy('category_type')->orderby('count',  'DESC')->get();
        
        view()->share('AssetReports', $AssetReports);
        
        $pdf = PDF::loadView('admin.reports.assets');
        return $pdf->download('admin.reports.assets.pdf');
    }

    public function POReportPdf(Request $request)
    {
    	// $POReports = Procure::all()->keyBy('group_id')->where('status', 'Approved')->groupBy('status')->get();

    	$POReports = Procure::select('po_id', 'request_date', 'requestor_id', 'approver_id', 'date', DB::raw('group_concat(item) as item'))->where('status', 'Approved')->groupBy('po_id', 'date', 'request_date', 'requestor_id', 'approver_id')->orderBy('created_at','DESC')->get();

        view()->share('POReports', $POReports);
        
        $pdf = PDF::loadView('admin.reports.po');
        return $pdf->download('admin.reports.po.pdf');
        
    }
}
