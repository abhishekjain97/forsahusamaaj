@php
$catname = $category->name;
@endphp
@extends('layouts.admin_master')
@section('sitetitle', 'Add Category')
@section('title', 'Add Category Of '. $catname)


@section('content')
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{url('admin/helpdesksubcategory/'.$category->id)}}" class="btn btn-success">All Sub Category of
            {{$category->name}}</a>
        <br><br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Sub Category Of {{$category->name}}</h3>
                    </div>
                    <!-- form start -->
                    <form role="form" action=" {{ url('admin/helpdeskaddsubcat') }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="hidden" value="{{$category->id}}" name="catId">
                                        <input type="text" readonly value="{{$category->name}}" class="form-control"
                                            required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sub-Category Name</label>
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