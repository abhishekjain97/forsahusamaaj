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
                                    <th>Chest No</th>
                                    <th>Name</th>
                                    <th>Father's Name</th>
                                    <th>Mobile</th>
                                    <th style="width: 180px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($veeranganas as $veerangana)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $veerangana->chest_no}}</td>
                                    <td>{{ $veerangana->name}}</td>
                                    <td>{{ $veerangana->fatherName }}</td>
                                    <td>{{ $veerangana->mobile }}</td>

                                    <td>
                                        <form action="{{ route('deleterunforveerangana', $veerangana->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $veerangana->id }}" href="#"> <i
                                                    class="fas fa-eye"></i> Full Detail
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>



                                    </td>
                                </tr>
                                <div class="modal fade in" id="modal-lg{{ $veerangana->id }}" role="dialog">
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
                                                                    <h2> {{$veerangana->name}}</h2>
                                                                    <div class="form-group">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label>User's Image</label>
                                                                                <div class="team-pic">
                                                                                    <a href="javascript:void(0)"><img
                                                                                            src="{{asset('uploads/run_for_veerangana/'.$veerangana->image)}}"
                                                                                            class="img-responsive"
                                                                                            alt=""></a>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>User's Signature</label>
                                                                                <div class="team-pic">
                                                                                    <a href="javascript:void(0)"><img
                                                                                            src="{{asset('uploads/run_for_veerangana/'.$veerangana->signature)}}"
                                                                                            class="img-responsive"
                                                                                            alt=""></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <h2 class="form-title">Personal Information</h2>
                                                                    <hr>
                                                                    <h3 class="text-center">Chest No -
                                                                        <b>{{$veerangana->chest_no}}</b> </h3>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Name
                                                                                    :</label>
                                                                                {{$veerangana->name}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Father's
                                                                                    Name :</label>
                                                                                {{$veerangana->fatherName}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Address
                                                                                    :</label>
                                                                                {{$veerangana->address}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Mobile
                                                                                    :</label>
                                                                                {{$veerangana->mobile}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">Aadhar
                                                                                    No
                                                                                    :</label>
                                                                                {{$veerangana->aadhar_no}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">Gender
                                                                                    :</label>
                                                                                {{$veerangana->gender}}
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left ">
                                                                                <label
                                                                                    class="col-md-6 control-label">District
                                                                                    :</label>
                                                                                {{$veerangana->district}}
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group text-left">
                                                                                <label
                                                                                    class="col-md-6 control-label">State
                                                                                    :</label>
                                                                                {{$veerangana->state}}
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