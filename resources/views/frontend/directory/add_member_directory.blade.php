@extends('layouts.master')

@section('content')
<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<div class="slider-bg">
    <div id="slider-single" class="owl-carousel owl-theme slider">
        <div class="item"><img src="{{asset('frontend_assets/images/kori-directory.jpg')}}" alt="Members Directory">
        </div>
    </div>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Create Your Directory</li>
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
                    <li class=""><a href="{{route('memberdirectory')}}"><i class="fa fa-search db-icon"></i>Search</a>
                    </li>
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus db-icon"></i>Create
                            Directory</a></li>
                    <li class=""><a href="{{route('list')}}"><i class="fa fa-cog db-icon"></i>Manage/View Directory</a>
                    </li>
                </ul>
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
                    <h1><a href="{{route('memberdirectory')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Create
                        Your Directory</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <form action="{{route('addmemberdirectory')}}" method="POST" class="addMemDirForm" enctype="multipart/form-data">
                @csrf
                <div id="directory">
                    <div class="col-md-12 well-box add-directory" id="directory0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name :</label>
                                <input type="text" class="form-control" id="name0" name="name" value="{{old('name')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father's Name :</label>
                                <input type="text" class="form-control" id="father_name0" name="father_name" value="{{old('father_name')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number :</label>
                                <input type="text" class="form-control" id="phoneNumber0" value="{{old('mobile')}}"
                                    name="mobile" placeholder="Enter Phone Number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email Id :</label>
                                <input type="email" class="form-control" id="email_id0" name="email_id" value="{{old('email_id')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Facebook Link :</label>
                                <input type="text" class="form-control" id="facebook0" name="facebook" value="{{old('facebook')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Instagram Link :</label>
                                <input type="text" class="form-control" id="instagram0" name="instagram" value="{{old('instagram')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Youtube Channel link :</label>
                                <input type="text" class="form-control" id="youtube0" name="youtube" value="{{old('youtube')}}"
                                    placeholder="Enter Full Name">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country :</label>
                                <select class="form-control" data-live-search="true" name="country_id" id="country-dropdown">
                                    <option value="">Select country</option>
                                    @foreach($countries as $countrie)
                                        <option value="{{$countrie->id}}">{{ $countrie->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State :</label>
                                <select class="form-control" data-live-search="true" name="state_id" id="state-dropdown">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>City :</label>
                                <select class="form-control" data-live-search="true" name="city_id" id="city-dropdown">
                                    <option value="">Select City</option>
                                </select>
                            </div>
                        </div>
                        <!-- <div class="col-md-4">
                            <div class="form-group">
                                <label>Address :</label>
                                <input type="text" class="form-control" id="address0" value="{{old('address')}}" name="address"
                                    placeholder="Enter Address">
                            </div>
                        </div> -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Highest Educationress :</label>
                                <input type="text" class="form-control" id="highest_education0" value="{{old('highest_education')}}" name="highest_education"
                                    placeholder="Enter Highest Educationress">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Date of Birth : <small>(DD/MM/YYYY)</small></label>
                                <input type="text" class="form-control dob" id="dob0" name="dob" value="{{old('dob')}}"
                                    placeholder="Enter Date of Birth(DD/MM/YYYY)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Blood Group</label>
                                <select class="form-control" id="blood_group" name="blood_group">
                                    <option value="" selected="selected" disabled>Select Blood Group</option>
                                    <option value="A+" @if (old('A+')=='A+' ) selected="selected" @endif>A+</option>
                                    <option value="A-" @if (old('A-')=='A-' ) selected="selected" @endif>A-</option>
                                    <option value="AB" @if (old('AB')=='AB' ) selected="selected" @endif>AB</option>
                                    <option value="B+" @if (old('B+')=='B+' ) selected="selected" @endif>B+</option>
                                    <option value="B-" @if (old('B-')=='B-' ) selected="selected" @endif>B-</option>
                                    <option value="O+" @if (old('O+')=='O+' ) selected="selected" @endif>O-</option>
                                    <option value="O-" @if (old('O-')=='O-' ) selected="selected" @endif>O+</option>


                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Marriage Anniversary Date : <small>(DD/MM/YYYY)</small></label>
                                <input type="text" class="form-control marriage_anniversary" id="marriage_anniversary0" name="marriage_anniversary" value="{{old('marriage_anniversary')}}"
                                    placeholder="Enter Marriage Anniversary Date(DD/MM/YYYY)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profile Photo :</label>
                                <input type="file" class="form-control" id="profile_photo0" value="{{old('profile_photo')}}"
                                    name="profile_photo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Current Address :</label>
                                <input type="text" class="form-control" id="current_address0" value="{{old('current_address')}}"
                                    name="current_address" placeholder="Enter Current Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Permanent Address :</label>
                                <input type="text" class="form-control" id="permanent_address0" value="{{old('permanent_address')}}"
                                    name="permanent_address" placeholder="Enter Permanent Address">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Occupation Type :</label>
                                <input type="text" class="form-control" id="occupation_type0" value="{{old('occupation_type')}}"
                                    name="occupation_type" placeholder="Enter Occupation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Profession :</label>
                                <input type="text" class="form-control" id="profession0" value="{{old('profession')}}"
                                    name="profession" placeholder="Enter Occupation">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Upload Photo :</label>
                                <input type="file" class="form-control" id="upload_photo0" value="{{old('upload_photo')}}"
                                    name="upload_photo">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Upload Supporting Doc :</label>
                                <input type="file" class="form-control" id="upload_supporting_doc0" value="{{old('upload_supporting_doc')}}"
                                    name="upload_supporting_doc">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Description :</label>
                                <textarea type="text" class="form-control" rows="6" id="description" value="{{old('description')}}"
                                    name="description"></textarea>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- <div class="col-md-12 btn-plus" id="actRow0">
                    <a href="javascript:void(0)" onclick="addMore()" class="btn btn-primary btn-xs2"><i
                            class="fa fa-plus" aria-hidden="true"></i> Add More Contacts</a>
                </div> --}}
                <div class="col-md-12 row">
                    <div class="col-md-12 mt10">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Submit</button>
                            <!-- onclick="checkFemilyVali()" -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
	
	
	$(".dob").datepicker({
			changeMonth: true,
			changeYear: true,
			controlType: 'select',
			dateFormat:'dd/mm/yy',
			oneLine: true,
			maxDate: 0,
			yearRange: "-90:+0",
	});
	$(".marriage_anniversary").datepicker({
			changeMonth: true,
			changeYear: true,
			controlType: 'select',
			dateFormat:'dd/mm/yy',
			oneLine: true,
			maxDate: 0,
			yearRange: "-90:+0",
	});
});

function addMore() {
	//var numItems = currentNo+1
	//window.numItemGlobal = numItems
	window.numItemGlobal = window.numItemGlobal !== undefined ? window.numItemGlobal+1 : 1;
	var numItems = window.numItemGlobal;
	$.ajax({
			 type: "POST",
			 url: "#",
			 data: {numItems:numItems},
			 // dataType: "json",
			 success: function (response) {
				 $("#directory").append(response);
				 //$("#actRow"+currentNo).html('<a href="javascript:void(0)" class="btn btn-remove btn-xs2" onclick="removeDirectory('+currentNo+')"><i class="fa fa-times" aria-hidden="true"></i> Remove</a>')

			 }
	 });
}

function removeDirectory(item) {
	$("#directory"+item).remove();
}

function checkForm() {
	var flag=true
	$(".error-dir").remove();
	var errorMsgDiv="<span class='error-dir'>This field is required</span>";
	var numItems = window.numItemGlobal===undefined?0:window.numItemGlobal;
	//$('.add-directory').length
	for (var i = 0; i <= numItems; i++) {
		if(document.getElementById("name"+i) === null) {
			flag=true
		} else {
			if($("#name"+i).val()=="") {
				flag=false
				$("#name"+i).after(errorMsgDiv);
			}
			if($("#city"+i).val()=="") {
				flag=false
				$("#city"+i).after(errorMsgDiv);
			}
			if($("#phoneNumber"+i).val()=="") {
				flag=false
				$("#phoneNumber"+i).after(errorMsgDiv);
			} else if($("#phoneNumber"+i).val().length!=10) {
				flag=false
				$("#phoneNumber"+i).after("<span class='error-dir'>Phone number should be 10 number</span>");
			}
			/*if($("#type"+i).val()==null || $("#type"+i).val()=="") {
				flag=false
				$("#type"+i).after(errorMsgDiv);
			}*/
		}
	}
    
	// var loginUserId = "";
	// if(loginUserId!="" && flag) {
	// 	$("#addMemDirForm").submit();
	// 	// return flag;
	// } else {
	// 	if(flag) {
	// 		$("#myModal").modal("show")
	// 	}
	// 	return false;
	// }
}
</script>

@endsection