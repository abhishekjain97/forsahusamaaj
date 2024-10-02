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
                        <li class="active">Our Events</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb60 text-center">
                    <h1 id="heading">Our Events</h1>
                </div>
            </div>
        </div>
        <div class="row">
		  <div class="col-md-12">
            @php $i = 0 @endphp
            @foreach ($events as $event)
            <div class="col-md-12 card vendor-box" id="rowid595">

                <div class="vendor-detail">
                    <div class="row">
                        <div class="col-md-4 ">
                            <a href="javascript:void(0)"><img src="{{asset('uploads/events/'.$event->image)}}"
                                    alt="Magazine" class="img-responsive" width="100%"></a>
                        </div>
                        <div class="col-md-8 ">
                            <div class="col-md-8 col-xs-7">
                                <div class="caption">
                                    <p class="title">
                                        <i class="fa fa-map-marker"></i>
                                        {{$event->address}}
                                    </p>
                                
                                </div>
                            </div>
                            <div class="col-md-4 col-xs-5">
                                <div class="caption">
                                    <span
                                        class="small float-right date_layout">{{ date("d-M-Y", strtotime($event->to_date)) }}</span>
                                </div>
                            </div>
                            <div class="caption">
                                <h2 class="news-heading">{{$event->name}}</h2>
                                <div class="event_short_{{$i}}">
                                    <p class="location text-detail event_short_{{$i}}">
                                    {!! Str::limit($event->description, 400) !!}
                                    </p>
                                </div>
                                <div class="event_long_{{$i}}" style="display: none;">
                                    <p class="location text-detail event_short_{{$i}}">
                                    {!! $event->description !!}
                                    </p>
                                </div>
                                <div class="read-more-right"><a href="javascript:void(0)"
                                        class="btn btn-default btn-sm" onclick="handalReadMore({{$i}})">Read More</a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            @php $i++ @endphp
            @endforeach
			</div>
        </div>
		
		<script>
            function handalReadMore(id) {
                $(".event_short_"+id).toggle()
                $(".event_long_"+id).toggle()
            }
        </script>
		<!--
		<div class="row">
            @foreach ($events as $event)
            <div class="col-md-6">
                <div class="real-wedding-block mb30" id="event2">
                    <div class="real-wedding-img">
                        <a href="javascript:void(0)" onclick="loadEventDetail({{$event->id}})"><img width="100%"
                                src="{{asset('uploads/events/'.$event->image)}}"
                                alt="{{$event->name}}"
                                class="img-responsive"></a>
                    </div>
                    <div class="real-wedding-info well-box text-center">
                        <h2 class="real-wedding-title"><a href="javascript:void(0)"
                                class="title">{{$event->name}}</a></h2>
                        <p class="real-wed-meta">
                            <span class="wed-day-meta"><i class="icon-wedding-day icon-size-18"></i><label>From Date</label> : {{ date("d-M-Y", strtotime($event->from_date)) }} - <label>To Date</label> : {{ date("d-M-Y", strtotime($event->to_date)) }}</span><br/>
                            <span class="wed-location-meta"> <i class="icon-wedding-location icon-size-18"></i><label>Location</label> : {{$event->address}}</span> </p>

                        <div class="post-meta-story" id="eventDetails{{$event->id}}"
                            style="border-top: 1px solid #e9e6e0; padding-top: 10px;">
                            {!! $event->description!!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
		-->
    </div>
</div>
<script>

	$(".post-meta-story").hide();
	function loadEventDetail(id) {
		$("#eventDetails"+id).slideToggle();
		$(".post-meta-story1").hide();
	}
	function loadEventDetail1(id) {
		$(".post-meta-story1").show();
		$(".post-meta-story").hide();
	}

</script>
@endsection