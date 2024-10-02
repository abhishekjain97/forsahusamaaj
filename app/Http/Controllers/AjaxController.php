<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HelpDesk;
use App\Models\HelpDeskCategory;
use App\Models\HelpDeskParamarsh;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
  public function getSubCat(Request $request)
  {
    $subCat = Category::where('parent_id', '=', $request->catId)->get();
    $attr['data'] = $subCat;


    return response()->json($subCat);
  }

  public function helpDeskPlan(Request $request)
  {
    $heplDeskPlan = HelpDeskCategory::where('parent_id', $request->plan)->get();

    // $heplDeskPlan = HelpDesk::get();


    return response()->json($heplDeskPlan);
  }

  public function getHelpDeskPlan(Request $request)
  {
    $heplDeskPlan = HelpDeskCategory::where('parent_id', $request->catId)->get();
    $planId = $request->planid;

    // $heplDeskPlan = HelpDesk::get();
    foreach ($heplDeskPlan as $plan) {

      echo '<option  value="' . $plan->id . '"' . (($plan->id == $planId) ? 'selected="selected"' : "") . '>' . $plan->name . '</option>';
    }

    // return response()->json($heplDeskPlan);
  }

  public function getPlanDetail(Request $request)
  {

    $planDetail = HelpDesk::where('plan', $request->plan)->first();

    if ($planDetail == null) {
      $details = '<div class="panel-group text-center" role="tablist" aria-multiselectable="true">
            <h2>No record found</h2>
          </div>';
      $images = null;
    } else {
      $details = '<div class="col-md-offset-1 col-md-10 well-box">
            <div class="sticky-sign-plan"><i class="fa fa-bookmark"></i></div>
            <h2 class="post-title">
                <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i>' . $planDetail->title . '</a>
            </h2>
            <div class="row">
                
                <div class="col-md-12 mt10">' . $planDetail->description . '</div>
                <div class="col-md-12 mt10">
                    <hr style="border-top: 1px solid #c2c2c2;" />
                    <p>क्या आपने अपने परिवार की जानकारी कोरी समाज महासम्पर्क अभियान में भर
                        दी है ? अगर नहीं तो अभी भरें। इसे भरने में मात्र दो मिनिट का समय अवश्य
                        लगेगा परन्तु इससे कोरी समाज को आपका महत्वपूर्ण सहयोग प्राप्त होगा।
                        कोरी समाज महासम्पर्क अभियान के प्रपत्र (फार्म) में जानकारी भरने पर कोई
                        सदस्यता शुल्क नहीं है अभियान पूर्णता नि:शुल्क है। <a href="' . route("contactsignup") . '" class="btn btn-default
                    btn-xs1">Join Mahasampark Abhiyan</a></p>
                </div>
            </div>
        </div>';
      $images = $planDetail->images;
    }



    return response()->json(['details' => $details, 'images' => $images]);
  }

  public function helpDeskParamarsh(Request $request)
  {
    $questions = HelpDeskParamarsh::where(['parent_id' => null, 'paramarsh_id' => $request->paramarsh])->with('childrenCategories')->get();
    // dd($questions);
    $sr = 1;
    foreach ($questions as $key => $question) {

      $qusAns =  '<div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-md-10">
                  <h4 class="panel-title"><strong>Q ' . $sr . ') </strong> <span id="question'.$question->id.'">' . $question->qus_ans . '</span></h4>
                </div>
                <div class="col-md-2">
                  <a href="javascript:void(0)" onclick="addAnswer(' . $question->id . ')" class="btn
                    btn-default btn-sm" style="color:#fff; float:right">Add Answer</a>
                </div>
              </div>
              <div class="text-left">
                <!-- <h4>Jenny venise</h4> -->
                <div class="comment-date">
                  <i class="fa fa-user"></i> ' . $question->name . ',
                  <i class="fa fa-clock-o"></i> '.date('d-M-Y', strtotime($question->created_at)).' </div>
              </div>
            </div>';
      if (count($question->childrenCategories)>0) {
        foreach ($question->childrenCategories as $key => $ans) {
          $qusAns .= '<div class="panel-collapse collapse in">
                <div class="panel-body">
                  <h4><i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i>
                    <strong>Answers</strong></h4>
                  <div class="panel-body-ans">
                    <div class="review-post">
                      <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> ' . $ans->qus_ans . ' </p>
                      <!-- <a href="#" class="btn btn-primary btn-sm"> Reply</a> -->
                    </div>
                    <div class="text-left">
                      <!-- <h4>Jenny venise</h4> -->
                      <div class="comment-date">
                        <i class="fa fa-user"></i> '.$ans->name.',
                        <i class="fa fa-clock-o"></i> '.date('d-M-Y', strtotime($ans->created_at)).' </div>
                    </div>
                  </div>
                </div>
              </div>';
        }
      }else{
        $qusAns .= '<div style="margin:20px">No Answer</div>';
      }

      $qusAns .= '</div>';
      $sr++;
      echo $qusAns;
    }

    // return response()->json(['questions' => $questions]);
  }
}
