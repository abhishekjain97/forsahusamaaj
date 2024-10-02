@extends('layouts.master')

@section('content')
<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="#">Home</a></li>
                    <li class="active">Social Directory</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-search db-icon"></i>Search</a></li>
                    <li class=""><a onclick="addSocialDirectory()" href="javascript:void(0)"><i
                                class="fa fa-plus db-icon"></i>Create Your Social Directory</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content-right">
                <div class="section-title text-center">
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a>Social
                        Directory</h1>
                </div>
                <div class="row well-box">
                    <form action="javascript:void(0)" method="POST">
                        <div class="col-md-12 tp-pagination" style="text-align:left">
                            <ul class="pagination">
                                <li class="active" id="liA"><a href="javascript:void(0)" onclick="loadFilter('A')">A</a>
                                </li>
                                <li class="" id="liB"><a href="javascript:void(0)" onclick="loadFilter('B')">B</a></li>
                                <li class="" id="liC"><a href="javascript:void(0)" onclick="loadFilter('C')">C</a></li>
                                <li class="" id="liD"><a href="javascript:void(0)" onclick="loadFilter('D')">D</a></li>
                                <li class="" id="liE"><a href="javascript:void(0)" onclick="loadFilter('E')">E</a></li>
                                <li class="" id="liF"><a href="javascript:void(0)" onclick="loadFilter('F')">F</a></li>
                                <li class="" id="liG"><a href="javascript:void(0)" onclick="loadFilter('G')">G</a></li>
                                <li class="" id="liH"><a href="javascript:void(0)" onclick="loadFilter('H')">H</a></li>
                                <li class="" id="liI"><a href="javascript:void(0)" onclick="loadFilter('I')">I</a></li>
                                <li class="" id="liJ"><a href="javascript:void(0)" onclick="loadFilter('J')">J</a></li>
                                <li class="" id="liK"><a href="javascript:void(0)" onclick="loadFilter('K')">K</a></li>
                                <li class="" id="liL"><a href="javascript:void(0)" onclick="loadFilter('L')">L</a></li>
                                <li class="" id="liM"><a href="javascript:void(0)" onclick="loadFilter('M')">M</a></li>
                                <li class="" id="liN"><a href="javascript:void(0)" onclick="loadFilter('N')">N</a></li>
                                <li class="" id="liO"><a href="javascript:void(0)" onclick="loadFilter('O')">O</a></li>
                                <li class="" id="liP"><a href="javascript:void(0)" onclick="loadFilter('P')">P</a></li>
                                <li class="" id="liQ"><a href="javascript:void(0)" onclick="loadFilter('Q')">Q</a></li>
                                <li class="" id="liR"><a href="javascript:void(0)" onclick="loadFilter('R')">R</a></li>
                                <li class="" id="liS"><a href="javascript:void(0)" onclick="loadFilter('S')">S</a></li>
                                <li class="" id="liT"><a href="javascript:void(0)" onclick="loadFilter('T')">T</a></li>
                                <li class="" id="liU"><a href="javascript:void(0)" onclick="loadFilter('U')">U</a></li>
                                <li class="" id="liV"><a href="javascript:void(0)" onclick="loadFilter('V')">V</a></li>
                                <li class="" id="liW"><a href="javascript:void(0)" onclick="loadFilter('W')">W</a></li>
                                <li class="" id="liX"><a href="javascript:void(0)" onclick="loadFilter('X')">X</a></li>
                                <li class="" id="liY"><a href="javascript:void(0)" onclick="loadFilter('Y')">Y</a></li>
                                <li class="" id="liZ"><a href="javascript:void(0)" onclick="loadFilter('Z')">Z</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 form-group">
                            <select id="city" class="form-control" onchange="loadFilter()">
                                <option value="">Select City </option>
                                @foreach ($cities as $city)
                                <option>{{$city->city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <select id="organization" class="form-control" onchange="loadFilter()">
                                <option value="">Select Organization </option>
                                @foreach ($organizationNames as $organizationName)
                                <option>{{$organizationName->organization_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <input type="text" name="userName" id="userName" class="form-control"
                                placeholder="Enter name">
                                <span id="err"></span>
                        </div>
                        
                        <div class="col-md-3 form-group">
                            <button type="button" class="btn btn-default" onclick="searchByName()">Search</button>
                            <button type="button" class="btn btn-primary" onclick="loadFilter('All')">Reset</button>
                            
                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-12 mt10" id="listHtml">
                        <h4 class="text-center">Loading...</h4>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h2 class="modal-title">Create Your Social Directory</h2>
            </div>
            <form action="{{route('addsocialdirectory')}}" method="post" id="socialDirectoryForm"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Full Name<span class="required">*</span></label>
                        <input id="name" name="name" type="text" placeholder="Enter Name" class="form-control input-md"
                            value="" />
                    </div>
                    <div class="form-group">
                        <input type="hidden" value="" id="imageName" name="photoUpload" />
                        <label class="control-label">Profile Picture<span class="required">*</span> <span
                                id='imageSuccess' style="color:green; font-weight:bold"> </span> <a id="showPreview"
                                onclick="loadImagePreview()" href="javascript:void(0)"
                                class="btn btn-primary btn-xs1">Preview</a></label>
                        <input type="file" class="form-control" name="insert_image" id="insert_image" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Designation<span class="required">*</span></label>
                        <input id="designation" name="designation" type="text" placeholder="Enter Designation"
                            class="form-control input-md" value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">City<span class="required">*</span></label>
                        <input id="city" name="city" type="text" placeholder="Enter City" class="form-control input-md"
                            value="" required />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Organization Name<span class="required">*</span></label>
                        <input type="text" name="organizationName" class="form-control input-md"
                            placeholder="Enter Organization Name" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Facebook Link<span class="required">*</span></label>
                        <input type="text" name="facebookLink" class="form-control input-md"
                            placeholder="Enter Facebook Link" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Twitter Link</label>
                        <input type="text" name="twitterLink" class="form-control input-md"
                            placeholder="Enter Twitter Link">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Linkedin Link</label>
                        <input type="text" name="linkedinLink" class="form-control input-md"
                            placeholder="Enter Linkedin Link">
                    </div>
                    <div class="form-group">
                        <label class="control-label">Instagram Link</label>
                        <input type="text" name="instagramLink" class="form-control input-md"
                            placeholder="Enter Instagram Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-default">Submit</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="insertimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crop & Insert Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop Image <img id="loaderImg"
                        src="{{asset('frontend_assets/images/loader.gif')}}" /></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="imagePreviewModel" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Image Preview</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center" id="imagePreview">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    loadFilter();
$(document).ready(function(){
	$('#socialDirectoryForm').validate({
		 rules: {
				'name':{
					 required: true
				 },	
				 'imageFile':{
					 required: true
				 },
				 'designation':{
					 required: true
				 },
				 'city':{
					 required: true
				 },
				 'organizationName':{
					 required: true
				 },
				 'facebookLink':{
					 required: true
				 }
		 }
	});
});
function loadFilter(alphabetVal) {
    
	$("#listHtml").html('<h4 class="text-center">Loading...</h4>');
	$(".pagination li").removeClass("active");
	var alphabet = "";
	if(typeof alphabetVal !== 'undefined') {
		alphabet = alphabetVal
		$("#li"+alphabetVal).addClass("active");
	}
    
	if(alphabetVal=="All") {
		var alphabet = ""
		$("#city").val("")
		$("#organization").val("")
		$("#userName").val("")
	}
	var city = $("#city").val()
	var organization = $("#organization").val()
	var userName = $("#userName").val()
    
    $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

	$.ajax({
			 type: "POST",
			 url: '{{route("socialdirfilter")}}',
			 data: {alphabet:alphabet,city:city,organization:organization,userName:userName},
			 // dataType: "json",
			 success: function (response) {
				 if (response != "" ) {
                    $("#listHtml").html(response);
                 }else{
                    $("#listHtml").html('<div class="alert alert-danger" role="alert">No Profile Found!</div>');
                 }
                //  console.log(response);
			 }
	 });
}
function searchByName(){
    var userName = $("#userName").val()
    if(userName != ""){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

	$.ajax({
			 type: "POST",
			 url: '{{route("socialdirbyname")}}',
			 data: {userName:userName},
			 // dataType: "json",
			 success: function (response) {
				 if (response != "" ) {
                    $("#listHtml").html(response);
                 }else{
                    $("#listHtml").html('<div class="alert alert-danger" role="alert">No Profile Found!</div>');
                 }
                //  console.log(response);
			 }
	 });
    }else{
        $("#err").css('color','red');
        $("#err").html('Please Enter Name');
    }
    
    
}
function addSocialDirectory() {
	$("#myModal").modal("show");
}
</script>

<script>
    /* Image crop JS Start here*/
$(document).ready(function() {
	$("#showPreview").hide();
	$("#loaderImg").hide();
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
		 width:196,
		 height:196,
		 type:'circle' //square/circle
		},
		boundary:{
		 width:400,
		 height:350
		}
	});

  $('#insert_image').on('change', function() {
	$('.crop_image').attr('disabled', false)
	$("#loaderImg").hide();
	var reader = new FileReader();
	reader.onload = function (event) {
		$image_crop.croppie('bind', {
			url: event.target.result
		}).then(function(){
			console.log('jQuery bind complete');
		});
	}
	reader.readAsDataURL(this.files[0]);
	$('#insertimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		$("#loaderImg").show();
		$('.crop_image').attr('disabled', true)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
		$.ajax({
			url:'{{route("cropsocialprofile")}}',
			type:'POST',
			data:{"image":response},
			dataType:'JSON',
			success:function(data){
				if(data.success) {
					$('#insertimageModal').modal('hide');
					$('#imageName').val(data.result);
					load_images(data.result);
					$("#imageSuccess").html("Image uploaded successfully");
					// $('#insert_image').val("");
					$("#showPreview").show();
				} else {
					alert("Image not uploaded, Try again.");
				}
				$('.crop_image').attr('disabled', false)
				$("#loaderImg").hide();
			}
		})
    });
  });
  function load_images(imageName)
  {
		$("#imagePreview").html('<img src="{{(asset('uploads/socialdirectory'))}}/'+imageName+'" class="img-thumbnail" />');
  }
});
function loadImagePreview() {
	$('#imagePreviewModel').modal('show');
}
/* End here*/
</script>

@endsection