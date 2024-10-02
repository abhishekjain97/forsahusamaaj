@extends('layouts.master')

@section('content')
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Print Media</li>
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
                    <h1 id="heading">Print Media</h1>

                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($newsPapers as $newsPaper)
            <div class="col-md-4">
                <img src="{{asset('uploads/news/'.$newsPaper->image)}}"
                    style="width:100%">
            </div>
            @endforeach


        </div>
    </div>
</div>
@endsection