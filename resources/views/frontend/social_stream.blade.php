@extends('layouts.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/card-layout.css') }}">
<style>
    .date_layout {
        padding: 0px 10px;
    }
</style>
@php
$mainNews = [];
@endphp
<style>
#cke_1_contents {
    height: 130px !important;
}
</style>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Social Stream</li>
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
                    <h1 id="heading">Blog</h1>
                </div>
            </div>
            <div class="col-md-12">
            </div>
        </div>
        <div class="row">
            @if (session()->has('id'))
            <a class="btn btn-primary mb-4" href="javascript:void(0)" style="max-width: 200px;"
            onclick="loadEventDetail()">Add Blog</a>
            
            <form class="card card-primary newform" name="createMagazine" id="createMagazine" method="post"
                action="{{route('addsocialstream')}}" enctype="multipart/form-data">
                @csrf
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <label class="control-label">Title <span class="required">*</span></label>
                            <input name="title" type="text" placeholder="Enter Heading" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="control-label">Photo Upload </label>
                            <input type="file" class="form-control" id="imageFile" name="image">
                        </div>
                        <div class="col-md-12">
                            <label class="control-label">Description <span class="required">*</span></label>
                            <textarea class="form-control" rows="3" id="description" name="description"
                                placeholder="Write Something here..."></textarea>
                        </div>
                        <div class="col-md-4" style="margin: 20px 0;">
                            <button type="submit" class="btn btn-primary btn-block">
                                Post</button>
                        </div>
                    </div>
                </div>
            </form>
            @else
            <a class="btn btn-primary mb-4" href="{{route('user_login')}}" style="max-width: 200px;">Add Blog</a>
            @endif
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    @foreach ($socialStreams as $socialStream)
                    @php
                    $mainNews[] = $socialStream->id;
                    @endphp
                    <div class="col-md-12 card vendor-box" id="rowid595">

                        <div class="vendor-detail">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <a href="javascript:void(0)"><img src="{{('uploads/news/'.$socialStream->image)}}"
                                            alt="Magazine" class="img-responsive" width="100%"></a>
                                    <div class="favourite-bg"><a href="javascript:void(0)" title="Like Magazine"
                                            class=""><i class="fa fa-heart"></i></a></div>
                                </div>
                                <div class="col-md-8 ">
                                    <div class="col-md-8 col-xs-7">
                                        <div class="caption">
                                            <p class="title">
                                                <i class="fa fa-user"></i>
                                                @if($socialStream->posted_by)
                                                    Posted by Guest
                                                @else 
                                                    Posted by Admin
                                                @endif
                                            </p>
                                        
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-xs-5">
                                        <div class="caption">
                                            <span
                                                class="small float-right date_layout">{{$socialStream->created_at->format('d M, Y')}}</span>
                                        </div>
                                    </div>
                                    <div class="caption">
                                        <h2 class="news-heading">{{$socialStream->title}}</h2>
                                        <p class="location text-detail">{!! Str::limit($socialStream->description, 500)
                                            !!}</p>
                                        <div class="read-more-right"><a href="{{route('news.show',$socialStream->id)}}"
                                                class="btn btn-default btn-sm">और पढ़ें</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>
            </div>

            <div class="col-md-4" style="display:none;">
                <div class="row">
                    <div class="col-md-12 post-holder">
                        <div class="well-box">
                            <h2 class="widget-title wt-color"> ज़रूर पढ़ें </h2>
                            <div class="row">
                                @foreach ($sideSocialStreams as $sideSocialStream)
                                @if (!in_array($sideSocialStream->id, $mainNews))
                                <div class="col-md-12">
                                    <a href="{{route('news.show',$socialStream->id)}}">
                                        <img src="{{asset('uploads/news/'.$sideSocialStream->image)}}"
                                            class="img-responsive">
                                        <div class="mt10 rc-post">
                                            <h3>{{$sideSocialStream->title}}</h3>
                                        </div>
                                    </a>
                                </div>
                                @endif
                                @endforeach


                            </div>
                        </div>
                    </div>
                </div>
            </div>
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



<script src="{{asset('frontend_assets/js/jquery.validate.js')}}"></script>
<script>
$(document).ready(function() {
    $('#createMagazine').validate({
        rules: {
            'heading': {
                required: true,
            },
            'message': {
                required: true,
            }
        },
        messages: {
            'heading': {
                required: "Heading field is required",
            },
            'message': {
                required: "Message field is required",
            }
        }
    });
});
</script>
<script>
$(".newform").hide();

function loadEventDetail() {

    $("#createMagazine").slideToggle();
}
</script>

@endsection