@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/card-layout.css') }}">

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">{{ $title }}</li>
                </ol>
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
                    <h1 class="h1"><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Sahu Samaj Ke Sangthan</h1>
                </div>
            </div>
        </div>
        <div class="row">


            <div class="container">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card1 card-primary1">
                            @if (session()->has('id'))
                            <a class="btn btn-primary" href="javascript:void(0)"
                                style="max-width: 280px;margin: 10px 20px;" onclick="loadEventDetail(1)">Add
                                Sangthan</a>
                            
                            
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form class="card card-primary newform" id="eventDetails1" method="POST"
                                action="{{ route('sahusamaajsanghathan') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">State</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <select class="form-control" data-live-search="true"
                                                                name="state_id" tabindex="-98">
                                                                <option value="">Select State</option>
                                                                @foreach($states as $state)
                                                                <option value="{{$state->id}}">{{ $state->name }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">City</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <select class="form-control" data-live-search="true"
                                                                name="city_id" tabindex="-98">
                                                                <option value="">Select City</option>
                                                                @foreach($cities as $city)
                                                                <option value="{{$city->id}}">{{ $city->city }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Name</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="text" class="form-control" name="title">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Year of Establishment</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="date" class="form-control" name="date">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Type</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <select name="sanghanthantype" class="form-control">
                                                                <option value="">Select Type</option>
                                                                <option value="Society">Society</option>
                                                                <option value="Trust">Trust</option>
                                                                <option value="Sec8 company">Sec8 company</option>
                                                                <option value="MSMe">MSMe</option>
                                                                <option value="OTHERS">OTHERS</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">President Name</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="text" class="form-control"
                                                                name="president_name">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Moblie No</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="tel" id="phone" name="mobile_no"
                                                                class="form-control" placeholder="+910123456789"
                                                                pattern="[+0-9]{10,13}">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Whatsapp No</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="tel" id="phone" name="whatsapp_no"
                                                                class="form-control" placeholder="+910123456789"
                                                                pattern="[+0-9]{10,13}">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Logo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="logo"
                                                                onchange="ImageChange(this,'1')">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="displayImagesShow" id="displayImagesShow"
                                                        style="margin-top: 5px;" accept="image/*"></div>
                                                </div>

                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="exampleInputFile">Photo</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input" name="image"
                                                                onchange="ImageChange(this,'1')">
                                                            <label class="custom-file-label"
                                                                for="exampleInputFile">Choose
                                                                file</label>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group">
                                                    <div class="displayImagesShow" id="displayImagesShow"
                                                        style="margin-top: 5px;" accept="image/*"></div>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="  control-label" for="description">Description</label>
                                                <textarea class="form-control" rows="6" id="description"
                                                    name="description">Write Your Description</textarea>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">

                                        </div>
                                        <div class="col-sm-6">
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </form>
                            @else
                            <a class="btn btn-primary" href="{{route('user_login')}}" style="max-width: 280px;margin: 10px 20px;">Add
                            Sangthan</a>
                            @endif
                        </div>

                    </div>
                    <!-- /.card-body -->
                    
                </div>




                <div class="row">
                    <!-- Blog entries-->
                    <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('sahusamaajkesanghathan') }}">
                                <!-- @csrf -->
                                @include('frontend.about.searchField')
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="events-schedules-area">
        <div class="container">
            @if(!empty($sanghathans))
            <div class="row">
                @for ($i = $start; $i < count($sanghathans); $i++)
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="single-events-schedules">
                        <div class="events-image">
                            <a href="{{ route('sahusamaajkesanghathanDetail', $sanghathans[$i]->title) }}">
                                <img style="width:500px; height: 250px"
                                    src="{{ asset('uploads/sahu_samaaj_sanghathan/' . $sanghathans[$i]->image) }}" alt="image">
                            </a>
                        </div>

                        <div class="events-content">
                            <div><span><i class="fa fa-calendar"></i>
                            {{ date('F d, Y', strtotime($sanghathans[$i]->date)) }}</span></div>
                            <h3 class="h3">
                                <a
                                    href="{{ route('sahusamaajkesanghathanDetail', $sanghathans[$i]->title) }}">{{ Str::limit($sanghathans[$i]->title,20) }}</a>
                            </h3>
                            <p>{!! Str::limit($sanghathans[$i]->description,150) !!}</p>
                        </div>

                        <div class="event-footer">
                            <div class="view_more book-btn text-center">
                                <a href="{{ route('sahusamaajkesanghathanDetail', $sanghathans[$i]->title) }}" class="book-btn-one"><i class="fa fa-angle-right"></i> Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
            
            <div row justify-content-center flex flex-wrap>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    @if($dataType == "withoutSearch")
                        {{ $sanghathans->links() }}
                    @endif
                </div>
            </div>
            @endif
        </div>
    </div>
</div>


<script src="https://forsahutelisamaj.com/public/admin_assets/plugins/ckeditor/ckeditor.js"></script>
<script src="https://forsahutelisamaj.com/public/admin_assets/plugins/ckfinder/ckfinder.js"></script>
<script>
function ImageChange(input) {



    $('#loaderShow').css('display', 'block');
    if (input.files && input.files[0]) {
        // if value is images
        var file = input.files[0].name;
        var ext = file.split(".");
        ext = ext[ext.length - 1].toLowerCase();
        var arrayExtensions = ["jpg", "jpeg", "png", "bmp", "gif"];
        var exactSize = getFileSize(input.files[0].size);
        var lastextType = exactSize.substr(exactSize.length - 2);
        var res = exactSize.split(".");
        var kbcheck = '';
        if (jQuery.isEmptyObject(res[1]) != true) {
            kbcheck = res[1].split("&");
        }
        if (lastextType == 'KB') {
            var res = res[0];
        } else if (lastextType == 'MB') {
            var res = res[0] * 1024;
            var res = +(res) + + +(kbcheck[0]);
        } else {
            var res = (res[0] * 1024) * 1024;
        }
        if (res > 5000) {
            alert('!Oops file size to larger. can\'t be upload more than 5 MB');
            deletefile();
        }
        if ($.inArray(ext, arrayExtensions) == -1) {
            console.log(res);
        } else {
            var reader = new FileReader();
            var image = '';
            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                var exactSize = getFileSize(input.files[0].size);
                $('#displayImagesShow').html(
                    '<div style="border: 2px solid #dedadad9;padding: 5px;width: 160px;"><img id="blah" src="' +
                    e.target.result +
                    '" alt="your image" width="100%" height="100" /><div id="myProgress"></div><p id="deleteFile" style="margin-top:0;margin-bottom:0;"><span><span id="message" style="color:green;">Success</span><i class="fa fa-trash" onclick="deletefile()" aria-hidden="true" style="color:green;float:right;margin-top: 4px;"></i></span></p><div id="myBar" style="background-color:green;width:100%;height:10px"></div></div>'
                );
                $('input[name="sessionFileSize"]').val(exactSize);
                move();
                $('#displayImagesShow').css('display', 'block');
                $('#showFile').css('display', 'block');
                $('#displayError3').css('display', 'none');
                // console.log(e.target.result)
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
}

function getFileSize(videoSize) {
    var fSExt = new Array('Bytes', 'KB', 'MB', 'GB'),
        i = 0;
    while (videoSize > 900) {
        videoSize /= 1024;
        i++;
    }
    return exactSize = (Math.round(videoSize * 100) / 100) + '&nbsp;' + fSExt[i];
}

function deletefile() {
    var msg = confirm('Are you sure want to delete?');
    if (msg == true) {
        $("#thumbnail_file").val(null);
        $("#thumbnail").val(null);
        $("#profile_pic").val(null);
        $("#displayImagesShow").hide();
    }
    // var sessionImage = "";  
}


function move() {
    var elem = document.getElementById("myBar");
    var width = 1;
    var id = setInterval(frame, 10);

    function frame() {
        if (width >= 100) {
            clearInterval(id);
            $('#message').text('Success');
        } else {
            width++;
            elem.style.width = width + '%';
        }
    }
}
</script>

<script>
// CKEDITOR.replace('short_description');
$(document).ready(function() {
    var editor = CKEDITOR.replace('description', {
        height: 350,
        filebrowserUploadUrl: 'https://forsahutelisamaj.com/public/admin/imgupload?_token=HV0NND5eNsWxRGjz9TP4Yi2n212HwB6FB2oGhbni',
        filebrowserUploadMethod: "form",
        // filebrowserUploadUrl: "form"
    });
    // CKFinder.setupCKEditor( editor );
    $('.select2').select2();

});
</script>

<script>
$(".newform").hide();

function loadEventDetail(id) {

    $("#eventDetails" + id).slideToggle();
}
</script>
@endsection