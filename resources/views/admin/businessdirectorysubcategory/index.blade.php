@extends('layouts.admin_master')
@section('sitetitle', 'All Business Sub Category')
@section('title', 'All Business Sub Category')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('businessdirectorysubcategory.create') }}" class="btn btn-success">Add Business Sub Category</a>
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
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($businessDirSubCategories as $businessDirSubCategory)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $businessDirSubCategory->category->category_name }}</td>
                                    <td>{{ $businessDirSubCategory->sub_category_name }}</td>
                                    <td>
                                        <form action="{{ route('businessdirectorysubcategory.destroy', $businessDirSubCategory->id) }}"
                                            method="POST">
                                            <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $businessDirSubCategory->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>

                                        </form>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $businessDirSubCategory->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Sub Category</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form"
                                                            action=" {{ route('businessdirectorysubcategory.update', $businessDirSubCategory->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('PUT')
                                                            @csrf
                                                            <div class="form-group">
                                                                <label>Select Category</label>
                                                                    <select name="category_id" class="form-control" required>
                                                                        <option value="">Select category</option>
                                                                        @foreach ($businessDirCategories as $businessDirCategory)
                                                                            <option value="{{$businessDirCategory->id}}" <?php if($businessDirCategory->id == $businessDirSubCategory->category_id){ echo 'selected'; } ?>>{{$businessDirCategory->category_name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sub Category Name</label>
                                                                <input type="text" name="sub_category_name" class="form-control"
                                                                    value="{{ $businessDirSubCategory->sub_category_name }}" required>
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
                                            