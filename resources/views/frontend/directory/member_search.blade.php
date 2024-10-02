@extends('layouts.master')

@section('content')
<style>
    .dir-listing div{
        padding: 0 15px !important;
    }
    .social_icon a{
        margin: 0 15px;
        font-size: 15px;
    }
</style>
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
                    <li class="active">Members Directory</li>
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
                    <li class=""><a href="{{route('addmemberdirectory')}}"><i class="fa fa-plus db-icon"></i>Create
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
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Search
                        Members Directory</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <form action="{{route('searchmember')}}" method="GET" id="addMemDirForm" class="addMemDirForm">
                @csrf
                <div class="row">
                    <div class="col-md-3 form-group">
                        <label>Name</label>
                        <input id="input_name" name="firstName" class="form-control" value="{{$request->firstName}}" placeholder="Enter Name" />
                    </div>
                        
                    <div class="col-md-3 form-group">
                        <label>Country</label>
                        <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="country-dropdown_0" name="country_id"  onchange="getState(0, this.value, 0)" class="form-control select2">
                            <option value="0">Select country</option>
                            @foreach($countries as $countrie)
                                <option value="{{$countrie->id}}">{{ $countrie->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>State</label>
                        <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="state-dropdown_0" name="state_id" tabindex="-98"  onchange="getCity(0, this.value, 0)">
                            <option value="0">Select State</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>City</label>
                        <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="city-dropdown_0" name="city_id" tabindex="-98">
                            <option value="0">Select City</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>.</label>
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($users as $user)
            <div class="col-md-6">
                <div class="well-white pinside20">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="{{ route('memberDirectoryDetail', $user->id) }}"><img width="150px" src="{{ asset('uploads/member_directory/' . $user->profile_photo) }}" /></a>
                            <h3 class="post-title"><span class="title-color-default"><a href="{{ route('memberDirectoryDetail', $user->id) }}"><i class="fa fa-user"></i> {{$user->name}} </a></span> <span class="title-color-default float-right"> <i
                                        class="fa fa-phone"></i> {{$user->mobile}}</span></h3>
                        </div>
                        <div class="col-md-12">
                            <div class="row dir-listing">
                                <div class="col-md-5"><strong>Father's Name:</strong></div>
                                <div class="col-xs-7 rc-post">{{$user->father_name}}</div>
                                <div class="col-md-5"><strong>Email:</strong></div>
                                <div class="col-xs-7 rc-post">{{$user->email_id}}</div>
                                <div class="col-md-5"><strong>Country:</strong></div>
                                <div class="col-xs-7 rc-post">{{$user->country->name}}</div>
                                <div class="col-md-5"><strong>State:</strong></div>
                                <div class="col-xs-7 rc-post">{{$user->state->name}}</div>
                                <div class="col-md-5"><strong>City:</strong></div>
                                <div class="col-xs-7 rc-post">{{$user->city->city}}</div>
                                <!-- <div class="col-md-5 "><strong>Date of Birth:</strong></div>
                                <div class="col-xs-7 rc-post">{{date("d/m/Y", strtotime($user->dob))}}</div> -->

                                <!-- <div class="col-md-5"><strong>Current Address: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->current_address}} </div>

                                <div class="col-md-5"><strong>Permanent Address: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->permanent_address}} </div>

                                <div class="col-md-5"><strong>Profession: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->profession}} </div> -->
                            </div>
                            <div class="row dir-listing">
                                <!-- <div class="col-md-5"><strong>Occupation: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->occupation_type}} </div>
                                <div class="col-md-5"><strong>Anniversary Date:</strong></div>
                                <div class="col-xs-7 rc-post">{{date("d/m/Y", strtotime($user->marriage_anniversary))}}</div>

                                <div class="col-md-5"><strong>Address: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->address}} </div> -->

                                <div class="col-md-5"><strong>Highest Education: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->highest_education}} </div>

                                <!-- <div class="col-md-5"><strong>Blood Group: </strong></div>
                                <div class="col-xs-7 rc-post">{{$user->blood_group}} </div> -->
                            </div>
                            <div class="row dir-listing">
                                <div class="col-md-12 text-center social_icon">
                                    @if($user->facebook != "")
                                        <a href="{{$user->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>
                                    @endif
                                    @if($user->instagram != "")
                                    <a href="{{$user->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>
                                    @endif
                                    @if($user->youtube != "")
                                    <a href="{{$user->youtube}}" target="_blank"><i class="fa fa-youtube"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
</div>
@include('frontend.directory.selectjs')
<script>
    window.onload = function() {
        var country = {{request('country_id')}};
        if(country != 0) {
            $("#country-dropdown_0").val({{request('country_id')}});
        }

        var state = {{request('country_id')}};
        if(state != 0) {
            getState(0, {{request('country_id')}}, {{request('state_id')}});
        }
        
        var city = {{request('state_id')}};
        if(city != 0) {
            getCity(0, {{request('state_id')}}, {{request('city_id')}});
        }
        

    };
</script>
<script>
    document.observe("dom:loaded", function(){
        alert('The DOM is loaded!');
    });
    
    function showFilter(filterType) {
        $("#sec_"+filterType).show();
    }
    
    function removeField(filterType) {
        $("#input_"+filterType).val("");
        $("#sec_"+filterType).hide();
    }
</script>

@endsection