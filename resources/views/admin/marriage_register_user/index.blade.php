@extends('layouts.admin_master')
@section('sitetitle', 'All Marriage Register Users')
@section('title', 'All Marriage Register Users')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Profile For</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Cast</th>
                                    <th>Status</th>
                                    <th style="width: 180px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($marriageRegUsers as $user)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{$user->create_profile_for}}</td>
                                    <td>{{ $user->user_name }}</td>
                                    <td>{{ $user->gender }}</td>
                                    <td>{{ $user->caste }}</td>
                                    <td> @if ($user->status == 0)

                                        <a href="{{route('marriageupdatestatus',$user->id)}}"
                                            class="btn btn-success">Approve</a>
                                        @else
                                        <a href="{{route('marriageupdatestatus',$user->id)}}"
                                            class="btn btn-danger">Disapprove</a>
                                        @endif </td>

                                    <td>
                                        <form action="{{ route('deletemarriage', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $user->id }}" href="#">
                                                <i class="fas fa-eye"></i> Full Detail
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>

                                    </td>
                                </tr>
                                {{-- class="modal fade" id="modal-lg{{ $user->id }}" --}}


                                <div class="modal fade in" id="modal-lg{{ $user->id }}" role="dialog">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">User's Full Detail</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <div class="row" id="loadDetails">
                                                        <div class="col-md-12 text-center">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <!-- Form Name -->
                                                                    <h2> {{$user->user_name}}</h2>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div class="team-pic">
                                                                                <a href="javascript:void(0)"><img
                                                                                        src="{{asset('uploads/profileimage/'.$user->profile_image)}}"
                                                                                        class="img-responsive"
                                                                                        alt=""></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h2 class="form-title">Personal Information</h2>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Date
                                                                                    of Birth / जन्म तिथि :</label>
                                                                                {{date('d-M-Y', strtotime($user->dob))}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Birth
                                                                                    Time / जन्म समय :</label>
                                                                                {{$user->birth_time}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Birth
                                                                                    Place / जन्म स्थान :</label>
                                                                                {{$user->birth_place}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Marital
                                                                                    Status / वैवाहिक स्थिति :</label>
                                                                                {{$user->marital_status}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Height
                                                                                    / ऊंचाई :</label>
                                                                                {{$user->height}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Complexion
                                                                                    / रंग : </label>
                                                                                {{$user->complexion}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Manglik
                                                                                    /
                                                                                    मांगलिक :</label>
                                                                                {{$user->manglik}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Age
                                                                                    /
                                                                                    आयु :</label>
                                                                                {{$user->age}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group text-left">
                                                                        <label
                                                                            class="col-md-6 control-label">gotra / गोत्र: :</label>
                                                                        {{$user->gotra}}
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <div class="col-md-12">
                                                                    <h2 class="form-title">Education &amp; Profession
                                                                    </h2>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Education
                                                                                    / शैक्षणिक योग्यता : </label>
                                                                                {{$user->education}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Occupation
                                                                                    / व्यवसाय : </label>
                                                                                {{$user->occupation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Annual
                                                                                    Income / वार्षिक आय (Per/Year) :
                                                                                </label>
                                                                                {{$user->annual_income}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Pincode
                                                                                    /
                                                                                    पिन कोड : </label>
                                                                                {{$user->pincode}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">City
                                                                                    /
                                                                                    जिला : </label>
                                                                                {{$user->city}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">State
                                                                                    / प्रदेश : </label>
                                                                                {{$user->state}}

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Contact
                                                                                    Address / संपर्क पता :</label>
                                                                                {{$user->contact_address}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Mobile
                                                                                    No / मोबाइल नंबर : </label>
                                                                                {{$user->mobile}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Email
                                                                                    ID / ईमेल :</label>
                                                                                {{$user->email}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Other
                                                                                    Phone No / अन्य फोन नंबर : </label>
                                                                                {{$user->other_phone_no}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Other
                                                                                    Phone Number Relationship / अन्य फोन
                                                                                    नंबर संबंध : </label>
                                                                                {{$user->phone_no_relation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Father's
                                                                                    Name / पिता का नाम : </label>
                                                                                {{$user->father_name}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Father's
                                                                                    Occupation / पिता का व्यवसाय :
                                                                                </label>
                                                                                {{$user->father_occupation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Mother's
                                                                                    Name / मां का नाम : </label>
                                                                                {{$user->mother_name}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Mother's
                                                                                    Occupation / मां का व्यवसाय
                                                                                    :</label>
                                                                                {{$user->mother_occupation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Brothers
                                                                                    / भाई बंधु :</label>
                                                                                {{$user->brothers}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Sisters
                                                                                    /
                                                                                    बहने : </label>
                                                                                {{$user->sisters}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <button type="button" class="btn btn-default"
                                                    data-dismiss="modal">Close</button>

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                @php
                                $sr++;
                                @endphp
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


@endsection