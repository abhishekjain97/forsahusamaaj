@extends('layouts.admin_master')
@section('sitetitle', 'All Blog News')
@section('title', 'All Blog News')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('blog.create') }}" class="btn btn-success">Add Blog News</a>
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
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($blogNews as $blog)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td><img src="{{ asset('uploads/news/'.$blog->image) }}" alt="" height="100px" width="100px"></td>
                                            <td>{{ $blog->title }}</td>
                                            <td><a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $blog->id }}" href="#">
                                                <i class="fas fa-eye"></i>
                                            </a></td>
                                            {{-- <td>{{ $blog->created_at->format('d M Y') }}</td> --}}
                                            <td> @if ($blog->status == 1)
                                                {{'Active'}}
                                                @else
                                                {{'Inactive'}}
                                            @endif </td>
                                            <td>
                                                <form action="{{ route('blog.destroy', $blog->id) }}" method="POST">
                                                    <a class="btn btn-info btn-sm" href="{{route('blog.edit',$blog->id)}}">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>

                                                </form>

                                            </td>
                                        </tr>
                                        
                                        <div class="modal fade" id="modal-lg{{ $blog->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Description</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $blog->description !!}
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
