<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Team;
use App\Models\State;
use App\Models\Citie;
use Illuminate\Http\Request;

class TeamController extends Controller
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
		
		$teamCategories = Category::where('parent_id', '=', 1)->get();
        $teams = Team::orderBy('id', 'DESC')->with('subCat')->get();
		
		
        return view('admin.team.index', compact('teams', 'teamCategories','states', 'cities'));
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
		$teamCategories = Category::where('parent_id', '=', 1)->get();
		
        return view('admin.team.create', compact('teamCategories','states', 'cities'));
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
            'team_category' => 'required',
            'designation'          => 'required',
			'name'          => 'required',
			'state_id'          => 'required',
			'city_id'          => 'required',
			'location'          => 'required',
			
        ];


        $this->validate($request, $rules);

        // $files = $request->file('image');
        // $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        // $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        if ($request->key_person == null) {

            $teamData = [
                'designation'       => $request->designation,
                'name'              => $request->name,
				'category_id'              => $request->team_category,
				'state_id'              => $request->state_id,
				'city_id'              => $request->city_id,
				'location'              => $request->location,
				'description'              => $request->description,
                'fb_link'           => $request->fb_link,
                'image'             => $request->image,

            ];
        } else {
            $teamData = [
                'designation'       => $request->designation,
                'name'              => $request->name,
				'category_id'              => $request->team_category,
				'state_id'              => $request->state_id,
				'city_id'              => $request->city_id,
				'location'              => $request->location,
				'description'              => $request->description,
                'fb_link'           => $request->fb_link,
                'image'             => $request->image,
                'key_person'        => $request->key_person
            ];
        }


        Team::insert($teamData);
        // $files->move(public_path('/uploads/team'), $imageName);
        return back()->with('success', 'Team Member Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {

        $rules = [
            'team_category' => 'required',
            'name'          => 'required',
            'fb_link'       => 'required',
            'image'         => 'image|mimes:jpeg,jpg,png|max:2048'
        ];

        $this->validate($request, $rules);

        if ($request->key_person == null) {
            $key_person = 0;
        } else {
            $key_person = $request->key_person;
        }



        if ($request->file('image') != null) {

            $files = $request->file('image');
            $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageExtension;
            $files->move(public_path('/uploads/team'), $imageName);

            unlink(public_path('/uploads/team/' . $team['image']));

            $data = [
                'designation'       => $request->designation,
                'name'              => $request->name,
				'category_id'              => $request->team_category,
				'state_id'              => $request->state_id,
				'city_id'              => $request->city_id,
				'location'              => $request->location,
				'description'              => $request->description,
                'fb_link'           => $request->fb_link,
                'image'             => $imageName,
                'key_person'        => $key_person
            ];
        } else {
            $data = [
                'designation'       => $request->designation,
                'name'              => $request->name,
				'category_id'              => $request->team_category,
				'state_id'              => $request->state_id,
				'city_id'              => $request->city_id,
				'location'              => $request->location,
				'description'              => $request->description,
                'fb_link'           => $request->fb_link,
                'key_person'        => $key_person
            ];
        }
        $team->update($data);
        return back()->with('success', 'Team Member Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        if ($team['image'] != null) {

            unlink(public_path('/uploads/team/' . $team['image']));
        }
        $team->delete();
        return back()->with('success', 'Team Member Deleted');
    }
    public function cropTeamMemberImage(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/uploads/team/" . $image_name;


        file_put_contents($path, $data);

        return response()->json(['success' => true, 'result' => $image_name]);
    }
}
