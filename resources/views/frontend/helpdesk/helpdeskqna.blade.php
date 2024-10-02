@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- <ol class="breadcrumb">
                                    <li><a href="#">Home</a></li>
                                    <li class="active">Your Directory</li>
                            </ol> -->
            </div>
            <div class="col-md-8">
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('error') }}
            </div>

            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible alert-block" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    <li> {{ session()->get('success') }}</li>
                </ul>
            </div>
            @endif
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="https://www.kayasthasamaj.in/helpdesk" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a>योजनाओं
                        की जानकारी देखें</h1>
                </div>
            </div>
        </div>
        <div class="row ">
            <form action="https://www.kayasthasamaj.in/directory1/search" method="post" id="addMemDirForm"
                class="addMemDirForm">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 finder-block">

                        <div class="finderform">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="control-label-help">योजना / Plan</label>
                                    <select class="form-control" name="plans" id="plans"
                                        onchange="loadView(this.value)">
                                        <option selected disabled>Select Plan</option>
                                        @foreach ($paramarsh as $item)
                                        <option value="{{$item->id}}" @if ($item->id == $id)
                                            {{'selected'}}
                                            @endif >{{$item->name}}</option>
                                        @endforeach

                                        {{-- <option value="19">रोजगार परामर्श</option>
                                        <option value="20">शैक्षणिक परामर्श</option>
                                        <option value="21">चिकित्सा परामर्श</option>
                                        <option value="22">वित्तीय परामर्श</option>
                                        <option value="23">व्यवसाय परामर्श</option>
                                        <option value="24">सुरक्षा परामर्श</option> --}}
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt20" id="viewContents" style="display:none"></div>

            <div class="row mt20" id="viewConsultation">
                <div class="col-md-12">
                    <div class="section-title mb20 text-center">
                        <h1 id="heading"> परामर्श</h1>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="filter-sidebar" id="filter-sidebar">
                        <div class="col-md-12 form-title">
                            <h2 style="font-size:16px">Write your question here : </h2>
                        </div>
                        <form name="createQuestion" id="createQuestion" method="post"
                            action="{{route('helpdeskaddqus')}}">
                            @csrf
                            <input type="hidden" name="paramarsh_id" value="" id="paramarsh_id">
                            <div class="col-md-12 form-group">
                                <label class="control-label">Name <span class="required">*</span></label>
                                <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control">
                            </div>
                            <div class="col-md-12 form-group">
                                <label class="control-label">Your Problem / Question<span
                                        class="required">*</span></label>
                                <textarea class="form-control" rows="3" id="message" name="message"
                                    placeholder="Write your problem here..."></textarea>
                            </div>
                            <div class="col-md-12 form-group">
                                <button type="submit" class="btn btn-primary btn-block">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-8 st-accordion" id="stAccordion">
                    {{-- <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-md-10">
                                    <h4 class="panel-title"><strong>Q1) </strong> <span id="question44">aa</span>
                                    </h4>
                                </div>
                                <div class="col-md-2">
                                    <a href="javascript:void(0)" onclick="addAnswer(44)" class="btn btn-default btn-sm"
                                        style="color:#fff; float:right">Add
                                        Answer</a>
                                </div>
                            </div>
                            <div class="text-left">
                                <!-- <h4>Jenny venise</h4> -->
                                <div class="comment-date">
                                    <i class="fa fa-user"></i> aa,
                                    <i class="fa fa-clock-o"></i> 19 Jul, 2021 </div>
                            </div>
                        </div>
                        <div class="panel-collapse collapse in">
                            <div class="panel-body">
                                <h4><i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i>
                                    <strong>Answers</strong></h4>
                                <div class="panel-body-ans">
                                    <div class="review-post">
                                        <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> 545 </p>
                                        <!-- <a href="#" class="btn btn-primary btn-sm"> Reply</a> -->
                                    </div>
                                    <div class="text-left">
                                        <!-- <h4>Jenny venise</h4> -->
                                        <div class="comment-date">
                                            <i class="fa fa-user"></i> 456,
                                            <i class="fa fa-clock-o"></i> 19 Jul, 2021 </div>
                                    </div>
                                </div>
                                <div class="panel-body-ans">
                                    <div class="review-post">
                                        <p> <i class="fa fa-hand-o-right" aria-hidden="true"></i> asdf </p>
                                        <!-- <a href="#" class="btn btn-primary btn-sm"> Reply</a> -->
                                    </div>
                                    <div class="text-left">
                                        <!-- <h4>Jenny venise</h4> -->
                                        <div class="comment-date">
                                            <i class="fa fa-user"></i> Adsf,
                                            <i class="fa fa-clock-o"></i> 28 Jul, 2021 </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Write your answer here</h4>
            </div>
            <form action="{{route('helpdeskaddans')}}" method="post" id="postAnswer">
                @csrf
                <div class="modal-body">
                    <h4 id="questionDis"></h4>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Name :</label>
                                <input type="text" class="form-control" id="ansName" name="ansName"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="form-group">
                                <label>Answer :</label>
                                <textarea class="form-control" id="answer" name="answer" rows="4"
                                    placeholder="Write answer..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" id="quId" name="quId" value="">
                <input type="hidden" class="paramarsh_id" name="paramarsh_id" value="">
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default" onclick="submitAns();">Submit</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('frontend_assets/js/jquery.validate.js') }}"></script>
<script>
    $(document).ready(function() {
    // $("#viewConsultation").hide();
        loadView({{$id}});
        $(".paramarsh_id").val({{$id}});

$('#createQuestion').validate({
     rules: {
             'name':{
                 required: true,
             },
             'message':{
                 required: true,
             }
     },
     messages: {
             'name':{
                 required: "Name field is required",
             },
             'message':{
                 required: "Question field is required",
             }
     }
});

$('#postAnswer').validate({
     rules: {
             'ansName':{
                 required: true,
             },
             'answer':{
                 required: true,
             }
     },
     messages: {
             'ansName':{
                 required: "Name field is required",
             },
             'answer':{
                 required: "Answer field is required",
             }
     }
});

});

function loadView(value) {
$("#paramarsh_id").val(value);
$(".paramarsh_id").val(value);

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });

                $.ajax({
                    url:"{{route('helpdeskgetparamarsh')}}",
                    type:'POST',
                    data:{"paramarsh":value},
                    success:function(data) {
                        console.log(data);
                        if(data){
                            $("#stAccordion").html(data);
                        }else{
                            $("#stAccordion").html('No Data Found');
                        }  
                    }
                })
}

function resetPlans() {
// $("#viewContents").hide();
// $("#viewConsultation").hide();
$("#plans").prop("selectedIndex", 0);
loadSubCategory();
}

function loadSubCategory() {
$("#plans").html("<option value=''>Select Plan</option>");
$.ajax({
    url:'https://www.kayasthasamaj.in/helpdesk/loadSubCategory/',
    type:'POST',
    data:{"catId":$("#category").val()},
    success:function(data) {
        $("#plans").html(data);
    }
})
}

function addAnswer(quId) {
$("#quId").val(quId);

$("#myModal").modal("show");
var question = $("#question"+quId).text();
$("#questionDis").html("<strong>Qu</strong>) "+question);
}

function submitAns(){
    let ansBy = $("#ansName").val();
    let ans = $("#answer").val();

    if(ansBy == "" || ans == "" ){
        preventDefault();
    }
}
</script>
@endsection