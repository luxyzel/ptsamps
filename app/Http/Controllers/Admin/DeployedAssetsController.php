<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use Auth;
use Session;

class DeployedAssetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $category = Category::select('category_type')->where('type', 'Assets')->groupBy('category_type')->get();
        $assets = Asset::where('status', 'Deployed')->paginate(25);
        $count = Asset::where('status', 'Deployed')->count();
        return view('admin.assets-deployed.deployed',compact('admin', 'category', 'assets', 'count'));
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
        $asset = Asset::findOrFail($id);
        return view('admin.assets-deployed.show', compact('asset'));
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

    /*** FILTER ***/
    public function DeployedAsset(Request $request)
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

    /*** SEARCH ***/
    public function Search(Request $request)
    {
        $s = $request->get('search');
        $admin = Auth::guard('admin')->user();
        $category = Category::select('category_type')->where('type', 'Assets')->groupBy('category_type')->get();
        $assets = Asset::where('status', 'Deployed')->where(function ($query) use($s) 
        {
            $query->Where('st_msn', 'like', '%' . $s . '%')
                ->orWhere('pdsn', 'like', '%' . $s . '%')
                ->orWhere('asset_tag', 'like', '%' . $s . '%')
                ->orWhere('asset_number', 'like', '%' . $s . '%');
                })
                ->paginate(25);

        $count = $assets->count();


        if(!$assets->isEmpty()){
            return view('admin.assets-deployed.deployed',compact('admin', 'assets', 'category', 'count'));
        }else{
            Session::flash('warning', 'No record found');
            return view('admin.assets-deployed.deployed',compact('admin', 'assets', 'category', 'count'));
        }

    }
    
}
