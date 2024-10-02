@extends('layouts.master')

@section('content')
<!-- /.page header -->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Register</li>
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
                    <h3>Register</h3>
                    <form action="{{route('user_registration')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="control-label" for="text">Name<span class="required">*</span></label>
                            <input id="text" name="name" type="text" value="{{old('name')}}" placeholder="Enter Name"
                                class="form-control input-md" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="email">E-mail<span class="required">*</span></label>
                            <input id="email" name="email" value="{{old('email')}}" type="text" placeholder="E-Mail"
                                class="form-control input-md" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="mobile">Mobile<span class="required">*</span></label>
                            <input id="mobile" name="mobile" type="number" value="{{old('mobile')}}" min="1"
                                placeholder="Enter Mobile" class="form-control input-md" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="password">Password<span class="required">*</span></label>
                            <input id="password" name="password" type="password" value="{{old('password')}}"
                                placeholder="Password" class="form-control input-md" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="confirm_password">Confirm confirm_password<span
                                    class="required">*</span></label>
                            <input id="password_confirmation" name="password_confirmation"
                                value="{{old('password_confirmation')}}" type="password" placeholder="Confirm Password"
                                class="form-control input-md" required>
                        </div>


                        <div class="form-group">
                            <label>Adhar Card, Pan Card Upload</label> <span id='imageSuccess'
                                style="color:green; font-weight:bold"> </span>
                            <input type="file" class="form-control" name="insert_image" 
                                >
                        </div>


                        <div class="form-group">
                            <label class="control-label" for="membership">Membership<span class="required">*</span></label>
                            <select id="membership" name="membership_id" placeholder="Enter Membership" class="form-control input-md" required>
                                @foreach($memberships as $membership)
                                <option value="{{$membership->id}}">{{ $membership->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <button id="submit" name="submit" class="btn btn-primary btn-lg"> <i
                                    class="fa fa-sign-in fa-lg" aria-hidden="true"></i> Register</button>
                            <a href="{{url('/user_login')}}" class="pull-right"> <small> <i
                                        class="fa fa-user-plus fa-lg" aria-hidden="true"></i><b> Already Member?
                                        Login</b></small></a>
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