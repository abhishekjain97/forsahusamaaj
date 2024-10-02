@extends('layouts.admin_master')
@section('sitetitle', 'All Youtube News')
@section('title', 'All Youtube News')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('youtubenews.create') }}" class="btn btn-success">Add Youtube News</a>
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
                                        <th>Title</th>
                                        <th>Youtube Link</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($youtubeNews as $video)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $video->title }}</td>
                                            <td>
                                                <iframe width="400" height="150" src="https://www.youtube.com/embed/{{ $video->video_link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            
                                            </td>
                                            <td>
                                                <form action="{{ route('youtubenews.destroy', $video->id) }}" method="POST">
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
                                                        <h4 class="modal-title">Youtube News</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <form role="form"
                                                                    action=" {{ route('youtubenews.update', $video->id) }} "
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @method('POST')
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label>Title</label>
                                                                        <input type="text" name="title"
                                                                            class="form-control" value="{{ $video->title }}"
                                                                            required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Youtube Link</label>
                                                                        <input type="text" name="video_link"
                                                                            class="form-control" value="https://www.youtube.com/watch?v={{ $video->video_link }}"
                                                                            required>
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
