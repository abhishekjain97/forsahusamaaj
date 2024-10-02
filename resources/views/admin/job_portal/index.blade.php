@extends('layouts.admin_master')
@section('sitetitle', 'All jobportal Images')
@section('title', 'All jobportal Images')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('jobportal.create') }}" class="btn btn-success">Add Job Portal</a>
        <br><br>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Image</th>
                                    <th>Title</th>
									<th>Amount</th>
									<th>Skill</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($mahotsavs as $mahotsav)
                                <tr>
                                    <td> {{ $sr }} </td>

                                    <td><img src="{{ asset('uploads/job_portal/' . $mahotsav->image) }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td>{{$mahotsav->title}}</td>
									<td>{{$mahotsav->amount}}</td>
									<td>{{$mahotsav->skill}}</td>
                                    <td> {{ date("d-M-Y", strtotime($mahotsav->date)) }} </td>
									<td>{{$mahotsav->status}}</td>
                                    {{-- <td>{{$mahotsav->address}}</td> --}}
                                    <td>
                                        <form action="{{ route('jobportal.destroy', $mahotsav->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $mahotsav->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>
                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $mahotsav->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Job Portal </h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('jobportal.update', $mahotsav->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf

                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <select class="form-control" data-live-search="true" name="state_id" tabindex="-98" required>
                                                                    <option value="">Select State</option>
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->id}}" <?php if($state->id == $mahotsav->state_id) { echo 'selected'; } ?>>{{ $state->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <select class="form-control" data-live-search="true" name="city_id" tabindex="-98" required>
                                                                    <option value="">Select City</option>
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}" <?php if($city->id == $mahotsav->city_id) { echo 'selected'; } ?>>{{ $city->city }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $mahotsav->title }}" required>
                                                            </div>
															
															<div class="form-group">
                                                                <label>Amount</label>
                                                                <input type="text" name="amount" class="form-control"
                                                                    value="{{ $mahotsav->amount }}" required>
                                                            </div>
															
															<div class="form-group">
                                                                <label>Company Name</label>
                                                                <input type="text" name="company_name" class="form-control"
                                                                    value="{{ $mahotsav->company_name }}" required>
                                                            </div>
															<div class="form-group">
                                                                <label>Close Date</label>
                                                                <input type="date" name="close_date" class="form-control"
                                                                    value="{{ $mahotsav->close_date }}" required>
                                                            </div>
															
															<div class="form-group">
                                                                <label>Delivery Time</label>
                                                                <input type="date" name="delivery_time" class="form-control"
                                                                    value="{{ $mahotsav->delivery_time }}" required>
                                                            </div>
															

                                                            <div class="form-group">
                                                                <label>Post Date</label>
                                                                <input type="date" name="date" class="form-control"
                                                                    value="{{ $mahotsav->date }}" required>
                                                            </div>
															
															<div class="form-group">
                                                                <label>Skill</label>
                                                                <input type="text" name="skill" class="form-control"
                                                                    value="{{ $mahotsav->skill }}" required>
                                                            </div>
															<div class="form-group">
                                                                <label>Requirements</label>
                                                                <input type="text" name="requirements" class="form-control"
                                                                    value="{{ $mahotsav->requirements }}" required>
                                                            </div>
															<div class="form-group">
                                                                <label>Email</label>
                                                                <input type="text" name="email" class="form-control"
                                                                    value="{{ $mahotsav->email }}" required>
                                                            </div>
															<div class="form-group">
                                                                <label>Phone</label>
                                                                <input type="text" name="phone" class="form-control"
                                                                    value="{{ $mahotsav->phone }}" required>
                                                            </div>
															
															

                                                           <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control" data-live-search="true" name="status" tabindex="-98" required>
                                                                    <option value="">Select Status</option>
                                                                    
                                                                        <option value="1" <?php if($mahotsav->status== 1) { echo 'selected'; } ?>>Enable</option>
																		<option value="0" <?php if($mahotsav->status == 0) { echo 'selected'; } ?>>Disable</option>
                                                                    
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Image <span style="color:red">Note:
                                                                        Leave Blank If you not update image </span>
                                                                </label>
                                                                <input type="file" name="image" class="form-control">
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="control-label" for="description">Description</label>
                                                                <textarea class="form-control" rows="6" id="description"
                                                                    name="description">{{ $mahotsav->description }}</textarea>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-primary">Update</button>
                                                        </form>
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