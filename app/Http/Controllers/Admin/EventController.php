<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use MaddHatter\LaravelFullcalendar\Facades\Calendar;
use Auth;
use Validator;
use App\Model\Event; 
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        $admin = Auth::guard('admin')->user();
        return view('admin.manage-event.manage',compact('events', 'admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.manage-event.create');
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
        'title' => 'required',
        'start_date' => 'required',
        'end_date'  => 'required',
        ]);

        $event= new Event();
        $event->title=$request->get('title');
        $event->start_date=$request->get('start_date');
        $event->end_date=$request->get('end_date');

        // $event->save();
        // return redirect('event')->with('success', 'Event has been added');

        if ($event->save()) {
             return redirect()->route('event.show', $event->id);
          } else{
              return redirect()->route('event.create');
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
        $event = Event::findOrFail($id);
        return view('admin.manage-event.show')->withEvent($event);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('admin.manage-event.edit')->withevent($event);
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
            'title' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $event = Event::findOrFail($id);
        $event->title = $request->title;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        if ($event->save()) {
            return redirect()->route('event.show', $id);
        } else{
            return redirect()->route('event.edit', $id);
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
        $event = Event::where('id',$id)->delete();
        return redirect()->back();
    }

    public function calendar()
    {
        $events = [];
        $data = Event::all();
        if($data->count())
         {
            foreach ($data as $key => $value) 
            {
                $events[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->start_date),
                    new \DateTime($value->end_date.'+1 day'),
                    null,
                    // Add color
                 [
                     'color' => '#007399',
                     'textColor' => '#ffffff',
                 ]
                );
            }
        }
        $admin = Auth::guard('admin')->user();
        $calendar = Calendar::addEvents($events);
        return view('admin.manage-event.calendar', compact('calendar', 'admin'));
    }
}
