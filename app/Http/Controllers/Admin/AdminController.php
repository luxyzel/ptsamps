<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Admin;
use App\User;
use App\Model\Log;
use App\Model\Notif;
use App\Model\Procure;
use App\Model\Payment;
use App\Model\Asset;
use Carbon\Carbon;
use Session;
use Hash;
use Charts;
use DB;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $POchart = Charts::database(Procure::all()->keyBy('group_id'), 'bar', 'google')
                ->title('Purchase Order Chart')
                ->elementLabel('summary')
                ->Width(0)
                ->colors(['#2db580', '#32db92', '#7ff9c6'])
                ->groupBy('status')
                ->responsive(true);

        $Stockchart = Charts::database(Asset::all()->where('status', 'Available'), 'donut', 'highcharts')
                ->title('Assets Chart')
                ->elementLabel('Stocks')
                ->colors(['#ffdcaa', '#fe903a'])
                ->dimensions(1000,500)
                ->groupBy('category_type')
                ->responsive(true);


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
            ->dimensions(1000,500)
            ->responsive(true);

        $admin = Auth::guard('admin')->user();
        $notifs = Notif::sum('count');
        return view('admin.dashboard', compact('admin', 'notifs', 'POchart', 'Costchart', 'curCostFormat', 'Stockchart'));
    }

    public function accountInfo()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.acc-settings')->with('admin', $admin);
    }

    public function updateInfo(request $request)
    {
        //NOT CHANGING PASSWORD
        if(empty($request->currentpass) && empty($request->password)) {
            
            $id = Auth::guard('admin')->user()->id;

            $this->validateWith([
            'username' => 'required|unique:admins,username,'.$id,
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            ]);

            $admin = Admin::findOrFail($id);
            $usermatch = Admin::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                $admin->username = $request->username;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->save();

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Update';
                $eventLogs->description = 'Updated account info';
                $eventLogs->user = Auth::guard('admin')->user()->name;
                $eventLogs->save();

                Session::flash('success', 'Update Changed Successfully');
                return redirect()->back();


        //WILL CHANGE PASSWORD
        }else{
            
            $id = Auth::guard('admin')->user()->id;

            $this->validateWith([
            'username' => 'required|unique:admins,username,'.$id,
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'currentpass' => 'required|max:255',
            'password' => 'required|confirmed|min:8',
            ]);

            $admin = Admin::findOrFail($id);
            $curpass = $request->currentpass;

            $usermatch = Admin::where('id', $id)->first();
            if (!$usermatch) {
                Session::flash('warning', 'Error Encountered');
                return redirect()->back();
            }
                if(Hash::check($curpass, $admin->password)) {

                $admin->username = $request->username;
                $admin->name = $request->name;
                $admin->email = $request->email;
                $admin->password = bcrypt($request->password);
                $admin->save();

                /*** CREATE EVENT LOG ***/
                $eventLogs = new Log();
                $eventLogs->action = 'Update';
                $eventLogs->description = 'Updated account password';
                $eventLogs->user = Auth::guard('admin')->user()->name;
                $eventLogs->save();

                Session::flash('success', 'Password Changed Successfully');
                return redirect()->back();

            } else {
                Session::flash('warning', 'Current Password Did Not Match!');
                return redirect()->back();
            }
        }
    }

    //ADMIN CREATE

    public function create()
    {
        return view('admin.manage-admins.create');
    }

    public function store(Request $request)
    {
        $this->validateWith([
            'username' => 'required|unique:admins|max:64',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|confirmed|min:8',
        ]);

        $adminnew = new Admin();
        $adminnew->username = $request->username;
        $adminnew->name = $request->name;
        $adminnew->email = $request->email;
        $adminnew->password = bcrypt($request->password);

        if ($adminnew->save()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Create';
            $eventLogs->description = 'Created new admin account';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'New Admin Created Successfully');
            return redirect()->back();
        } else{
            return redirect()->route('admin.create');
        }
    }

}