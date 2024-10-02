@extends('layouts.master')

@section('content')


<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
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
                    <h1><a href="{{route('marriage.index')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Refine
                        Your Search</h1>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="filter-sidebar">
                    <form action="{{route('advancedsearch')}}" method="GET" id="filterForm">
                        @csrf
                        <div class="col-md-3 form-group">
                            <label class="control-label">Search For</label>
                            <select name="searchFor" id="searchFor" class="form-control">
                                <option value="" selected>Select Search for</option>
                                <option value="female" @if (old('searchFor')=='female' ) selected="selected" @endif>
                                    Bride</option>
                                <option value="male" @if (old('searchFor')=='male' ) selected="selected" @endif>Groom
                                </option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Age</label>
                            <select name="age" id="age" class="form-control">
                                <option value="" selected>Select Age</option>
                                <option value="18-22">18 years - 22 years</option>
                                <option value="22-26">22 years - 26 years</option>
                                <option value="26-30">26 years - 30 years</option>
                                <option value="30-34">30 years - 34 years</option>
                                <option value="34-38">34 years - 38 years</option>
                                <option value="38-42">38 years - 42 years</option>
                                <option value="42-50">Above 42 years</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Height</label>
                            <select name="height" id="height" class="form-control">
                                <option value="" selected>Select Height</option>
                                <option value="4ft 5in">4ft 5in</option>
                                <option value="4ft 6in">4ft 6in</option>
                                <option value="4ft 7in">4ft 7in</option>
                                <option value="4ft 8in">4ft 8in</option>
                                <option value="4ft 9in">4ft 9in</option>
                                <option value="4ft 10in">4ft 10in</option>
                                <option value="4ft 11in">4ft 11in</option>
                                <option value="5ft">5ft</option>
                                <option value="5ft 1in">5ft 1in</option>
                                <option value="5ft 2in">5ft 2in</option>
                                <option value="5ft 3in">5ft 3in</option>
                                <option value="5ft 4in">5ft 4in</option>
                                <option value="5ft 5in">5ft 5in</option>
                                <option value="5ft 6in">5ft 6in</option>
                                <option value="5ft 7in">5ft 7in</option>
                                <option value="5ft 8in">5ft 8in</option>
                                <option value="5ft 9in">5ft 9in</option>
                                <option value="5ft 10in">5ft 10in</option>
                                <option value="5ft 11in">5ft 11in</option>
                                <option value="6ft">6ft</option>
                                <option value="6ft 1in">6ft 1in</option>
                                <option value="6ft 2in">6ft 2in</option>
                                <option value="6ft 3in">6ft 3in</option>
                                <option value="6ft 4in">6ft 4in</option>
                                <option value="6ft 5in">6ft 5in</option>
                                <option value="6ft 6in">6ft 6in</option>
                                <option value="6ft 7in">6ft 7in</option>
                                <option value="6ft 8in">6ft 8in</option>
                                <option value="6ft 9in">6ft 9in</option>
                                <option value="6ft 10in">6ft 10in</option>
                                <option value="6ft 11in">6ft 11in</option>
                                <option value="7ft">7ft</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Marital Status </label>
                            <select class="form-control" name="maritalStatus" id="maritalStatus">
                                <option value="" selected>Select Marital Status</option>
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                <option value="Annulled">Annulled</option>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Income</label>
                            <div class=" form-inline">
                                <select class="form-control" name="income" id="income">
                                    <option disabled selected>Income</option>
                                    <option value="100000">Rs.1 Lakh</option>
                                    <option value="200000">Rs.2 Lakh</option>
                                    <option value="300000">Rs.3 Lakh</option>
                                    <option value="400000">Rs.4 Lakh</option>
                                    <option value="500000">Rs.5 Lakh</option>
                                    <option value="750000">Rs.7.5 Lakh</option>
                                    <option value="1000000">Rs.10 Lakh</option>
                                    <option value="1500000">Rs.15 Lakh</option>
                                    <option value="2000000">Rs.20 Lakh</option>
                                    <option value="2500000">Rs.25 Lakh</option>
                                    <option value="3500000">Rs.35 Lakh</option>
                                    <option value="5000000">Rs.50 Lakh</option>
                                    <option value="7000000">Rs.70 Lakh</option>
                                    <option value="10000000">Rs.1 Crore</option>
                                </select> &nbsp; &nbsp;
                                <select class="form-control" name="income1" id="income1">
                                    <option disabled selected>Income</option>
                                    <option value="100000">Rs.1 Lakh</option>
                                    <option value="200000">Rs.2 Lakh</option>
                                    <option value="300000">Rs.3 Lakh</option>
                                    <option value="400000">Rs.4 Lakh</option>
                                    <option value="500000">Rs.5 Lakh</option>
                                    <option value="750000">Rs.7.5 Lakh</option>
                                    <option value="1000000">Rs.10 Lakh</option>
                                    <option value="1500000">Rs.15 Lakh</option>
                                    <option value="2000000">Rs.20 Lakh</option>
                                    <option value="2500000">Rs.25 Lakh</option>
                                    <option value="3500000">Rs.35 Lakh</option>
                                    <option value="5000000">Rs.50 Lakh</option>
                                    <option value="7000000">Rs.70 Lakh</option>
                                    <option value="10000000">Rs.1 Crore</option>
                                    <option value="100000000">and above</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 form-group">
                            <label class="control-label">Pincode/City</label>
                            <input name="cityPincode" id="cityPincode" class="form-control" value=""
                                placeholder="Enter Pincode/City" />
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary">Search</button>

                            <span style="vertical-align: middle;float: right;">
                                <a title="Join WhatsApp KSWP" target="_blank"
                                    href="https://api.whatsapp.com/send?phone=+918528841089&amp;text=Hello"><i
                                        style="color:#3c9151;" class="fa fa-whatsapp fa-3x"></i></a>
                                <a title="Enquiry Us" href="{{route('contactus')}}" target="_blank"><i
                                        style="color:#f48f00;" class="fa fa-envelope fa-3x"></i></a>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div id="filterResult">
            @if ($users->count() > 0)
            <div class="row">
                @foreach ($users as $user)
                <div class="col-md-6">
                    <div class="well-white pinside20">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="vendor-image">
                                    <a href="javascript:void(0)" onclick="loadDetails(17151)"><img style="width:280px"
                                            src="{{asset('uploads/profileimage/'.$user->profile_image)}}"
                                            alt="Profile Picture" class="img-responsive"></a>
                                    <div class="favourite-bg"><a href="javascript:void(0)"><i
                                                class="fa fa-heart"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="post-title"><span class="title-color-default">{{$user->user_name}}
                                        </h3>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="row dir-listing-14">
                                            <!-- <div class="col-md-3"><strong>City :</strong></div> -->
                                            <div class="col-md-6">{{$user->city}}</div>
                                            <!-- <div class="col-md-3"><strong>Date of Birth :</strong></div> -->
                                            <div class="col-md-6">{{$user->age}} Years / {{$user->height}}</div>
                                            <!-- <div class="col-md-3"><strong>Samaj :</strong></div> -->
                                            <div class="col-md-6">{{$user->caste}}</div>
                                            <!-- <div class="col-md-3"><strong>Blood Group :</strong></div> -->
                                            <div class="col-md-6">{{$user->annual_income}}</div>
                                            <!-- <div class="col-md-3"><strong>Education :</strong></div> -->
                                            <div class="col-md-12">{{$user->education}}</div>
                                            <!-- <div class="col-md-3"><strong>Occupation :</strong></div> -->
                                            <div class="col-md-12">{{$user->occupation}}</div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt10">
                                        <a href="{{route('userdetail',$user->id)}}" class="btn btn-default">View
                                            Profile</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            @else
            <div class="col-md-12 text-center">
                <div class="alert alert-danger" role="alert">
                    <strong>No Record Found</strong>
                </div>
            </div>
            @endif

            {{ $users->links() }}
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Profile Details</h4>
            </div>
            <div class="modal-body">
                <div class="row" id="loadDetails">

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal -->


@endsection