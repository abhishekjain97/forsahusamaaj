@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">About KSSKS</li>
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
                <div class="section-title text-center">
                    <h1>About माँ कर्मा बाई मंदिर</h1>
                </div>
            </div>

            <div class="col-md-12 ">
                <!-- <div class="col-md-12 st-accordion"> -->
                <div class="panel panel-default p-0">
                    <div class="container">
                        @foreach ($karma as $karmas)
                        <div class="row">
                            <div class="col-md-4">
                                <a href="{{route('mahotsavimages',$karmas->id)}}" style="padding:0%">
                                    <img src="{{asset('uploads/karma/'.$karmas->image)}}" alt="" class="img-responsive"
                                        style="width: 360px; height: 240px;">
                                </a>

                            </div>
                            <div class="col-md-8 ">
                                <h4 class="panel-title acc-fontsize">
                                    <a role="button">

                                        <b>{{$karmas->title}} </b></a>
                                </h4>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        {!! $karmas->description !!}

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
</div>






@endsection