<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Asset;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Location;
use App\Model\Vendor;
use Excel;
use File;
use Session;

class ImportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:admin');
    }

     //IMPORT ASSET VIEW
    public function importAssetsView()
    {
        return view('admin.manage-assets.import-asset');
    }

   //IMPORT ASSET FUNCTION
    public function import(Request $request)
    {

        $this->validate($request, array(
            'file' => 'required'
        ));
     
        if($request->hasFile('file'))
        {
            $extension = File::extension($request->file->getClientOriginalName());
            if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") 
            {
                $counter=0;
                $path = $request->file->getRealPath();
                $reader =Excel::load($path)->get();

                foreach ($reader as $sheet){
                $counter++;}

                    foreach ($reader as $sheet){
                        $data = $sheet->getTitle();

                        if ($data !== 'Perepherals'){
                            foreach ($sheet as $row){
                                $insert[] = [
                                'category' => array_get($row, 'category'),
                                'model' => array_get($row, 'model'),
                                'st_msn' => array_get($row, 'stmsn'),
                                'pdsn' => array_get($row, 'pdsn'),
                                'asset_tag' => array_get($row, 'asset_tag'),
                                'asset_number' => array_get($row, 'asset_number'),
                                'adapter' => array_get($row, 'adapter'),
                                'location' => array_get($row, 'room'),
                                'ws_no' => array_get($row, 'ws_no'),
                                'st' => array_get($row, 'st'),
                                's_n' => array_get($row, 'sn'),
                                'mouse' => array_get($row, 'mouse'),
                                'keyboard' => array_get($row, 'keyboard'),
                                'code' => array_get($row, 'code'),
                                'description' => array_get($row, 'description'),
                                'condition' => NULL,
                                'status' => NULL,
                                'date_delivered' => array_get($row, 'date_delivered'),
                                'warranty_ends' => array_get($row, 'warranty_ends'),
                                'vendor' => array_get($row, 'vendor'),
                                'notes' => array_get($row, 'notes'),
                                'created_at' => now(),
                                'updated_at' => now(),
                                ];

                                $arrayC[] = ['category' => array_get($row, 'category'),];
                                $categories = array_unique($arrayC, SORT_REGULAR);

                                $arrayB[] = ['model' => array_get($row, 'model'),];
                                $brands = array_unique($arrayB, SORT_REGULAR);

                                $arrayL[] = ['location' => array_get($row, 'room'),];
                                $locations = array_unique($arrayL, SORT_REGULAR);

                                $arrayV[] = ['vendor' => array_get($row, 'vendor'),];
                                $vendors = array_unique($arrayV, SORT_REGULAR);
                            }
                        }
                    }

            
                        if(!empty($insert))
                        {
                        try
                        {
                            /*CATEGORY IMPORT*/
                            $catMatch = Category::where('category', $categories)->first();
                            if (!$catMatch) {
                                $catData = Category::insert($categories);
                            }
                            /*MODEL IMPORT*/
                            $modMatch = Brand::where('model', $brands)->first();
                            if (!$modMatch) {
                                $modData = Brand::insert($brands);
                                Brand::where('model',NULL)->delete();
                            }
                            /*LOCATION IMPORT*/
                            $locMatch = Location::where('location', $locations)->first();
                            if (!$locMatch) {
                                $locData = Location::insert($locations);
                                Location::where('location',NULL)->delete();
                            }
                            /*VENDOR IMPORT*/
                            $venMatch = Vendor::where('vendor', $vendors)->first();
                            if (!$venMatch) {
                                $venData = Vendor::insert($vendors);
                                Vendor::where('vendor',NULL)->delete();
                            }

                            /*ASSET IMPORT*/
                            $insertData = Asset::insert($insert);
                            if ($insertData) {
                                Session::flash('success', 'Data has successfully imported');
                            }else {                        
                                Session::flash('error', 'Error inserting the data..');
                            }

                            }catch(\Illuminate\Database\QueryException $e) {
                                $errorCode = $e->errorInfo[1];
                                if($errorCode == '1062'){
                                Session::flash('error', 'Duplicate Data.');
                                }
                            }
                        }return back();
            }else{
                Session::flash('error', ''.$extension.' file is invalid. Please upload a valid xls/csv file');
                return back();
            }
        }
    }
}
