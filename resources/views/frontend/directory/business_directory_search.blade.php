@extends('layouts.master')

@section('content')
<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<style>
    .overflow_content{
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
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
                    <div class="col-md-3 form-group">
                        <label>Business Category</label>
                        <select id="category_id_0" name="productCat" class="form-control" onchange="getSubCat(0, this.value, 0)">
                            <option value="0">Select Category </option>
                            @foreach ($businessDirCategories as $businessDirectory)
                            <option value="{{$businessDirectory->id}}">{{$businessDirectory->category_name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Select Sub Category</label>
                            <select name="productsubCat" id="sub_category_id_0" class="form-control">
                                <option value="0">Select sub category</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Country :</label>
                            <select class="form-control" data-live-search="true" name="country" id="country-dropdown_0" onchange="getState(0, this.value, 0)"> 
                                <option value="0">Select country</option>
                                @foreach($countries as $countrie)
                                    <option value="{{$countrie->id}}">{{ $countrie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>State :</label>
                            <select class="form-control" data-live-search="true" name="state" id="state-dropdown_0" onchange="getCity(0, this.value, 0)">
                                <option value="0">Select State</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City :</label>
                            <select class="form-control" data-live-search="true" name="city" id="city-dropdown_0">
                                <option value="0">Select City</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 form-group">
                        <label>.</label>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @foreach ($businessDir as $business)
            <div class="col-md-6">
                <div class="well-white pinside20">
                    <div class="row">
                        <div class="col-md-12">
                            <h3 class="post-title"><span class="title-color-default">{{$business->business_name}}</span>
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
                                <div class="col-md-9">{{$business->category->category_name}} / {{$business->sub_category->sub_category_name}}</div>
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
                                <div class="col-md-9 overflow_content"><a href="{{$business->website_link}}" target="_blank">{{$business->website_link}}</a></div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-3"><strong>Visiting Card:</strong></div>
                                <div class="col-md-9 overflow_content">
                                    @if($business->visiting_card != '')
                                    <a href="{{ asset('uploads/business_visiting_cards/' . $business->visiting_card) }}" target="_blank"><i class="fa fa-eye"></i> View</a>
                                    @else
                                    <i class="fa fa-eye" style="opacity: 0.5;"></i> View
                                    @endif
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="col-md-3"><strong>Document:</strong></div>
                                <div class="col-md-9 overflow_content">
                                    @if($business->document != '')
                                    <a href="{{ asset('uploads/business_visiting_cards/' . $business->document) }}" target="_blank"><i class="fa fa-paperclip"></i></a>
                                    @else
                                    <i class="fa fa-paperclip" style="opacity: 0.5;"></i>
                                    @endif
                                </div>
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
                                                <label class="col-md-6 control-label">Business Name : </label>
                                                <div class="col-md-6">{{$business->business_name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Product Category : </label>
                                                <div class="col-md-6">{{$business->category->category_name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Product Sub Category : </label>
                                                <div class="col-md-6">{{$business->sub_category->sub_category_name}}</div>
                                            </div>
                                        </div>
                                    <!-- </div>
                                    <div class="row"> -->
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
                                    <!-- </div>
                                    <div class="row"> -->
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
                                    <!-- </div>
                                    <div class="row"> -->
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
                                    <!-- </div>
                                    <div class="row"> -->
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">City : </label>
                                                <div class="col-md-6">{{$business->city->city}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">State : </label>
                                                <div class="col-md-6">{{$business->state->name}}</div>
                                            </div>
                                        </div>
                                    <!-- </div>
                                    <div class="row"> -->
                                        <div class="col-md-6">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Country : </label>
                                                <div class="col-md-6">{{$business->country->name}}</div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 rc-post">
                                            <div class="form-group text-left">
                                                <label class="col-md-6 control-label">Website Link : </label>
                                                <div class="col-md-6"><a href="{{$business->website_link}}" target="_blank">{{$business->website_link}}</a></div>
                                            </div>
                                        </div>
                                    <!-- </div>
                                    <div class="row"> -->
                                        <div class="col-md-12">
                                            <div class="form-group text-left">
                                                <label class="col-md-3 control-label">Any Offer : </label>
                                                <div class="col-md-9">{{$business->any_offer}}</div>
                                            </div>
                                        </div>
                                        @if($business->visiting_card != '')
                                            <div class="col-md-6 rc-post">
                                                <div class="form-group text-left">
                                                    <label class="col-md-6 control-label">Visiting Card : </label>
                                                    <div class="col-md-6"><a href="{{ asset('uploads/business_visiting_cards/' . $business->visiting_card) }}" target="_blank">View</a></div>
                                                </div>
                                            </div>
                                        @endif
                                        @if($business->document != '')
                                            <div class="col-md-6 rc-post">
                                                <div class="form-group text-left">
                                                    <label class="col-md-6 control-label">Document : </label>
                                                    <div class="col-md-6"><a href="{{ asset('uploads/business_visiting_cards/' . $business->document) }}" target="_blank"><i class="fa fa-paperclip"></i></a></div>
                                                </div>
                                            </div>
                                        @endif
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
@include('frontend.directory.selectjs')
<script>
    window.onload = function() {
        var cat = {{request('productCat')}};
        if(cat != 0) {
            $("#category_id_0").val({{request('productCat')}});
        }
        
        var subcat = {{request('productsubCat')}};
        if(subcat != 0) {
            getSubCat(0, {{request('productCat')}}, {{request('productsubCat')}});
        }

        var country = {{request('country')}};
        if(country != 0) {
            $("#country-dropdown_0").val({{request('country')}});
        }

        var state = {{request('state')}};
        if(state != 0) {
            getState(0, {{request('country')}}, {{request('state')}});
        }
        
        var city = {{request('city')}};
        if(city != 0) {
            getCity(0, {{request('state')}}, {{request('city')}});
        }
        

    };
</script>
@endsection