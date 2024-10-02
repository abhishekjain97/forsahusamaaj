@extends('layouts.admin_master')
@section('sitetitle', 'All Category')
@section('title', 'All Category')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('helpdeskcategory.create') }}" class="btn btn-success">Add Category</a>
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
                                        <th>Main Category</th>
                                        <th>Sub Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @if ($categories != null)
                                    @else
                                    @endif
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $category->name }}</td>
                                            <td>

                                                @foreach ($category->childrenCategories as $subcategory)

                                                    <li>{{ $subcategory->name }}</li>

                                                @endforeach
                                                <a href="{{ url('admin/helpdesksubcategory/' . $category->id) }}">Manage Sub
                                                    Category</a>
                                            </td>
                                            <td>
                                                @if ($category->status == 1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>
                                                <form action="{{ route('helpdeskcategory.destroy', $category->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info btn-sm" data-toggle="modal"
                                                        data-target="#modal-lg{{ $category->id }}" href="#">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>
                                                </form>



                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modal-lg{{ $category->id }}">
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
                                                                    action=" {{ route('helpdeskcategory.update', $category->id) }} "
                                                                    method="POST">
                                                                    @method('PUT')
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-sm-6">
                                                                            <div class="form-group">
                                                                                <label>Category Name</label>
                                                                                <input type="text" name="category_name"
                                                                                    class="form-control"
                                                                                    value="{{ $category->name }}" required>
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
