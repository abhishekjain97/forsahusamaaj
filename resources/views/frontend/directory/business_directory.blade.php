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
                    <li class=""><a href="{{route('businessdirectorylist')}}"><i class="fa fa-cog db-icon"></i>Manage/View Directory</a>
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
                    <h1><a href="{{url('/')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Search
                        Business Directory</h1>
                </div>
            </div>
			<div class="form-group col-md-12">
                            <a href="{{route('addbusinessdirectory')}}" class="btn btn-default btn-lg btn-block" >Create Business Directory</a>
            </div>
        </div>
        <div class="row well-box">
            <form action="{{route('businessdirectorysearch')}}" method="GET">
                <div class="col-md-12">
                    <div class="row">
                        
                        <div class="col-md-3 form-group">
						    <label>Business Category</label>
                            <select id="category_id" name="productCat" class="form-control">
                                <option value="0">Select Category </option>
                                @foreach ($businessDirCategories as $businessDirectory)
                                <option value="{{$businessDirectory->id}}">{{$businessDirectory->category_name}} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Select Sub Category</label>
                                <select name="productsubCat" id="sub_category_id" class="form-control">
                                    <option value="0">Select sub category</option>
                                </select>
                            </div>
                        </div>
						<div class="col-md-3">
                            <div class="form-group">
                                <label>Country :</label>
                                <select class="form-control" data-live-search="true" name="country" id="country-dropdown">
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
                                <select class="form-control" data-live-search="true" name="state" id="state-dropdown">
                                    <option value="0">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>City :</label>
                                <select class="form-control" data-live-search="true" name="city" id="city-dropdown">
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
                  
                </div>
            </form>
        </div>
    </div>
</div>

@endsection