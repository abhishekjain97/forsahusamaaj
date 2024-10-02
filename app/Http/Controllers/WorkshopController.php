<?php

namespace App\Http\Controllers;

use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workshops = Workshop::orderBy('id', 'DESC')->get();
        return view('admin.workshop.index', compact('workshops'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.workshop.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'workshop_name' => 'required',
            'workshop_type' => 'required',
            'workshop_venue' => 'required',
            'date' => 'required',
            'donation' => 'required',
         
            'description' => 'required',
        ];
        $workshop = [
            'workshop_name' => $request->workshop_name,
            'workshop_type' => $request->workshop_type,
            'workshop_venue' => $request->workshop_venue,
            
            'date' => $request->date,
            'description' => $request->description,
        ];
        Workshop::insert($workshop);
        return back()->with('success', 'Your workshop is submitted');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function show(Workshop $workshop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Workshop $workshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Workshop $workshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Workshop  $workshop
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Workshop::where('id', $id)->delete();
        return back()->with('success', 'Workshops Deleted successfully');
    }
}
