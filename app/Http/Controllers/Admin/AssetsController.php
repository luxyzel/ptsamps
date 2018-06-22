<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use Auth;
use Session;

class AssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::all();
        return view('admin.manage-assets.asset-man',compact('admin', 'assets'));
        /*return view('admin.manage-assets.asset-man')->with('admin', $admin);*/
    }

    public function showCreate()
    {
        $category = Category::All();
        return view('admin.manage-assets.create')->with('category', $category);
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
        'category_type' => 'required',
        'asset_tag' => 'required|unique:assets',
        'service_tag' => 'required|unique:assets',
        'serial_number' => 'required|unique:assets',
        'status' => 'required',
        'remarks' => 'required',
        ]);

        $asset = new Asset();
        $asset->category_type = $request->category_type;
        $asset->asset_tag = $request->asset_tag;
        $asset->service_tag = $request->service_tag;
        $asset->serial_number = $request->serial_number;
        $asset->status = $request->status;
        $asset->remarks = $request->remarks;
        $asset->deployment = $request->deployment;

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
        //
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
        $asset = Asset::findOrFail($id);
        return view('admin.manage-assets.edit',compact('category', 'asset'));
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
        'asset_tag' => 'required|unique:assets,asset_tag,'.$id,
        'service_tag' => 'required|unique:assets,service_tag,'.$id,
        'serial_number' => 'required|unique:assets,serial_number,'.$id,
        'status' => 'required',
        'remarks' => 'required',
        ]);

        $asset = Asset::findOrFail($id);
        $asset->category_type = $request->category_type;
        $asset->asset_tag = $request->asset_tag;
        $asset->service_tag = $request->service_tag;
        $asset->serial_number = $request->serial_number;
        $asset->status = $request->status;
        $asset->remarks = $request->remarks;
        $asset->deployment = $request->deployment;

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
        return view('admin.assets-deployed.deployed',compact('admin', 'assets'));
    }

    //DEPLOYED ASSETS Monitor
    public function DeployedMonitor()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'deployed')->where('category_type', 'Monitor')->get();
        return view('admin.assets-deployed.deployed',compact('admin', 'assets'));
    }

    //DEPLOYED ASSETS System Unit
    public function DeployedUnit()
    {
        $admin = Auth::guard('admin')->user();
        $assets = Asset::where('remarks', 'deployed')->where('category_type', 'System Unit')->get();
        return view('admin.assets-deployed.deployed',compact('admin', 'assets'));
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
        $filter = Asset::where('category_type', $request->category_type)->get();
        $assets = Asset::all();
        return view('admin.assets-tracking.asset-track',compact('admin', 'category', 'assets'));
    }
}
