@extends('layouts.master')

@section('content')
<style>
.modal-dialog {
    width: 80%;
}
</style>
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
                    <li class=""><a href="{{route('memberdirectory')}}"><i
                                class="fa fa-search db-icon"></i>Search</a></li>
                    <li class=""><a href="{{route('addmemberdirectory')}}"><i
                                class="fa fa-plus db-icon"></i>Create Directory</a></li>
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
                                <th>Profile Photo</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th>Mobile</th>
                                <th>Email Id</th>
                                <th>City</th>
                                <!-- <th>Address</th> -->
                                <th>Highest Education</th>
                                <!-- <th>Date Of Birth</th>
                                <th>Blood Group</th>
                                <th>Marriage Anniversary</th> -->
                                <!-- <th>Current Address</th>
                                <th>Permanent Address</th>
                                <th>Occupation Type</th>
                                <th>Profession</th> -->
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sr = 1;
                            @endphp
                            @foreach ($directoryMembers as $directoryMember)
                            <tr>
                                <td>{{$sr}}</td>
                                <td><a href="{{ asset('uploads/member_directory/' . $directoryMember->profile_photo) }}" target="_blank"><img src="{{ asset('uploads/member_directory/' . $directoryMember->profile_photo) }}" style="width: 100px;"></a></td>
                                <td class="capitalize">{{ $directoryMember->name}}</td>
                                <td class="capitalize">{{ $directoryMember->father_name }}</td>
                                <td>{{ $directoryMember->mobile }}</td>
                                <td>{{ $directoryMember->email_id }}</td>
                                <td>{{-- $directoryMember->country->name }}/{{ $directoryMember->state->name --}}{{ $directoryMember->city->city }}</td>
                                <!-- <td>{{ $directoryMember->address }}</td> -->
                                <td class="capitalize">{{ $directoryMember->highest_education }}</td>
                                <!-- <td>{{ date("d M, Y", strtotime($directoryMember->dob)) }}</td>
                                <td>{{ $directoryMember->blood_group }}</td>
                                <td>{{ date("d M, Y", strtotime($directoryMember->marriage_anniversary)) }}</td> -->
                                <!-- <td>{{ $directoryMember->current_address }}</td>
                                <td>{{ $directoryMember->permanent_address }}</td>
                                <td>{{ $directoryMember->occupation_type }}</td>
                                <td>{{ $directoryMember->profession }}</td> -->
                                <td class="capitalize">
                                    @if($directoryMember->status == 0)
                                        Pending
                                    @else
                                        Active
                                    @endif
                                </td>
                                <td style="width: 130px;">
                                    <form action="{{ route('deletemember', $directoryMember->id) }}" method="POST">
                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#myModal{{ $directoryMember->id }}" onclick="FillValues({{$sr}}, 0, 0, {{$directoryMember->country_id}}, {{$directoryMember->state_id}}, {{$directoryMember->city_id}})" href="javascript:void(0)">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                             </button>

                                    </form>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal{{ $directoryMember->id }}" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Update Directory Details</h4>
                                        </div>
                                        <form action="{{route('updatemember',$directoryMember->id)}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Full Name :</label>
                                                            <input type="text" class="form-control" id="name0" name="name" value="{{ $directoryMember->name}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Father's Name :</label>
                                                            <input type="text" class="form-control" id="father_name0" name="father_name" value="{{ $directoryMember->father_name}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone Number :</label>
                                                            <input type="text" class="form-control" id="phoneNumber0" value="{{ $directoryMember->mobile}}"
                                                                name="mobile" placeholder="Enter Phone Number">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email Id :</label>
                                                            <input type="email" class="form-control" id="email_id0" name="email_id" value="{{ $directoryMember->email_id}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Facebook Link :</label>
                                                            <input type="text" class="form-control" id="facebook0" name="facebook" value="{{ $directoryMember->facebook}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Instagram Link :</label>
                                                            <input type="text" class="form-control" id="instagram0" name="instagram" value="{{ $directoryMember->instagram}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Youtube Channel link :</label>
                                                            <input type="text" class="form-control" id="youtube0" name="youtube" value="{{ $directoryMember->youtube}}"
                                                                placeholder="Enter Full Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Country :</label>
                                                            <select class="form-control" data-live-search="true" name="country_id" id="country-dropdown_{{$sr}}">
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
                                                            <select class="form-control" data-live-search="true" name="state_id" id="state-dropdown_{{$sr}}">
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
                                                    <!-- <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Address :</label>
                                                            <input type="text" class="form-control" id="address0" value="{{ $directoryMember->address}}" name="address"
                                                                placeholder="Enter Address">
                                                        </div>
                                                    </div> -->
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Highest Educationress :</label>
                                                            <input type="text" class="form-control" id="highest_education0" value="{{ $directoryMember->highest_education}}" name="highest_education"
                                                                placeholder="Enter Highest Educationress">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Date of Birth : <small>(DD/MM/YYYY)</small></label>
                                                            <input type="text" class="form-control dob" id="dob0" name="dob" value="{{ date('d/m/Y', strtotime($directoryMember->dob))}}"
                                                                placeholder="Enter Date of Birth(DD/MM/YYYY)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Blood Group</label>
                                                            <select class="form-control" id="blood_group" name="blood_group">
                                                                <option value="" selected="selected" disabled>Select Blood Group</option>
                                                                <option value="A+" @if ($directoryMember->blood_group=='A+' ) selected="selected" @endif>A+</option>
                                                                <option value="A-" @if ($directoryMember->blood_group=='A-' ) selected="selected" @endif>A-</option>
                                                                <option value="AB" @if ($directoryMember->blood_group=='AB' ) selected="selected" @endif>AB</option>
                                                                <option value="B+" @if ($directoryMember->blood_group=='B+' ) selected="selected" @endif>B+</option>
                                                                <option value="B-" @if ($directoryMember->blood_group=='B-' ) selected="selected" @endif>B-</option>
                                                                <option value="O+" @if ($directoryMember->blood_group=='O+' ) selected="selected" @endif>O-</option>
                                                                <option value="O-" @if ($directoryMember->blood_group=='O-' ) selected="selected" @endif>O+</option>


                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Marriage Anniversary Date : <small>(DD/MM/YYYY)</small></label>
                                                            <input type="text" class="form-control marriage_anniversary" id="marriage_anniversary0" name="marriage_anniversary" value="{{date('d/m/Y', strtotime($directoryMember->marriage_anniversary))}}"
                                                                placeholder="Enter Marriage Anniversary Date(DD/MM/YYYY)" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Profile Photo :</label>
                                                            <input type="file" class="form-control" id="profile_photo0" value=""
                                                                name="profile_photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Current Address :</label>
                                                            <input type="text" class="form-control" id="current_address0" value="{{$directoryMember->current_address}}"
                                                                name="current_address" placeholder="Enter Current Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Permanent Address :</label>
                                                            <input type="text" class="form-control" id="permanent_address0" value="{{$directoryMember->permanent_address}}"
                                                                name="permanent_address" placeholder="Enter Permanent Address">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Occupation Type :</label>
                                                            <input type="text" class="form-control" id="occupation_type0" value="{{$directoryMember->occupation_type}}"
                                                                name="occupation_type" placeholder="Enter Occupation">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Profession :</label>
                                                            <input type="text" class="form-control" id="profession0" value="{{$directoryMember->profession}}"
                                                                name="profession" placeholder="Enter Occupation">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload Photo :</label>
                                                            <input type="file" class="form-control" id="upload_photo0" value=""
                                                                name="upload_photo">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Upload Supporting Doc :</label>
                                                            <input type="file" class="form-control" id="upload_supporting_doc0" value=""
                                                                name="upload_supporting_doc">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Description :</label>
                                                            <textarea type="text" class="form-control" rows="6" id="description"
                                                                name="description">{{$directoryMember->description}}</textarea>
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

                            <!-- <script>
                                $('#country-dropdown{{ $directoryMember->id }}').on('change', function() {
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    var country_id = this.value;
                                    $("#state-dropdown{{ $directoryMember->id }}").html('');
                                    $.ajax({
                                        url: '{{ url("admin/get-states-by-country") }}',
                                        type: "POST",
                                        data: {
                                            country_id: country_id

                                        },
                                        dataType: 'json',
                                        success: function(result) {
                                            $('#state-dropdown{{ $directoryMember->id }}').html('<option disabled>Select State</option>');
                                            $.each(result.states, function(key, value) {
                                                $("#state-dropdown{{ $directoryMember->id }}").append('<option value="' + value.id + '">' + value.name + '</option>');
                                            });
                                            

                                        }
                                    });
                                });

                                $("#state-dropdown{{ $directoryMember->id }}").change(function() {
                                    // var state_id = document.getElementById("state_id").value;
                                    $.ajaxSetup({
                                        headers: {
                                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        }
                                    });
                                    var state_id = this.value;
                                    $("#city-dropdown{{ $directoryMember->id }}").html('');
                                    $.ajax({
                                        url: '{{ url("get-city-by-state") }}',
                                        type: "POST",
                                        data: {
                                            state_id: state_id

                                        },
                                        dataType: 'json',
                                        success: function(result) {
                                            $('#city-dropdown{{ $directoryMember->id }}').html('<option disabled>Select City</option>');
                                            $.each(result.cities, function(key, value) {
                                                $("#city-dropdown{{ $directoryMember->id }}").append('<option value="' + value.id + '">' + value.city + '</option>');
                                            });
                                            

                                        }
                                    });
                                });
                            </script> -->
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
<script>

    $(document).ready(function(){
        $(".dob").datepicker({
                changeMonth: true,
                changeYear: true,
                controlType: 'select',
                dateFormat:'dd/mm/yy',
                oneLine: true,
                maxDate: 0,
                yearRange: "-90:+0",
        });
        $(".marriage_anniversary").datepicker({
                changeMonth: true,
                changeYear: true,
                controlType: 'select',
                dateFormat:'dd/mm/yy',
                oneLine: true,
                maxDate: 0,
                yearRange: "-90:+0",
        });
    });
</script>
@endsection