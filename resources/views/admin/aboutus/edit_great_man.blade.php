@extends('layouts.admin_master')
@section('sitetitle', 'Edit Great Man')
@section('title', 'Edit Great Man')


@section('content')
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('greatmanindex') }}" class="btn btn-success">All Great Man</a>
        <br><br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Great Man</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action=" {{ route('greatmanupdate',$aboutUs->id) }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Side Menu Name</label>
                                        <input type="text" value="{{$aboutUs->menu_name}}"  class="form-control" name="menu_name">
                                    </div>
                                </div>
                            </div>

                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Description
                                            <!-- <span class="err_color">*</span> -->
                                        </label>
                                        <textarea class="form-control" placeholder="Description" id="description"
                                            name="description"> {{$aboutUs->description}} </textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
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