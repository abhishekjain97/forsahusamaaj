<?php

namespace App\Http\Controllers;

use App\Models\Mahotsav;
use Illuminate\Http\Request;

class MahotsavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mahotsavs = Mahotsav::orderBy('id', 'DESC')->get();
        return view('admin.mahotsav.index', compact('mahotsavs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mahotsav.create');
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
			'address' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $mahotsav = [
            'title' => $request->title,
			'address' => $request->address,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
			'status' => $request->status,

        ];

        mahotsav::insert($mahotsav);
        $image->move(public_path('/uploads/mahotsav'), $imageName);
        return back()->with('success', 'mahotsav Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahotsav  $mahotsav
     * @return \Illuminate\Http\Response
     */
    public function show(Mahotsav $mahotsav)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahotsav  $mahotsav
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahotsav $mahotsav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahotsav  $mahotsav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mahotsav $mahotsav)
    {
        $rules = [
            'title' => 'required|string',
			'address' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/mahotsav'), $imageName);

            unlink(public_path('/uploads/mahotsav/' . $mahotsav->image));

            $mahotsavData = [
                'title' => $request->title,
				'address' => $request->address,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imageName,
				'status' => $request->status,

            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
				'address' => $request->address,
                'date' => $request->date,
				'status' => $request->status,
                'description' => $request->description,

            ];
        }

        $mahotsav->update($mahotsavData);

        return back()->with('success', 'mahotsav Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahotsav  $mahotsav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahotsav $mahotsav)
    {

        unlink(public_path('/uploads/mahotsav/' . $mahotsav->image));
        $mahotsav->delete();
        return back()->with('success', 'mahotsav Deleted Successfully');
    }
}
