@extends('layouts.master')

@section('content')

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{(route('helpdesk'))}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a>योजनाओं
                        की जानकारी देखें</h1>
                </div>
            </div>
        </div>
        <div class="row ">
            <form action="#" method="post" id="addMemDirForm" class="addMemDirForm">
                <div class="row">
                    <div class="col-md-offset-1 col-md-10 finder-block">

                        <div class="finderform">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label class="control-label-help">वर्ग / Category</label>
                                    <select class="form-control" name="category" id="category" onchange="resetPlans()">
                                        <option value="">Select Category</option>
                                        @foreach ($helpDeskCat as $cat)
                                        <option value="{{$cat->id}}" @if ($cat->id == $catid){{'selected'}}

                                            @endif >{{$cat->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="control-label-help">योजना / Plan</label>
                                    <select class="form-control" name="plans" id="plans"
                                        onchange="loadView(this.value)">



                                    </select>
                                </div>
                                <div class="form-group col-md-4" style="margin-top:25px">
                                    <button type="button" class="btn btn-primary btn-lg btn-block">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="row mt20" id="viewContents" style="display:none"></div>

            <div class="col-md-offset-1 col-md-10 well-box" style="display:none" id="planImages">
                <div class="row" id="showImages">

                </div>
            </div>


        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#viewConsultation").hide();
        loadView({{$planid}});
        loadSubCategory({{$catid}});
       
    
});

function loadView(value) {
    
    
    $("#showImages").empty();
            $("#viewContents").show();
                $("#viewContents").html("<img class='center' src='{{asset('frontend_assets/images/loader1.gif')}}' />");
                
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                $.ajax({
                    url:"{{route('get_plan_detail')}}",
                    type:'POST',
                    data:{"plan":value},
                    success:function(data) {
                        $("#viewContents").show();
                        $("#viewContents").html(data.details);
                        if(data.images != null){
                            $("#planImages").show();
                            var images = data.images;
                            var imgArray = images.split(',');
                            
                            $.each(imgArray, function(key, value){
                                $("#showImages").append('  <div class="col-md-3 mt10"> <img class="img-responsive" src="{{asset('uploads/helpdesk')}}'+'/'+ value+'"> </div>')
                            })
                            
                            
                            
                        }else{
                            $("#planImages").hide();
                            
                        }
                        
                    }
                })
    }  

function resetPlans() {
        var helpCat = $("#category").val();
        $("#viewContents").hide();
        $("#viewConsultation").hide();
        $("#plans").prop("selectedIndex", 0);
        loadSubCategory(helpCat);
    }
    
    function loadSubCategory(helpCat) {
        let planId = {{$planid}};
        // $("#plans").html("<option value=''>Select Plan</option>");
        $.ajax({
            url:"{{route('get_help_desk_plan')}}",
            type:'POST',
            data:{"catId": helpCat,'planid' : planId},
            success:function(data) {
                $("#plans").html(data);
                // $('#plans').html('<option disabled>Select Sub-Sub Menu</option>');
                //         $.each(data, function(key, value) {
                //             $("#plans").append('<option value="' + value.id + '" >' + value.name + '</option>');
                //         });
                console.log(data);
            }
        })
    }

</script>
@endsection