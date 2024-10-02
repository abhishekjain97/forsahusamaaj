@php
$ctname = $categoryName->name;

@endphp
@extends('layouts.admin_master')
@section('sitetitle', 'All Sub Category')
@section('title', 'All Sub Category of ' . $ctname)

@section('content')
    <section class="content">
        <div class="container-fluid">
            <a href="{{ url('admin/addsubcat/' . $categoryName->id) }}" class="btn btn-success">Add Sub Category of
                {{ $categoryName->name }} </a>
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
                                        <th>Sub Category</th>
                                        
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @if ($subCategories != null)
                                    @else
                                    @endif
                                    @foreach ($subCategories as $subCategory)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $subCategory->name }}</td>
                                            <td>
                                                @if ($subCategory->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('category.destroy', $subCategory->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-lg{{ $subCategory->id }}" href="#">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>
                                                </form>

                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-lg{{ $subCategory->id }}">
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
                                                                    action=" {{ route('category.update', $subCategory->id) }} "
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Category Name</label>
                                                                                <input type="text" name="category_name"
                                                                                    class="form-control"
                                                                                    value="{{ $subCategory->name }}"
                                                                                    required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Status</label>
                                                                                <select name="status" class="form-control">
                                                                                    <option value="1">Active</option>
                                                                                    <option value="0">Inactive</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
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
