@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Photo Gallery</li>
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
                    <h1>Photo Gallery</h1>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($galleries as $gallery)
            <div class="col-md-4 location-block">
                <div class="vendor-image">
                    <a href="{{route('galleryimages',$gallery->id)}}">
                        <img src="{{asset('uploads/gallery/'.$gallery->image)}}" alt="" class="img-responsive"
                            style="width: 360px; height: 240px;">
                    </a>
                </div>
                <div class="mt5">
                    <p class="real-wed-meta">
                        <span class="wed-day-meta-head"> {{$gallery->title}}</span><br />
                        <span class="wed-day-meta"><i
                                class="icon-wedding-day icon-size-18"></i>{{ date('d, M Y', strtotime($gallery->date)) }}</span>
                        <span class="wed-location-meta"> <i class="icon-wedding-location icon-size-18"></i> {{$gallery->address}}</span>
                    </p>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection