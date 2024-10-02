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
                                    <th>Name</th>
                                    <th>Sr Name</th>
                                    <th>Father's Name</th>
                                    <th>Address</th>
                                    <th>Pincode</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th style="width: 180px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($mahasamparkLists as $mahasampark)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $mahasampark->hod_name}}</td>
                                    <td>{{ $mahasampark->hod_srname }}</td>
                                    <td>{{ $mahasampark->father_name }}</td>
                                    <td>{{ $mahasampark->address }}</td>
                                    <td>{{ $mahasampark->pincode }}</td>
                                    <td>{{ $mahasampark->city }}</td>
                                    <td>{{ $mahasampark->state }}</td>

                                    <td>
                                        <form action="{{ route('deletemahasampark', $mahasampark->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $mahasampark->id }}" href="#"> <i
                                                    class="fas fa-eye"></i> Full Detail
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade in" id="modal-lg{{ $mahasampark->id }}" role="dialog">
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
                                                                    <h2> {{$mahasampark->hod_name}}</h2>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div class="team-pic">
                                                                                <a href="javascript:void(0)"><img
                                                                                        src="{{asset('uploads/mahasampark/'.$mahasampark->image)}}"
                                                                                        class="img-responsive"
                                                                                        alt=""></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h2 class="form-title">Personal Information</h2>
                                                                    <hr>
                                                                    <h3 class="text-center">Id Numebr - <b>{{$mahasampark->id_no}}</b> </h3>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label class="col-md-6 control-label">Sr
                                                                                    Name :</label>
                                                                                {{$mahasampark->hod_srname}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Father's
                                                                                    Name :</label>
                                                                                {{$mahasampark->father_name}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Address
                                                                                    :</label>
                                                                                {{$mahasampark->address}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Pincode
                                                                                    :</label>
                                                                                {{$mahasampark->pincode}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">City
                                                                                    :</label>
                                                                                {{$mahasampark->city}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">State
                                                                                    :</label>
                                                                                {{$mahasampark->state}}
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Date
                                                                                    of Birth :</label>
                                                                                {{$mahasampark->dob}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Birth
                                                                                    Place :</label>
                                                                                {{$mahasampark->birth_place}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Email
                                                                                    :</label>
                                                                                {{$mahasampark->hod_email}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Marital
                                                                                    Status :</label>
                                                                                {{$mahasampark->marital_status}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Marriage
                                                                                    Anniversary Date :</label>
                                                                                {{$mahasampark->marriage_anniversary_date}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Mobile
                                                                                    : </label>
                                                                                {{$mahasampark->hod_mobile_no}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">LandlineNo
                                                                                    :</label>
                                                                                {{$mahasampark->landline_no}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                </div>


                                                                <div class="col-md-12">
                                                                    <h2 class="form-title">Education &amp; Profession
                                                                    </h2>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Education
                                                                                    : </label>
                                                                                {{$mahasampark->education}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Occupation
                                                                                    : </label>
                                                                                {{$mahasampark->occupation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @if ($mahasampark->occupation=="govt job" ||
                                                                    $mahasampark->occupation=="private job" ||
                                                                    $mahasampark->occupation=="semi govt job")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Department
                                                                                    Name
                                                                                    : </label>
                                                                                {{$mahasampark->department_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Designation
                                                                                    : </label>
                                                                                {{$mahasampark->designation}}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation=="unemployed")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">What
                                                                                    do you want to do
                                                                                    : </label>
                                                                                {{$mahasampark->what_do_you_want}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Job/Business
                                                                                    Description
                                                                                    : </label>
                                                                                {{$mahasampark->business_description}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Education
                                                                                    : </label>
                                                                                {{$mahasampark->unemployed_education}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Experiance
                                                                                    : </label>
                                                                                {{$mahasampark->experiance}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Expected
                                                                                    Salary Monthly
                                                                                    : </label>
                                                                                {{$mahasampark->expected_salary}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation == "education")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Class
                                                                                    Name
                                                                                    : </label>
                                                                                {{$mahasampark->class_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">School/University
                                                                                    Name
                                                                                    : </label>
                                                                                {{$mahasampark->university_name}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">City
                                                                                    : </label>
                                                                                {{$mahasampark->education_city}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation=="social work")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Organization
                                                                                    Name : </label>
                                                                                {{$mahasampark->organization_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Designation:
                                                                                </label>
                                                                                {{$mahasampark->social_designation}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">What
                                                                                    kind of social work
                                                                                    : </label>
                                                                                {{$mahasampark->kind_of_social_work}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Extra
                                                                                    Activity : </label>
                                                                                {{$mahasampark->extra_activity}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation=="bussiness")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Business/Industrial
                                                                                    Name : </label>
                                                                                {{$mahasampark->bussiness_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Business/Industrial
                                                                                    Description: </label>
                                                                                {{$mahasampark->bussiness_description}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation=="professional")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Business/Industrial
                                                                                    Name : </label>
                                                                                {{$mahasampark->professional_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Business/Industrial
                                                                                    Description: </label>
                                                                                {{$mahasampark->professional_designation}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    @if ($mahasampark->occupation=="retired")
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Department
                                                                                    Name : </label>
                                                                                {{$mahasampark->rtr_department_name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Designation:
                                                                                </label>
                                                                                {{$mahasampark->rtr_designation}}
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Job
                                                                                    Description : </label>
                                                                                {{$mahasampark->rtr_job_description}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Currently
                                                                                    Work Description: </label>
                                                                                {{$mahasampark->rtr_work_description}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    @endif

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-4 control-label">Blood
                                                                                    Group :
                                                                                </label>
                                                                                {{$mahasampark->blood_group}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label class="col-md-4 control-label">No
                                                                                    of Family Member :
                                                                                </label>
                                                                                {{$mahasampark->fapp_number}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @if ($mahasampark->fapp_number > 0)
                                                                    <div class="row">
                                                                        @for ($i = 1; $i <= $mahasampark->fapp_number;
                                                                            $i++)
                                                                            <div class="col-md-6">
                                                                                <div class="form-group text-left">
                                                                                    <label
                                                                                        class="col-md-4 control-label">Name
                                                                                        : </label>
                                                                                    {{$mahasampark['fmname'.$i]}}
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group text-left">
                                                                                    <label
                                                                                        class="col-md-4 control-label">Relationship
                                                                                        With Head : </label>
                                                                                    {{$mahasampark['relationshipHOD'.$i]}}
                                                                                </div>
                                                                            </div>
                                                                            @endfor

                                                                    </div>
                                                                    @endif


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