<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Location;
Use Auth;
use Session;

class LocationsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admin = Auth::guard('admin')->user();
        $locations = Location::all();
        /*return view('admin.manage-users.manage')->withUsers($users);*/
        return view('admin.manage-locations.manage',compact('admin', 'locations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-locations.create');
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
        'location' => 'required|unique:locations',
        ]);

            //CREATE LOCATION
         $location = new Location();
         $location->location = $request->location;

         if ($location->save()) {
             return redirect()->route('locations.show', $location->id);
          } else{
              return redirect()->route('locations.create');
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
        $location = Location::findOrFail($id);
        return view('admin.manage-locations.show')->withLocation($location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.manage-locations.edit')->withLocation($location);
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
            'location' => 'required|unique:locations,location,'.$id,
        ]);

        $location = Location::findOrFail($id);
        $location->location = $request->location;

        if ($location->save()) {
            return redirect()->route('locations.show', $id);
        } else{
            return redirect()->route('locations.edit', $id);
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
        $location = Location::where('id',$id)->delete();
        return redirect()->back();
    }
}
