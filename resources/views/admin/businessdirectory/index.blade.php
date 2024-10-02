@extends('layouts.admin_master')
@section('sitetitle', 'All Business Category')
@section('title', 'All Business Category')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('businessdirectory.create') }}" class="btn btn-success">Add Business Category</a>
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
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($businessDirCategories as $businessDirCategory)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $businessDirCategory->category_name }}</td>
                                    <td>
                                        <form action="{{ route('businessdirectory.destroy', $businessDirCategory->id) }}"
                                            method="POST">
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $businessDirCategory->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $businessDirCategory->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Category</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('businessdirectory.update', $businessDirCategory->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Category Name</label>
                                                                <input type="text" name="category_name" class="form-control"
                                                                    value="{{ $businessDirCategory->category_name }}" required>
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
                                            