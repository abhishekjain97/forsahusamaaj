<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\SubmitFromPublic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubmitFromPublicController extends Controller
{

    public function index()
    {
        $publisPosts = SubmitFromPublic::all();
        return view('admin.publicposts.index', compact('publisPosts'));
    }

    public function showSubmitForm($form)
    {
        $countries = DB::table('countries')->get();

        if ($form == "article") {
            $categories = Category::where('parent_id', 5)->get();
            $title = "Article";
            return view('frontend.submit_form', compact('categories', 'title', 'countries'));
        }
        if ($form == "press-release") {
            $categories = Category::where('parent_id', 6)->get();
            $title = "Press Release";
            return view('frontend.submit_form', compact('categories', 'title', 'countries'));
        }
        if ($form == "reports") {
            $categories = Category::where('parent_id', 7)->get();
            $title = "Reports";
            return view('frontend.submit_form', compact('categories', 'title', 'countries'));
        }


        // return view('frontend.submit_article',compact('articleCategories','pressReleaseCategories','reportsCategories'));

    }

    public function insertForm(Request $request)
    {

        $rules = [
            'name'              => 'required',
            'email'             => 'required',
            'mobile'            => 'required',
            'title'             => 'required',
            'category'          => 'required',
            'country'           => 'required',


        ];

        $customMessage = [
            'required'          => 'The :attribute field is required.',

        ];

        $this->validate($request, $rules, $customMessage);

        // dd($request->image);

        $thumbnail = $request->file('image');
        $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

        $doc = $request->file('doc');
        $docOrignalName  = strtolower(trim($doc->getclientoriginalextension()));
        $docName = time() . rand(100, 999) . '.' . $docOrignalName;



        $sumitData =  [
            'name'              => $request->name,
            'email'             => $request->email,
            'mobile'            => $request->mobile,
            'title'             => $request->title,
            'category'          => $request->category,
            'country'           => $request->country,
            'image'             => $imageName,
            'doc'               => $docName,
        ];
        SubmitFromPublic::insert($sumitData);
        $thumbnail->move(public_path('admin_assets/uploads/images'), $imageName);
        $doc->move(public_path('admin_assets/uploads/docs'), $docName);

        return back()->with('success', 'Your Post Submit');
    }

    public function deletePublicPostRequest($id)
    {
        $submitPost = SubmitFromPublic::where('id', $id)->first();
        unlink(public_path('admin_assets/uploads/images/' . $submitPost['image']));
        unlink(public_path('admin_assets/uploads/docs/' . $submitPost['doc']));
        SubmitFromPublic::where('id', $id)->delete();
        return back()->with('success', 'Post Delete Successfully');
    }

    public function submitEventFromPublic(Request $request)
    {
        if ($request->isMethod('post')) {

            $rules = [
                'name'              => 'required',
                'punchline'         => 'required',
                'venue'             => 'required',
                'country'           => 'required',
                'event_city'        => 'required',
                'start_date'        => 'required',
                'end_date'          => 'required',
                'event_category'    => 'required',
                'event_logo'        => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'description'       => 'required',
                'exhibitor_profile' => 'required',
                'visiter_profile'   => 'required',
                'est_exhibitors'    => 'required',
                'est_visiter'       => 'required',
                'organiser_name'    => 'required',
                'contact_persion'   => 'required',
                'company_name'      => 'required',
                'phone_no'          => 'required',
                'address'           => 'required',
                'pin_code'          => 'required',
                'city'              => 'required',
                'email'             => 'required',

            ];

            $this->validate($request, $rules);

            $event_logo = $request->file('event_logo');
            $imageOrignalName  = strtolower(trim($event_logo->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;

          
            $data = [

                'name'              => $request->name,
                'punchline'         => $request->punchline,
                'venue'             => $request->venue,
                'country'           => $request->country,
                'event_city'        => $request->event_city,
                'start_date'        => $request->start_date,
                'end_date'          => $request->end_date,
                'event_category'    => $request->event_category,
                'event_logo'        => $imageName,
                'description'       => $request->description,
                'exhibitor_profile' => $request->exhibitor_profile,
                'visiter_profile'   => $request->visiter_profile,
                'est_exhibitors'    => $request->est_exhibitors,
                'est_visiter'       => $request->est_visiter,
                'organiser_name'    => $request->organiser_name,
                'contact_persion'   => $request->contact_persion,
                'company_name'      => $request->company_name,
                'phone_no'          => $request->phone_no,
                'address'           => $request->address,
                'pin_code'          => $request->pin_code,
                'city'              => $request->city,
                'email'             => $request->email,

            ];

            
            Event::insert($data);
            $event_logo->move(public_path('/uploads/events'), $imageName);


            // $eventCategory = [
            //     'category_name' => $request->category_name
            // ];

            // DB::table('event_categories')->insert($eventCategory);
            return back()->with("success", "Your Event Submited Successfuly");
        } else {
            // $countries = DB::table('countries')->get();
            // $subCats = Category::where('parent_id', 1)->get();

            $countries = DB::table('countries')->get();
            $eventCategories = DB::table('event_categories')->select()->get();
            return view('frontend.submit_event', compact('eventCategories', 'countries'));
        }
    }

    public function getState(Request $request)
    {
        // $data['states'] = State::where("country_id", $request->country_id)
        //     ->get(["name", "id"]);
        // return response()->json($data);
        $data['states'] = DB::table('states')->where('country_id', '=', $request->country_id)->get();
        // dd($states);
        return response()->json($data);;
    }
}
