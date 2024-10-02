<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Citie;
use App\Models\SahuSamaajSanghathan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class SahuSamaajSanghathanController extends Controller
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
		$membership = DB::table('membership')->get();
	
        $mahotsavs = SahuSamaajSanghathan::orderBy('id', 'DESC')->get();
        return view('admin.sahu_samaaj_sanghathan.index', compact('mahotsavs','states', 'cities','membership'));
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

        return view('admin.sahu_samaaj_sanghathan.create', compact('states', 'cities'));
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

		$logo = $request->file('logo');
        $logoName = strtolower(trim($logo->getclientoriginalextension()));
        $logoName = time() . rand(100, 999) . '.' . $logoName;
		
        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'sanghanthantype' => $request->sanghanthantype,
			'president_name' => $request->president_name,
			'mobile_no' => $request->mobile_no,
			'whatsapp_no' => $request->whatsapp_no,
			'logo' => $logoName,
			'status' => '1',
        ];

        SahuSamaajSanghathan::insert($mahotsav);
        $image->move(public_path('/uploads/sahu_samaaj_sanghathan'), $imageName);
        return back()->with('success', 'sanghathan Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SahuSamaajSanghathan  $sahusamaajsanghathan
     * @return \Illuminate\Http\Response
     */
    public function show(SahuSamaajSanghathan $sahusamaajsanghathan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SahuSamaajSanghathan  $sahusamaajsanghathan
     * @return \Illuminate\Http\Response
     */
    public function edit(SahuSamaajSanghathan $sahusamaajsanghathan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SahuSamaajSanghathan  $sahusamaajsanghathan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SahuSamaajSanghathan $sahusamaajsanghathan)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
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

            $image->move(public_path('/uploads/sahu_samaaj_sanghathan'), $imageName);

            unlink(public_path('/uploads/sahu_samaaj_sanghathan/' . $sahusamaajsanghathan->image));
			
			$logo = $request->file('logo');
            $logoOrignalName = strtolower(trim($logo->getclientoriginalextension()));
            $logoName = time() . rand(100, 999) . '.' . $logoOrignalName;

            $logoName1->move(public_path('/uploads/sahu_samaaj_sanghathan'), $logoName);

            unlink(public_path('/uploads/sahu_samaaj_sanghathan/' . $sahusamaajsanghathan->logo));
			

            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'image' => $imageName,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'sanghanthantype' => $request->sanghanthantype,
				'president_name' => $request->president_name,
				'mobile_no' => $request->mobile_no,
				'whatsapp_no' => $request->whatsapp_no,
				'logo' => $request->logo,
				'status' => $request->status,
            ];
        } else {
            $mahotsavData = [
                'title' => $request->title,
                'date' => $request->date,
                'description' => $request->description,
                'state_id' => $request->state_id,
                'city_id' => $request->city_id,
				'sanghanthantype' => $request->sanghanthantype,
				'president_name' => $request->president_name,
				'mobile_no' => $request->mobile_no,
				'whatsapp_no' => $request->whatsapp_no,
				'logo' => $request->logo,
				'status' => $request->status,
            ];
        }

        $sahusamaajsanghathan->update($mahotsavData);

        return back()->with('success', 'sanghathan Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SahuSamaajSanghathan  $sahusamaajsanghathan
     * @return \Illuminate\Http\Response
     */
    public function destroy(SahuSamaajSanghathan $sahusamaajsanghathan)
    {
        unlink(public_path('/uploads/sahu_samaaj_sanghathan/' . $sahusamaajsanghathan->image));
        $sahusamaajsanghathan->delete();
        return back()->with('success', 'sanghathan Deleted Successfully');
    }
}
