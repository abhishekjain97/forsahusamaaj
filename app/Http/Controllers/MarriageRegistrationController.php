<?php

namespace App\Http\Controllers;

use App\Models\MarriageRegistration;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarriageRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persons = MarriageRegistration::where('status', 1)->orderBy('id', 'DESC')->get();

        $states = DB::table('states')->get();
        return view('frontend.marriage', compact('persons','states'));
    }
    public function getCity($id){
        $states = DB::table('states')->where('name',$id)->first();


        $cities = DB::table('cities')->where('state_id',$states->id)->get();
        $data = json_decode($cities);

        foreach($data as $city){
            echo "<option value='$city->city'    >".$city->city."</option>";
        }
        echo "<option value='Other'>Other</option>";
       
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.marriage_registration');
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
            'create_profile_for'        => 'required',
            'gender'                    => 'required',
            'name'                      => 'required',
            'caste'                     => 'required',
            'dob'                       => 'required',
            'birth_time'                => 'required',
            'birth_place'               => 'required',
            'maritalStatus'             => 'required',
            'height'                    => 'required',
            'complexion'                => 'required',
            'manglik'                   => 'required',
            'gotra'                     => 'required',
            'photoUpload'               => 'required',
            'education'                 => 'required',
            'occupation'                => 'required',
            'annualIncome'              => 'required',
            'pincode'                   => 'numeric',
            'city'                      => 'required',
            'state'                     => 'required',
            'country'                   => 'required',
            'contactAddress'            => 'required',
            'mobileNo'                  => 'required|min:11|numeric',
            'email'                     => 'required',
            'fatherName'                => 'required',
            'fatherOccupation'          => 'required',
            'motherName'                => 'required',
            'motherOccupation'          => 'required',
            'brothers'                  => 'numeric',
            'sisters'                   => 'numeric',

        ];



        $this->validate($request, $rules);

        $from = new DateTime($request->dob);
        $to   = new DateTime('today');
        $age = $from->diff($to)->y;


        $userData = [
            'create_profile_for'        => $request->create_profile_for,
            'gender'                    => $request->gender,
            'user_name'                 => $request->name,
            'caste'                     => $request->caste,
            'dob'                       => $request->dob,
            'age'                       => $age,
            'birth_time'                => $request->birth_time,
            'birth_place'               => $request->birth_place,
            'marital_status'            => $request->maritalStatus,
            'height'                    => $request->height,
            'complexion'                => $request->complexion,
            'manglik'                   => $request->manglik,
            'gotra'                     => $request->gotra,
            'profile_image'             => $request->photoUpload,
            'education'                 => $request->education,
            'occupation'                => $request->occupation,
            'annual_income'             => $request->annualIncome,
            'pincode'                   => $request->pincode,
            'city'                      => $request->city,
            'state'                     => $request->state,
            'country'                   => $request->country,
            'contact_address'           => $request->contactAddress,
            'mobile'                    => $request->mobileNo,
            'email'                     => $request->email,
            'other_phone_no'            => $request->otherPhoneNo,
            'phone_no_relation'         => $request->phoneNoRelation,
            'father_name'               => $request->fatherName,
            'father_occupation'         => $request->fatherOccupation,
            'mother_name'               => $request->motherName,
            'mother_occupation'         => $request->motherOccupation,
            'brothers'                  => $request->brothers,
            'married_brothers'          => $request->noOfMBrothers,
            'un_married_brothers'       => $request->noOfUmBrothers,
            'sisters'                   => $request->sisters,
            'married_sisters'           => $request->noOfMSisters,
            'un_married_sisters'        => $request->noOfUmSisters,
            'status'                    => 0
        ];

        MarriageRegistration::insert($userData);
        return back()->with('success', 'Your Registration Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MarriageRegistration  $marriageRegistration
     * @return \Illuminate\Http\Response
     */
    public function show(MarriageRegistration $marriageRegistration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MarriageRegistration  $marriageRegistration
     * @return \Illuminate\Http\Response
     */
    public function edit(MarriageRegistration $marriageRegistration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MarriageRegistration  $marriageRegistration
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MarriageRegistration $marriageRegistration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MarriageRegistration  $marriageRegistration
     * @return \Illuminate\Http\Response
     */
    public function destroy(MarriageRegistration $marriageRegistration)
    {
        dd($marriageRegistration);
    }

    public function uploadCropImage(Request $request)
    {

        // $image = base64_decode($request->image);
        $data = $request->image;


        list($type, $data) = explode(';', $data);
        list(, $data)      = explode(',', $data);


        $data = base64_decode($data);
        $image_name = time() . '.png';
        $path = public_path() . "/uploads/profileimage/" . $image_name;


        file_put_contents($path, $data);

        return response()->json(['success' => true, 'result' => $image_name]);
    }

    public function marriageIndex()
    {
        $marriageRegUsers = MarriageRegistration::all();
        return view('admin.marriage_register_user.index', compact('marriageRegUsers'));
    }
    public function marriageUserUpdate($id)
    {

        $user = MarriageRegistration::where('id', $id)->first();
        if ($user->status == 0) {
            MarriageRegistration::where('id', $id)->update(["status" => 1]);
            return back()->with('success', 'Profile Live');
        }
        if ($user->status == 1) {
            MarriageRegistration::where('id', $id)->update(["status" => 0]);
            return back()->with('success', 'Profile Stop');
        }
    }

    public function marriageDelete($id)
    {
        $marriageUser = MarriageRegistration::where('id', $id)->first();

        unlink(public_path('/uploads/profileimage/' . $marriageUser->profile_image));
        $marriageUser->delete();
        return back()->with('success', 'User Deleted Successfully');
    }

    public function sendSms()
    {
        // $api_key = "560F8445CAC871";
        // $contacts = '9506847777';
        // $from = 'TXTSMS';
        // $str = 'sadfsd';
        // $msg=str_replace('%u', '',$this->utf8_to_unicode($str));//it will convert the normal message to the unicode
        // $sms_text = urlencode($str);


        // //Submit to server

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=35&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=' . 1234567890);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // echo $response;

        // $mahasampark = DB::table('sms')->where('type','Mahasampark')->first();


        // $api_key = '560F8445CAC871';
        // $contacts = '9506847777';
        // $from = 'TXTSMS';
        // $sms_text = $mahasampark->sms;
        // $encoded_text = utf8_encode($sms_text);
        // $message = urlencode($encoded_text);

        // //Submit to server

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=14&type=unicode&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $message);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // echo $response;

        // $api_key = '560F8445CAC871';
        // $contacts = '7755888550';
        // $from = 'TXTSMS';
        // $sms_text = urlencode('Dear People, have a great day');

        // //Submit to server

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=58&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . "&template_id=" . 1234567890);
        // $response = curl_exec($ch);
        // curl_close($ch);
        // echo $response;

        $api_key = '560F8445CAC871';
        $contacts = '9506847777';
        $from = 'TXTSMS';
        $sms_text = urlencode('Dear People, have a great day');

        $api_url = "http://webmsg.smsbharti.com/app/smsapi/index.php?key=" . $api_key . "&campaign=0&routeid=58&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text. "&template_id=" . 1234567890;

        //Submit to server

        $response = file_get_contents($api_url);
        echo $response;
    }
}

// "http://webmsg.smsbharti.com/app/smsapi/index.php?key=560F8445CAC871&campaign=0&routeid=35&type=text&contacts=9506847777&
// senderid=TXTSMS&msg=Dear+People%2C+have+a+great+day&template_id=1234567890"
