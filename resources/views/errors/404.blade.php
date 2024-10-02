@extends('layouts.master')
@section('title', 'Page Not Found')
@section('content')


<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="error-block mb80">
                    <h1>404</h1>
                    <h2><i class="fa fa-warning"></i>oooopppss! page was not found, Sorry! it looks like that page has gone missing.</h2>
                    <p>Please use navigation above to browse wedding topics, or go back to <a href="{{url('/')}}">KSSKS.</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection