@extends('layouts.admin_master')
@section('sitetitle', 'All workshop Images')
@section('title', 'All workshop Images')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('workshop.create') }}" class="btn btn-success">Add workshop </a>
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
                                    <th>Ttile</th>
                                    <th>Date</th>
                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($workshops as $workshop)
                                <tr>
                                    <td> {{ $sr }} </td>

                                    <td><img src="{{ asset('uploads/workshop/' . $workshop->image) }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td>{{$workshop->title}}</td>
                                    <td> {{ date("d-M-Y", strtotime($workshop->date)) }} </td>
                                    {{-- <td>{{$workshop->address}}</td> --}}
                                    <td>
                                        <form action="{{ route('workshop.destroy', $workshop->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $workshop->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>
                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $workshop->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">workshop</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('workshop.update', $workshop->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf

                                                            <div class="form-group">
                                                                <label>Title</label>
                                                                <input type="text" name="title" class="form-control"
                                                                    value="{{ $workshop->title }}" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Date</label>
                                                                <input type="date" name="date" class="form-control"
                                                                    value="{{ $workshop->date }}" required>
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
                                                                    name="description">{{ $workshop->description }}</textarea>
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