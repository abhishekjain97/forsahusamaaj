<?php

use App\Models\Category;
use App\Models\HelpDesk;
use App\Models\Knowledge;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KarmaController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelpDeskController;
use App\Http\Controllers\MahotsavController;
use App\Http\Controllers\HamaregauravController;
use App\Http\Controllers\SahuSamaajSanghathanController;
use App\Http\Controllers\MandirDharamshalaController;
use App\Http\Controllers\FamousPersonController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\DirectoryController;
use App\Http\Controllers\KnowledgeController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\PublicUserController;
use App\Http\Controllers\YoutubeVideosController;
use App\Http\Controllers\HelpDeskCategoryController;
use App\Http\Controllers\SubmitFromPublicController;
use App\Http\Controllers\BusinessDirCategoryController;
use App\Http\Controllers\BusinessDirSubCategoryController;
use App\Http\Controllers\MarriageRegistrationController;
use App\Http\Controllers\NewsBroadCastController;
use App\Http\Controllers\CareerCounsellingController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\JobPortalController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', function () {
//     return view('frontend.index');
// });
Route::get('/admin',function(){
    return view('admin.admin_login');
});
// Route::get('/dashboard',function(){
//     return view('admin.dashboard');
// });

Route::get('testindex', function () {

    $knowledgeSliders = Knowledge::where('is_featured', 1)->with('subSubCat')->with('subCat')->orderBy('id', 'desc')->limit(4)->get();
    $knowledges = Category::with('getSubCatKnowleadges')->get();

    return view('frontend.index2', compact('knowledges', 'knowledgeSliders'));
});

// Route::get('user_login', function () {

//     return view('frontend.login');
// });

// Route::get('user_register', function () {

//     return view('frontend.user_register');
// });

Route::get('coming', [IndexController::class, 'coming'])->name('coming');
Route::get('testmsg', [MarriageRegistrationController::class, 'sendSms']);
Route::get('getCity/{id}', [MarriageRegistrationController::class, 'getCity']);

//Pulic User Controller Start
Route::post('get-city-by-state', [KnowledgeController::class, 'getCity']);
Route::post('get-states-by-country', [KnowledgeController::class, 'getState']);
Route::post('get-sub-category', [DirectoryController::class, 'getSubCategory']);

// about us 
Route::get('about/sahusamaajkesanghathan', [IndexController::class, 'sahusamaajkesanghathan'])->name('sahusamaajkesanghathan');
Route::get('about/sahusamaajkesanghathan/{slug}', [IndexController::class, 'sahusamaajkesanghathanDetail'])->name('sahusamaajkesanghathanDetail');

// News Broad Cast
Route::get('newsbroadcast', [IndexController::class, 'newsbroadcast'])->name('newsbroadcast');
Route::get('newsbroadcast/{slug}', [IndexController::class, 'newsbroadcastDetail'])->name('newsbroadcastDetail');

// News Broad Cast
Route::get('careercounselling', [IndexController::class, 'careercounselling'])->name('careercounselling');
Route::get('careercounselling/{slug}', [IndexController::class, 'careercounsellingDetail'])->name('careercounsellingDetail');


// Job Portal
Route::get('jobportal', [IndexController::class, 'jobportal'])->name('jobportal');
Route::get('jobportal/{slug}', [IndexController::class, 'jobportalDetail'])->name('jobportalDetail');



// Publication
Route::get('publication', [IndexController::class, 'publication'])->name('publication');
Route::get('publication/{slug}', [IndexController::class, 'publicationDetail'])->name('publicationDetail');


Route::get('about/hamaregaurav', [IndexController::class, 'hamaregaurav'])->name('hamaregaurav');
Route::get('about/hamaregaurav/{slug}', [IndexController::class, 'hamaregauravDetail'])->name('hamaregauravDetail');

Route::get('about/mandirdharamshala', [IndexController::class, 'mandirdharamshala'])->name('mandirdharamshala');
Route::get('about/mandirdharamshala/{slug}', [IndexController::class,'mandirdharamshalaDetail'])->name('mandirdharamshalaDetail');

Route::get('about/famousperson', [IndexController::class, 'famousperson'])->name('famousperson');
Route::get('about/famousperson/{slug}', [IndexController::class, 'famouspersonDetail'])->name('famouspersonDetail');

Route::get('aboutkssks/{id}', [IndexController::class, 'aboutKssks'])->name('aboutkssks');

Route::get('aboutkori/{id}', [IndexController::class, 'aboutKori'])->name('aboutkori');

Route::get('aboutus/{id}', [IndexController::class, 'aboutGreatMan'])->name('greatman');

Route::get('contactus', [IndexController::class, 'contactUs'])->name('contactus');
Route::post('contactStore', [IndexController::class, 'contactStore'])->name('contactStore');

Route::get('marriage/detail/{id}', [IndexController::class, 'marriageableUserDetail'])->name('userdetail');

Route::get('news/{id}', [NewsController::class, 'blogNewsDetail'])->name('news.show');
Route::resource('marriage', MarriageRegistrationController::class);
Route::post('crop', [MarriageRegistrationController::class, 'uploadCropImage'])->name('crop');
Route::get('user_login', [PublicUserController::class, 'showLoginForm'])->name('user_login');
Route::post('user_login', [PublicUserController::class, 'userLogin'])->name('user_login');
Route::get('/user_registration', [PublicUserController::class, 'showRegistrationForm'])->name('user_registration');
Route::post('/user_registration', [PublicUserController::class, 'userRegistration'])->name('user_registration');
Route::get('/logout', [PublicUserController::class, 'logout'])->name('logout');
Route::get('directory/memberdirectory', [DirectoryController::class, 'memberDirectory'])->name('memberdirectory');
Route::get('directory/addmemberdirectory', [DirectoryController::class, 'addmemberDirectoryForm'])->name('addmemberdirectory');
Route::get('directory/businessdirectory', [DirectoryController::class, 'businessDirectory'])->name('businessdirectory');
Route::get('directory/addbusinessdirectory', [DirectoryController::class, 'addBusinessDirectoryForm'])->name('addbusinessdirectory');
Route::post('cropvisitingcard', [DirectoryController::class, 'uploadCropVisitingCard'])->name('cropvisitingcard');

Route::get('directory/socialdirectory', [DirectoryController::class, 'socialDirectory'])->name('socialdirectory');
Route::post('cropsocialprofile', [DirectoryController::class, 'uploadCropSocialProfile'])->name('cropsocialprofile');
Route::post('directory/socialdirfilter', [DirectoryController::class, 'socialDirectoryFilter'])->name('socialdirfilter');
Route::post('directory/socialdirbyname', [DirectoryController::class, 'socialDirectoryByName'])->name('socialdirbyname');
//Route::get('jobportal', [DirectoryController::class, 'jobPortal'])->name('jobportal');

Route::get('teams/{id}', [IndexController::class, 'teams'])->name('teams');
Route::get('teams/teams/{slug}', [IndexController::class, 'teamsDetail'])->name('teamsDetail');




Route::get('helpdesk', [IndexController::class, 'helpDesk'])->name('helpdesk');
Route::get('helpdesk/kids', [IndexController::class, 'helpDeskKids'])->name('kids');
Route::get('helpdesk/medhavichatra', [IndexController::class, 'medhaviChatra'])->name('medhavichatra');
Route::get('helpdesk/pratiyogita', [IndexController::class, 'pratiyogita'])->name('pratiyogita');
Route::get('helpdesk/careermargdarshan', [IndexController::class, 'careerMargdarshan'])->name('careermargdarshan');
Route::get('helpdesk/young', [IndexController::class, 'helpDeskYoung'])->name('young');
Route::get('helpdesk/womens', [IndexController::class, 'helpDeskWomens'])->name('womens');
Route::get('helpdesk/dahejrestrictionact', [IndexController::class, 'dahejRestrictionAct'])->name('dahejrestrictionact');
Route::get('helpdesk/oldpeople', [IndexController::class, 'helpDeskOldPeople'])->name('oldpeople');
Route::get('helpdeskqusans/{id}', [IndexController::class, 'helpDeskQusNAns'])->name('helpdeskqusans');
Route::post('helpdesk/addquestion', [IndexController::class, 'helpDeskAddQuestion'])->name('helpdeskaddqus');
Route::post('helpdesk/addanswer', [IndexController::class, 'helpDeskAddAnswer'])->name('helpdeskaddans');
Route::post('helpdesk/getparamarsh', [AjaxController::class, 'helpDeskParamarsh'])->name('helpdeskgetparamarsh');

Route::get('helpdesk/plan/{catid}/{planid}', [IndexController::class, 'helpDeskDetail'])->name('helpdeskdetail');
Route::post('get_help_desk_plan', [AjaxController::class, 'getHelpDeskPlan'])->name('get_help_desk_plan');
Route::post('plan_detail', [AjaxController::class, 'getPlanDetail'])->name('get_plan_detail');

Route::get('contactsignup', [IndexController::class, 'contactSignUpForm'])->name('contactsignup');
Route::post('contactsignup', [IndexController::class, 'contactSignUp'])->name('contactsignup');

Route::get('activity', [IndexController::class, 'activity'])->name('activity');
Route::get('electronic-media', [IndexController::class, 'videos'])->name('videos');
Route::get('print-media', [IndexController::class, 'printMedia'])->name('printmedia');

Route::get('events', [IndexController::class, 'eventIndex'])->name('events');
Route::get('advertisement', [IndexController::class, 'advertisementIndex'])->name('advertisement');

Route::get('gallery', [IndexController::class, 'gallery'])->name('gallery');
Route::get('gallery/images/{id}', [IndexController::class, 'galleryImages'])->name('galleryimages');

Route::get('mahotsav', [IndexController::class, 'mahotsav'])->name('mahotsav');
Route::get('mahotsav/images/{id}', [IndexController::class, 'mahotsavImages'])->name('mahotsavimages');

Route::get('karma_detail', [IndexController::class, 'karma_detail'])->name('karma_detail');


Route::get('marathon', [IndexController::class, 'marathonCreate'])->name('marathoncreate');
Route::post('marathon', [IndexController::class, 'marathonStore'])->name('marathonstore');
Route::get('marathonregistrationsuccess', [IndexController::class, 'marathonSuccessPage'])->name('marathonregistrationsuccess');

Route::get('runforvirangana', [IndexController::class, 'runForViranganaCreate'])->name('runforviranganacreate');
Route::post('runforvirangana', [IndexController::class, 'runForViranganaStore'])->name('runforviranganastore');

Route::get('veeranganaregistrationsuccess', [IndexController::class, 'veeranganaSuccessPage'])->name('veeranganaregistrationsuccess');

Route::get('coaching_classes', [IndexController::class, 'coachingClassesCreate'])->name('coachingclassescreate');
Route::post('coaching_classes', [IndexController::class, 'coachingClassesStore'])->name('coachingclassesstore');

Route::get('advancedsearch', [IndexController::class, 'advancedSearch'])->name('advancedsearch');


Route::get('donations', [IndexController::class, 'donations'])->name('donations');
Route::post('donationStore', [IndexController::class, 'donationStore'])->name('donationStore');


Route::get('volunteer', [IndexController::class, 'volunteer'])->name('volunteer');

Route::get('list_donor', [IndexController::class, 'list_donor'])->name('list_donor');
Route::get('list_workshop', [IndexController::class, 'list_workshop'])->name('list_workshop');

Route::get('gettest', function () {

    $planDetail = HelpDesk::where('plan', 13)->first();
    dd($planDetail);

});

//Pulic User Controller End

Route::post('/sendotp', [PublicUserController::class, 'sendOtp'])->name('sendotp');
Route::get('/otp', [PublicUserController::class, 'enterotpform'])->name('otp');
Route::get('/resendotp', [PublicUserController::class, 'resendOtp'])->name('resendotp');
Route::post('/verifyotp', [PublicUserController::class, 'verifyOtp'])->name('verifyotp');
Route::post('/userlogin', [PublicUserController::class, 'login']);

// $slug = Str::slug('Laravel 5 Framework', '-');
Route::get('/userlogin', function () {
    if (session()->get('email') == null) {
        return view('/frontend.users.login');
    } else {
        return redirect('/myprofile');
    }
});
//Public User Routes
Route::group(['middleware' => ['customauth']], function () {

    Route::post('directory/addmemberdirectory', [DirectoryController::class, 'addmemberDirectory'])->name('addmemberdirectory');
    Route::get('directory/memberdirectory/search', [DirectoryController::class, 'searchMember'])->name('searchmember');
    Route::get('directory/memberdirectorydetail/{id}', [DirectoryController::class, 'memberDirectoryDetail'])->name('memberDirectoryDetail');

    Route::get('directory/list', [DirectoryController::class, 'memberDirectoryList'])->name('list');
    Route::post('directory/updatemember/{id}', [DirectoryController::class, 'updateDirectoryMember'])->name('updatemember');
    Route::delete('directory/deletemember/{id}', [DirectoryController::class, 'deleteDirectoryMember'])->name('deletemember');
    Route::post('directory/addbusinessdirectory', [DirectoryController::class, 'addBusinessDirectory'])->name('addbusinessdirectory');
    Route::get('directory/businessdirectory/search', [DirectoryController::class, 'businessDirectorySearch'])->name('businessdirectorysearch');
    Route::get('directory/businessdirectorylist', [DirectoryController::class, 'businessDirectoryList'])->name('businessdirectorylist');
    Route::post('directory/updatebusiness/{id}', [DirectoryController::class, 'updateBusiness'])->name('updatebusiness');
    // Route::post('directory/deletebusiness/{id}',[DirectoryController::class,'destroyBusinessDir'])->name('deletebusiness');
    Route::post('directory/addsocialdirectory', [DirectoryController::class, 'addSocialDirectory'])->name('addsocialdirectory');

   // Route::get('jobportal/jobpost', [DirectoryController::class, 'jobPostForm'])->name('jobpost');
    //Route::get('jobportal/jobprofile', [DirectoryController::class, 'jobProfileForm'])->name('jobprofile');

    //Route::post('jobportal/jobpost', [DirectoryController::class, 'jobPost'])->name('jobpost');
    //Route::post('jobportal/jobprofile', [DirectoryController::class, 'jobProfile'])->name('jobprofile');
	
	
    Route::post('addsocialstream', [PublicUserController::class, 'blogNewsStore'])->name('addsocialstream');
	Route::post('newsbroadcast', [PublicUserController::class, 'newsBroadCast'])->name('newsbroadcast');
	Route::post('sahusamaajsanghathan', [PublicUserController::class, 'sahuSamaajSanghathan'])->name('sahusamaajsanghathan');
	Route::post('mandirdharamshala', [PublicUserController::class, 'mandirDharamshala'])->name('mandirdharamshalaadd');
	
	Route::post('productbook', [PublicUserController::class, 'productBook'])->name('productbook');
	
	
	
});

Route::get('test', function () {
    // $abhi =  App\Models\Cart::with('products')->get();
    // foreach ($abhi as $key => $value) {
    //     print_r($value['pname']);
    // }
    // dd($abhi);
    // dd(session()->get('product'));

    dd(Hash::make('admin'));
    date_default_timezone_set('Asia/Kolkata');
    echo $orderDate = date('d-m-Y');
});

Route::get('/flushsession', function () {
    // session()->forget('product');
    session()->flush();
});

Route::get('/', [IndexController::class, 'index']);
Route::get('/quickview/{id}', [IndexController::class, 'quickview']);
// Route::get('create',[IndexController::class,'c'])
Route::post('/addtocart', [IndexController::class, 'addToCart']);
Auth::routes([
    'register' => false, // Register Routes...

    'reset' => false, // Reset Password Routes...

    'verify' => false, // Email Verification Routes...
]);

Route::group(['middleware' => ['auth']], function () {

    /* Kssks Admin Route Start */
    Route::get('admin/dashboard', [HomeController::class, 'index'])->name('admin/dashboard');

    Route::resource('admin/category', CategoryController::class);
    Route::get('admin/subcategory/{id}', [CategoryController::class, 'showSubCategory']);
    Route::get('admin/addsubcat/{id}', [CategoryController::class, 'addSubCategoryForm']);

    Route::resource('admin/team', TeamController::class);
    Route::post('admin/team/crop', [TeamController::class, 'cropTeamMemberImage'])->name('teamcrop');
    Route::resource('admin/businessdirectory', BusinessDirCategoryController::class);
    Route::resource('admin/businessdirectorysubcategory', BusinessDirSubCategoryController::class);
    Route::get('admin/marriage', [MarriageRegistrationController::class, 'marriageIndex'])->name('marriageindex');
    Route::get('admin/marriage/updatestatus/{id}', [MarriageRegistrationController::class, 'marriageUserUpdate'])->name('marriageupdatestatus');
    Route::delete('admin/deletemarriage/{id}', [MarriageRegistrationController::class, 'marriageDelete'])->name('deletemarriage');
    Route::get('admin/membersdir', [AdminController::class, 'memberIndex'])->name('memberindex');
    Route::delete('admin/membersdir/{id}', [AdminController::class, 'deleteMember'])->name('deletemember');
    Route::post('admin/updatememberstatus', [AdminController::class, 'updateMemberStatus'])->name('updatememberstatus');

    Route::get('admin/businessdir', [AdminController::class, 'businessIndex'])->name('businessindex');
    Route::delete('admin/businessdir/{id}', [AdminController::class, 'deleteBusinessDir'])->name('deletebusinessdir');
    Route::post('admin/updateBusinessStatus', [AdminController::class, 'updateBusinessStatus'])->name('updateBusinessStatus');

    Route::get('admin/exclusivedir', [AdminController::class, 'exclusiveIndex'])->name('exclusiveindex');
    Route::delete('admin/exclusivedir/{id}', [AdminController::class, 'deleteExclusiveDir'])->name('deleteexclusivedir');

    Route::get('admin/mahasampark', [AdminController::class, 'mahasamparkIndex'])->name('mahasamparkindex');
    Route::delete('admin/mahasampark/{id}', [AdminController::class, 'deleteMahasampark'])->name('deletemahasampark');

    //HelpDesk Category

    Route::resource('admin/helpdeskcategory', HelpDeskCategoryController::class);
    Route::get('admin/helpdesksubcategory/{id}', [HelpDeskCategoryController::class, 'showSubCategory']);
    Route::get('admin/helpdeskaddsubcat/{id}', [HelpDeskCategoryController::class, 'addSubCategoryForm']);

    Route::post('admin/helpdeskaddsubcat', [HelpDeskCategoryController::class, 'addSubCategory']);
    Route::get('/admin/helpdesksub-sub-category/{subid}', [HelpDeskCategoryController::class, 'allSubSubCategory']);
    Route::get('admin/helpdeskadd-sub-sub-cat/{subid}', [HelpDeskCategoryController::class, 'addSubSubCategoryForm']);
    Route::post('admin/helpdeskadd-sub-sub-cat', [HelpDeskCategoryController::class, 'addSubSubCategory']);
    Route::post('admin/helpdeskget-states-by-country', [KnowledgeController::class, 'getState']);
    Route::post('admin/helpdeskget-sub-sub-menu', [HelpDeskCategoryController::class, 'getSubSubMenu']);

    //Help Desk Category End

    //Help Desk Start

    Route::resource('admin/helpdesk', HelpDeskController::class);
    Route::post('admin/imgupload', [HelpDeskController::class, 'uploadImage'])->name('upload');

    Route::post('admin/help_desk_plan', [AjaxController::class, 'helpDeskPlan']);
    Route::post('admin/help_desk_plan_edit', [AjaxController::class, 'helpDeskPlanEdit']);
    //Help Desk End

    Route::get('admin/blog/index', [NewsController::class, 'blogNewsIndex'])->name('blog.index');
    Route::get('admin/blog/create', [NewsController::class, 'blogNewsCreate'])->name('blog.create');
    Route::post('admin/blog', [NewsController::class, 'blogNewsStore'])->name('blog.store');
    Route::get('admin/blog/{id}', [NewsController::class, 'blogNewsEdit'])->name('blog.edit');
    Route::post('admin/blog/{id}', [NewsController::class, 'blogNewsUpdate'])->name('blog.update');
    Route::delete('admin/blog/{id}', [NewsController::class, 'blogNewsDestroy'])->name('blog.destroy');

    Route::get('admin/youtubenews/index', [NewsController::class, 'youtubeNewsIndex'])->name('youtubenews.index');
    Route::get('admin/youtubenews/create', [NewsController::class, 'youtubeNewsCreate'])->name('youtubenews.create');
    Route::post('admin/youtubenews', [NewsController::class, 'youtubeNewsStore'])->name('youtubenews.store');
    Route::post('admin/youtubenews/{id}', [NewsController::class, 'youtubeNewsUpdate'])->name('youtubenews.update');
    Route::delete('admin/youtubenews/{id}', [NewsController::class, 'youtubeNewsDestroy'])->name('youtubenews.destroy');

    Route::get('admin/printmedia/index', [NewsController::class, 'printMediaIndex'])->name('printmedia.index');
    Route::get('admin/printmedia/create', [NewsController::class, 'printMediaCreate'])->name('printmedia.create');
    Route::post('admin/printmedia', [NewsController::class, 'printMediaStore'])->name('printmedia.store');
    Route::delete('admin/printmedia/{id}', [NewsController::class, 'printMediaDestroy'])->name('printmedia.destroy');

    Route::resource('admin/event', EventController::class);

    Route::resource('admin/gallery', GalleryController::class);
    Route::resource('admin/mahotsav', MahotsavController::class);
    Route::resource('admin/sahusamaajsanghathan', SahuSamaajSanghathanController::class);
	Route::resource('admin/newsbroadcast', NewsBroadCastController::class);
	Route::resource('admin/careercounselling', CareerCounsellingController::class);
	Route::resource('admin/publication', PublicationController::class);
	Route::resource('admin/jobportal', JobPortalController::class);
	
    Route::resource('admin/hamaregaurav', HamaregauravController::class);
	Route::resource('admin/mandirdharamshala', MandirDharamshalaController::class);
	
    Route::resource('admin/famouspersonlist', FamousPersonController::class);
    Route::resource('admin/karma', KarmaController::class);
    Route::resource('admin/workshop', WorkshopController::class);
    Route::resource('admin/volunteer', VolunteerController::class);

    Route::get('admin/addimage', [GalleryController::class, 'addImageInGalleryForm'])->name('addimage');

    Route::get('admin/addimageindex', [GalleryController::class, 'addImageInGalleryIndex'])->name('addimageindex');
    Route::post('admin/addimage', [GalleryController::class, 'addImageInGallery'])->name('addimage');
    Route::delete('admin/deletegalleryimage/{id}', [GalleryController::class, 'deleteGalleryImage'])->name('deletegalleryimage');

    Route::get('admin/aboutus/index', [AdminController::class, 'aboutUs'])->name('aboutusindex');
    Route::post('admin/aboutus/store', [AdminController::class, 'aboutUsStore'])->name('aboutusstore');
    Route::get('admin/aboutus/create', [AdminController::class, 'aboutUsCreate'])->name('aboutuscreate');
    Route::get('admin/aboutus/edit/{id}', [AdminController::class, 'aboutUsEdit'])->name('aboutusedit');
    Route::post('admin/aboutus/update/{id}', [AdminController::class, 'aboutUsUpdate'])->name('aboutusupdate');
    Route::delete('admin/aboutus/delete/{id}', [AdminController::class, 'aboutUsDelete'])->name('aboutusdelete');

    Route::get('admin/kori/index', [AdminController::class, 'koriIndex'])->name('koriindex');
    Route::post('admin/kori/store', [AdminController::class, 'koriStore'])->name('koristore');
    Route::get('admin/kori/create', [AdminController::class, 'koriCreate'])->name('koricreate');
    Route::get('admin/kori/edit/{id}', [AdminController::class, 'koriEdit'])->name('koriedit');
    Route::post('admin/kori/update/{id}', [AdminController::class, 'koriUpdate'])->name('koriupdate');
    Route::delete('admin/kori/delete/{id}', [AdminController::class, 'koriDelete'])->name('koridelete');

    Route::get('admin/great_man/index', [AdminController::class, 'greatmanIndex'])->name('greatmanindex');
    Route::post('admin/great_man/store', [AdminController::class, 'greatmanStore'])->name('greatmanstore');
    Route::get('admin/great_man/create', [AdminController::class, 'greatmanCreate'])->name('greatmancreate');
    Route::get('admin/great_man/edit/{id}', [AdminController::class, 'greatmanEdit'])->name('greatmanedit');
    Route::post('admin/great_man/update/{id}', [AdminController::class, 'greatmanUpdate'])->name('greatmanupdate');
    Route::delete('admin/great_man/delete/{id}', [AdminController::class, 'greatmanDelete'])->name('greatmandelete');
    Route::get('admin/sms', [AdminController::class, 'sms'])->name('sms');
    Route::post('admin/sms/{id}', [AdminController::class, 'updateSms'])->name('updatesms');

    Route::get('admin/marathon', [AdminController::class, 'marathon'])->name('marathon');
    Route::delete('admin/marathon/{id}', [AdminController::class, 'deleteMarathon'])->name('deletemarathon');

    Route::get('admin/runforveerangana', [AdminController::class, 'runForVeerangana'])->name('runforveerangana');
    Route::delete('admin/runforveerangana/{id}', [AdminController::class, 'deleteRunForVeerangana'])->name('deleterunforveerangana');

    // ContactUs
    Route::get('admin/contactUs', [AdminController::class, 'contactUs'])->name('contactUs');
    Route::delete('admin/contactUs/delete/{id}', [AdminController::class, 'contactUsDelete'])->name('contactUsDelete');

    // Donation
    Route::get('admin/donation', [AdminController::class, 'donation'])->name('donation');
    Route::delete('admin/donation/delete/{id}', [AdminController::class, 'donationDelete'])->name('donationDelete');


    Route::get('admin/test', function () {

        $str = "Abhishek";
        echo $str[0];
    });

    /* Kssks Admn Route End */

    Route::get('admin/posts', [SubmitFromPublicController::class, 'index']);
    Route::get('admin/posts/{id}', [SubmitFromPublicController::class, 'deletePublicPostRequest']);

    Route::post('admin/addsubcat', [CategoryController::class, 'addSubCategory']);
    Route::get('/admin/sub-sub-category/{subid}', [CategoryController::class, 'allSubSubCategory']);
    Route::get('admin/add-sub-sub-cat/{subid}', [CategoryController::class, 'addSubSubCategoryForm']);
    Route::post('admin/add-sub-sub-cat', [CategoryController::class, 'addSubSubCategory']);
    Route::post('admin/get-states-by-country', [KnowledgeController::class, 'getState']);
    Route::post('admin/get-city-by-state', [KnowledgeController::class, 'getCity']);
    Route::post('admin/get-sub-sub-menu', [CategoryController::class, 'getSubSubMenu']);

    // Route::get('/admin/subcategory/create', [CategoryController::class, 'subCateFrom']);
    // Route::post('/admin/subcategory/store', [CategoryController::class, 'storeSubCategory']);
    // Route::get('/admin/subcategory', [CategoryController::class, 'indexSubCategory']);
    // Route::get('/admin/sub-sub-category/create', [CategoryController::class, 'subSubCategoryForm']);

    // Knowledge
    Route::resource('admin/knowledge', KnowledgeController::class);

    Route::post('admin/product/getsubcat', [AjaxController::class, 'getSubCat']);
    Route::post('admin/product/{id}/getsubcat', [AjaxController::class, 'getSubCat']);

    Route::resource('admin/product', ProductController::class);

    Route::resource('admin/banner', BannerController::class);

    Route::get('admin/advertising/index', [AdminController::class, 'advertisingIndex'])->name('advertisingindex');
    Route::get('admin/advertising/create', [AdminController::class, 'advertisingCreate'])->name('advertisingcreate');
    Route::post('admin/advertising/store', [AdminController::class, 'advertisingStore'])->name('advertisingstore');
    Route::delete('admin/advertising/destroy/{id}', [AdminController::class, 'advertisingDestroy'])->name('advertisingdestroy');

    Route::get('admin/businesspromotion/index', [AdminController::class, 'businessPromotionIndex'])->name('businesspromotionindex');
    Route::get('admin/businesspromotion/create', [AdminController::class, 'businessPromotionCreate'])->name('businesspromotioncreate');
    Route::post('admin/businesspromotion/store', [AdminController::class, 'businessPromotionStore'])->name('businesspromotionstore');
    Route::delete('admin/businesspromotion/destroy/{id}', [AdminController::class, 'businessPromotionDestroy'])->name('businesspromotiondestroy');

    Route::resource('admin/youtubevideo', YoutubeVideosController::class);
    // Route::resource('admin/event', EventController::class);
    Route::get('admin/addeventcategory', [EventController::class, 'addEventCategory']);
    Route::get('admin/alleventcategories', [EventController::class, 'allEventCategories']);
    Route::post('admin/addeventcategory', [EventController::class, 'addEventCategory']);

    Route::get('admin/change_password', [AdminController::class, 'showChangePassword']);
    Route::post('admin/change_password', [AdminController::class, 'changePassword']);
    Route::get('admin/profile', [AdminController::class, 'profile']);
    Route::post('admin/profile', [AdminController::class, 'updateProfile']);
    Route::get('admin/registerusers', [AdminController::class, 'registerUsers']);
    Route::get('admin/deletereguser/{id}', [AdminController::class, 'deleteRegUser']);
    Route::get('admin/websiteusers', [AdminController::class, 'websiteUsers'])->name('websiteusers');
    Route::delete('admin/deletewebsiteusers/{id}', [AdminController::class, 'deleteWebsiteUsers'])->name('deletewebsiteusers');

});
