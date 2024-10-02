@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Photo volunteer</li>
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
                    <h1>Photo volunteer</h1>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($volunteers as $volunteer)
            <div class="col-md-4 location-block">
                <div class="vendor-image">
                    <a href="{{route('volunteer',$volunteer->id)}}">
                        <img src="{{asset('uploads/volunteer/'.$volunteer->image)}}" alt="" class="img-responsive"
                            style="width: 360px; height: 240px;">
                    </a>
                </div>
              
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection