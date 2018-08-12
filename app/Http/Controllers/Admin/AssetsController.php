<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Location;
use App\Model\Vendor;
use App\Model\Condition;
use App\Model\Status;
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
        $assets = Asset::orderBy('category_type','DESC')->paginate(25);
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

         $this->validateWith([
        'category_type' => 'required',
        ]);

        $asset = new Asset();
        $asset->category_type = $request->category_type;
        $asset->model = $request->model;
        $asset->st_msn = $request->stmsn;
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
        $asset->vendor = $request->vendor;
        $asset->notes = $request->notes;

        if ($asset->save()) {
            Session::flash('success', 'Asset Successfully Added');
            return redirect()->back();
        } else{
            return redirect()->route('create.assets');
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
        $vendor = Vendor::all();
        $condition = Condition::All();
        $status = Status::All();
        $asset = Asset::findOrFail($id);
        return view('admin.manage-assets.edit',compact('category', 'brand', 'location', 'vendor', 'condition', 'status', 'asset'));
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
        'stmsn' => 'unique:assets,stmsn,'.$id,
        'asset_tag' => 'unique:assets,asset_tag,'.$id,
        'asset_number' => 'unique:assets,asset_number,'.$id,
        'wsno' => 'unique:assets,wsno,'.$id,
        'st' => 'unique:assets,st,'.$id,
        'sn' => 'unique:assets,sn,'.$id,
        ]);

        $asset = Asset::findOrFail($id);
        $asset->category_type = $request->category_type;
        $asset->model = $request->model;
        $asset->st_msn = $request->stmsn;
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
        $asset->vendor = $request->vendor;
        $asset->notes = $request->notes;

        if ($asset->save()) {
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
            Session::flash('success', 'Asset Successfully Archived');
            return redirect()->back();
        } else{
            return redirect()->back();
        }
    }

    //DEPLOYED ASSETS INDEX
    public function DeployedIndex()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'deployed')->get();
        $count = Asset::where('remarks', 'deployed')->count();
        return view('admin.assets-deployed.deployed',compact('admin', 'assets', 'count'));
    }

    //DEPLOYED ASSETS Monitor
    public function DeployedMonitor()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'deployed')->where('category_type', 'Monitor')->get();
        $count = Asset::where('remarks', 'deployed')->where('category_type', 'Monitor')->count();
        return view('admin.assets-deployed.deployed',compact('admin', 'assets', 'count'));
    }

    //DEPLOYED ASSETS System Unit
    public function DeployedUnit()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'deployed')->where('category_type', 'System Unit')->get();
        $count = Asset::where('remarks', 'deployed')->where('category_type', 'System Unit')->count();
        return view('admin.assets-deployed.deployed',compact('admin', 'assets', 'count'));
    }

    //STOCK ASSETS INDEX
    public function StocksIndex()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'available')->get();
        return view('admin.assets-stock.stocks',compact('admin', 'assets'));
    }



}


    