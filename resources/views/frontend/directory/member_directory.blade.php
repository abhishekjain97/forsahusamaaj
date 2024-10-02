@extends('layouts.master')

@section('content')
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
                    <li class="active">Members Directory</li>
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
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-search db-icon"></i>Search</a></li>
                    <li class=""><a href="{{route('addmemberdirectory')}}"><i class="fa fa-plus db-icon"></i>Create
                            Directory</a></li>
                    <li class=""><a href="{{route('list')}}"><i class="fa fa-cog db-icon"></i>Manage/View Directory</a>
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
                        Members Directory</h1>
                </div>
            </div>
			
			<div class="form-group col-md-12">
                        <a href="{{route('addmemberdirectory')}}" class="btn btn-default btn-lg btn-block">Create Your
                            Directory</a>
                    </div>
					
        </div>
        <div class="row well-box">
            <form action="{{route('searchmember')}}" method="GET" id="addMemDirForm" class="addMemDirForm">
                @csrf
                <!-- <div class="col-md-12" id="filterError">
							<div class="alert alert-danger filterError">
								<strong>Error!</strong> <span></span>
							</div>
						</div> -->
                <!-- <h4 style="color: #f84b4b;">Choose any one field</h4> -->
                <div class="row">
                    
							
						<div class="col-md-3 form-group">
						    <label>Name</label>
                            <input id="input_name" name="firstName" class="form-control" value=""
                            placeholder="Enter Name" />
                        </div>
						
					    <div class="col-md-3 form-group">
						    <label>Country</label>
                            <!-- <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="productCat" id="country-dropdown" name="productCat" class="form-control select2"> -->
                            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="country-dropdown" name="country_id" class="form-control select2">
                                <option value="0">Select country</option>
                                @foreach($countries as $countrie)
                                    <option value="{{$countrie->id}}">{{ $countrie->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
						<label>State</label>
							<select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="state-dropdown" name="state_id" tabindex="-98">
                                <option value="0">Select State</option>
                            </select>
                        </div>
                        <div class="col-md-2 form-group">
						<label>City</label>
                            <select class="form-control mb-3 aiz-selectpicker" data-live-search="true" id="city-dropdown" name="city_id" tabindex="-98">
                                <option value="0">Select City</option>
                            </select>
                        </div>
						<div class="col-md-2 form-group">
						<label>.</label>
							<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
						</div>
                </div>
                
        </div>
        </form>
    </div>
</div>
</div>
<script>
    function showFilter(filterType) {
        $("#sec_"+filterType).show();
    }
    
    function removeField(filterType) {
        $("#input_"+filterType).val("");
        $("#sec_"+filterType).hide();
    }
</script>
@endsection