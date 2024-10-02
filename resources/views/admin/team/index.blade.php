@extends('layouts.admin_master')
@section('sitetitle', 'All Team Members')
@section('title', 'All Team Members')

@section('content')

<section class="content">
        <div class="container-fluid">
            <a href="{{ route('team.create') }}" class="btn btn-success">Add Team Member</a>
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
                                        <th>Member's Image</th>
                                        <th>Member's Category</th>
										<th>Member's Designation</th>
                                        <th>Member's Name</th>
                                        <th>Member's Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($teams as $team)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td> @if (!isset($team->image))
                                                <img src="{{ asset('uploads/team/noimage.webp') }}" alt="" height="100px" width="100px">
                                                @else
                                                <img src="{{ asset('uploads/team/' . $team->image) }}" alt=""
                                                    height="100px" width="100px">
                                            @endif </td>
                                            @foreach ($team->subCat as $subcat)
                                                <td>{{ $subcat->name }}</td>
                                            @endforeach
                                            <td>{{ $team->designation }} </td>
											<td>{{ $team->name }}</td>
                                            <td>{{ $team->location }} </td>
                                            <td>
                                                <form action="{{ route('team.destroy', $team->id) }}" method="POST">
                                                    <a class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-lg{{ $team->id }}" href="#">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>

                                                </form>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-lg{{ $team->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Team Member</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('team.update', $team->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
															
															<div class="form-group">
                                                                <label>State</label>
                                                                <select class="form-control" data-live-search="true" name="state_id" tabindex="-98" required>
                                                                    <option value="">Select State</option>
                                                                    @foreach($states as $state)
                                                                        <option value="{{$state->id}}" <?php if($state->id == $team->state_id) { echo 'selected'; } ?>>{{ $state->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <select class="form-control" data-live-search="true" name="city_id" tabindex="-98" required>
                                                                    <option value="">Select City</option>
                                                                    @foreach($cities as $city)
                                                                        <option value="{{$city->id}}" <?php if($city->id == $team->city_id) { echo 'selected'; } ?>>{{ $city->city }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
															
															
                                                            <div class="form-group">
                                                                <select class="form-control select2"
                                                                    name="team_category" style="width: 100%;"
                                                                    id="banner_no">
                                                                    <option value="" selected="selected" disabled>
                                                                        Select Team Category</option>
                                                                    @foreach ($teamCategories as $teamCategory)
                                                                        <option value="{{ $teamCategory->id }}" 
                                                                            @if ($teamCategory->id == $team->category_id)
                                                                            {{'selected'}}  @endif >
                                                                            {{ $teamCategory->name }}
                                                                        </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Member's Name</label>
                                                                <input type="text" name="name" class="form-control"
                                                                    value="{{ $team->name }}" required>
                                                            </div>
															
															
															<div class="form-group">
                                                                <label>Designation</label>
                                                                <input type="text" name="designation" class="form-control"
                                                                    value="{{ $team->designation }}" required>
                                                            </div>
															
															<div class="form-group">
                                                                <label>Location</label>
                                                                <input type="text" name="location" class="form-control"
                                                                    value="{{ $team->location }}" required>
                                                            </div>
															<div class="form-group">
                                                                <label>Description</label>
                                                                <input type="text" name="description" class="form-control"
                                                                    value="{{ $team->description }}" required>
                                                            </div>
															

                                                            <div class="form-group">
                                                                <label>Facebook Link</label>
                                                                <input type="text" name="fb_link" class="form-control"
                                                                    value="{{ $team->fb_link }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Member's' Image <span style="color:red">Note: Leave Blank If you not update image </span> </label>
                                                                <input type="file" name="image" class="form-control">

                                                            </div>
                                                            <input type="checkbox" 
                                                            name="key_person" value="1" 
                                                            @if ($team->key_person == '1') {{'checked'}} @endif > Key Person
                                                            <br><br>
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
