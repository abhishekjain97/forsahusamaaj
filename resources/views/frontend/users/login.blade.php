@extends('layouts.master')

@section('content')
<!-- /.page header -->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Login</li>
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
                    <h3>Login</h3>
                    <form action="{{route('user_login')}}" method="POST">
                        @csrf
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="mobile">Mobile No<span class="required">*</span></label>
                            <input id="mobile" name="mobile" type="number" min="1" value="{{old('mobile')}}"
                                placeholder="Mobile No" class="form-control input-md" required>
                        </div>
                        <!-- Text input-->
                        <div class="form-group">
                            <label class="control-label" for="password">Password<span class="required">*</span></label>
                            <input id="password" name="password" type="password" value="{{old('password')}}"
                                placeholder="Password" class="form-control input-md" required>
                        </div>
                        <!-- Button -->
                        <div class="form-group">
                            <button id="submit" name="submit" class="btn btn-primary btn-lg"> <i
                                    class="fa fa-sign-in fa-lg" aria-hidden="true"></i> Login</button>
                            <a href="#" class="pull-right"> <small><i class="fa fa-key fa-lg" aria-hidden="true"></i>
                                    <b>Forgot Password ?</b></small></a><br>
                            <a href=" {{route('user_registration')}} " class="pull-right"> <small> <i
                                        class="fa fa-user-plus fa-lg" aria-hidden="true"></i><b> Not a Member? Free
                                        Register</b></small></a>
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