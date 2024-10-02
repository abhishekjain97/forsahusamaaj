<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // print_r($events);
        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'          => 'required',
            'image'         => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'address'       => 'required',
			'from_date'       => 'required',
			'to_date'       => 'required',
            'description'   => 'required',
        ];

        $this->validate($request, $rules);

        $end_date = Carbon::createFromFormat('Y-m-d', $request->to_date);

        $event_logo = $request->file('image');
        $imageOrignalName  = strtolower(trim($event_logo->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $data = [

            'name'          => $request->name,
            'image'         => $imageName,
            'address'       => $request->address,
			'from_date'       => $request->from_date,
			'to_date'       => $request->to_date,
			'expire_date'       => $end_date->addMonth(1),
            'description'   => $request->description,
        ];


        Event::insert($data);
        $event_logo->move(public_path('/uploads/events/'), $imageName);
        return back()->with("success", "Your Event Submited Successfuly");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $rules = [
            'name'          => 'required',
            'image'         => 'image|mimes:jpeg,png,jpg|max:2048',
            'address'       => 'required',
			'from_date'       => 'required',
			'to_date'       => 'required',
            'description'   => 'required',
        ];

        $this->validate($request, $rules);

        $end_date = Carbon::createFromFormat('Y-m-d', $request->to_date);
   

        if ($request->file('image') != null) {

            $files = $request->file('image');
            $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageExtension;
            $files->move(public_path('/uploads/events'), $imageName);

            unlink(public_path('/uploads/events/' . $event->image));

            $data = [
                'name'          => $request->name,
                'image'         => $imageName,
                'address'       => $request->address,
				'from_date'     => $request->from_date,
				'to_date'       => $request->to_date,
                'expire_date'       => $end_date->addMonth(1),
                'description'   => $request->description,
            ];
        } else {
            $data = [
                'name'          => $request->name,
                'address'       => $request->address,
				'from_date'     => $request->from_date,
				'to_date'       => $request->to_date,
                'expire_date'       => $end_date->addMonth(1),
                'description'   => $request->description,
            ];
        }
        $event->update($data);
        return back()->with('success', 'Event Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        unlink(public_path('/uploads/events/' . $event->image));
        return back()->with('success', 'Event Deleted');
    }

    
    
}
