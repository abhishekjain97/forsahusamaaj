@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Search Matrimonial Profile</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{ URL::previous() }}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Profile
                        Details </h1>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="row well-white pinside20">
                    <div class="col-md-12">
                        <!-- Form Name -->
                        <h2 class="form-title"> Profile Photo</h2>
                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="team-pic">
                                    <a href="javascript:void(0)"><img
                                            src="{{asset('uploads/profileimage/'.$user->profile_image)}}"
                                            class="img-responsive" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="form-title">Personal Information</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">First Name / नाम :</label>
                                    <div class="col-md-6">{{$user->user_name}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Surname / कुलनाम : </label>
                                    <div class="col-md-6">{{$user->caste}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Date of Birth / जन्म तिथि :</label>
                                    <div class="col-md-6">{{$user->dob}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Birth Time / जन्म समय :</label>
                                    <div class="col-md-6">{{$user->birth_time}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Birth Place / जन्म स्थान :</label>
                                    <div class="col-md-6">{{$user->birth_place}} </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Marital Status / वैवाहिक स्थिति :</label>
                                    <div class="col-md-6">{{$user->marital_status}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Height / ऊंचाई :</label>
                                    <div class="col-md-6">{{$user->height}}</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Complexion / रंग :</label>
                                    <div class="col-md-6">{{$user->complexion}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group text-left">
                                    <label class="col-md-6 control-label">Manglik / मांगलिक :</label>
                                    <div class="col-md-6">{{$user->manglik}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <h2 class="form-title">Education & Profession</h2>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Education / शैक्षणिक योग्यता : </label>
                                    <div class="col-md-8">{{$user->education}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Occupation / व्यवसाय : </label>
                                    <div class="col-md-8">{{$user->occupation}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Annual Income / वार्षिक आय (Per/Year) :
                                    </label>
                                    <div class="col-md-8">{{$user->annual_income}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Pincode / पिन कोड :</label>
                                    <div class="col-md-8">{{$user->pincode}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">City / जिला : </label>
                                    <div class="col-md-8">{{$user->city}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">State / प्रदेश : </label>
                                    <div class="col-md-8">{{$user->state}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--<div class="col-md-6">
                            <div class="form-group text-left">
                                <label class="col-md-6 control-label">Country / देश </label>
                                <div class="col-md-6"></div>
                            </div>
                        </div>-->
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Contact Address / संपर्क पता :</label>
                                    <div class="col-md-8">{{$user->contact_address}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Mobile No / मोबाइल नंबर :</label>
                                    <div class="col-md-8">{{$user->mobile}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Email ID / ईमेल :</label>
                                    <div class="col-md-8">{{$user->email}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Other Phone No / अन्य फोन नंबर : </label>
                                    <div class="col-md-8">{{$user->other_phone_no}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Other Phone Number Relationship / अन्य फोन
                                        नंबर संबंध : </label>
                                    <div class="col-md-8">{{$user->phone_no_relation}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Father's Name / पिता का नाम : </label>
                                    <div class="col-md-8">{{$user->father_name}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Father's Occupation / पिता का व्यवसाय :
                                    </label>
                                    <div class="col-md-8">{{$user->father_occupation}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Mother's Name / मां का नाम : </label>
                                    <div class="col-md-8">{{$user->mother_name}} </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Mother's Occupation / मां का व्यवसाय :</label>
                                    <div class="col-md-8">{{$user->mother_occupation}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Brothers / भाई बंधु :</label>
                                    <div class="col-md-8">{{$user->brothers}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group text-left">
                                    <label class="col-md-4 control-label">Sisters / बहने : </label>
                                    <div class="col-md-8">{{$user->sisters}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection