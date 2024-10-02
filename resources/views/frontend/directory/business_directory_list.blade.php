@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Manage Directory</li>
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
                    <li class=""><a href="{{route('businessdirectory')}}"><i class="fa fa-search db-icon"></i>Search</a>
                    </li>
                    <li class=""><a href="{{route('addbusinessdirectory')}}"><i class="fa fa-plus db-icon"></i>Create
                            Directory</a></li>
                    <li class="active"><a href="javascript:void(0)"><i class="fa fa-cog db-icon"></i>Manage/View
                            Directory</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
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
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{route('memberdirectory')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a>
                        Directory List</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>SNo</th>
                                <th>Business Name</th>
                                <th>Product Category/Sub-Category</th>
                                <th>Nature Of Work</th>
                                <th>Contact Persone Name</th>
                                <th>Mobile</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sr = 1;
                            @endphp
                            @foreach ($businessDirectories as $businessDir)
                            <tr>
                                <td>{{$sr}}</td>
                                <td class="capitalize">{{$businessDir->business_name}}</td>
                                <td>{{$businessDir->category->category_name}}/{{$businessDir->sub_category->sub_category_name}}</td>
                                <td class="capitalize">{{$businessDir->work}}</td>
                                <td class="capitalize">{{$businessDir->person_name}}</td>
                                <td class="capitalize">{{$businessDir->mobile}}</td>
                                <td class="capitalize">{{$businessDir->email}}</td>
                                <td>{{$businessDir->city->city.', '.$businessDir->state->name.', '.$businessDir->country->name.', '.$businessDir->address.'-'.$businessDir->pincode}}
                                </td>
                                <td class="capitalize">
                                    @if($businessDir->status == 0)
                                        Pending
                                    @else
                                        Active
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#myModal{{$businessDir->id}}" onclick="FillValues({{$sr}}, {{$businessDir->category_id}}, {{$businessDir->sub_category_id}}, {{$businessDir->country_id}}, {{$businessDir->state_id}}, {{$businessDir->city_id}})" href="javascript:void(0)">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{$businessDir->id}}" role="dialog">
                                <div class="modal-dialog modal-lg" style="width: 80%;">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Directory Details</h4>
                                        </div>
                                        <form action="{{route('updatebusiness',$businessDir->id)}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Select Category</label>
                                                            <select name="category_id" id="category_id_{{$sr}}" class="form-control" onchange="getSubCat({{$sr}}, this.value, 0)" required>
                                                                <option value="">Select category</option>
                                                                @foreach ($businessDirCategories as $businessDirCategory)
                                                                    <option value="{{$businessDirCategory->id}}">{{$businessDirCategory->category_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Select Sub Category</label>
                                                            <select name="sub_category_id" id="sub_category_id_{{$sr}}" class="form-control" required>
                                                                <option value="">Select sub category</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Business Name :</label>
                                                            <input type="text" class="form-control" name="business_name"
                                                                value="{{$businessDir->business_name}}" placeholder="Enter Business Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Director Name :</label>
                                                            <input type="text" class="form-control" name="director_name"
                                                                value="{{$businessDir->director_name}}" placeholder="Enter Director Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Document : </label>
                                                            <input type="file" class="form-control" accept="image/pdf/doc/*" id="profile_photo0" name="document">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Nature of Work :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->work}}" name="work"
                                                                placeholder="Enter Nature of Work">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Contact Person Name :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->person_name}}" name="person_name"
                                                                placeholder="Enter Contact Person Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Phone Number :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->mobile}}" name="mobile"
                                                                placeholder="Enter Phone Number">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Email :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->email}}" name="email"
                                                                placeholder="Enter Email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Address :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->address}}" name="address"
                                                                placeholder="Enter Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Pincode :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->pincode}}" id="pincode" name="pincode"
                                                                placeholder="Enter Pincode">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country :</label>
                                                            <select class="form-control" data-live-search="true" name="country_id" id="country-dropdown_{{$sr}}" onchange="getState({{$sr}}, this.value, 0)">
                                                                <option value="">Select country</option>
                                                                @foreach($countries as $countrie)
                                                                    <option value="{{$countrie->id}}">{{ $countrie->name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State :</label>
                                                            <select class="form-control" data-live-search="true" name="state_id" id="state-dropdown_{{$sr}}" onchange="getCity({{$sr}}, this.value, 0)">
                                                                <option value="">Select State</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City :</label>
                                                            <select class="form-control" data-live-search="true" name="city_id" id="city-dropdown_{{$sr}}">
                                                                <option value="">Select City</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                
                                                    
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Website Link :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->website_link}}" name="website_link"
                                                                placeholder="Enter Website Link">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Offer for sahu community :</label>
                                                            <input type="text" class="form-control" value="{{$businessDir->any_offer}}" name="any_offer"
                                                                placeholder="Enter Offer Details">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mt10">
                                                        <div class="form-group">
                                                            <label>Short description about business</label>
                                                            <textarea class="form-control" name="description" rows="6"
                                                                placeholder="Enter description here....">{{$businessDir->description}}</textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default">Update</button>
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @php
                            $sr++;
                            @endphp
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('frontend.directory.selectjs')
@endsection