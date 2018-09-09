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
                ->dimensions(1100,260)
                ->responsive(false);

        $Stockchart = Charts::database(Asset::all()->where('status', 'Available'), 'donut', 'fusioncharts')
                ->title('Assets Chart')
                ->elementLabel('Stocks')
                ->colors(['#ffdcaa', '#fe903a'])
                ->groupBy('category_type')
                ->dimensions(500,500)
                ->responsive(false);


        $year = Carbon::now()->year;
        $curMonth = Carbon::now()->month;
        $curMonthName = Carbon::now()->format('F');
        $lastMonth = Carbon::today()->subMonths(1)->month;
        $lastMonthName = Carbon::today()->subMonths(1)->format('F');

        $curCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', $curMonth)->sum('total_price');
        $lastCost = Payment::where('po_id', '!=', '')->whereYear('created_at', $year)->whereMonth('created_at', $lastMonth)->sum('total_price');

        $curCostFormat = number_format($curCost);
        $lastCostFormat = number_format($lastCost);

        $Costchart = Charts::create('area', 'highcharts')
            ->title($year)
            ->elementLabel('Total Cost')
            ->labels([$lastMonthName, $curMonthName])
            ->values([$lastCost, $curCost])
            ->colors(['#8279ff'])
            ->dimensions(500,455)
            ->responsive(false);


        $approver = Auth::guard('web')->user();
        return view('home', compact('POchart', 'Stockchart', 'Costchart', 'curCostFormat', 'approver'));
    }
}
