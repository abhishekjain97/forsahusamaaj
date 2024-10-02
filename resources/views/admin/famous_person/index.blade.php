@extends('layouts.admin_master')
@section('sitetitle', 'All Famous Person Images')
@section('title', 'All Famous Person Images')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('famouspersonlist.create') }}" class="btn btn-success">Add Famous Person </a>
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
                                    <th>Name</th>
                                    <th>Dob</th>
                                    <th>Death Date</th>
                                    <th>State/City</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($mahotsavs as $mahotsav)
                                <tr>
                                    <td> {{ $sr }} </td>

                                    <td><img src="{{ asset('uploads/famous_person/' . $mahotsav->image) }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td>{{$mahotsav->name}}</td>
                                    <td> {{ date("d-M-Y", strtotime($mahotsav->dob)) }} </td>
                                    <td class="text-danger"> {{ date("d-M-Y", strtotime($mahotsav->death_date)) }} </td>
                                    <td>{{$mahotsav->state[0]->name}} / {{$mahotsav->city[0]->city}}</td>
                                    <td>
                                        <form action="{{ route('famouspersonlist.destroy', $mahotsav->id) }}" method="POST">
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
                                                <h4 class="modal-title">Famous Person</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
											
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('famouspersonlist.update', $mahotsav->id) }} "
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
                                                                <label>Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $mahotsav->name }}" required>
                                                            </div>
															
															
                                                            <div class="form-group">
                                                                <label>Tagline</label>
                                                                <input type="text" name="tagline" class="form-control"
                                                                    value="{{ $mahotsav->tagline }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>DOB</label>
                                                                <input type="date" name="dob" class="form-control"
                                                                    value="{{ $mahotsav->dob }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Death Date</label>
                                                                <input type="date" name="death_date" class="form-control"
                                                                    value="{{ $mahotsav->death_date }}" required>
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