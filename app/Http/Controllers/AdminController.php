<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AboutUs;
use App\Models\Contact;
use App\Models\Donation;
use App\Models\GreatMan;
use App\Models\Marathon;
use App\Models\PublicUser;
use App\Models\KoriAboutUs;
use Illuminate\Http\Request;
use App\Models\ContactSignUp;
use App\Models\MemberDirectory;
use App\Models\SocialDirectory;
use App\Models\BusinessDirectory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login()
    {

        return view('admin.admin_login');
    }

    public function showChangePassword()
    {
        return view('admin.change_password');
    }


    public function changePassword(Request $request)
    {

        if (Auth::Check()) {
            $request_data = $request->All();


            $rules = [
                'current-password' => 'required',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password',
            ];

            $customMessage = [
                'current-password.required' => 'Please enter current password',
                'password.required' => 'Please enter password',
            ];

            $this->validate($request, $rules, $customMessage);

            $current_password = Auth::User()->password;
            if (Hash::check($request_data['current-password'], $current_password)) {
                $user_id = Auth::User()->id;
                $obj_user = User::find($user_id);
                $obj_user->password = Hash::make($request_data['password']);
                $obj_user->save();
                return back()->with('success', 'Password Changed Successfully');
            } else {

                return back()->with('error', 'Please enter correct current password');
            }
        } else {
            return redirect()->to('/');
        }
    }

    public function profile()
    {
        return view('admin.admin_profile');
    }

    public function updateProfile(Request $request)
    {
        $userProfile = User::where('email', $request->email)->first()->toArray();

        $rules = [
            'name' => 'required',
            'profile' => 'image|mimes:jpg,png,jpeg|max:2048',
        ];

        $customMessage = [
            'name.required' => 'Admin Name is required.',
            'profile.image' => 'Choose Image Only.',
            'profile.mimes' => 'Image Must Be File Type jpg,png,jpg'
        ];
        $this->validate($request, $rules, $customMessage);

        if ($request->file('profile') != null) {

            $files = $request->file('profile');
            $imageExtension  = strtolower(trim($files->getclientoriginalextension()));
            $imageName = time() . rand(100, 999) . '.' . $imageExtension;
            $files->move(public_path('/admin_assets/dist/img'), $imageName);

            if ($userProfile['profile'] != null) {
                unlink(public_path('/admin_assets/dist/img/' . $userProfile['profile']));
            }
            $data = [
                'name' => $request->name,
                'profile' => $imageName
            ];
        } else {
            $data = [
                'name' => $request->name

            ];
        }
        User::where('email', $request->email)->update($data);

        return back()->with('success', 'Profile Updated');
    }

    public function registerUsers()
    {
        $registerUsers = PublicUser::where('is_verified', 1)->orderBy('id', 'DESC')->get();
        return view('admin.register_users', compact('registerUsers'));
    }

    public function deleteRegUser($id)
    {
        $regUser = PublicUser::find($id);
        $regUser->delete($id);
        return back()->with('success', 'User Deleted');
    }

    //----------------------------------------------------------------
    // KSSKS About Us
    //----------------------------------------------------------------

    public function aboutUs()
    {
        $aboutUs = AboutUs::all();
        return view('admin.aboutus.index_kssks', compact('aboutUs'));
    }

    public function aboutUsStore(Request $request)
    {
        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        AboutUs::insert($aboutUsData);
        return back()->with('success', 'About Us Added');
    }
    public function aboutUsCreate()
    {
        return view('admin.aboutus.create_kssks');
    }
    public function aboutUsEdit($id)
    {
        $aboutUs = AboutUs::where('id', $id)->first();
        return view('admin.aboutus.edit_kssks', compact('aboutUs'));
    }

    public function aboutUsUpdate(Request $request, $id)
    {
        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        AboutUs::where('id', $id)->update($aboutUsData);

        return back()->with('success', 'About Us Updated');
    }

    public function aboutUsDelete($id)
    {

        AboutUs::where('id', $id)->delete();
        return back()->with('success', 'About Us Deleted');
    }

    //----------------------------------------------------------------
    // Kori About Us 
    //----------------------------------------------------------------

    public function koriIndex()
    {
        $aboutUs = KoriAboutUs::all();
        return view('admin.aboutus.index_kori', compact('aboutUs'));
    }

    public function koriStore(Request $request)
    {
        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        KoriAboutUs::insert($aboutUsData);
        return back()->with('success', 'About Us Added');
    }
    public function koriCreate()
    {
        return view('admin.aboutus.create_kori');
    }
    public function koriEdit($id)
    {
        $aboutUs = KoriAboutUs::where('id', $id)->first();
        return view('admin.aboutus.edit_kori', compact('aboutUs'));
    }

    public function koriUpdate(Request $request, $id)
    {
        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        KoriAboutUs::where('id', $id)->update($aboutUsData);

        return back()->with('success', 'About Us Updated');
    }

    public function koriDelete($id)
    {

        KoriAboutUs::where('id', $id)->delete();
        return back()->with('success', 'About Us Deleted');
    }
    //----------------------------------------------------------------
    // Great Man 
    //----------------------------------------------------------------
    public function greatmanIndex()
    {
        $aboutUs = GreatMan::all();

        return view('admin.aboutus.index_great_man', compact('aboutUs'));
    }

    public function greatmanStore(Request $request)
    {

        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        GreatMan::insert($aboutUsData);
        return back()->with('success', 'About Us Added');
    }
    public function greatmanCreate()
    {
        return view('admin.aboutus.create_great_man');
    }
    public function greatmanEdit($id)
    {
        $aboutUs = GreatMan::where('id', $id)->first();
        return view('admin.aboutus.edit_great_man', compact('aboutUs'));
    }

    public function greatmanUpdate(Request $request, $id)
    {
        $rules = [
            'menu_name'     => 'required',
            'description'   => 'required',
        ];


        $this->validate($request, $rules);

        $aboutUsData = [
            'menu_name'     => $request->menu_name,
            'description'   => $request->description,
        ];

        GreatMan::where('id', $id)->update($aboutUsData);

        return back()->with('success', 'About Us Updated');
    }

    public function greatmanDelete($id)
    {

        GreatMan::where('id', $id)->delete();
        return back()->with('success', 'About Us Deleted');
    }

    public function memberIndex()
    {
        $members = MemberDirectory::with('country')->with('state')->with('city')->orderBy('id', 'DESC')->get();
        return view('admin.directories.member_directory', compact('members'));
    }

    public function updateMemberStatus(Request $request)
    {
        $data = explode("/", $request->status);
        $status = $data[0];
        $id = $data[1];

        $memberData = [
            'status'  =>  $status,
        ];

        MemberDirectory::where('id', $id)->update($memberData);
        echo "success";
    }

    public function deleteMember($id)
    {
        MemberDirectory::where('id', $id)->delete();

        return back()->with('success', 'Member Deleted successfully');
    }


    public function businessIndex()
    {
        $businessDir = BusinessDirectory::with('category')->with('sub_category')->with('country')->with('state')->with('city')->orderBy('id', 'DESC')->get();
        return view('admin.directories.business_directory', compact('businessDir'));
    }

    public function updateBusinessStatus(Request $request)
    {
        $data = explode("/", $request->status);
        $status = $data[0];
        $id = $data[1];

        $memberData = [
            'status'  =>  $status,
        ];

        BusinessDirectory::where('id', $id)->update($memberData);
        echo "success";
    }

    public function deleteBusinessDir($id)
    {
        $visiting_card = BusinessDirectory::where('id', $id)->first();
        BusinessDirectory::where('id', $id)->delete();
        unlink(public_path('uploads/business_visiting_cards/' . $visiting_card->visiting_card));

        return back()->with('success', 'Business Deleted successfully');
    }

    public function exclusiveIndex()
    {
        $socialDir = SocialDirectory::orderBy('id', 'DESC')->get();
        return view('admin.directories.social_directory', compact('socialDir'));
    }

    public function deleteExclusiveDir($id)
    {
        $socialDir = SocialDirectory::where('id', $id)->first();

        SocialDirectory::where('id', $id)->delete();
        unlink(public_path('uploads/socialdirectory/' . $socialDir->image));

        return back()->with('success', 'Directory Deleted successfully');
    }
    public function mahasamparkIndex()
    {
        $mahasamparkLists = ContactSignUp::orderBy('id', 'DESC')->get();
        return view('admin.mahasampark_index', compact('mahasamparkLists'));
    }

    public function deleteMahasampark($id)
    {

        $mahasampark  = ContactSignUp::where('id', $id)->first();

        unlink(public_path('uploads/mahasampark/' . $mahasampark->image));
        $mahasampark->delete();
        return back()->with('success', 'Data Deleted successfully');
    }

    public function advertisingIndex()
    {
        $advertisementImages = DB::table('advertisings')->get();
        return view('admin.index_advertisement', compact('advertisementImages'));
    }

    public function advertisingCreate()
    {
        return view('admin.create_advertisement_form');
    }
    public function advertisingStore(Request $request)
    {

        $rules = [
            'image'     => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageExtension  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $data = [
            'image'     => $imageName
        ];

        DB::table('advertisings')->insert($data);

        $image->move(public_path('/uploads/add_business_promotion/'), $imageName);
        return back()->with('success', 'Data Uploaded Successfully');
    }
    public function advertisingDestroy($id)
    {
        $advertisementImage = DB::table('advertisings')->where('id', $id)->first();

        DB::table('advertisings')->where('id', $id)->delete();
        unlink(public_path('/uploads/add_business_promotion/' . $advertisementImage->image));
        return back()->with('success', 'Data Deleted successfully');
    }

    public function businessPromotionIndex()
    {
        $advertisementImages = DB::table('business_promotions')->get();
        return view('admin.index_business_promotion', compact('advertisementImages'));
    }

    public function businessPromotionCreate()
    {
        return view('admin.create_business_promotion_form');
    }
    public function businessPromotionStore(Request $request)
    {

        $rules = [
            'image'     => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ];

        $this->validate($request, $rules);

        $image = $request->file('image');
        $imageExtension  = strtolower(trim($image->getclientoriginalextension()));
        $imageName = time() . rand(100, 999) . '.' . $imageExtension;

        $data = [
            'image'     => $imageName
        ];

        DB::table('business_promotions')->insert($data);

        $image->move(public_path('/uploads/add_business_promotion/'), $imageName);
        return back()->with('success', 'Data Uploaded Successfully');
    }
    public function businessPromotionDestroy($id)
    {
        $advertisementImage = DB::table('business_promotions')->where('id', $id)->first();

        DB::table('business_promotions')->where('id', $id)->delete();
        unlink(public_path('/uploads/add_business_promotion/' . $advertisementImage->image));
        return back()->with('success', 'Data Deleted successfully');
    }

    public function sms(Request $request)
    {

        $messages = DB::table('sms')->get();
        return view('admin.sms', compact('messages'));
    }

    public function updateSms(Request $request, $id)
    {
        DB::table('sms')->where('id', $id)->update(['sms' => $request->sms]);
        return back()->with('success', 'Message Updated successfully');
    }

    public function websiteUsers()
    {
        $websiteUsers = PublicUser::orderBy('id', 'DESC')->get();
        return view('admin.website_register_users', compact('websiteUsers'));
    }

    public function deleteWebsiteUsers($id)
    {
        PublicUser::where('id', $id)->delete();
        return back()->with('success', 'User Deleted successfully');
    }
    public function marathon()
    {
        $marathons = Marathon::all();
        return view('admin.other_services.marathon', compact('marathons'));
    }

    public function deleteMarathon($id)
    {
        $marathon = Marathon::where('id',$id)->first();
        unlink(public_path('uploads/marathon/'.$marathon['signature']));
        unlink(public_path('uploads/marathon/'.$marathon['image']));
        $marathon->delete();
        return back()->with('success', 'Data Deleted successfully');
    }

    public function runForVeerangana()
    {
        $veeranganas = DB::table('run_for_virangana')->get();
        return view('admin.other_services.run_for_veerangana', compact('veeranganas'));
    }

    public function deleteRunForVeerangana($id)
    {
        $veerangana = DB::table('run_for_virangana')->where('id', $id)->first();

        unlink(public_path('uploads/run_for_veerangana/'.$veerangana->signature));
        unlink(public_path('uploads/run_for_veerangana/'.$veerangana->image));
        DB::table('run_for_virangana')->where('id', $id)->delete();
        return back()->with('success', 'Data Deleted successfully');
    }

    public function contactus()
    {
        $contact = DB::table('contacts')->get();
        return view('admin.contactus', compact('contact'));
    }
    public function contactUsDelete($id)
    {
        Contact::where('id', $id)->delete();
        return back()->with('success', 'User Deleted successfully');
    }
    public function donation()
    {
        $donation = DB::table('donations')->get();
        return view('admin.donation', compact('donation'));
    }
    public function donationDelete($id)
    {
        Donation::where('id', $id)->delete();
        return back()->with('success', 'User Deleted successfully');
    }

}
