<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\JobPortal;
use Illuminate\Http\Request;

class JobPortalController extends Controller
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
        $mahotsavs = JobPortal::orderBy('id', 'DESC')->get();
        return view('admin.job_portal.index', compact('mahotsavs','states', 'cities'));
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

        return view('admin.job_portal.create', compact('states', 'cities'));
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
			'amount' => 'required|string',
			'company_name' => 'required|string',
			'close_date' => 'required|string',
			'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
			'delivery_time' => 'required',
			'skill' => 'required',
			'requirements' => 'required',
			'email' => 'required',
			'phone' => 'required',
			
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $mahotsav = [
            'title' => $request->title,
            'amount' => $request->amount,
			'company_name' => $request->company_name,
			'close_date' => $request->close_date,
			'delivery_time' => $request->delivery_time,
			'date' => $request->date,
            'description' => $request->description,
			'skill' => $request->skill,
			'requirements' => $request->requirements,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'email' => $request->email,
			'phone' => $request->phone,
			'status' => '1',
        ];

        JobPortal::insert($mahotsav);
        $image->move(public_path('/uploads/job_portal'), $imageName);
        return back()->with('success', 'jobs Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobPortal  $jobportal
     * @return \Illuminate\Http\Response
     */
    public function show(JobPortal $jobportal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobPortal  $jobportal
     * @return \Illuminate\Http\Response
     */
    public function edit(JobPortal $jobportal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobPortal  $jobportal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPortal $jobportal)
    {
        $rules = [
            'title' => 'required|string',
			'amount' => 'required|string',
			'company_name' => 'required|string',
			'close_date' => 'required|string',
			'date' => 'required|string',
            'description' => 'required|string',
            'state_id' => 'required',
            'city_id' => 'required',
			'delivery_time' => 'required',
			'skill' => 'required',
			'requirements' => 'required',
			'email' => 'required',
			'phone' => 'required',
        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $image = $request->file('image');
            $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

            $image->move(public_path('/uploads/job_portal'), $imageName);

            unlink(public_path('/uploads/job_portal/' . $jobportal->image));

            $mahotsavData = [
                'title' => $request->title,
				'amount' => $request->amount,
				'company_name' => $request->company_name,
				'close_date' => $request->close_date,
				'delivery_time' => $request->delivery_time,
				'date' => $request->date,
				'description' => $request->description,
				'skill' => $request->skill,
				'requirements' => $request->requirements,
				'image' => $imageName,
				'state_id' => $request->state_id,
				'city_id' => $request->city_id,
				'email' => $request->email,
				'phone' => $request->phone,
				'status' => '1',
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
				'amount' => $request->amount,
				'company_name' => $request->company_name,
				'close_date' => $request->close_date,
				'delivery_time' => $request->delivery_time,
				'date' => $request->date,
				'description' => $request->description,
				'skill' => $request->skill,
				'requirements' => $request->requirements,
				'state_id' => $request->state_id,
				'city_id' => $request->city_id,
				'email' => $request->email,
				'phone' => $request->phone,
				'status' => '1',
            ];
        }

        $jobportal->update($mahotsavData);

        return back()->with('success', 'jobs Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobPortal  $jobportal
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobPortal $jobportal)
    {
        unlink(public_path('/uploads/job_portal/' . $jobportal->image));
        $jobportal->delete();
        return back()->with('success', 'jobs Deleted Successfully');
    }
}
