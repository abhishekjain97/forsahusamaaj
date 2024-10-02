<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AddImageInGallery;
use App\Models\Banner;
use App\Models\Blogs;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ContactSignUp;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\GreatMan;
use App\Models\HelpDeskCategory;
use App\Models\HelpDeskParamarsh;
use App\Models\Knowledge;
use App\Models\KoriAboutUs;
use App\Models\Marathon;
use App\Models\MarriageRegistration;
use App\Models\NewsPapers;
use App\Models\Product;
use App\Models\PublicUser;
use App\Models\WholeSaleProduct;
use App\Models\Wishlists;
use App\Models\YoutubeNews;
use App\Models\Team;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jorenvh\Share\Share;
use Session;

class IndexController extends Controller
{
    public function index()
    {
        // $banners = Banner::all();
        $menus = Category::whereNull('parent_id')
            ->with('childrenCategories')
            ->get();
        $banners = Banner::get();

        $blogs = Blogs::where('status', 1)->orderBy('id', 'DESC')->get();
        $latestNews = Blogs::where('status', 1)->orderBy('id', 'DESC')->limit(3)->get();
        $videosNews = YoutubeNews::orderBy('id', 'DESC')->get();
        $events = Event::orderBy('id', 'DESC')->get();

        $keyPerson = Team::where('key_person', 1)->get();
        $advertisementImages = DB::table('advertisings')->get();
        $businessImages = DB::table('business_promotions')->get();

        // $catAndProducts = Category::whereNull('parent_id')->get();
        // $wishLists = Wishlists::where('user_id',session()->get('id'))->get();

        // $menus = Category::where('parent_id','=',null)->get();
        // $allMenus = Category::pluck('name','id')->all();
        // print_r($menus);
        // die;
        // $getSubCat = Category::where('url', $subcaturl)->first();
        $knowledgeSliders = Knowledge::where('is_featured', 1)->with('subSubCat')->with('subCat')->orderBy('id', 'desc')->limit(4)->get();

        // $knowledges = Knowledge::where('sub_menu_id',$getSubCat->id)->with('subSubCat')->orderBy('id', 'desc')->get();
        $knowledges = Category::with('getSubCatKnowleadges')->get();
        // print_r($knowledgeSliders);
        // dd($knowledgeSliders);
        // print_r($getSubCat->childrenCategories);
        // print_r($knowledges);
        // foreach($knowledges as $item)
        // {
        //     print_r($item->knowledge);
        //     foreach($item->knowledge as $item1)
        //     {
        //         echo $item1->title."<br>";
        //     }
        // }
        // die;
        // $getKnowledges = Knowledge::where('slug',$slug)->get();
        // print_r($knowledges);
        // die;
        return view('frontend.index', compact('blogs', 'videosNews', 'events', 'banners', 'keyPerson', 'latestNews', 'advertisementImages', 'businessImages'));
        // return view('frontend.index');
        // return view('frontend.index', compact('banners', 'categories', 'catAndProducts'));
    }

    public function teams($id)
    {


        $teams = Team::where(['designation' => $id, 'key_person' => 0])->get();
        $keyPerson = Team::where('key_person', 1)->orderBy('id', 'DESC')->limit(2)->get();
        return view('frontend.teams', compact('teams', 'id', 'keyPerson'));
    }

    public function helpDesk()
    {
        $helpDeskCat = HelpDeskCategory::where(['parent_id' =>  null, 'status' => 1])->get();
        $paramarsh = HelpDeskCategory::where(['parent_id' =>  8])->get();

        return view('frontend.helpdesk.helpdesk', compact('helpDeskCat', 'paramarsh'));
    }
    public function helpDeskDetail($catid, $planid)
    {

        $helpDeskCat = HelpDeskCategory::where('parent_id', null)->get();
        // echo $catid.", ".$planid;
        return view('frontend.helpdesk.helpdesk_detail', compact('helpDeskCat', 'catid', 'planid'));
    }

    public function helpDeskKids()
    {
        return view('frontend.helpdesk.kids');
    }

    public function medhaviChatra()
    {
        return view('frontend.helpdesk.medhavichatra');
    }

    public function pratiyogita()
    {
        return view('frontend.helpdesk.pratiyogita');
    }
    public function careerMargdarshan()
    {
        return view('frontend.helpdesk.careermargdarshan');
    }

    public function dahejRestrictionAct()
    {
        return view('frontend.helpdesk.dahejrestrictionact');
    }

    public function helpDeskYoung()
    {
        return view('frontend.helpdesk.young');
    }

    public function helpDeskWomens()
    {
        return view('frontend.helpdesk.womens');
    }

    public function helpDeskOldPeople()
    {
        return view('frontend.helpdesk.oldpeople');
    }
    public function helpDeskQusNAns($id)
    {
        $paramarsh = HelpDeskCategory::where(['parent_id' =>  8])->get();

        return view('frontend.helpdesk.helpdeskqna', compact('paramarsh', 'id'));
    }
    public function helpDeskAddQuestion(Request $request)
    {
        // dd($request->all());
        $rules = [
            "paramarsh_id"  => "required",
            "name"          => "required",
            "message"       => "required",
        ];
        $this->validate($request, $rules);

        $question = [
            'paramarsh_id'  => $request->paramarsh_id,
            'name'          => $request->name,
            'qus_ans'       => $request->message,
        ];
        HelpDeskParamarsh::insert($question);
        // return back()->with('success', 'Success! Thank you so much for given your time, Your answer saved successfully.');
        return redirect('helpdeskqusans/' . $request->paramarsh_id)->with('success', 'Success! Your request saved successfully.');
    }

    public function helpDeskAddAnswer(Request $request)
    {

        // dd($request->all());

        $rules = [
            'ansName'   => 'required',
            'answer'    => 'required',
        ];

        $data = [
            "paramarsh_id"  => $request->paramarsh_id,
            "name"          => $request->ansName,
            "qus_ans"       => $request->answer,
            "parent_id"     => $request->quId,
        ];
        $this->validate($request, $rules);

        HelpDeskParamarsh::insert($data);

        return redirect('helpdeskqusans/' . $request->paramarsh_id)->with('status', 'Profile updated!');
    }


    public function contactSignUpForm()
    {
        return view('frontend.mahasampark');
    }
    public function contactSignUp(Request $request)
    {


        $rules = [
            'hodName'       => 'required',
            'hodSurname'    => 'required',
            'address'       => 'required',
            'pincode'       => 'required|numeric',
            'city'          => 'required',
            'state'         => 'required',
            'dob'           => 'required',
            'dob'           => 'required',
            'hodMobileNo'   => 'required|min:11|numeric|unique:contact_sign_ups,hod_mobile_no',
            'fappNumber'    => 'required',
            'photoUpload'   => 'required|image|mimes:jpeg,jpg,png|max:2048'
        ];
        $this->validate($request, $rules);

        $id_no = mt_rand(1000, 9999);

        $files = $request->file('photoUpload');
        $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $hodData = [
            'id_no'                         => $id_no,
            'hod_name'                      => $request->hodName,
            'hod_srname'                    => $request->hodSurname,
            'image'                         => $imageName,
            'hod_gender'                    => $request->hodGender,
            'father_name'                   => $request->fatherName,
            'address'                       => $request->address,
            'pincode'                       => $request->pincode,
            'city'                          => $request->city,
            'state'                         => $request->state,
            'hod_email'                     => $request->hodEmail,
            'dob'                           => $request->dob,
            'birth_place'                   => $request->birthPlace,
            'marital_status'                => $request->maritalStatus,
            'marriage_anniversary_date'     => $request->marriageAnniversaryDate,
            'hod_mobile_no'                 => $request->hodMobileNo,
            'landline_no'                   => $request->LandlineNo,
            'education'                     => $request->education,
            'occupation'                    => $request->occupation,
            'department_name'               => $request->departmentName,
            'designation'                   => $request->designation,
            'what_do_you_want'              => $request->whatDoYouWant,
            'business_description'          => $request->businessDescription,
            'unemployed_education'          => $request->unemployed_education,
            'experiance'                    => $request->experiance,
            'expected_salary'               => $request->expectedSalary,
            'class_name'                    => $request->className,
            'university_name'               => $request->universityName,
            'education_city'                => $request->educationCity,
            'organization_name'             => $request->organizationName,
            'social_designation'            => $request->socialDesignation,
            'kind_of_social_work'           => $request->kindOfSocialWork,
            'extra_activity'                => $request->extraActivity,
            'bussiness_name'                => $request->bussinessName,
            'bussiness_description'         => $request->bussinessDescription,
            'professional_name'             => $request->professionalName,
            'professional_designation'      => $request->professionalDesignation,
            'rtr_department_name'           => $request->rtrDepartmentName,
            'rtr_designation'               => $request->rtrDesignation,
            'rtr_job_description'           => $request->rtrJobDescription,
            'rtr_work_description'          => $request->rtrWorkDescription,
            'blood_group'                   => $request->bloodGroup,
            'fapp_number'                   => $request->fappNumber,
            'fmname1'                       => $request->fmname1,
            'relationshipHOD1'              => $request->relationshipHOD1,
            'fmname2'                       => $request->fmname2,
            'relationshipHOD2'              => $request->relationshipHOD2,
            'fmname3'                       => $request->fmname3,
            'relationshipHOD3'              => $request->relationshipHOD3,
            'fmname4'                       => $request->fmname4,
            'relationshipHOD4'              => $request->relationshipHOD4,
            'fmname5'                       => $request->fmname5,
            'relationshipHOD5'              => $request->relationshipHOD5,
            'fmname6'                       => $request->fmname6,
            'relationshipHOD6'              => $request->relationshipHOD6,
            'fmname7'                       => $request->fmname7,
            'relationshipHOD7'              => $request->relationshipHOD7,
            'fmname8'                       => $request->fmname8,
            'relationshipHOD8'              => $request->relationshipHOD8,
            'fmname9'                       => $request->fmname9,
            'relationshipHOD9'              => $request->relationshipHOD9,
            'fmname10'                      => $request->fmname10,
            'relationshipHOD10'             => $request->relationshipHOD10,
        ];

        $mahasampark = DB::table('sms')->where('type', 'Mahasampark')->first();

        $this->sendSms($request->hodName, $request->hodMobileNo, $mahasampark->sms, $id_no);

        ContactSignUp::insert($hodData);
        $files->move(public_path('/uploads/mahasampark'), $imageName);
        return back()->with('success', 'Your are Successfully Register');
    }
    public function sendSms($name, $mobile, $sms, $id_no)
    {
        $api_key = '560F8445CAC871';
        $contacts = $mobile;
        $from = 'TXTSMS';
        $sms_text = 'श्री/श्रीमती/कुमारी ' . $name . ' जी साहेब बन्दगी कोरी समाज सेवी कर्मचारी संगठन (KSSKS) का सदस्य बनने पर आपका हार्दिक स्वागत है आपका आई डी नम्बर ' . $id_no . ' है www.korissks.org
        अनूप कुमार वर्मा
        संयोजक
        9415882452';
        $encoded_text = utf8_encode($sms_text);
        $message = urlencode($encoded_text);

        //Submit to server

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=58&type=unicode&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $message);
        $response = curl_exec($ch);
        curl_close($ch);
        // echo $response;
    }
    public function activity()
    {
        $socialStreams = Blogs::where('status', 1)->orderBy('id', 'DESC')->limit(15)->get();

        $sideSocialStreams = Blogs::where('status', 1)->orderBy('id', 'DESC')->get();

        return view('frontend.social_stream', compact('socialStreams', 'sideSocialStreams'));
    }

    public function videos()
    {
        $youtubeNews = YoutubeNews::orderBy('id', 'DESC')->get();
        return view('frontend.videos', compact('youtubeNews'));
    }

    public function quickview($id)
    {
        $product = Product::find($id);
        if (session()->get('email') != null) {
            $getUser = PublicUser::where('email', session()->get('email'))->first()->toArray();
            $userCart = Cart::where('user_id', $getUser['id'])->get()->toArray();

            return view('frontend.quick_view', compact('product', 'userCart'));
        }

        return view('frontend.quick_view', compact('product'));
    }

    public function printMedia()
    {
        $newsPapers = NewsPapers::orderBy('id', 'DESC')->get();
        return view('frontend.print-media', compact('newsPapers'));
    }


    public function aboutUs()
    {
        return view('frontend.aboutus');
    }

    public function contactUs()
    {
        return view('frontend.contact_us');
    }


    public function eventIndex()
    {

        $events = Event::orderBy('id', 'DESC')->get();
        return view('frontend.events', compact('events'));
    }

    public function gallery()
    {
        $galleries = Gallery::orderBy('id', 'DESC')->get();
        return view('frontend.gallery', compact('galleries'));
    }

    public function galleryImages($id)
    {
        $images = AddImageInGallery::where('gallery_id', $id)->get();

        return view('frontend.gallery_images', compact('images'));
    }

    public function aboutKssks($id)
    {
        $aboutUs = AboutUs::where('id', $id)->first();

        $aboutUsMenu = AboutUs::all();


        return view('frontend.about_kssks', compact('aboutUs', 'aboutUsMenu'));
    }

    public function aboutKori($id)
    {

        $aboutUs = KoriAboutUs::where('id', $id)->first();

        $aboutUsMenu = KoriAboutUs::all();



        return view('frontend.about_kori', compact('aboutUs', 'aboutUsMenu'));
    }

    public function aboutGreatMan($id)
    {
        $greatMan = GreatMan::where('id', $id)->first();
        return view('frontend.about_great_man', compact('greatMan'));
    }

    public function marathonCreate()
    {
        return view('frontend.marathon');
    }

    public function marathonStore(Request $request)
    {
        $marathonReg = Marathon::all();
        if ($marathonReg->count() <=  475) {
            $rules = [
                'name'          => 'required',
                'fatherName'    => 'required',
                'address'       => 'required',
                'mobile'        => 'required|min:11|numeric',
                'dob'           => 'required',
                'aadhar_no'     => 'required',
                'signature'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'gender'        => 'required',
                'state'         => 'required',
                'district'      => 'required',
                'agree'         => 'required',


            ];
            $this->validate($request, $rules);

            $chest_no = $this->generateChestNo(101, 575, 'marathons');

            $signature = $request->file('signature');
            $signatureExtension = strtolower(trim($signature->getclientoriginalextension()));
            $signatureName = "signature_" . time() . rand(100, 999) . '.' . $signatureExtension;

            $image = $request->file('image');
            $imageExtension  = strtolower(trim($image->getclientoriginalextension()));
            $imageName = "photo_" . time() . rand(100, 999) . '.' . $imageExtension;

            $data = [
                'name'          => $request->name,
                'fatherName'    => $request->fatherName,
                'address'       => $request->address,
                'mobile'        => $request->mobile,
                'dob'           => $request->dob,
                'aadhar_no'     => $request->aadhar_no,
                'signature'     => $signatureName,
                'image'         => $imageName,
                'gender'        => $request->gender,
                'state'         => $request->state,
                'district'      => $request->district,
                'chest_no'      => $chest_no
            ];

            Marathon::insert($data);
            $this->sendSmsTomarathon($request->name,$request->mobile,$chest_no);
            $signature->move(public_path('/uploads/marathon'), $signatureName);
            $image->move(public_path('/uploads/marathon'), $imageName);
            return back()->with('success', 'Your are Successfully Register');
        } else {
            return back()->with('success', 'Registration Full');
        }
    }

    public function runForViranganaCreate()
    {
        return view('frontend.run_for_virangana');
    }

    public function runForViranganaStore(Request $request)
    {

        $total_members = DB::table('run_for_virangana')->get();

        if ($total_members->count() <= 550) {
            $rules = [
                'name'          => 'required',
                'fatherName'    => 'required',
                'address'       => 'required',
                'mobile'        => 'required|min:11|numeric',
                'dob'           => 'required',
                'aadhar_no'     => 'required',
                'signature'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
                'gender'        => 'required',
                'state'         => 'required',
                'district'      => 'required',
                'agree'         => 'required',


            ];
            $this->validate($request, $rules);


            $chest_no = $this->generateChestNo(1601, 2150, 'run_for_virangana');

            $signature = $request->file('signature');
            $signatureExtension = strtolower(trim($signature->getclientoriginalextension()));
            $signatureName = "signature_" . time() . rand(100, 999) . '.' . $signatureExtension;

            $image = $request->file('image');
            $imageExtension  = strtolower(trim($image->getclientoriginalextension()));
            $imageName = "photo_" . time() . rand(100, 999) . '.' . $imageExtension;

            $data = [
                'name'          => $request->name,
                'fatherName'    => $request->fatherName,
                'address'       => $request->address,
                'mobile'        => $request->mobile,
                'dob'           => $request->dob,
                'aadhar_no'     => $request->aadhar_no,
                'signature'     => $signatureName,
                'image'         => $imageName,
                'gender'        => $request->gender,
                'state'         => $request->state,
                'district'      => $request->district,
                'chest_no'      => $chest_no
            ];

            $signature->move(public_path('/uploads/run_for_veerangana'), $signatureName);
            $image->move(public_path('/uploads/run_for_veerangana'), $imageName);
            DB::table('run_for_virangana')->insert($data);
            $this->sendSmsToRunForVeerangana($request->name,$request->mobile,$chest_no);

            return back()->with('success', 'Your are Successfully Register');
        } else {

            return back()->with('success', 'Sorry! Registration Full');
        }
    }

    public function generateChestNo($start, $end, $table)
    {
        $chest_no = rand($start, $end);

        $registerChestNo = DB::table($table)->where('chest_no', $chest_no)->first();
        if ($registerChestNo == null) {

            return $chest_no;
        }
        return $this->generateChestNo($start, $end, $table);
    }


    public function sendSmsTomarathon($name, $mobile, $chest_no)
    {
        $api_key = '560F8445CAC871';
        $contacts = $mobile;
        $from = 'TXTSMS';
        $sms_text = $name . ' Your registration is successful for Veerangana Jhalkaribai Mini Marathon Your chest number is ' . $chest_no;
        // $encoded_text = utf8_encode($sms_text);
        $message = urlencode($sms_text);

        //Submit to server

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=58&type=unicode&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $message);
        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function sendSmsToRunForVeerangana($name, $mobile, $chest_no)
    {
        $api_key = '560F8445CAC871';
        $contacts = $mobile;
        $from = 'TXTSMS';
        $sms_text = $name . ' Your registration is successful for Run for Veerangana Your chest number is ' . $chest_no;
        // $encoded_text = utf8_encode($sms_text);
        $message = urlencode($sms_text);

        //Submit to server

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=58&type=unicode&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $message);
        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function coachingClassesCreate()
    {
        return view('frontend.choching_classes');
    }

    public function coachingClassesStore(Request $request)
    {
        $rules = [
            'name'                          => 'required',
            'father_name'                   => 'required',
            'mother_name'                   => 'required',
            'gender'                        => 'required',
            'contact_address'               => 'required',
            'permanant_address'             => 'required',
            'dob'                           => 'required',
            'mobile'                        => 'required',
            'occupation'                    => 'required',
            'annual_income'                 => 'required',
            'cast'                          => 'required',
            'sub_cast'                      => 'required',
            'signature'                     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'image'                         => 'required|image|mimes:jpeg,jpg,png|max:2048',

        ];
        $this->validate($request, $rules);


        $signature = $request->file('signature');
        $signatureExtension  = strtolower(trim($signature->getclientoriginalextension()));
        $signatureName = "signature" . time() . rand(100, 999) . '.' . $signatureExtension;

        $image = $request->file('image');
        $imageExtension  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = "photo" . time() . rand(100, 999) . '.' . $imageExtension;

        $data = [
            'name'                          => $request->name,
            'father_name'                   => $request->father_name,
            'mother_name'                   => $request->mother_name,
            'gender'                        => $request->gender,
            'contact_address'               => $request->contact_address,
            'permanant_address'             => $request->permanant_address,
            'dob'                           => $request->dob,
            'mobile'                        => $request->mobile,
            'high_school_year'              => $request->high_school_year,
            'high_school_organisation'      => $request->high_school_organisation,
            'high_school_position'          => $request->high_school_position,
            'high_school_marks'             => $request->high_school_marks,
            'high_school_obtain_marks'      => $request->high_school_obtain_marks,
            'high_school_percentage'        => $request->high_school_percentage,
            'intermediate_year'             => $request->intermediate_year,
            'intermediate_organisation'     => $request->intermediate_organisation,
            'intermediate_position'         => $request->intermediate_position,
            'intermediate_marks'            => $request->intermediate_marks,
            'intermediate_obtain_marks'     => $request->intermediate_obtain_marks,
            'intermediate_percentage'       => $request->intermediate_percentage,
            'graduation_year'               => $request->graduation_year,
            'graduation_organisation'       => $request->graduation_organisation,
            'graduation_position'           => $request->graduation_position,
            'graduation_marks'              => $request->graduation_marks,
            'graduation_obtain_marks'       => $request->graduation_obtain_marks,
            'graduation_percentage'         => $request->graduation_percentage,
            'post_graduation_year'          => $request->post_graduation_year,
            'post_graduation_organisation'  => $request->post_graduation_organisation,
            'post_graduation_position'      => $request->post_graduation_position,
            'post_graduation_marks'         => $request->post_graduation_marks,
            'post_graduation_obtain_marks'  => $request->post_graduation_obtain_marks,
            'post_graduation_percentage'    => $request->post_graduation_percentage,
            'diploma_year'                  => $request->diploma_year,
            'diploma_organisation'          => $request->diploma_organisation,
            'diploma_position'              => $request->diploma_position,
            'diploma_marks'                 => $request->diploma_marks,
            'diploma_obtain_marks'          => $request->diploma_obtain_marks,
            'diploma_percentage'            => $request->diploma_percentage,
            'occupation'                    => $request->occupation,
            'annual_income'                 => $request->annual_income,
            'cast'                          => $request->cast,
            'sub_cast'                      => $request->sub_cast,
            'signature'                     => $signatureName,
            'image'                         => $imageName,
        ];



        DB::table('coaching_classes')->insert($data);
        $signature->move(public_path('/uploads/coaching_classes'), $signatureName);
        $image->move(public_path('/uploads/coaching_classes'), $imageName);
        return back()->with('success', 'Your are Successfully Register');
    }

    public function advancedSearch(Request $request)
    {

        $userId = session()->get('id');
        $users = MarriageRegistration::where('status', '=', 1);

        // $users = $users->where('gender','=','male')->get();
        // dd($users);

        if (isset($request->searchFor)) :
            $users = $users->where('gender', $request->searchFor);

        endif;
        if (isset($request->age)) :
            $range = explode('-', $request->age);
            $users = $users->whereBetween('age', [$range[0], $range[1]]);
        endif;

        if (isset($request->height)) :
            $users = $users->where('height', $request->height);

        endif;

        if (isset($request->maritalStatus)) :
            $users = $users->where('marital_status', $request->maritalStatus);

        endif;

        if (isset($request->income) && isset($request->income1)) :
            // dd($request->income,$request->income1);
            $users = $users->whereBetween('annual_income', array((string) $request->income, (string) $request->income1));

        endif;

        if (isset($request->cityPincode)) :
            $users = $users->where('pincode', $request->cityPincode)
                ->orWhere('city', $request->cityPincode);
        endif;

        $users = $users->orderBy('id', 'DESC')->paginate(20);

        // dd($users);
        return view('frontend.search_for_marriage', compact('users', 'userId'));
    }

    public function marriageableUserDetail($id)
    {
        $user = MarriageRegistration::where('id', $id)->first();
        return view('frontend.marriageable_user_detail', compact('user'));
    }
}
