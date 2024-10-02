@extends('layouts.admin_master')
@section('sitetitle', 'All Banner')
@section('title', 'All Banner')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('youtubevideo.create') }}" class="btn btn-success">Add Videos</a>
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
                                        <th>Video Image</th>
                                        <th>Video Name</th>
                                        <th>Video Link</th>
                                        <th style="width: 120px" >Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($videos as $video)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td><img src="{{$video->video_img}}" alt="" height="100px" width="100px"></td>
                                            <td>{{ $video->name }}</td>
                                            <td> <a href="{{ $video->link }}" target="_blank">Open Video</a> </td>
                                            <td>
                                                <form action="{{ route('youtubevideo.destroy', $video->id) }}" method="POST">
                                                    <a class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-lg{{ $video->id }}" href="#">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>

                                                </form>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-lg{{ $video->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Banner</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form role="form"
                                                                    action=" {{ route('banner.update', $video->id) }} "
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Banner Name</label>
                                                                        <input type="text" name="bname"
                                                                            class="form-control" value="{{ $video->name }}"
                                                                            required>
                                                                    </div>

                                                                    <div classVideo"form-group">
                                                                        <Video Idr Link</label>
                                                                        <input type="text" name="blink"
                                                                            class="form-control" value="{{ $video->link }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Banner Image</label>
                                                                        <input type="file" name="bimg"
                                                                            class="form-control">

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
