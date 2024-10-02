@extends('layouts.master')

@section('content')
<link rel="stylesheet" href="{{asset('frontend_assets/css/uikit.css')}}">
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{route('mahotsav')}}">कर्मा महोत्सव | 2023</a></li>
                        <li class="active">Photo कर्मा महोत्सव | 2023</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        @foreach ($images as $image)
        <div class="row">
            <div class="col-md-5">
                <img src="{{asset('uploads/mahotsav/'.$image->image)}}" alt="" class="img-responsive"
                style="width: 440px; height: 340px;">
                </div>
            <div class="col-md-7">
                <h1 id="heading">{{$image->title}}</h1>
                <p class="location"> <a class="label-primary">{{count($images)}} Photos</a> <i class="fa fa-map-marker"></i> </p>
                <p class="location"> <span class="wed-day-meta"><i
                                class="icon-wedding-day icon-size-18"></i>{{ date('d, M Y', strtotime($image->date)) }}</span><br />
						<span class="wed-day-meta">Location: {{$image->address}}</span><br />   
                 </p>   
                <hr>
                <p>{!!  $image->description !!}</p>
            </div>
        </div>
        <div class="row">
            <div class="uk-child-width-1-3@m" uk-grid uk-lightbox="animation: scale">
                
                {{-- <div>
                    <a class="uk-inline" href="#">
                        <img src="{{asset('uploads/mahotsav/'.$image->image)}}" alt="" class="img-responsive"
                            style="width: 360px; height: 240px;">
                    </a>
                </div> --}}
            </div>
        </div>
        @endforeach

    </div>
</div>
<script src="{{asset('frontend_assets/js/jquery-1.4.3.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/uikit.min.js')}}"></script>
<script src="{{asset('frontend_assets/js/uikit-icons.js')}}"></script>
@endsection