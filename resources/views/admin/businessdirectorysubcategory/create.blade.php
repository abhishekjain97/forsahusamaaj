@extends('layouts.admin_master')
@section('sitetitle', 'Add Business Sub Category')
@section('title', 'Add Business Sub Category')


@section('content')
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('businessdirectorysubcategory.index') }}" class="btn btn-success">All Business Sub Category</a>
        <br><br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Sub Category</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action=" {{ route('businessdirectorysubcategory.store') }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Select Category</label>
                                        <select name="category_id" class="form-control" required>
                                            <option value="">Select category</option>
                                            @foreach ($businessDirCategories as $businessDirCategory)
                                                <option value="{{$businessDirCategory->id}}">{{$businessDirCategory->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub Category Name</label>
                                        <input type="text" name="sub_category_name" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endsection