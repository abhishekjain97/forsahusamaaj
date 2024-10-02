<?php

namespace App\Http\Controllers;

use App\Models\BusinessDirCategory;
use App\Models\BusinessDirSubCategory;
use App\Models\BusinessDirectory;
use App\Models\JobProfile;
use App\Models\MemberDirectory;
use App\Models\PostJob;
use App\Models\SocialDirectory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
// use DB;

use function PHPUnit\Framework\isEmpty;

class DirectoryController extends Controller
{
    public function memberDirectory()
    {
        $countries = DB::table('countries')->get();
        return view('frontend.directory.member_directory', compact('countries'));
    }

    public function addmemberDirectoryForm()
    {
        $userId = session()->get('id');
        if(empty($userId)) {
            return redirect()->route('user_login');
        }
        $countries = DB::table('countries')->get();
        return view('frontend.directory.add_member_directory', compact('countries'));
    }
    public function addmemberDirectory(Request $request)
    {
        $rules = [
            'name'                      =>  'required|string',
            'father_name'               =>  'required|string',
            'mobile'                    =>  'required|digits:10|numeric|unique:member_directories',
            'email_id'                  =>  'required|unique:member_directories', 
            'country_id'                =>  'required',
            'state_id'                  =>  'required', 
            'city_id'                   =>  'required', 
            // 'address'                   =>  'required', 
            'highest_education'         =>  'required', 
            'dob'                       =>  'required|date_format:d/m/Y', 
            'blood_group'               =>  'required', 
            'marriage_anniversary'      =>  'required|date_format:d/m/Y', 
            'profile_photo'             =>  'required|image|mimes:jpeg,png,jpg|max:2048', 
            'current_address'           =>  'required', 
            'permanent_address'         =>  'required', 
            'occupation_type'           =>  'required', 
            'profession'                =>  'required', 
            'upload_photo'              =>  'required|image|mimes:jpeg,png,jpg|max:2048', 
            'upload_supporting_doc'     =>  'required|image|mimes:jpeg,png,jpg|max:2048',
            'description'               =>  'required',
        ];

        $customMessage = [
            // 'dob.date_format'    => 'Please Enter Valid Date Of Birth ',
        ];

        $this->validate($request, $rules, $customMessage);

        $userId = session()->get('id');
        $rand = time() . rand(100, 999);

        $name = Str::slug($request->name, '-');

        $profile_photo = $request->file('profile_photo');
        $profile_photoOrignalName = strtolower(trim($profile_photo->getclientoriginalextension()));
        $profile_photoName = $rand.'_'.$name.'_profile.'.$profile_photoOrignalName;

        $upload_photo = $request->file('upload_photo');
        $upload_photoOrignalName = strtolower(trim($upload_photo->getclientoriginalextension()));
        $upload_photoName = $rand.'_'.$name.'_image.'.$upload_photoOrignalName;

        $upload_supporting_doc = $request->file('upload_supporting_doc');
        $upload_supporting_docOrignalName = strtolower(trim($upload_supporting_doc->getclientoriginalextension()));
        $upload_supporting_docName = $rand.'_'.$name.'_doc.'.$upload_supporting_docOrignalName;


        $memberData = [
            'user_id'                   =>  $userId,
            'name'                      =>  $request->name,
            'father_name'               =>  $request->father_name,
            'mobile'                    =>  $request->mobile,
            'email_id'                  =>  $request->email_id,
            'facebook'                  =>  $request->facebook,
            'instagram'                 =>  $request->instagram,
            'youtube'                   =>  $request->youtube,
            'country_id'                =>  $request->country_id,
            'state_id'                  =>  $request->state_id,
            'city_id'                   =>  $request->city_id,
            // 'address'                   =>  $request->address,
            'highest_education'         =>  $request->highest_education,
            'dob'                       =>  date("Y-m-d", strtotime($request->dob)),
            'blood_group'               =>  $request->blood_group,
            'marriage_anniversary'      =>  date("Y-m-d", strtotime($request->marriage_anniversary)),
            'profile_photo'             =>  $profile_photoName,
            'current_address'           =>  $request->current_address,
            'permanent_address'         =>  $request->permanent_address,
            'occupation_type'           =>  $request->occupation_type,
            'profession'                =>  $request->profession,
            'upload_photo'              =>  $upload_photoName,
            'upload_supporting_doc'     =>  $upload_supporting_docName,
            'description'               =>  $request->description,
        ];

        MemberDirectory::insert($memberData);
        $profile_photo->move(public_path('/uploads/member_directory'), $profile_photoName);
        $upload_photo->move(public_path('/uploads/member_directory'), $upload_photoName);
        $upload_supporting_doc->move(public_path('/uploads/member_directory'), $upload_supporting_docName);


        return back()->with('success', 'Directory Created successfully');
    }

    public function memberDirectoryDetail($id) {
        $member = MemberDirectory::find($id);
        $title = $member->name;
        return view('frontend.directory.member_directory_detail', compact('member','title'));
    }

    public function memberDirectoryList()
    {
        $userId = session()->get('id');
        $countries = DB::table('countries')->get();
        $directoryMembers = MemberDirectory::with('country')->with('state')->with('city')->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        return view('frontend.directory.member_list', compact('directoryMembers','countries'));
    }

    public function updateDirectoryMember(Request $request, $id)
    {
        $mobile = MemberDirectory::where('id', $id)->first();
        // dd($mobile['mobile']);
        $rules = [
            'name'                      =>  'required|string',
            'father_name'               =>  'required|string',
            'mobile'                    =>  'required|digits:10|numeric|unique:member_directories,mobile,' . $mobile['id'],
            'email_id'                  =>  'required|unique:member_directories,email_id,' . $mobile['id'], 
            'country_id'                =>  'required',
            'state_id'                  =>  'required', 
            'city_id'                   =>  'required', 
            // 'address'                   =>  'required', 
            'highest_education'         =>  'required', 
            'dob'                       =>  'required|date_format:d/m/Y', 
            'blood_group'               =>  'required', 
            'marriage_anniversary'      =>  'required|date_format:d/m/Y', 
            // 'profile_photo'             =>  'image|mimes:jpeg,png,jpg|max:2048', 
            'current_address'           =>  'required', 
            'permanent_address'         =>  'required', 
            'occupation_type'           =>  'required', 
            'profession'                =>  'required', 
            // 'upload_photo'              =>  'image|mimes:jpeg,png,jpg|max:2048', 
            // 'upload_supporting_doc'     =>  'image|mimes:jpeg,png,jpg|max:2048',
            'description'               =>  'required',
        ];

        $customMessage = [
            // 'dob.date_format'    => 'Please Enter Valid Date Of Birth ',

        ];

        $this->validate($request, $rules, $customMessage);

        $profile_photoName = $mobile->profile_photo;
        $upload_photoName = $mobile->upload_photo;
        $upload_supporting_docName = $mobile->upload_supporting_doc;

        $userId = session()->get('id');
        $rand = time() . rand(100, 999);

        $name = Str::slug($request->name, '-');
        
        if ($request->file('profile_photo') != null) {
            $profile_photo = $request->file('profile_photo');
            $profile_photoOrignalName = strtolower(trim($profile_photo->getclientoriginalextension()));
            $profile_photoName = $rand.'_'.$name.'_profile.'.$profile_photoOrignalName;
        }

        if ($request->file('upload_photo') != null) {
            $upload_photo = $request->file('upload_photo');
            $upload_photoOrignalName = strtolower(trim($upload_photo->getclientoriginalextension()));
            $upload_photoName = $rand.'_'.$name.'_image.'.$upload_photoOrignalName;
        }

        if ($request->file('upload_supporting_doc') != null) {
            $upload_supporting_doc = $request->file('upload_supporting_doc');
            $upload_supporting_docOrignalName = strtolower(trim($upload_supporting_doc->getclientoriginalextension()));
            $upload_supporting_docName = $rand.'_'.$name.'_doc.'.$upload_supporting_docOrignalName;
        }

        $memberData = [
            'name'                      =>  $request->name,
            'father_name'               =>  $request->father_name,
            'mobile'                    =>  $request->mobile,
            'email_id'                  =>  $request->email_id,
            'facebook'                  =>  $request->facebook,
            'instagram'                 =>  $request->instagram,
            'youtube'                   =>  $request->youtube,
            'country_id'                =>  $request->country_id,
            'state_id'                  =>  $request->state_id,
            'city_id'                   =>  $request->city_id,
            // 'address'                   =>  $request->address,
            'highest_education'         =>  $request->highest_education,
            'dob'                       =>  date("Y-m-d", strtotime($request->dob)),
            'blood_group'               =>  $request->blood_group,
            'marriage_anniversary'      =>  date("Y-m-d", strtotime($request->marriage_anniversary)),
            'profile_photo'             =>  $profile_photoName,
            'current_address'           =>  $request->current_address,
            'permanent_address'         =>  $request->permanent_address,
            'occupation_type'           =>  $request->occupation_type,
            'profession'                =>  $request->profession,
            'upload_photo'              =>  $upload_photoName,
            'upload_supporting_doc'     =>  $upload_supporting_docName,
            'description'               =>  $request->description,
        ];

        MemberDirectory::where('id', $id)->update($memberData);
        if ($request->file('profile_photo') != null) {
            $profile_photo->move(public_path('/uploads/member_directory'), $profile_photoName);
        }

        if ($request->file('upload_photo') != null) {
            $upload_photo->move(public_path('/uploads/member_directory'), $upload_photoName);
        }

        if ($request->file('upload_supporting_doc') != null) {
            $upload_supporting_doc->move(public_path('/uploads/member_directory'), $upload_supporting_docName);
        }

        return back()->with('success', 'Directory Updated successfully');
    }

    public function deleteDirectoryMember($id)
    {
        MemberDirectory::where('id', $id)->delete();
        return back()->with('success', 'Directory Deleted successfully');
    }

    public function businessDirectory()
    {
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        $countries = DB::table('countries')->get();
        return view('frontend.directory.business_directory', compact('businessDirCategories','countries'));
    }
    public function addBusinessDirectoryForm()
    {
        $businessDirectories = BusinessDirCategory::all();
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        // $businessDirSubCategories = BusinessDirSubCategory::with('category')->orderBy('id', 'DESC')->get();
        $countries = DB::table('countries')->get();
        return view('frontend.directory.add_business_directory', compact('businessDirectories','businessDirCategories','countries'));
    }

    public function addBusinessDirectory(Request $request)
    {
        $rules = [
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'business_name'         => 'required|string',
            'director_name'         => 'required|string',
            'visitingCard'          => 'required',
            'work'                  => 'required',
            'person_name'           => 'required',
            'mobile'                => 'required|digits:10|numeric',
            'country_id'            => 'required',
            'state_id'              => 'required',
            'city_id'               => 'required',
            'website_link'          => 'required',
        ];

        $this->validate($request, $rules);
        $userId = session()->get('id');

        
        $document_photoName = "";
        
        if(!empty($request->document)) {
            $document = $request->file('document');
            $rand = time() . rand(100, 999);
            $name = Str::slug($request->business_name, '-');
            $documentOrignalName = strtolower(trim($document->getclientoriginalextension()));
            $document_photoName = $rand.'_'.$name.'_document.'.$documentOrignalName;
        }
        

        $businessData = [

            'user_id'               => $userId,
            'category_id'           => $request->category_id,
            'sub_category_id'       => $request->sub_category_id,
            'business_name'         => $request->business_name,
            'director_name'         => $request->director_name,
            'visiting_card'         => $request->visitingCard,
            'document'              => $document_photoName,
            'work'                  => $request->work,
            'person_name'           => $request->person_name,
            'mobile'                => $request->mobile,
            'email'                 => $request->email,
            'address'               => $request->address,
            'pincode'               => $request->pincode,
            'country_id'            => $request->country_id,
            'state_id'              => $request->state_id,
            'city_id'               => $request->city_id,
            'website_link'          => $request->website_link,
            'any_offer'             => $request->any_offer,
            'description'           => $request->description,

        ];

        BusinessDirectory::insert($businessData);
        if(!empty($request->document)) {
            $document->move(public_path('/uploads/business_visiting_cards'), $document_photoName);
        }
        return back()->with('success', 'Directory Created successfully');
    }

    public function uploadCropVisitingCard(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/uploads/business_visiting_cards/" . $image_name;


        file_put_contents($path, $data);

        return response()->json(['success' => true, 'result' => $image_name]);
    }

    public function businessDirectoryList()
    {
        $userId = session()->get('id');
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        $countries = DB::table('countries')->get();
        $businessDirectories = BusinessDirectory::with('category')->with('sub_category')->with('country')->with('state')->with('city')->where('user_id', $userId)->orderBy('id', 'DESC')->get();
        return view('frontend.directory.business_directory_list', compact('businessDirectories', 'businessDirCategories', 'countries'));
    }

    public function updateBusiness(Request $request, $id)
    {
        $rules = [
            'category_id'           => 'required',
            'sub_category_id'       => 'required',
            'business_name'         => 'required|string',
            'director_name'         => 'required|string',
            'work'                  => 'required',
            'person_name'           => 'required',
            'mobile'                => 'required|digits:10|numeric',
            'country_id'            => 'required',
            'state_id'              => 'required',
            'city_id'               => 'required',
            'website_link'          => 'required',
        ];

        $this->validate($request, $rules);

        $document_photoName = "";
        if(!empty($request->document)) {
            $document = $request->file('document');
            $rand = time() . rand(100, 999);
            $name = Str::slug($request->business_name, '-');
            $documentOrignalName = strtolower(trim($document->getclientoriginalextension()));
            $document_photoName = $rand.'_'.$name.'_document.'.$documentOrignalName;
            $businessData = [
                'category_id'           => $request->category_id,
                'sub_category_id'       => $request->sub_category_id,
                'business_name'         => $request->business_name,
                'director_name'         => $request->director_name,
                'document'              => $document_photoName,
                'work'                  => $request->work,
                'person_name'           => $request->person_name,
                'mobile'                => $request->mobile,
                'email'                 => $request->email,
                'address'               => $request->address,
                'pincode'               => $request->pincode,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'website_link'          => $request->website_link,
                'any_offer'             => $request->any_offer,
                'description'           => $request->description,
            ];
        }
        else {
            $businessData = [
                'category_id'           => $request->category_id,
                'sub_category_id'       => $request->sub_category_id,
                'business_name'         => $request->business_name,
                'director_name'         => $request->director_name,
                'document'              => $document_photoName,
                'work'                  => $request->work,
                'person_name'           => $request->person_name,
                'mobile'                => $request->mobile,
                'email'                 => $request->email,
                'address'               => $request->address,
                'pincode'               => $request->pincode,
                'country_id'            => $request->country_id,
                'state_id'              => $request->state_id,
                'city_id'               => $request->city_id,
                'website_link'          => $request->website_link,
                'any_offer'             => $request->any_offer,
                'description'           => $request->description,
            ];
        }

        

        BusinessDirectory::where('id', $id)->update($businessData);
        if(!empty($request->document)) {
            $document->move(public_path('/uploads/business_visiting_cards'), $document_photoName);
        }
        return back()->with('success', 'Directory Updated successfully');
    }
    // public function destroyBusinessDir($id){

    //     $businessDir = BusinessDirectory::where('id',$id)->first();
    //     dd($businessDir);
    // }
    public function socialDirectory()
    {
        $cities = SocialDirectory::get('city');
        $organizationNames = SocialDirectory::get('organization_name');

        return view('frontend.directory.social_directory', compact('cities', 'organizationNames'));
    }
    public function uploadCropSocialProfile(Request $request)
    {
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/uploads/socialdirectory/" . $image_name;


        file_put_contents($path, $data);

        return response()->json(['success' => true, 'result' => $image_name]);
    }

    public function addSocialDirectory(Request $request)
    {
        $rules = [
            'name'              => 'required|string',
            'photoUpload'       => 'required',
            'designation'       => 'required',
            'city'              => 'required|string',
            'organizationName'  => 'required',
            'facebookLink'      => 'required',
        ];

        $this->validate($request, $rules);
        $userId = session()->get('id');

        $socialDirData = [

            'user_id'               => $userId,
            'name'                  => $request->name,
            'image'                 => $request->photoUpload,
            'designation'           => $request->designation,
            'city'                  => $request->city,
            'organization_name'     => $request->organizationName,
            'facebook'              => $request->facebookLink,
            'twitter'               => $request->twitterLink,
            'linkedin'              => $request->linkedinLink,
            'instagram'             => $request->instagramLink,

        ];

        SocialDirectory::insert($socialDirData);
        return back()->with('success', 'Social Directory Created successfully');
    }

    public function socialDirectoryFilter(Request $request)
    {
        $users = new SocialDirectory();

        // $users = $users->where('gender','=','male')->get();
        // "%{$searchTerm}%"
        if (isset($request->alphabet)) :
            $users = $users->where('name', 'like', "{$request->alphabet}%");

        endif;

        if (isset($request->city)) :
            $users = $users->where('city', $request->city);
        endif;

        if (isset($request->organization)) :
            $users = $users->where('organization_name', $request->organization);
        endif;

        if (isset($request->userName)) :
            $users = $users->where('name', $request->userName);

        endif;




        $users = $users->orderBy('id', 'DESC')->get();

        // dd($users);
        // return view('frontend.directory.member_search', compact('users'));


        foreach ($users as $key => $user) {

            echo '<div class="col-md-3 text-center">
            <div class="well-box" style="height: 470px; max-height: 470px;">
                <div class="team-pic">
                    <a href="javascript:void(0)"><img src="' . asset('uploads/socialdirectory/' . $user->image) . '" class="img-responsive" alt=""></a>
                </div>
                <h2><a href="javascript:void(0)">' . $user->name . '</a></h2>
                <span> ' . $user->designation . '</span><br />
                <span> ' . $user->organization_name . '</span><br />
                <span> <i class="icon-wedding-location icon-size-18"></i> ' . $user->city . '</span><br />
                <ul class="listnone follow-icon">
                    <li><a target="_blank" href="' . $user->facebook . '"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a target="_blank" href="' . $user->instagram . '"><i class="fa
                        fa-instagram"></i></a></li>
                    <li><a target="_blank" href="' . $user->twitter . '"><i class="fa fa-twitter-square"></i></a></li>
                    <li><a target="_blank" href="' . $user->linkedin . '"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>';
        }
        // return response()->json(['success' => true, 'users' => $users]);
    }

    public  function socialDirectoryByName(Request $request)
    {
        $users = new SocialDirectory();

       

        if (isset($request->userName)) :
            $users = $users->where('name','like', "{$request->userName}%");

        endif;




        $users = $users->orderBy('id', 'DESC')->get();

    
        foreach ($users as $key => $user) {

            echo '<div class="col-md-3 text-center">
            <div class="well-box" style="height: 470px; max-height: 470px;">
                <div class="team-pic">
                    <a href="javascript:void(0)"><img src="' . asset('uploads/socialdirectory/' . $user->image) . '" class="img-responsive" alt=""></a>
                </div>
                <h2><a href="javascript:void(0)">' . $user->name . '</a></h2>
                <span> ' . $user->designation . '</span><br />
                <span> ' . $user->organization_name . '</span><br />
                <span> <i class="icon-wedding-location icon-size-18"></i> ' . $user->city . '</span><br />
                <ul class="listnone follow-icon">
                    <li><a target="_blank" href="' . $user->facebook . '"><i class="fa fa-facebook-square"></i></a></li>
                    <li><a target="_blank" href="' . $user->instagram . '"><i class="fa
                        fa-instagram"></i></a></li>
                    <li><a target="_blank" href="' . $user->twitter . '"><i class="fa fa-twitter-square"></i></a></li>
                    <li><a target="_blank" href="' . $user->linkedin . '"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>';
        }
    }
    public function jobPortal()
    {
        return view('frontend.directory.jobportal');
    }

    public function jobPostForm()
    {
        return view('frontend.directory.jobpost');
    }

    public function jobProfileForm()
    {
        return view('frontend.directory.jobprofile');
    }

    public function jobPost(Request $request)
    {
        $rules = [
            "companyName"       => "required",
            "jobTitle"          => "required",
            "jobDescription"    => "required",
            "jobType"           => "required",
            "experienceFrom"    => "required",
            "experienceTo"      => "required",
            "keySkills"         => "required",
            "noOfPosition"      => "required",
            "location"          => "required",
            "address"           => "required",
            "country"           => "required",
            "phoneNumber"       => "required",
            "email"             => "required",
        ];

        $this->validate($request, $rules);

        $userId = session()->get('id');

        $postjob = [
            'user_id'           => $userId,
            'company_name'      => $request->companyName,
            'title'             => $request->jobTitle,
            'description'       => $request->jobDescription,
            'job_type'          => $request->jobType,
            'experience_from'   => $request->experienceFrom,
            'experience_to'     => $request->experienceTo,
            'min_salary'        => $request->minSalary,
            'max_salary'        => $request->maxSalary,
            'salary_period'     => $request->salaryPeriod,
            'key_skills'        => $request->keySkills,
            'no_of_position'    => $request->noOfPosition,
            'location'          => $request->location,
            'address'           => $request->address,
            'country'           => $request->country,
            'mobile'            => $request->phoneNumber,
            'email'             => $request->email,
            'website_url'       => $request->url,

        ];

        PostJob::insert($postjob);
        return back()->with('success', 'Job Posted successfully');
    }

    public function jobProfile(Request $request)
    {

        $rules = [
            'firstName'         => 'required',
            'lastName'          => 'required',
            'currentCity'       => 'required',
            'phoneNumber'       => 'required',
            'email'             => 'required',
            'experience'        => 'required',
            'keySkills'         => 'required',
            'collegeName'       => 'required',
            'universityName'    => 'required',
            'degree'            => 'required',
        ];

        $this->validate($request, $rules);
        $userId = session()->get('id');

        $jobProfile = [
            'user_id'           => $userId,
            'first_name'        => $request->firstName,
            'last_name'         => $request->lastName,
            'current_city'      => $request->currentCity,
            'mobile'            => $request->phoneNumber,
            'email'             => $request->email,
            'experience'        => $request->experience,
            'key_skills'        => $request->keySkills,
            'job_title'         => $request->jobTitle,
            'company'           => $request->company,
            'from_year'         => $request->fromYearTP,
            'from_month'        => $request->fromMonthTP,
            'to_year'           => $request->toYearTP,
            'to_month'          => $request->toMonthTP,
            'salary'            => $request->salary,
            'salary_type'       => $request->salaryType,
            'role_description'  => $request->roleDescription,
            'college_name'      => $request->collegeName,
            'university_name'   => $request->universityName,
            'degree'            => $request->degree,

        ];


        JobProfile::insert($jobProfile);
        return back()->with('success', 'Job Posted successfully');
    }

    public function searchMember(Request $request)
    {

        $users = new MemberDirectory();
        $countries = DB::table('countries')->get();
        // $users = $users->where('gender','=','male')->get();
        // "%{$searchTerm}%"
        if (isset($request->firstName)) :
            $users = $users->where('name', 'like', "{$request->firstName}%");
        endif;
        
        if (isset($request->country_id) && $request->country_id != 0) :
            $users = $users->where('country_id', $request->country_id);
        endif;

        if (isset($request->state_id) && $request->state_id != 0) :
            $users = $users->where('state_id', $request->state_id);
        endif;

        if (isset($request->city_id) && $request->city_id != 0) :
            $users = $users->where('city_id', $request->city_id);
        endif;

        if (isset($request->occupation)) :
            $users = $users->where('occupation', $request->occupation);
        endif;

        if (isset($request->education)) :
            $users = $users->where('education', $request->education);

        endif;

        $users = $users->with('country')->with('state')->with('city')->where('status', 1)->orderBy('id', 'DESC')->paginate(20);

        // dd($users);
        return view('frontend.directory.member_search', compact('users','countries','request'));
    }

    public function businessDirectorySearch(Request $request)
    {
        // dd($request->all());

        $businessDir = new BusinessDirectory();


        // $users = $users->where('gender','=','male')->get();
        // "%{$searchTerm}%"
        // if (isset($request->companyName)) :
        //     $businessDir = $businessDir->where('company_name', 'like', "{$request->companyName}%");

        // endif;

        // if (isset($request->address)) :
        //     $businessDir = $businessDir->where('address', 'like', "{$request->address}%");

        // endif;

        if (isset($request->productCat) && $request->productCat != 0) :
            $businessDir = $businessDir->where('category_id', $request->productCat);

        endif;

        if (isset($request->productsubCat) && $request->productsubCat != 0) :
            $businessDir = $businessDir->where('sub_category_id', $request->productsubCat);

        endif;

        if (isset($request->country) && $request->country != 0) :
            $businessDir = $businessDir->where('country_id', $request->country);

        endif;

        if (isset($request->state) && $request->state != 0) :
            $businessDir = $businessDir->where('state_id', $request->state);

        endif;

        if (isset($request->city) && $request->city != 0) :
            $businessDir = $businessDir->where('city_id', $request->city);

        endif;

        // if (isset($request->natureWork)) :
        //     $businessDir = $businessDir->where('work', 'like', "{$request->natureWork}%");

        // endif;

        // if (isset($request->contactPersonName)) :
        //     $businessDir = $businessDir->where('person_name', 'like', "{$request->contactPersonName}%");

        // endif;

        // if (isset($request->phoneNumber)) :
        //     $businessDir = $businessDir->where('mobile', 'like', "{$request->phoneNumber}%");

        // endif;

        // if (isset($request->emailId)) :
        //     $businessDir = $businessDir->where('email', 'like', "{$request->emailId}%");

        // endif;


        // if (isset($request->websiteLink)) :
        //     $businessDir = $businessDir->where('website_link', 'like', "{$request->websiteLink}%");

        // endif;




        $businessDir = $businessDir->with('category')->with('sub_category')->with('country')->with('state')->with('city')->where('status', 1)->orderBy('id', 'DESC')->paginate(20);
        $businessDirCategories = BusinessDirCategory::orderBy('id', 'DESC')->get();
        $countries = DB::table('countries')->get();
        // dd($businessDir);
        return view('frontend.directory.business_directory_search', compact('businessDirCategories', 'businessDir', 'countries'));
    }

    public function getSubCategory(Request $request)
    {
        $data['sub_category'] = DB::table('business_dir_sub_categories')->where('category_id', '=', $request->category_id)->get();
        return response()->json($data);;
    }
}
