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
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Job Post</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
           
            
            <div class="container">
                <div class="row">
                    @if (session()->has('id'))
                    <a class="btn btn-primary mb-4" href="javascript:void(0)" style="max-width: 200px;"
                    onclick="loadEventDetail()">Add Blog</a>
                    
                    <form class="card card-primary newform" name="createMagazine" id="createMagazine" method="post"
                        action="{{route('addsocialstream')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="container-fluid">
                        <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">State</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select class="form-control" data-live-search="true" name="state_id" tabindex="-98">
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{ $state->name }}</option>
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
                                                <select class="form-control" data-live-search="true" name="city_id" tabindex="-98">
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{ $city->city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Title</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="title">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Amount</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="amount">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Company Name</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="company_name">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Close Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="close_date">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Delivery Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="delivery_time">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="date">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Skill</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="skill">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Requirements</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="requirements">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Email</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="email" class="form-control" name="email">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Phone</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="phone">

                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="image"
                                                    onchange="ImageChange(this,'1')">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="displayImagesShow" id="displayImagesShow" style="margin-top: 5px;"
                                            accept="image/*"></div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="  control-label" for="description">Description</label>
                                        <textarea class="form-control" rows="6" id="description"
                                            name="description">Write Your Description</textarea>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    @else
                    <a class="btn btn-primary mb-4" href="{{route('user_login')}}" style="max-width: 200px;">Add Blog</a>
                    @endif
                </div>
                <div class="row">
                    <!-- Blog entries-->
					 <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('jobportal') }}">
                            <!-- @csrf -->
                                @include('frontend.about.searchField')
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="events-schedules-area-with-color" style="background: none;">
                <div class="container">
                    
                    
                    <div class="row justify-content-center owl-carousel3 owl-theme mb-10">
                        @foreach ($jobportals as $jobportal)
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="events-content-box">
                                <span><i class="fa fa-calendar"></i> Close Date : {{ date('F d, Y', strtotime($jobportal->close_date)) }}</span> <br />
                                <span><i class="fa fa-map-marker"></i> @foreach($states
                                                        as $state)
                                                        @if($state->id==$jobportal->state_id)
                                                        {{ $state->name }},
                                                        @endif
                                                        @endforeach
                                                        @foreach($cities as $city)
                                                        @if($city->id==$jobportal->city_id)
                                                        {{ $city->city }}
                                                        @endif
                                                        @endforeach</span>
                                <h3>
                                    <a href="{{ route('jobportalDetail', $jobportal->title) }}">{{ Str::limit($jobportal->title,60) }}</a>
                                </h3>
                                <p>{!! Str::limit($jobportal->description,200) !!}</p>
                                <div class="skills">
                                    Skills
                                    <?php 
                                        if (str_contains($jobportal->skill, ',')) {
                                            $skill_array = explode(",", $jobportal->skill);
                                            foreach($skill_array as $skill) {
                                    ?>
                                            <div class="skill-items">{{ $skill }}</div>
                                    <?php
                                            }
                                        } else {
                                    ?>
                                            <div class="skill-items">{{ $jobportal->skill }}</div>
                                    <?php
                                        }
                                    ?>
                                    
                                </div>

                                <div class="bottom-content">
                                    <div class="info">
                                        <h4>Salary: {{ $jobportal->amount }}</h4>
                                        <p>By: {{ $jobportal->company_name }}</p>
                                    </div>

                                    <div class="book-btn">
                                        <a href="{{ route('jobportalDetail', $jobportal->title) }}" class="book-btn-one"><i class="bx bx-arrow-to-right"></i> Apply Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div row justify-content-center flex flex-wrap>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="view_more book-btn text-center">
                                @if($dataType == "withoutSearch")
                                    {{ $jobportals->links() }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<script>
$(".newform").hide();

function loadEventDetail() {

    $("#createMagazine").slideToggle();
}
</script>
@endsection