<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\MandirDharamshala;
use Illuminate\Http\Request;

class MandirDharamshalaController extends Controller
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
        $mahotsavs = MandirDharamshala::orderBy('id', 'DESC')->get();
        return view('admin.mandir_dharamshala.index', compact('mahotsavs','states', 'cities'));
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

        return view('admin.mandir_dharamshala.create', compact('states', 'cities'));
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
			'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|array',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
        ];

        $this->validate($request, $rules);

        // $image = $request->file('image');
        // $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        // $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $images_array = [];
        $i = 0;
        if($request->hasFile('image')) {
            foreach($request->file('image') as $image) {
                // Get the original extension
                $imageOrignalName = strtolower(trim($image->getClientOriginalExtension()));
        
                // Generate a unique name
                $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
                
                $images_array[$i] = $imageName;
                $image->move(public_path('/uploads/mandir_dharamshala'), $imageName);
                $i++;
            }
        }

        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
			'tagline' => $request->tagline,
			'location' => $request->location,
            'description' => $request->description,
            'image' => json_encode($images_array),
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'posted_by'=> 'admin',
			'status' => '1',
            'sanghanthantype' => $request->sanghanthantype,
            'contact_person_name' => $request->contact_person_name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'website' => $request->website
        ];

        MandirDharamshala::insert($mahotsav);
        return back()->with('success', 'Mandir Dharamshala Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MandirDharamshala  $mandirdharamshala
     * @return \Illuminate\Http\Response
     */
    public function show(MandirDharamshala $mandirdharamshala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MandirDharamshala  $mandirdharamshala
     * @return \Illuminate\Http\Response
     */
    public function edit(MandirDharamshala $mandirdharamshala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MandirDharamshala  $mandirdharamshala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MandirDharamshala $mandirdharamshala)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
			'tagline' => 'required|string',
			'location' => 'required|string',
            'description' => 'required|string',
            'image' => 'array',
            'image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            
            // Unlink images from server
            $images = json_decode($mandirdharamshala->image);
            if(is_array($images)) {
                foreach($images as $img) {
                    unlink(public_path('/uploads/mandir_dharamshala/' . $img));
                }
            }

            // Add new images in server
            $images_array = [];
            $i = 0;
            if($request->hasFile('image')) {
                foreach($request->file('image') as $image) {
                    // Get the original extension
                    $imageOrignalName = strtolower(trim($image->getClientOriginalExtension()));
            
                    // Generate a unique name
                    $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
                    
                    $images_array[$i] = $imageName;
                    $image->move(public_path('/uploads/mandir_dharamshala'), $imageName);
                    $i++;
                }
            }

            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
				'tagline' => $request->tagline,
				'location' => $request->location,
                'description' => $request->description,
                'image' => json_encode($images_array),
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'status' => $request->status,
				'posted_by'=> 'admin',
                'sanghanthantype' => $request->sanghanthantype,
                'contact_person_name' => $request->contact_person_name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'website' => $request->website
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
				'tagline' => $request->tagline,
				'location' => $request->location,
                'description' => $request->description,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'status' => $request->status,
				'posted_by'=> 'admin',
                'sanghanthantype' => $request->sanghanthantype,
                'contact_person_name' => $request->contact_person_name,
                'mobile_no' => $request->mobile_no,
                'email' => $request->email,
                'website' => $request->website
            ];
        }

        $mandirdharamshala->update($mahotsavData);

        return back()->with('success', 'Mandir Dharamshala Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MandirDharamshala  $mandirdharamshala
     * @return \Illuminate\Http\Response
     */
    public function destroy(MandirDharamshala $mandirdharamshala)
    {
        $images = json_decode($mandirdharamshala->image);
        if(is_array($images)) {
            foreach($images as $img) {
                unlink(public_path('/uploads/mandir_dharamshala/' . $img));
            }
        }
        $mandirdharamshala->delete();
        return back()->with('success', 'Mandir Dharamshala Deleted Successfully');
    }
}
