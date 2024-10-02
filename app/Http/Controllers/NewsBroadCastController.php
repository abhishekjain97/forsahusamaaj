<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\NewsBroadCast;
use Illuminate\Http\Request;

class NewsBroadCastController extends Controller
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
        $mahotsavs = NewsBroadCast::orderBy('id', 'DESC')->get();
        return view('admin.news_broad_cast.index', compact('mahotsavs','states', 'cities'));
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

        return view('admin.news_broad_cast.create', compact('states', 'cities'));
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
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'status' => '1',
        ];

        NewsBroadCast::insert($mahotsav);
        $image->move(public_path('/uploads/news_broad_cast'), $imageName);
        return back()->with('success', 'News Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsBroadCast  $newsbroadcast
     * @return \Illuminate\Http\Response
     */
    public function show(NewsBroadCast $newsbroadcast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsBroadCast  $newsbroadcast
     * @return \Illuminate\Http\Response
     */
    public function edit(NewsBroadCast $newsbroadcast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsBroadCast  $newsbroadcast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NewsBroadCast $newsbroadcast)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
			'status' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/news_broad_cast'), $imageName);

            unlink(public_path('/uploads/news_broad_cast/' . $newsbroadcast->image));

            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
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
                'description' => $request->description,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'status' => $request->status,
            ];
        }

        $newsbroadcast->update($mahotsavData);

        return back()->with('success', 'News Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsBroadCast  $newsbroadcast
     * @return \Illuminate\Http\Response
     */
    public function destroy(NewsBroadCast $newsbroadcast)
    {
        unlink(public_path('/uploads/news_broad_cast/' . $newsbroadcast->image));
        $newsbroadcast->delete();
        return back()->with('success', 'News Deleted Successfully');
    }
}
