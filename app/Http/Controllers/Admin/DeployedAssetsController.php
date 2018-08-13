<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use Auth;

class DeployedAssetsController extends Controller
{
    //DEPLOYED ASSETS INDEX
    public function Index()
    {
        $admin = Auth::guard('admin')->user();
        $category = Category::select('category_type')->groupBy('category_type')->get();
        $assets = Asset::where('status', 'Deployed')->get();
        $count = Asset::where('status', 'Deployed')->count();
        return view('admin.assets-deployed.deployed',compact('admin', 'category', 'assets', 'count'));
    }

    //DEPLOYED ASSETS Monitor
    public function DeployedAsset(Request $request)
    {
    	if ($request->categorytype !== 'All'){
    		$assets = Asset::where('status', 'Deployed')->where('category_type', $request->categorytype)->get();
    		$count = Asset::where('status', 'Deployed')->where('category_type', $request->categorytype)->count();

    	}else{
    		$assets = Asset::where('status', 'Deployed')->get();
    		$count = Asset::where('status', 'Deployed')->count();
    	}

        $admin = Auth::guard('admin')->user();
        $category = Category::select('category_type')->groupBy('category_type')->get();
        return view('admin.assets-deployed.deployed',compact('admin', 'category', 'assets', 'count'));
    }
}
