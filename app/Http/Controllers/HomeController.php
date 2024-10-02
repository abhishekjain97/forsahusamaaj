<?php

namespace App\Http\Controllers;

use App\Models\ContactSignUp;
use App\Models\MarriageRegistration;
use App\Models\MemberDirectory;
use App\Models\Order;
use App\Models\Product;
use App\Models\PublicUser;
use App\Models\User;
use App\Models\WholeSaleProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */



    public function index()
    {
        $mahasampark = ContactSignUp::all()->count();
        $marriageRegUsers = MarriageRegistration::all()->count();
        $memberDirectory = MemberDirectory::all()->count();
        // $countWholeSaleProducts = WholeSaleProduct::count();
        return view('admin.dashboard',compact('mahasampark','marriageRegUsers','memberDirectory'));
    }   
 
}