<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\FamousPersonList;
use Illuminate\Http\Request;

class FamousPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::get();
        $cities = Citie::get();
        $mahotsavs = FamousPersonList::with('state')->with('city')->orderBy('id', 'DESC')->get();
        return view('admin.famous_person.index', compact('mahotsavs','states', 'cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::get();
        $cities = Citie::get();

        return view('admin.famous_person.create', compact('states', 'cities'));
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
            'name' => 'required|string',
			'tagline' => 'required|string',
            'dob' => 'required|string',
            'death_date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $mahotsav = [
            'name' => $request->name,
			'tagline' => $request->tagline,
            'dob' => $request->dob,
            'death_date' => $request->death_date,
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
        ];

        FamousPersonList::insert($mahotsav);
        $image->move(public_path('/uploads/famous_person'), $imageName);
        return back()->with('success', 'famous person Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FamousPersonList  $famousperson
     * @return \Illuminate\Http\Response
     */
    public function show(FamousPersonList $famouspersonlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FamousPersonList  $famouspersonlist
     * @return \Illuminate\Http\Response
     */
    public function edit(FamousPersonList $famouspersonlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FamousPersonList  $famouspersonlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FamousPersonList $famouspersonlist)
    {
        $rules = [
            'name' => 'required|string',
			'tagline' => 'required|string',
            'dob' => 'required|string',
            'death_date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/famous_person'), $imageName);

            unlink(public_path('/uploads/famous_person/' . $famouspersonlist->image));

            $mahotsavData = [
                'name' => $request->name,
				'tagline' => $request->tagline,
                'dob' => $request->dob,
                'death_date' => $request->death_date,
                'description' => $request->description,
                'image' => $imageName,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
            ];
        } else {
            $mahotsavData = [
                'name' => $request->name,
				'tagline' => $request->tagline,
                'dob' => $request->dob,
                'death_date' => $request->death_date,
                'description' => $request->description,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
            ];
        }

        $famouspersonlist->update($mahotsavData);
        return back()->with('success', 'famous person Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FamousPersonList  $famouspersonlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(FamousPersonList $famouspersonlist)
    {
        unlink(public_path('/uploads/famous_person/' . $famouspersonlist->image));
        $famouspersonlist->delete();
        return back()->with('success', 'famous person Deleted Successfully');
    }
}
