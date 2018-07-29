<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Peripheral;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Location;
use App\Model\Vendor;
use App\Model\Condition;
use App\Model\Status;
use Auth;
use Session;
use File;
use Excel;

class PerepheralsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $perepherals = Peripheral::orderBy('category','DESC')->paginate(25);
        return view('admin.manage-perepherals.index',compact('admin', 'perepherals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::All();
        $vendor = Vendor::All();
        $condition = Condition::All();
        $status = Status::All();
        return view('admin.manage-perepherals.create', compact('category', 'vendor', 'condition', 'status'));
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
        'stmsn' => 'required|unique:perepherals,stmsn',
        'pdsn' => 'unique:perepherals,pdsn',
        'asset_tag' => 'unique:perepherals,asset_tag',
        'wsno' => 'unique:perepherals,wsno',
        'date_delivered' => 'required',
        'vendor' => 'required',
        ]);

        $perepheral = new Peripheral();
        $perepheral->category = $request->category;
        $perepheral->model = $request->model;
        $perepheral->stmsn = $request->stmsn;
        $perepheral->pdsn = $request->pdsn;
        $perepheral->asset_tag = $request->asset_tag;
        $perepheral->condition = $request->condition;
        $perepheral->status = $request->status;
        $perepheral->vendor = $request->vendor;
        $perepheral->date_delivered = $request->date_delivered;
        $perepheral->warranty_ends = $request->warranty_ends;
        $perepheral->notes = $request->notes;

        if ($perepheral->save()) {
            Session::flash('success', 'Perepheral Successfully Added');
            return redirect()->back();
        } else{
            return redirect()->route('perepheral.create');
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
        $perepheral = Peripheral::findOrFail($id);
        return view('admin.manage-perepherals.show', compact('perepheral'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


        public function getSearch(Request $request)
    {
        $s = $request->get('search');
        $admin = Auth::guard('admin')->user();
        $perepherals = Peripheral::where(function ($query) use($s) 
        {
            $query->where('stmsn', 'like', '%' . $s . '%')
               ->orWhere('pdsn', 'like', '%' . $s . '%')
               ->orWhere('asset_tag', 'like', '%' . $s . '%');
                })
            ->paginate(25);


            if(!$perepherals->isEmpty()){
                return view('admin.manage-perepherals.index',compact('admin', 'perepherals'));
            }else{
                Session::flash('warning', 'No record found');
                return view('admin.manage-perepherals.index',compact('admin', 'perepherals'));
            }

    }
    

    public function edit($id)
    {
        $category = Category::all();
        $brand = Brand::all();
        $location = Location::all();
        $vendor = Vendor::all();
        $condition = Condition::All();
        $status = Status::All();
        $perepheral = Peripheral::findOrFail($id);
        return view('admin.manage-perepherals.edit',compact('category', 'brand', 'location', 'vendor', 'condition', 'status', 'perepheral'));
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
        'stmsn' => 'required|unique:perepherals,stmsn,'.$id,
        'pdsn' => 'unique:perepherals,pdsn,'.$id,
        'asset_tag' => 'unique:perepherals,asset_tag,'.$id,
        'wsno' => 'unique:perepherals,wsno,'.$id,
        'date_delivered' => 'required',
        'vendor' => 'required',
        ]);

        $perepheral = Peripheral::findOrFail($id);
        $perepheral->category = $request->category;
        $perepheral->model = $request->model;
        $perepheral->stmsn = $request->stmsn;
        $perepheral->pdsn = $request->pdsn;
        $perepheral->asset_tag = $request->asset_tag;
        $perepheral->condition = $request->condition;
        $perepheral->status = $request->status;
        $perepheral->vendor = $request->vendor;
        $perepheral->date_delivered = $request->date_delivered;
        $perepheral->warranty_ends = $request->warranty_ends;
        $perepheral->notes = $request->notes;

        if ($perepheral->save()) {
            Session::flash('success', 'Perepheral Successfully Updated');
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
        $DelPer = Peripheral::where('id',$id);
        if ($DelPer->delete()) {
            Session::flash('success', 'Perepheral Successfully Deleted');
            return redirect()->back();
        } else{
            return redirect()->back();
        }
    }

    public function importView()
    {
        return view('admin.manage-perepherals.import');
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
                //PATH OF FILE
                $path = $request->file->getRealPath();

                //COUNT SHEETS
                $sheetsCount=0;
                $reader =Excel::load($path)->get();
                foreach ($reader as $sheet){
                $sheetsCount++;}

                //IF ONE SHEET
                if ($sheetsCount == 1 ){

                    //LOAD AND READ EXCEL    
                    $data = Excel::load($path, function($reader) 
                    {})->get();
                    if(!empty($data) && $data->count())
                    {
                        foreach ($data as $key => $value)
                        {
                            $insert[] = [
                            'category' => array_get($value, 'category'),
                            'model' => array_get($value, 'model'),
                            'stmsn' => array_get($value, 'stmsn'),
                            'pdsn' => array_get($value, 'pdsn'),
                            'asset_tag' => array_get($value, 'asset_tag'),
                            'condition' => NULL,
                            'status' => NULL,
                            'date_delivered' => array_get($value, 'date_delivered'),
                            'warranty_ends' => array_get($value, 'warranty_ends'),
                            'vendor' => array_get($value, 'vendor'),
                            'notes' => array_get($value, 'notes'),
                            'created_at' => now(),
                            'updated_at' => now(),
                            ];

                            $arr[] = ['category' => array_get($row, 'category'),];
                            $categories = array_unique($arr, SORT_REGULAR);
                        }
                    }

                //IF MULTIPLE SHEETS
                }else{
                    foreach ($reader as $sheet){
                        $data = $sheet->getTitle();
                        if ($data == 'Perepherals'){
                            foreach ($sheet as $row){
                                $insert[] = [
                                'category' => array_get($row, 'category'),
                                'model' => array_get($row, 'model'),
                                'stmsn' => array_get($row, 'stmsn'),
                                'pdsn' => array_get($row, 'pdsn'),
                                'asset_tag' => array_get($row, 'asset_tag'),
                                'condition' => NULL,
                                'status' => NULL,
                                'date_delivered' => array_get($row, 'date_delivered'),
                                'warranty_ends' => array_get($row, 'warranty_ends'),
                                'vendor' => array_get($row, 'vendor'),
                                'notes' => array_get($row, 'notes'),
                                'created_at' => now(),
                                'updated_at' => now(),
                                ];

                            $arr[] = ['category' => array_get($row, 'category'), 'type' => 'Peripherals', 'created_at' => date("Y-m-d"), 'updated_at' => date("Y-m-d"),];
                            $categories = array_unique($arr, SORT_REGULAR);

                            }
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
                                Category::where('category',NULL)->delete();
                            }

                            $insertData = Peripheral::insert($insert);
                            Peripheral::where('category',NULL)->delete();
                            if ($insertData) {
                                Session::flash('success', 'Your Data has successfully imported');
                            }else {                        
                                Session::flash('error', 'Error inserting the data..');
                               /* return back();*/
                            }

                        }catch(\Illuminate\Database\QueryException $e) {
                            $errorCode = $e->errorInfo[1];
                            if($errorCode == '1062'){
                            Session::flash('error', 'Duplicate Data.');
                            }
                        }

                    }return $categories;
            }else
            {
                Session::flash('error', ''.$extension.' file is invalid. Please upload a valid xls/csv file..!!');
                return back();
            }
        }
    }

}

