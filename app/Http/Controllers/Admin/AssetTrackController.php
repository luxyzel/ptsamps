<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use DB;
use Auth;

class AssetTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $admin = Auth::guard('admin')->user();
        $category = Category::select('category')->groupBy('category')->get();
        $assets =Asset::orderBy('category_type','ASC')->paginate(25);
        return view('admin.assets-tracking.asset-track',compact('admin', 'category', 'assets'));
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

        //DEPLOYED ASSETS Monitor
    public function TrackAsset(Request $request)
    {
        if ($request->categories !== 'All'){
            $assets = DB::table('assets')->leftJoin('categories', 'assets.category_type', '=', 'categories.category_type')
                   ->select('assets.*')
                   ->where('categories.category', $request->categories)
                   ->paginate(25);

        }else{
            $assets = Asset::orderBy('category_type','ASC')->paginate(25);
        }

        $admin = Auth::guard('admin')->user();
        $category = Category::select('category')->groupBy('category')->get();
        return view('admin.assets-tracking.asset-track', compact('admin', 'category', 'assets'));
    }
}
