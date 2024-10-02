<?php

namespace App\Http\Controllers;

//use App\Models\State;
//use App\Models\Citie;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $mahotsavs = Publication::orderBy('id', 'DESC')->get();
        return view('admin.publication.index', compact('mahotsavs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$states = State::get();
        //$cities = Citie::get();
		return view('admin.publication.create');

        //return view('admin.publication.create', compact('states', 'cities'));
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
			'company_name' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
           
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $mahotsav = [
            'title' => $request->title,
			'company_name' => $request->company_name,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
            'price' => $request->price,
			'status' => '1',
        ];

        Publication::insert($mahotsav);
        $image->move(public_path('/uploads/publication'), $imageName);
        return back()->with('success', 'Publication Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function show(Publication $publication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function edit(Publication $publication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publication $publication)
    {
        $rules = [
            'title' => 'required|string',
			'company_name' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price' => 'required',
			'status' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/publication'), $imageName);

            unlink(public_path('/uploads/publication/' . $publication->image));

            $mahotsavData = [
                'title' => $request->title,
				'company_name' => $request->company_name,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imageName,
                'price' => $request->price,
				'status' => $request->status,
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
				'company_name' => $request->company_name,
                'date' => $request->date,
                'description' => $request->description,
                'price' => $request->price,
				'status' => $request->status,
            ];
        }

        $publication->update($mahotsavData);

        return back()->with('success', 'Publication Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publication  $publication
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publication $publication)
    {
        unlink(public_path('/uploads/publication/' . $publication->image));
        $publication->delete();
        return back()->with('success', 'News Deleted Successfully');
    }
}
