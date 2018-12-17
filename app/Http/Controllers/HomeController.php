<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Procure;
use App\Model\Payment;
use App\Model\Asset;
use Carbon\Carbon;
use Charts;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $POchart = Charts::database(Procure::all()->keyBy('group_id'), 'bar', 'highcharts')
                ->title('Purchase Order Chart')
                ->elementLabel('summary')
                ->Width(0)
                ->colors(['#2db580', '#32db92', '#7ff9c6'])
                ->groupBy('status')
                ->dimensions(500,340)
                ->responsive(false);

        $Stockchart = Charts::database(Asset::all()->where('status', 'Available'), 'donut', 'fusioncharts')
                ->title('Assets Chart')
                ->elementLabel('Stocks')
                ->colors(['#ffdcaa', '#fe903a'])
                ->groupBy('category_type')
                ->dimensions(500,360)
                ->responsive(false);


        $year = Carbon::now()->year;
        $curMonth = Carbon::now()->month;
        $curMonthName = Carbon::now()->format('F');
        $lastMonth = Carbon::today()->subMonths(1)->month;
        $lastMonthName = Carbon::today()->subMonths(1)->format('F');

        $curCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', $curMonth)->sum('total_price');
        $lastCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', $lastMonth)->sum('total_price');

        $janCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 1)->sum('total_price');
        $febCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 2)->sum('total_price');
        $marCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 3)->sum('total_price');
        $aprCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 4)->sum('total_price');
        $mayCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 5)->sum('total_price');
        $junCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 6)->sum('total_price');
        $julCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 7)->sum('total_price');
        $augCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 8)->sum('total_price');
        $sepCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 9)->sum('total_price');
        $octCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 10)->sum('total_price');
        $novCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 11)->sum('total_price');
        $decCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', 12)->sum('total_price');

        $curCostFormat = number_format($curCost);
        $lastCostFormat = number_format($lastCost);

        $Costchart = Charts::create('area', 'highcharts')
            ->title($year)
            ->elementLabel('Total Cost')
            // ->labels([$lastMonthName, $curMonthName])
            // ->values([$lastCost, $curCost])
            ->labels(['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'])
            ->values([$janCost, $febCost, $marCost, $aprCost, $mayCost, $junCost, $julCost, $augCost, $sepCost, $octCost, $novCost, $decCost])
            ->colors(['#8279ff'])
            ->dimensions(1100,260)
            ->responsive(false);


        $approver = Auth::guard('web')->user();
        return view('home', compact('POchart', 'Stockchart', 'Costchart', 'curCostFormat', 'approver'));
    }
}
