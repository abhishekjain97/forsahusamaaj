@extends('layouts.admin_master')
@section('sitetitle', 'All Great Man')
@section('title', 'All Great Man')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('greatmancreate') }}" class="btn btn-success">Add Great Man</a>
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
                                    <th>Menu Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($aboutUs as $about)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $about->menu_name }}</td>
                                    <td><a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-lg{{ $about->id }}" href="#">
                                            <i class="fas fa-eye"></i>
                                        </a></td>
                                    {{-- <td>{{ $blog->created_at->format('d M Y') }}</td> --}}
                                    <td>
                                        <form action="{{ route('greatmandelete', $about->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{route('greatmanedit',$about->id)}}">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>

                                    </td>
                                </tr>

                                <div class="modal fade" id="modal-lg{{ $about->id }}">
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
                                                        {!! $about->description !!}
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