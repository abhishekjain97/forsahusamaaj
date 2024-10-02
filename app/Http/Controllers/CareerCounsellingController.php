<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\CareerCounselling;
use Illuminate\Http\Request;

class CareerCounsellingController extends Controller
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
        $mahotsavs = CareerCounselling::orderBy('id', 'DESC')->get();
        return view('admin.career_counselling.index', compact('mahotsavs','states', 'cities'));
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

        return view('admin.career_counselling.create', compact('states', 'cities'));
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
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'vanue' => 'required',
            
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
            'vanue' => $request->vanue,
			'status' => '1',
        ];

        CareerCounselling::insert($mahotsav);
        $image->move(public_path('/uploads/career_counselling'), $imageName);
        return back()->with('success', 'News Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CareerCounselling  $careercounselling
     * @return \Illuminate\Http\Response
     */
    public function show(CareerCounselling $careercounselling)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CareerCounselling  $careercounselling
     * @return \Illuminate\Http\Response
     */
    public function edit(CareerCounselling $careercounselling)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsBroadCast  $careercounselling
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CareerCounselling $careercounselling)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'vanue' => 'required',
			'status' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/career_counselling'), $imageName);

            unlink(public_path('/uploads/career_counselling/' . $careercounselling->image));

            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imageName,
                'vanue' => $request->vanue,
				'status' => $request->status,
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'vanue' => $request->vanue,
				'status' => $request->status,
            ];
        }

        $careercounselling->update($mahotsavData);

        return back()->with('success', 'News Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CareerCounselling  $careercounselling
     * @return \Illuminate\Http\Response
     */
    public function destroy(CareerCounselling $careercounselling)
    {
        unlink(public_path('/uploads/career_counselling/' . $careercounselling->image));
        $careercounselling->delete();
        return back()->with('success', 'News Deleted Successfully');
    }
}
