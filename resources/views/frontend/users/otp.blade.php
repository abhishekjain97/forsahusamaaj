@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Enter OTP</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-md-6 st-tabs">
                @if (session('error'))
                <div class="alert alert-danger alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('error') }}
                </div>

                @endif

                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible alert-block" id="success-alert">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <ul>
                        <li> {{ session()->get('success') }}</li>
                    </ul>
                </div>
                @endif
                <!-- Nav tabs -->
                <div class="well-box">
                    <h3>Enter Otp</h3>
                    <form action="{{route('verifyotp')}}" method="post" >
                        @csrf
                        <!-- Text input-->
                        <div class="form-group">
                            
                            <input id="email" name="otp" type="number" min="0" placeholder="Enter Otp"
                                class="form-control input-md" required>
                        </div>
                        <!-- Text input-->
                        <!-- Button -->
                        <div class="form-group">
                            <button id="submit" name="submit" class="btn btn-primary"> <i
                                    class="fa fa-sign-in fa-lg" aria-hidden="true"></i> Verify</button>
                            <a href="{{route('resendotp')}}" class="btn btn btn-primary" id="resendBtn"
                                style="float: right; background:rgb(0, 114, 6); display: none;"> Resend </a>
                            <div id="timerDiv" style="float: right; display: block;">Time left = <span
                                    id="timer"></span></div>
                        </div>
                    </form>
                </div>
                {{-- <div class="well-box social-login"> <a href="#" class="btn facebook-btn"><i
                                class="fa fa-facebook-square"></i>Facebook</a> <a href="#" class="btn twitter-btn"><i
                                class="fa fa-twitter-square"></i>Twitter</a> <a href="#" class="btn google-btn"><i
                                class="fa fa-google-plus-square"></i>Google+</a>
                    </div> --}}
            </div>

            <div class="col-sm-3"></div>

        </div>
    </div>
</div>
@endsection