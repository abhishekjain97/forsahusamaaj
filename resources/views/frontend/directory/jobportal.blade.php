@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>
            <div class="col-md-9">
                <div style="float:right">
                    <a href="{{route('jobpost')}}" class="btn btn-default btn-xs1">Employers /
                        Post Job</a>
                    <a href="{{route('jobprofile')}}" class="btn btn-default btn-xs1">Create
                        Your Job Profile</a>
                </div>
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
                                class="fa fa-arrow-circle-o-left"></i></a>
                        Register with us</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <div class="col-md-12">
                <div class="row mt10">
                    <div class="form-group col-md-6">
                        <a href="{{route('jobpost')}}" class="btn btn-primary btn-lg btn-block">Employers / Post Job</a>
                    </div>
                    <div class="form-group col-md-6">
                        <a href="{{route('jobprofile')}}" class="btn btn-default btn-lg btn-block">Create Your Job
                            Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection