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
                    <h1 class="h1"><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> {{ $title }}</h1>
                </div>
            </div>
        </div>
        <div class="row">
           
            
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
					 <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('hamaregaurav') }}">
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
                            <a href="{{ route('hamaregauravDetail', $sanghathans[$i]->title) }}">
                                <img style="width:500px; height: 250px"
                                    src="{{ asset('uploads/hamare_gaurav/' . $sanghathans[$i]->image) }}" alt="image">
                            </a>
                        </div>

                        <div class="events-content">
                            <div><span><i class="fa fa-calendar"></i>
                            {{ date('F d, Y', strtotime($sanghathans[$i]->date)) }}</span></div>
                            <h3 class="h3">
                                <a
                                    href="{{ route('hamaregauravDetail', $sanghathans[$i]->title) }}">{{ Str::limit($sanghathans[$i]->title,20) }}</a>
                                <span class="sub-title">{{ $sanghathans[$i]->tagline }}</span>
                            </h3>
                            <p>{!! Str::limit($sanghathans[$i]->description,150) !!}</p>
                        </div>

                        <div class="event-footer">
                            <div class="view_more book-btn text-center">
                                <a href="{{ route('hamaregauravDetail', $sanghathans[$i]->title) }}" class="book-btn-one"><i class="fa fa-angle-right"></i> Read More</a>
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

@endsection