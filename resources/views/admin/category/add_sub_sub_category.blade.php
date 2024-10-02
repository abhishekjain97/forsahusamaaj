@php
    $catname = $subCategory->name;
    
@endphp
@extends('layouts.admin_master')
@section('sitetitle', 'Add Sub-Sub Category')
@section('title', 'Add Sub-Sub Category Of '. $catname)


@section('content')
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{url('admin/sub-sub-category/'.$subCategory->id)}}" class="btn btn-success">All Sub-Sub Category of {{$subCategory->name}}</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Sub-Sub Category Of {{$subCategory->name}}</h3>
                        </div>
                        <!-- form start -->
                        <form role="form" action=" {{ url('admin/add-sub-sub-cat') }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub Category Name</label>
                                            <input type="hidden" value="{{$subCategory->id}}" name="subcatId">
                                            <input type="text" readonly value="{{$subCategory->name}}" class="form-control"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Sub-Sub Category Name</label>
                                            <input type="text" name="sub_sub_category_name" class="form-control" required>
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
