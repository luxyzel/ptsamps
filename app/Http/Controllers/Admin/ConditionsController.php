<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Condition;
use Auth;


class ConditionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $conditions = Condition::all();
        /*return view('admin.manage-users.manage')->withUsers($users);*/
        return view('admin.manage-conditions.manage',compact('admin', 'conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-conditions.create');

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
        'condition' => 'required|unique:conditions',
        ]);

            //CREATE CONDITION
         $condition = new Condition();
         $condition->condition = $request->condition;

         if ($condition->save()) {
             return redirect()->route('conditions.show', $condition->id);
          } else{
              return redirect()->route('conditions.create');
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
        $condition = Condition::findOrFail($id);
        return view('admin.manage-conditions.show')->withCondition($condition);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $condition = Condition::findOrFail($id);
        return view('admin.manage-conditions.edit')->withCondition($condition);
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
            'condition' => 'required|unique:conditions,condition,'.$id,
        ]);

        $condition = Condition::findOrFail($id);
        $condition->condition = $request->condition;

        if ($condition->save()) {
            return redirect()->route('conditions.show', $id);
        } else{
            return redirect()->route('conditions.edit', $id);
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
        $condition = Condition::where('id',$id)->delete();
        return redirect()->back();
    }

}
