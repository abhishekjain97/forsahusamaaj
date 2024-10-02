<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\HamareGaurav;
use Illuminate\Http\Request;

class HamaregauravController extends Controller
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
        $mahotsavs = HamareGaurav::orderBy('id', 'DESC')->get();
        return view('admin.hamare_gaurav.index', compact('mahotsavs','states', 'cities'));
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

        return view('admin.hamare_gaurav.create', compact('states', 'cities'));
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
            'title' => 'required|string',
            'date' => 'required|string',
			'tagline' => 'required|string',
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
            'title' => $request->title,
            'date' => $request->date,
			'tagline' => $request->tagline,
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'status' => '1',
        ];

        HamareGaurav::insert($mahotsav);
        $image->move(public_path('/uploads/hamare_gaurav'), $imageName);
        return back()->with('success', 'Hamare gaurav Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HamareGaurav  $hamaregaurav
     * @return \Illuminate\Http\Response
     */
    public function show(HamareGaurav $hamaregaurav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HamareGaurav  $hamaregaurav
     * @return \Illuminate\Http\Response
     */
    public function edit(HamareGaurav $hamaregaurav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HamareGaurav  $hamaregaurav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HamareGaurav $hamaregaurav)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
			'tagline' => 'required|string',
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

            $image->move(public_path('/uploads/hamare_gaurav'), $imageName);

            unlink(public_path('/uploads/hamare_gaurav/' . $hamaregaurav->image));

            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
				'tagline' => $request->tagline,
                'description' => $request->description,
                'image' => $imageName,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'status' => $request->status,
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
				'tagline' => $request->tagline,
                'description' => $request->description,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'status' => $request->status,
            ];
        }

        $hamaregaurav->update($mahotsavData);

        return back()->with('success', 'Hamare gaurav Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HamareGaurav  $hamaregaurav
     * @return \Illuminate\Http\Response
     */
    public function destroy(HamareGaurav $hamaregaurav)
    {
        unlink(public_path('/uploads/hamare_gaurav/' . $hamaregaurav->image));
        $hamaregaurav->delete();
        return back()->with('success', 'Hamare gaurav Deleted Successfully');
    }
}
