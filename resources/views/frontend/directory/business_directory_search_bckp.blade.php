@extends('layouts.master')

@section('content')
<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<div class="slider-bg">
    <div id="slider-single" class="owl-carousel owl-theme slider">
        <div class="item"><img src="{{asset('frontend_assets/images/kori-directory.jpg')}}" alt="Members Directory">
        </div>
    </div>
</div>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Create Your Directory</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-search db-icon"></i>Search</a>
                    </li>
                    <li class=""><a href="{{route('addbusinessdirectory')}}"><i class="fa fa-plus db-icon"></i>Create
                            Directory</a></li>
                    <li class=""><a href="{{route('businessdirectorylist')}}"><i
                                class="fa fa-cog db-icon"></i>Manage/View Directory</a>
                    </li>
                </ul>
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
                                class="fa fa-arrow-circle-o-left"></i></a> Search
                        Business Directory</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <form action="{{route('businessdirectorysearch')}}" method="GET">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3 form-group">
                            <input name="companyName" class="form-control" value="" placeholder="Enter Company Name" />
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="address" class="form-control" value=""
                                placeholder="Enter City/Pincode/Address" />
                        </div>
                        <div class="col-md-3 form-group">
                            <select id="productCat" name="productCat" class="form-control select2">
                                <option value="" selected disabled>Select Category </option>
                                @foreach ($businessDirectories as $businessDirectory)
                                <option value="{{$businessDirectory->category_name}}">
                                    {{$businessDirectory->category_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="natureWork" class="form-control" value="" placeholder="Enter Nature of Work" />
                        </div>
                    </div>
                    <div class="row mt10">
                        <div class="col-md-3 form-group">
                            <input name="contactPersonName" class="form-control" value=""
                                placeholder="Enter Contact Person Name" />
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="phoneNumber" class="form-control" value="" placeholder="Enter Phone Number" />
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="emailId" class="form-control" value="" placeholder="Enter Email Id" />
                        </div>
                        <div class="col-md-3 form-group">
                            <input name="websiteLink" class="form-control" value="" placeholder="Enter Website Link" />
                        </div>
                    </div>
                    <div class="row mt10">
                        <div class="form-group col-md-3">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
                        </div>
                        <div class="form-group col-md-4">
                            <a href="{{route('addbusinessdirectory')}}" class="btn btn-default btn-lg btn-block">Create
                                Business Directory</a>
                        </div>
                    </div>
                </div>
            </form>
			<div class="sorting-filters">
          <form class="form-inline" id="frmSearch" name="frmSearch" action="{{route('businessdirectorysearch')}}" method="post">
            
            <div class="form-group">
              <label>Business Category</label>
              <select id="category" name="category" class="form-control"><option value="">Choose Category</option><option value="1" selected="">Advertising Agency</option><option value="2" selected="">Advocate</option><option value="3" selected="">Auto Accessories Store</option><option value="4" selected="">Auto Accessories Wholesaler</option><option value="5" selected="">Auto Parts Store</option><option value="6" selected="">Auto Seat Cover Shop</option><option value="7" selected="">Automobile Air Conditioner Store</option><option value="8" selected="">Automobile Air Service Center</option><option value="9" selected="">Automobile Exporter</option><option value="10" selected="">Automobile Loan Agency</option><option value="11" selected="">Automobile Spare parts Wholesaler</option><option value="12" selected="">Automobile Storage Facility</option><option value="13" selected="">Ayurvedic Pharmacy</option><option value="14" selected="">Back Office</option><option value="15" selected="">Banquet Hall</option><option value="16" selected="">Blood Bank</option><option value="17" selected="">BPO Placement Agency</option><option value="18" selected="">Jewellery Store</option><option value="19" selected="">Restaurant</option><option value="20" selected="">Kirana and General Store</option><option value="21" selected="">Financial Advisor</option><option value="22" selected="">Autorickshaw</option><option value="23" selected="">Tailor</option><option value="24" selected="">Tours and Travels</option><option value="25" selected="">Transport</option><option value="26" selected="">Clinic</option><option value="27" selected="">Hospital</option><option value="28" selected="">School</option><option value="29" selected="">College</option><option value="30" selected="">Software Development</option><option value="31" selected="">Distribution Agency</option><option value="32" selected="">Ration Shop</option><option value="33" selected="">Medical and General Store</option><option value="34" selected="">Wholesale Grain Merchant</option><option value="35" selected="">Wholesale General Store</option><option value="36" selected="">Teacher</option><option value="37" selected="">Tution Classes</option><option value="38" selected="">Computer Training Centre</option><option value="39" selected="">Small Scale Industry</option><option value="40" selected="">Computer Hardware and Software</option><option value="41" selected="">Flour Mill</option><option value="43" selected="">CA</option><option value="44" selected="">Lawyer</option><option value="45" selected="">Insurance Agency</option><option value="46" selected="">AutoMobile Agency</option></select>
            </div>
            <div class="form-group">
              <label>Country</label>
              <select id="country_name" name="country_name" class="form-control"><option value="">Choose Country</option><option value="101" selected="">India</option></select> 
            </div>
            <div class="form-group">
              <label>State</label>
              <select id="state_name" name="state_name" class="form-control"><option value="">Choose State</option><option value="1">Andaman and Nicobar Islands</option><option value="2">Andhra Pradesh</option><option value="3">Arunachal Pradesh</option><option value="4">Assam</option><option value="5">Bihar</option><option value="6">Chandigarh</option><option value="7">Chhattisgarh</option><option value="8">Dadra and Nagar Haveli</option><option value="9">Daman and Diu</option><option value="10">Delhi</option><option value="11">Goa</option><option value="12">Gujarat</option><option value="13">Haryana</option><option value="14">Himachal Pradesh</option><option value="15">Jammu and Kashmir</option><option value="16">Jharkhand</option><option value="17">Karnataka</option><option value="19">Kerala</option><option value="20">Lakshadweep</option><option value="21">Madhya Pradesh</option><option value="22">Maharashtra</option><option value="23">Manipur</option><option value="24">Meghalaya</option><option value="25">Mizoram</option><option value="26">Nagaland</option><option value="29">Odisha</option><option value="31">Pondicherry</option><option value="32">Punjab</option><option value="33">Rajasthan</option><option value="34">Sikkim</option><option value="35">Tamil Nadu</option><option value="36">Telangana</option><option value="37">Tripura</option><option value="38">Uttar Pradesh</option><option value="39">Uttarakhand</option><option value="41">West Bengal</option></select> 
            </div>
            <div class="form-group">
              <label>City</label>
              <select id="city_name" name="city_name" class="form-control">
              </select> 
            </div>
            <div class="form-group">
              <button class="btn btn-default pull-right" type="submit" id="search" name="search">Search</button>
            </div>
          </form>
        </div>
        </div>
        <div class="row">
            @foreach ($businessDir as $business)
            <div class="col-md-6">
                <div class="well-white pinside20">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="post-title"><span class="title-color-default">{{$business->company_name}}</span>
                            </h3>
                        </div>
                        <div class="col-md-12 dir-listing-14">
                            <div class="row">
                                <div class="col-md-3"><strong>Address:</strong></div>
                                <div class="col-md-9">
                                    {{$business->address}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Business Type:</strong></div>
                                <div class="col-md-9">{{$business->category}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Work Nature:</strong></div>
                                <div class="col-md-9">{{$business->work}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Person Name:</strong></div>
                                <div class="col-md-9">{{$business->person_name}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Phone Number:</strong></div>
                                <div class="col-md-9">{{$business->mobile}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Email-Id:</strong></div>
                                <div class="col-md-9">{{$business->email}}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><strong>Website Link:</strong></div>
                                <div class="col-md-9">{{$business->website_link}}</div>
                            </div>
                            <div class="row mt10">
                                <div class="col-md-6"><a href="javascript:void(0)" data-toggle="modal"
                                        data-target="#myModalDetails{{$business->id}}" class="btn btn-default">More Details</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade in" id="myModalDetails{{$business->id}}" role="dialog">
                <div class="modal-dialog modal-lg">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">×</button>
                            <h4 class="modal-title" id="">Business Directory Details</h4>
                        </div>
                        <div class="modal-body" id="loadDetails">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Company Name : </label>
                                                <div class="col-md-6">{{$business->company_name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Product Category : </label>
                                                <div class="col-md-6">{{$business->category}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Nature of Work : </label>
                                                <div class="col-md-6">{{$business->work}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 rc-post">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Contact Person Name : </label>
                                                <div class="col-md-6">{{$business->person_name}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Phone Number : </label>
                                                <div class="col-md-6">{{$business->mobile}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 rc-post">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Email : </label>
                                                <div class="col-md-6">{{$business->email}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 rc-post">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Address : </label>
                                                <div class="col-md-6"> {{$business->address}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Pincode : </label>
                                                <div class="col-md-6">{{$business->pincode}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">City : </label>
                                                <div class="col-md-6">{{$business->city}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">State : </label>
                                                <div class="col-md-6">{{$business->state}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Country : </label>
                                                <div class="col-md-6">{{$business->country}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 rc-post">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Website Link : </label>
                                                <div class="col-md-6">{{$business->website_link}}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group text-left">
                                                <label class="col-md-3 control-label">Any Offer : </label>
                                                <div class="col-md-9">{{$business->any_offer}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach


        </div>

    </div>

</div>

@endsection