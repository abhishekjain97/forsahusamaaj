<?php

namespace App\Http\Controllers;

use App\Models\Karma;
use Illuminate\Http\Request;

class KarmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karmas = Karma::orderBy('id', 'DESC')->get();
        return view('admin.Karma.index', compact('karmas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.karma.create');
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
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $karma = [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,

        ];

        Karma::insert($karma);
        $image->move(public_path('/uploads/karma'), $imageName);
        return back()->with('success', 'karma Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karma  $karma
     * @return \Illuminate\Http\Response
     */
    public function show(Karma $karma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karma  $karma
     * @return \Illuminate\Http\Response
     */
    public function edit(Karma $karma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Karma  $karma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Karma $karma)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/karma'), $imageName);

            unlink(public_path('/uploads/karma/' . $karma->image));

            $karmaData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imageName,

            ];
        } else {
            $karmaData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,

            ];
        }

        $karma->update($karmaData);

        return back()->with('success', 'karma Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karma  $karma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Karma $karma)
    {
       
        unlink(public_path('/uploads/karma/' . $karma->image));
        $karma->delete();
        return back()->with('success', 'karma Deleted Successfully');
    }
}
