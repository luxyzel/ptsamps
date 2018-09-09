<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Category;
use App\Model\Location;
use App\Model\Status;
use App\Model\Condition;
use Session;
use Auth;

class CategoryController extends Controller
{
        public function __construct()
    {
        $this->middleware('auth:admin');
    }
    
    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $categories = Category::all();
        $locations = Location::all();
        $statuses = Status::all();
        $conditions = Condition::all();
        return view('admin.manage-category.index',compact('admin', 'categories', 'locations', 'statuses', 'conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-category.create');
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
        'category' => 'required|unique:categories',
        'category_type' => 'required|unique:categories',
        'type' => 'required',
        ]);

        $category = new Category();
        $category->category = $request->category;
        $category->category_type = $request->category_type;
        $category->type = $request->type;

        if ($category->save()) {
            Session::flash('success', 'Category Successfully Added');
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
        $category = Category::findOrFail($id);
        return view('admin.manage-category.edit',compact('category'));
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
            'category' => 'required|',
            'category_type' => 'required|unique:categories,category_type,'.$id,
            'type' => 'required|',
        ]);

        $category = Category::findOrFail($id);
        $category->category = $request->category;
        $category->category_type = $request->category_type;
        $category->type = $request->type;

        if ($category->save()) {
             Session::flash('success', 'Category Successfully Updated');
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
        $Delete = Category::where('id',$id);
        if ($Delete->delete()) {
            Session::flash('success', 'Category Successfully Deleted');
            return redirect()->back();
        } else{
            return redirect()->back();
        }
    }
}
