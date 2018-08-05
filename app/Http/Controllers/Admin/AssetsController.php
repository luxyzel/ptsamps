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
        $assets = Asset::orderBy('category','DESC')->paginate(25);
        return view('admin.manage-assets.asset-man',compact('admin', 'assets'));
    }

    public function getSearch(Request $request)
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
    

    public function showCreate()
    {
        $categories = Category::All();
        $vendors = Vendor::All();
        $conditions = Condition::All();
        $statuses = Status::All();
        $locations = Location::All();
        return view('admin.manage-assets.create', compact('categories', 'vendors', 'conditions', 'statuses', 'locations'));
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

         $this->validateWith([
        'category' => 'required',
        'stmsn' => 'unique:assets,stmsn',
        'asset_tag' => 'unique:assets,asset_tag',
        'asset_number' => 'unique:assets,asset_number',
        'wsno' => 'unique:assets,wsno',
        'st' => 'unique:assets,st',
        'sn' => 'unique:assets,sn',
        'date_delivered' => 'required',
        'warranty_ends' => 'required',
        ]);

        $asset = new Asset();
        $asset->category = $request->category;
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::all();
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
        'category' => 'required',
        'stmsn' => 'unique:assets,stmsn,'.$id,
        'asset_tag' => 'unique:assets,asset_tag,'.$id,
        'asset_number' => 'unique:assets,asset_number,'.$id,
        'wsno' => 'unique:assets,wsno,'.$id,
        'st' => 'unique:assets,st,'.$id,
        'sn' => 'unique:assets,sn,'.$id,
        ]);

        $asset = Asset::findOrFail($id);
        $asset->category = $request->category;
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
        $asset = Asset::where('id',$id)->delete();
        return redirect()->back();
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

    //ASSETS TRACKING
    public function AssetTrackingIndex(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        $category = Category::all();
        $filter = Asset::where('category', $request->category)->get();
        $assets = Asset::all();
        return view('admin.assets-tracking.asset-track',compact('admin', 'category', 'assets'));
    }

    //ASSETS TRACKING Search
    public function getSearchAsset(Request $request)
    {
        $s = $request->get('search');
        $admin = Auth::guard('admin')->user();
        $category = Category::all();

        $assets = Asset::where(function ($query) use($s) 
        {
            $query->where('asset_tag', 'like', '%' . $s . '%')
               ->orWhere('service_tag', 'like', '%' . $s . '%')
               ->orWhere('serial_number', 'like', '%' . $s . '%');
                })
            ->paginate(25);


            if(!$assets->isEmpty()){
                return view('admin.assets-tracking.asset-track',compact('admin', 'category', 'assets'));
            }else{
                Session::flash('warning', 'No record found');
                return view('admin.assets-tracking.asset-track',compact('admin', 'category', 'assets'));
            }
    }


}


    