@extends('layouts.master')

@section('content')


<style>
    body,
    html {
        height: 100%;
        margin: 0;
    }

    .bgimg {

        height: 100%;
        background-position: center;
        background-size: cover;
        position: relative;
        color: white !important;
        font-family: "Courier New", Courier, monospace;
        font-size: 25px;
    }

   

    .middle {
        position: absolute;
        
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-size: 100px
        text-align: center;

    }

    hr {
        margin: auto;
        width: 40%;
    }
</style>


<div class="bgimg" style="background-image: url('{{ asset('frontend_assets/images/coming.jpg') }}');">
    
    <div class="middle">
        <h1 style="color: whitesmoke;font-size: 70px;"><b>COMING SOON</b></h1>
        <hr>
    </div>
    
</div>
@endsection