@extends('layouts.master')

@section('content')

<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/card-layout.css') }}">

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Our Team</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content-right">
                <div class="section-title text-center">
                    <h1>Team Members</h1>
                    <p>कोरी समुदाय की विरासत गरिमामयी रही है। हम सब इसी भाव से ओत प्रोत हैं। इस गौरव पूर्ण इतिहास को
                        वर्तमान की आधार शिला बनाकर अगली पीढ़ी को उज्जवल भविष्य का मार्ग प्रशस्त करें। <br />इस उद्देश्य
                        से मिशन कोरी जोड़ों के अंतर्गत सार्वदेशिक कोरी युवा प्रतिनिधि संस्था की पहल पर कोरी समाज
                        महासंपर्क अभियान की शुरुआत 1 अगस्त 2018 से की जा चुकी है।</p>
                </div>
                <div class="row">
                    <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="">
                                <!-- @csrf -->
                                <div class="card-body">
                                    <div class="col-md-2">
                                        <select class="form-control" data-live-search="true" name="state_id"
                                            tabindex="-98">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->id}}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" data-live-search="true" name="city_id"
                                            tabindex="-98">
                                            <option value="">Select City</option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{ $city->city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2">
                                        <select class="form-control" data-live-search="true" name="city_id"
                                            tabindex="-98">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Enter search title..." aria-label="Enter search title..."
                                            aria-describedby="button-search" />

                                    </div>
                                    <div class="col-md-2">

                                        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>



                    <div class="col-md-12 team-section">
                        <div class="row">
                            @foreach ($keyPerson as $person)
                            <div class="col-md-6 team-profile">
                                <div class="col-md-4">
                                    <img src="{{asset('uploads/team/'.$person->image)}}" alt=""
                                        class="img-responsive img-circle">
                                    <h4 class="teamlocation">{{$person->location}}</h4>
                                </div>
                                <div class="col-md-8 mt20">
                                    <h2 class="teamname">{{$person->name}}</h2>
                                    <h4 class="teamdesignation">{{$person->designation}}</h4>
                                    <h4 class="teamdescription">{{Str::limit($person->description, 130) }}</h4>

                                    <p><a target="_blank" href="{{$person->fb_link}}"><i
                                                class="fa fa-facebook-square"></i> Find him on
                                            Facebook </a></p>
                                </div>
                            </div>
                            @endforeach


                        </div>
                        <div class="row team-section">
                            @foreach ($teams as $team)
                            <div class="col-md-3 text-center team-block">
                                <div class="well-box-team">
                                    <div class="team-pic">
                                        <a href="javascript:void(0)"> @if (!isset($team->image))
                                            <img src="{{ asset('uploads/team/noimage.webp') }}" alt="" height="100px"
                                                width="100px">
                                            @else
                                            <img src="{{asset('uploads/team/'.$team->image)}}" class="img-responsive"
                                                alt="">

                                            @endif </a>
                                    </div>
                                    <h2><a href="javascript:void(0)">{{$team->name}}</a></h2>
                                    <span>State Coordinator</span>
                                    <div class=""> <a target="_blank" href="{{$team->fb_link}}"><i
                                                class="fa fa-facebook-square"></i></a></div>
                                </div>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection