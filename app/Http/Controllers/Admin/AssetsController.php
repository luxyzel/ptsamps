<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Location;
use App\Model\Vendor;
use App\Model\Condition;
use App\Model\Status;
use App\Model\Log;
use Auth;
use Session;

class AssetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::orderBy('category_type','ASC')->paginate(25);
        return view('admin.manage-assets.asset-man',compact('admin', 'assets'));
    }
    

    public function showCreate()
    {
        $categories = Category::Where('type', 'Assets')->get();
        $vendors = Vendor::All();
        $conditions = Condition::All();
        $statuses = Status::All();
        $locations = Location::All();
        return view('admin.manage-assets.create', compact('categories', 'vendors', 'conditions', 'statuses', 'locations'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $ignore = 'N/A';
        $this->validateWith([
        'category_type' => 'required',
        'st_msn' => Rule::unique('assets')->where(function ($query) {
                return $query->where('st_msn', '!=' ,'N/A');
             }),
        'pdsn' => Rule::unique('assets')->where(function ($query) {
                return $query->where('pdsn', '!=' ,'N/A');
             }),
        'asset_tag' => Rule::unique('assets')->where(function ($query) {
                return $query->where('asset_tag', '!=' ,'N/A');
             }),
        'asset_number' => Rule::unique('assets')->where(function ($query) {
                return $query->where('asset_number', '!=' ,'N/A');
             }),
        'adapter' => Rule::unique('assets')->where(function ($query) {
                return $query->where('adapter', '!=' ,'N/A');
             }),
        'st' => Rule::unique('assets')->where(function ($query) {
                return $query->where('st', '!=' ,'N/A');
             }),
        's_n' => Rule::unique('assets')->where(function ($query) {
                return $query->where('s_n', '!=' ,'N/A');
             }),
        ]);

        $asset = new Asset();
        $asset->category_type = $request->category_type;
        $asset->model = $request->model;
        $asset->st_msn = $request->st_msn;
        $asset->pdsn = $request->pdsn;
        $asset->asset_tag = $request->asset_tag;
        $asset->asset_number = $request->asset_number;
        $asset->adapter = $request->adapter;
        $asset->location = $request->location;
        $asset->ws_no = $request->wsno;
        $asset->st = $request->st;
        $asset->s_n = $request->s_n;
        $asset->mouse = $request->mouse;
        $asset->keyboard = $request->keyboard;
        $asset->code = $request->code;
        $asset->description = $request->description;
        $asset->condition = $request->condition;
        $asset->status = $request->status;
        $asset->date_delivered = $request->date_delivered;
        $asset->warranty_ends = $request->warranty_ends;
        $asset->vendor = $request->vendor;
        $asset->notes = $request->notes;

        if ($asset->save()) {
            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Create';
            $eventLogs->description = 'Created asset data';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Asset Successfully Added');
            return redirect()->back();
        } else{
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
        $asset = Asset::findOrFail($id);
        return view('admin.manage-assets.show', compact('asset'));
    }

        public function AssetstrackShow($id)
    {
        $asset = Asset::findOrFail($id);
        return view('admin.assets-tracking.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::Where('type', 'Assets')->get();
        $brand = Brand::all();
        $location = Location::all();
        $vendors = Vendor::all();
        $condition = Condition::All();
        $status = Status::All();
        $asset = Asset::findOrFail($id);
        return view('admin.manage-assets.edit',compact('category', 'brand', 'location', 'vendors', 'condition', 'status', 'asset'));
        /*return view('admin.manage-assets.edit')->withUser($asset);*/
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
        $this->validateWith([
        'category_type' => 'required',
        'st_msn' => 'unique:assets,st_msn,'.$id,
        'asset_tag' => 'unique:assets,asset_tag,'.$id,
        'asset_number' => 'unique:assets,asset_number,'.$id,
        'ws_no' => 'unique:assets,ws_no,'.$id,
        'st' => 'unique:assets,st,'.$id,
        's_n' => 'unique:assets,s_n,'.$id,
        ]);

        $asset = Asset::findOrFail($id);
        $asset->category_type = $request->category_type;
        $asset->model = $request->model;
        $asset->st_msn = $request->st_msn;
        $asset->pdsn = $request->pdsn;
        $asset->asset_tag = $request->asset_tag;
        $asset->asset_number = $request->asset_number;
        $asset->adapter = $request->adapter;
        $asset->location = $request->location;
        $asset->ws_no = $request->ws_no;
        $asset->st = $request->st;
        $asset->s_n = $request->s_n;
        $asset->mouse = $request->mouse;
        $asset->keyboard = $request->keyboard;
        $asset->code = $request->code;
        $asset->description = $request->description;
        $asset->condition = $request->condition;
        $asset->status = $request->status;
        $asset->date_delivered = $request->date_delivered;
        $asset->warranty_ends = $request->warranty_ends;
        $asset->vendor = $request->vendor;
        $asset->notes = $request->notes;

        if ($asset->save()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Update';
            $eventLogs->description = 'Updated asset data';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Asset Successfully Updated');
            return redirect()->back();
        } else{
            return redirect()->back();
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
        $asset = Asset::where('id',$id);
        if ($asset->delete()) {

            /*** CREATE EVENT LOG ***/
            $eventLogs = new Log();
            $eventLogs->action = 'Archive';
            $eventLogs->description = 'Archived asset data';
            $eventLogs->user = Auth::guard('admin')->user()->name;
            $eventLogs->save();

            Session::flash('success', 'Asset Successfully Archived');
            return redirect()->back();

        } else{
            return redirect()->back();
        }
    }


    //STOCK ASSETS INDEX
    public function StocksIndex()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('status', 'Available')->paginate(25);
        return view('admin.assets-stock.stocks',compact('admin', 'assets'));
    }

     /*** FILTER ***/
    public function StockFilter(Request $request)
    {
        if ($request->categorytype !== 'All'){
            $assets = Asset::where('status', 'Deployed')->where('category_type', $request->categorytype)->paginate(25);
            $count = Asset::where('status', 'Deployed')->where('category_type', $request->categorytype)->count();

        }else{
            $assets = Asset::where('status', 'Deployed')->paginate(25);
            $count = Asset::where('status', 'Deployed')->count();
        }

        $admin = Auth::guard('admin')->user();
        $category = Category::select('category_type')->where('type', 'Assets')->groupBy('category_type')->get();
        return view('admin.assets-deployed.deployed',compact('admin', 'category', 'assets', 'count'));
    }



      public function Search(Request $request)
    {
        $s = $request->get('search');
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where(function ($query) use($s) 
        {
            $query->where('st_msn', 'like', '%' . $s . '%')
               ->orWhere('pdsn', 'like', '%' . $s . '%')
               ->orWhere('asset_tag', 'like', '%' . $s . '%')
               ->orWhere('asset_number', 'like', '%' . $s . '%');
                })
            ->paginate(25);


            if(!$assets->isEmpty()){
                return view('admin.manage-assets.asset-man',compact('admin', 'assets'));
            }else{
                Session::flash('warning', 'No record found');
                return view('admin.manage-assets.asset-man',compact('admin', 'assets'));
            }

    }
    


}


    