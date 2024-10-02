<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpSendMail;
use App\Models\Blogs;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Event;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\PublicUser;
use App\Models\PublicUserAddresses;
use App\Models\Wishlists;
use App\Models\Membership;
use Carbon\Carbon;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Razorpay\Api\Api;
use Illuminate\Support\Str;
use App\Http\Controllers\NewsBroadCastController;
use App\Models\NewsBroadCast;
use App\Http\Controllers\SahuSamaajSanghathanController;
use App\Http\Controllers\MandirDharamshalaController;
use App\Models\SahuSamaajSanghathan;
use App\Models\MandirDharamshala;

class PublicUserController extends Controller
{
    public function showRegistrationForm()
    {
        $memberships = Membership::where('status', 1)->get();
        return view('frontend.users.user_register', compact('memberships'));
    }

    public function showLoginForm()
    {
        return view('frontend.users.login');
    }

    public function sendOtp(Request $request)
    {
        $rules = [
            'email' => 'required|email|unique:public_users|max:50'
        ];
        $this->validate($request, $rules);
        $otp = rand(100000, 999999);
		

        $email = $request->email;

        $to_name = $request->email;
        $to_email = $request->email;

        $data = array('otp' => $otp);
        session()->put('otp', $otp);
        session()->put('unverifiedemail', $request->email);

        // session()->forget('otp');

        // Send Otp for verify email
        Mail::send('frontend/mail/verify_mail', $data, function ($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                ->subject('Your Otp');
            $message->from('testingkeliye1@gmail.com', 'Ujjwala Hoiesory');
        });

        PublicUser::insert(['email' => $request->email, 'otp' => $otp]);

        return redirect('otp')->with('success', 'OTP Send Your Mobile No Please Enter And');
    }



    // public function resendOtp()
    // {

    //     $to_name = session()->get('unverifiedemail');
    //     $to_email = session()->get('unverifiedemail');

    //     $getUser = PublicUser::where('email', $to_email)->first()->toArray();
    //     $getOtp = $getUser['otp'];
    //     $data = array('otp' => $getOtp);

    //     Mail::send('frontend/mail/verify_mail', $data, function ($message) use ($to_name, $to_email) {
    //         $message->to($to_email, $to_name)
    //             ->subject('Your Otp');
    //         $message->from('testingkeliye1@gmail.com', 'Ujjwala Hoiesory');
    //     });

    //     return redirect('otp')->with('message', 'Otp Resend');
    // }
    // public function verifyOtp(Request $request)
    // {
    //     $enterOtp = $request->enterotp;
    //     $enterEmail = session()->get('unverifiedemail');
    //     $getUser = PublicUser::where('email', $enterEmail)->first()->toArray();
    //     $getOtp = $getUser['otp'];

    //     $rules = [
    //         'name' => 'required|string',
    //         'password' => 'required|min:6'
    //     ];
    //     $this->validate($request, $rules);
    //     $hashed = md5($request->password);

    //     if ($enterOtp == $getOtp) {
    //         session()->put('email', $enterEmail);
    //         session()->forget(['unverifiedemail', 'otp']);
    //         $sessionProducts = session()->get('product');

    //         PublicUser::where('email', $enterEmail)
    //             ->update(['name' => $request->name, 'password' => $hashed, 'is_verified' => 1]);

    //         if ($sessionProducts != null) {
    //             foreach ($sessionProducts as $key => $value) {
    //                 Cart::insert([
    //                     'product_id' => $value['product_id'],
    //                     'user_id' => $getUser['id'],
    //                     'product_qty' => $value['product_qty'],
    //                     'product_size' => $value['product_size']
    //                 ]);
    //             }
    //         }
    //         session()->forget('product');
    //         session()->put('username', $request->name);
    //         session()->put('id', $getUser['id']);
    //         // $userCart = Cart::where('user_id',$getUser['id']);
    //         return redirect('/');
    //     } else {
    //         return redirect('otp')->with('error', 'OTP Not Match');
    //     }
    // }

    public function userRegistration(Request $request)
    {
        
        $rules = [
            'name'      => 'required|string',
            'email'     => 'required|email|unique:public_users',
            'mobile'    => 'required|digits:10|numeric|unique:public_users',
            'password'  => 'required|confirmed',
            'insert_image' => 'required|mimes:jpeg,jpg,png|max:2048',

            'password'  => 'required|confirmed',
        ];

        $this->validate($request, $rules);

        $files = $request->file('insert_image');
        $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $otp = rand(100000, 999999);
        $hashed = md5($request->password);


        $membership_detail = Membership::find($request->membership_id);
        $membership_start = Carbon::now();
        $date = Carbon::now();
        if($membership_detail->duration_type == 'month') {
            $membership_end = $date->addMonth($membership_detail->duration);
        } else if($membership_detail->duration_type == 'year') {
            $membership_end = $date->addYear($membership_detail->duration);
        }
        

        $userData = [
            'name'      => $request->name,
            'email'     => $request->email,
            'mobile'    => $request->mobile,
            'insert_image' => $imageName,
            'password'  => $hashed,
            'otp'       => $otp,
            'membership_id' => $request->membership_id,
            'membership_start' => $membership_start,
            'membership_end'  => $membership_end
        ];
        // dd($userData);
        $request->session()->put('user', $userData);

        $this->sms($request->mobile, $request->name, $otp);

        $files->move(public_path('/uploads/registration'), $imageName);
        return redirect()->route('otp')->with('success', 'OTP Sent Mobile Number! Please Verify Your Mobile Number '.$otp );

        // PublicUser::insert($userData);
        // return back()->with('success', 'Thanks For Registration');
    }
    public function sms($mobile, $name, $otp)
    {
        $api_key = "560F8445CAC871";
        $contacts = $mobile;
        $from = 'TXTSMS';
        $msg = $name . ' Your Otp is ' . $otp;
        $sms_text = urlencode($msg);

        //Submit to server

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://webmsg.smsbharti.com/app/smsapi/index.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "key=" . $api_key . "&campaign=0&routeid=58&type=text&contacts=" . $contacts . "&senderid=" . $from . "&msg=" . $sms_text . '&template_id=' . 1234567890);
        $response = curl_exec($ch);
        curl_close($ch);
    }

    public function enterotpform()
    {   
        if (session()->has('user')) {
            return view('frontend.users.otp');
        } else {
            return redirect('/');
        }
    }

    public function resendOtp()
    {
        $user = session()->get('user');
        // dd($user);
        $mobile = $user['mobile'];
        $name = $user['name'];
        $otp = $user['otp'];

        $this->sms($mobile, $name, $otp);


        return redirect()->route('otp')->with('success', 'Otp Resend');
    }

    public function verifyOtp(Request $request)
    {
        $user = session()->get('user');


        if ($user['otp'] == $request->otp) {

            $userData = [
                'name'              => $user['name'],
                'email'             => $user['email'],
                'mobile'            => $user['mobile'],
                'password'          => $user['password'],
                'membership_id'     => $user['membership_id'],
                'membership_start'  => $user['membership_start'],
                'membership_end'    => $user['membership_end'],
            ];
            PublicUser::insert($userData);

            $request->session()->forget('user');

            return redirect()->route('user_login')->with('success', 'Otp Verified! Please Login..');
        } else {

            return back()->with('error', 'Please Enter Valid Otp !');
        }
    }

    public function userLogin(Request $request)
    {

        $rules = [
            'mobile'        => 'required|digits:10|numeric',
            'password'      => 'required|string',
        ];

        $this->validate($request, $rules);

        $hashed = md5($request->password);
        $userMobile = PublicUser::where('mobile', $request->mobile)->first();

        if ($userMobile != null) {
            $user = PublicUser::where('mobile', $request->mobile)->where('password', $hashed)->first();
            $membership_detail = Membership::where('id', $user['membership_id'])->select('type')->first();


            if ($user != null) {

                session()->put('email', $user['email']);

                session()->put('id', $user['id']);
                session()->put('membership_id', $user['membership_id']);
                session()->put('membership_type', $membership_detail->type);
                session()->put('membership_start', $user['membership_start']);
                session()->put('membership_end', $user['membership_end']);

                return redirect('/');
            } else {

                return back()->with('error', 'These credentials do not match our records.');
            }
        } else {
            return back()->with('error', 'These credentials do not match our records.');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/');
    }

    public function blogNewsStore(Request $request)
    {
        $rules = [
            'title'             => 'required|string',
            'description'       => 'required|string'

        ];

        $this->validate($request, $rules);

        if ($request->file('image') != null) {
            $thumbnail = $request->file('image');
            $imageOrignalName  = strtolower(trim($thumbnail->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
        }
        $userId = session()->get('id');

        $blogNewsData = [
            'title'             => $request->title,
            'image'             => $imageName,
            'description'       => $request->description,
            'posted_by'         => $userId,
            'status'            =>  0

        ];

        Blogs::insert($blogNewsData);
        $thumbnail->move(public_path('/uploads/news'), $imageName);
        return back()->with('success', 'Blog Uploaded');
    }
	public function newsBroadCast(Request $request)
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

		$userId = session()->get('id');
        $user = PublicUser::where('id', $userId)->first();
		
        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'posted_by'=> $user->name,
			'status' => '0',
        ];

        NewsBroadCast::insert($mahotsav);
        $image->move(public_path('/uploads/news_broad_cast'), $imageName);
        return back()->with('success', 'News Created Successfully');
    }
	
	
	
	public function mandirDharamshala(Request $request)
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

        $userId = session()->get('id');


        $user = PublicUser::where('id', $userId)->first();
		
        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
			'tagline' => $request->tagline,
			'location' => $request->location,
            'description' => $request->description,
            'image' => json_encode($images_array),
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'posted_by'=> $user->name,
			'status' => '0',
            'sanghanthantype' => $request->sanghanthantype,
            'contact_person_name' => $request->contact_person_name,
            'mobile_no' => $request->mobile_no,
            'email' => $request->email,
            'website' => $request->website,
        ];

        MandirDharamshala::insert($mahotsav);
        
        return back()->with('success', 'Mandir Dharamshala Created Successfully');
    }
	
	
	
	
	public function sahuSamaajSanghathan(Request $request)
    {
        $rules = [
            'title' => 'required|string',
            'date' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'state_id' => 'required',
            'city_id' => 'required',
			'membership_type' => 'required',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageOrignalName = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageOrignalName;
		
		$logo = $request->file('logo');
        $logoName = strtolower(trim($logo->getclientoriginalextension()));
        $logoName = time() . rand(100, 999) . '.' . $logoName;
		
		$userId = session()->get('id');


        $user = PublicUser::where('id', $userId)->first();
		
        $mahotsav = [
            'title' => $request->title,
            'date' => $request->date,
            'description' => $request->description,
            'image' => $imageName,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
			'posted_by'=> $user->name,
			'sanghanthantype' => $request->sanghanthantype,
			'president_name' => $request->president_name,
			'mobile_no' => $request->mobile_no,
			'whatsapp_no' => $request->whatsapp_no,
			'membership_type' => $request->membership_type,
			'logo' => $logoName,
			'status' => '0',
        ];

        SahuSamaajSanghathan::insert($mahotsav);
        $image->move(public_path('/uploads/sahu_samaaj_sanghathan'), $imageName);
        return back()->with('success', 'Sanghathan Created Successfully');
    }
	
	
	
	
}
