@extends('layouts.master')

@section('content')
<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Create Business Directory</li>
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
                    <li class=""><a href="{{route('businessdirectory')}}"><i class="fa fa-search db-icon"></i>Search</a>
                    </li>
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-plus db-icon"></i>Create
                            Directory</a></li>
                    <li class=""><a href="{{route('businessdirectorylist')}}"><i class="fa fa-cog db-icon"></i>Manage/View Directory</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{route('businessdirectory')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Create
                        Your Business Profile</h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            </div>
        </div>
    </div>

    <div class="st-tabs">
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
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                data-toggle="tab" aria-expanded="true">Upload Business Profile</a></li>
                        <!-- <li role="presentation" class=""><a href="#profile" aria-controls="profile" role="tab"
                                data-toggle="tab" aria-expanded="false">Upload Business Visiting Card</a></li> -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <form action="{{route('addbusinessdirectory')}}" method="post" id="addBussDirForm"
                                class="addBussDirForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 add-directory" id="directory">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Select Category</label>
                                                    <select name="category_id" id="category_id" class="form-control" required>
                                                        <option value="">Select category</option>
                                                        @foreach ($businessDirCategories as $businessDirCategory)
                                                            <option value="{{$businessDirCategory->id}}">{{$businessDirCategory->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Select Sub Category</label>
                                                    <select name="sub_category_id" id="sub_category_id" class="form-control" required>
                                                        <option value="">Select sub category</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Business Name :</label>
                                                    <input type="text" class="form-control" name="business_name"
                                                        value="{{old('business_name')}}" placeholder="Enter Business Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Director Name :</label>
                                                    <input type="text" class="form-control" name="director_name"
                                                        value="{{old('director_name')}}" placeholder="Enter Director Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="hidden" value="" id="imageNameBd" name="visitingCard" value="{{old('visitingCard')}}" />
                                                <div class="form-group">
                                                    <label>Visiting Card : <span id='imageSuccessBd'
                                                            style="color:green; font-weight:bold"> </span> <a
                                                            id="showPreviewBd" onclick="loadImagePreview('BD')"
                                                            href="javascript:void(0)"
                                                            class="btn btn-primary btn-xs1">Preview</a></label>
                                                    <input type="file" class="form-control" id="insert_image_bd"
                                                        accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Document : </label>
                                                    <input type="file" class="form-control" accept="image/pdf/doc/*" id="profile_photo0" name="document">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Nature of Work :</label>
                                                    <input type="text" class="form-control" value="{{old('work')}}" name="work"
                                                        placeholder="Enter Nature of Work">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Contact Person Name :</label>
                                                    <input type="text" class="form-control" value="{{old('person_name')}}" name="person_name"
                                                        placeholder="Enter Contact Person Name">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone Number :</label>
                                                    <input type="text" class="form-control" value="{{old('mobile')}}" name="mobile"
                                                        placeholder="Enter Phone Number">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Email :</label>
                                                    <input type="text" class="form-control" value="{{old('email')}}" name="email"
                                                        placeholder="Enter Email" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Address :</label>
                                                    <input type="text" class="form-control" value="{{old('address')}}" name="address"
                                                        placeholder="Enter Address">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Pincode :</label>
                                                    <input type="text" class="form-control" value="{{old('pincode')}}" id="pincode" name="pincode"
                                                        placeholder="Enter Pincode">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
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
                                           
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Website Link :</label>
                                                    <input type="text" class="form-control" value="{{old('website_link')}}" name="website_link"
                                                        placeholder="Enter Website Link">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Offer for sahu community :</label>
                                                    <input type="text" class="form-control" value="{{old('any_offer')}}" name="any_offer"
                                                        placeholder="Enter Offer Details">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt10">
                                                <div class="form-group">
                                                    <label>Short description about business</label>
                                                    <textarea class="form-control" name="description" rows="6"
                                                        placeholder="Enter description here....">{{old('description')}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt10">
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-default">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- <div role="tabpanel" class="tab-pane" id="profile">
                            <form action="{{route('addbusinessdirectory')}}" method="post" id="addVisitCardBussDirForm"
                                class="addVisitCardBussDirForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-12 add-directory" id="directory">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <input type="hidden" value="" id="imageName" value="{{old('visitingCard')}}" name="visitingCard" />
                                                <div class="form-group">
                                                    <label>Visiting Card : <span id='imageSuccess'
                                                            style="color:green; font-weight:bold"> </span> <a
                                                            id="showPreview" onclick="loadImagePreview('VC')"
                                                            href="javascript:void(0)"
                                                            class="btn btn-primary btn-xs1">Preview</a></label>
                                                    <input type="file" class="form-control" name="insert_image"
                                                        id="insert_image" accept="image/*">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Company Name :</label>
                                                    <input type="text" class="form-control" value="{{old('companyName')}}" name="companyName"
                                                        placeholder="Enter Company Name">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group" id="visiting-card-category">
                                                    <label>Product Category :</label>
                                                    <select class="select2-search__field form-control select2"
                                                        name="category" required>
                                                        <option value="" selected disabled>Select Any One</option>
                                                        @foreach ($businessDirectories as $businessDirectory)
                                                        <option value="{{$businessDirectory->category_name}}">
                                                            {{$businessDirectory->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Phone Number :</label>
                                                    <input type="text" class="form-control" value="{{old('phoneNumber')}}" name="phoneNumber"
                                                        placeholder="Enter Phone Number">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>City :</label>
                                                    <input type="text" class="form-control" value="{{old('city')}}" id="city" name="city"
                                                        placeholder="Enter City">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>State :</label>
                                                    <input type="text" class="form-control" value="{{old('state')}}" id="state" name="state"
                                                        placeholder="Enter State">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Website Link :</label>
                                                    <input type="text" class="form-control" value="{{old('url')}}" name="url"
                                                        placeholder="Enter Website Link">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mt10">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> -->
                    </div>
                </div>
            </div>
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
                <input type="hidden" id="isDisplay" value="" />
                <button class="btn btn-success crop_image">Crop Image <img id="loaderImg"
                        src="{{asset('frontend_assets/images/loader.gif')}}" /></button>
                <button type="button" onclick="resetFile()" class="btn btn-default" data-dismiss="modal">Close</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $("#category").select2();
        $("#visitCategory").select2();
        $('#addBussDirForm').validate({
            rules: {
                    'companyName':{
                        required: true,
                    },
                    'contactPersonName':{
                        required: true,
                    },
                    'phoneNumber':{
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    'email':{
                        required: true,
                        email: true
                    },
                    'address':{
                        required: true,
                    },
                    'city':{
                        required: true,
                    }
                }
        });
        $('#addVisitCardBussDirForm').validate({
            rules: {
                    'insert_image':{
                        required: true,
                    },
                    'companyName':{
                        required: true,
                    },
                    'visitCategory':{
                        required: true,
                    },
                    'phoneNumber':{
                        required: true,
                        number: true,
                        minlength: 10,
                        maxlength: 10,
                    },
                    'city':{
                        required: true,
                    }
                }
        });
        
    });
    
    
</script>
<script>
    /* Image crop JS Start here*/
    $(document).ready(function() {
        $("#showPreviewBd").hide();
        $("#showPreview").hide();
        $("#loaderImg").hide();
        
        $image_crop = $('#image_demo').croppie({
            enableExif: true,
            viewport: {
             width:336,
             height:192,
             type:'square' //square/circle
            },
            boundary:{
             width:400,
             height:350
            }
        });
    
      $('#insert_image_bd').on('change', function() {
        $("#isDisplay").val("BP");
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
      
      $('#insert_image').on('change', function() {
        $("#isDisplay").val("VC");  
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
            
            if($("#isDisplay").val() == "BP") {
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route("cropvisitingcard")}}',
                    type:'POST',
                    data:{"image":response},
                    dataType:'JSON',
                    success:function(data) {
                        if(data.success) {
                            $('#insertimageModal').modal('hide');
                            $('#imageNameBd').val(data.result);
                            //load_images(data.result, "uploads/visiting-card/");
                            $("#imageSuccessBd").html("Image uploaded successfully");
                            //$('#insert_image_bd').val("");
                            $("#showPreviewBd").show();
                        } else {
                            alert("Image not uploaded, Try again.");
                        }
                        $('.crop_image').attr('disabled', false)
                        $("#loaderImg").hide();
                    }
                })
            } else {
                $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:'{{route("cropvisitingcard")}}',
                    type:'POST',
                    data:{"image":response},
                    dataType:'JSON',
                    success:function(data) {
                        if(data.success) {
                            $('#insertimageModal').modal('hide');
                            $('#imageName').val(data.result);
                            //load_images(data.result, "uploads/visiting-card/");
                            $("#imageSuccess").html("Image uploaded successfully");
                            //$('#insert_image').val("");
                            $("#showPreview").show();
                        } else {
                            alert("Image not uploaded, Try again.");
                        }
                        $('.crop_image').attr('disabled', false)
                        $("#loaderImg").hide();
                    }
                });
            }
        });
      });
      function load_images(imageName)
      {
            $("#imagePreview").html('<img src="{{(asset('uploads/business_visiting_cards'))}}/'+imageName+'" class="img-thumbnail" />');
      }
    });
    function loadImagePreview(type) {
        var path = '{{(asset('uploads/business_visiting_cards'))}}/';
        var imageName = type == 'VC' ? $("#imageName").val() : $("#imageNameBd").val(); 
        
        $("#imagePreview").html('<img src="{{(asset('uploads/business_visiting_cards'))}}/'+imageName+'" class="img-thumbnail" />');
        $('#imagePreviewModel').modal('show');
    }
    function resetFile() {
        $('#insert_image').val("");
        $('#insert_image_bd').val("")
    }
    /* End here*/
</script>

@endsection