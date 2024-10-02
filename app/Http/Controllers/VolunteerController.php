<?php

namespace App\Http\Controllers;

use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        $volunteers = Volunteer::orderBy('id', 'DESC')->get();
        return view('admin.volunteer.index', compact('volunteers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.volunteer.create');
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
           
            'image'     => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);


        $image = $request->file('image');
        $imageOrignalName  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $volunteer = [
           
            'image'         => $imageName,

        ];

        Volunteer::insert($volunteer);
        $image->move(public_path('/uploads/volunteer'), $imageName);
        return back()->with('success', 'volunteer Created Successfully');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        return view('admin.volunteer.edit', compact('volunteer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        $rules = [
       
            'image'     => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $image->move(public_path('/uploads/volunteer'), $imageName);

        unlink(public_path('/uploads/volunteer/' . $volunteer->image));

        $volunteerData = [
            
            'image'         => $imageName,

        ];
      

        $volunteer->update($volunteerData);

        return back()->with('success', 'volunteer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {

        unlink(public_path('/uploads/volunteer/' . $volunteer->image));
        $volunteer->delete();
        return back()->with('success', 'volunteer Deleted Successfully');
    }
}
