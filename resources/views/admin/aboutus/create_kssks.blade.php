@extends('layouts.admin_master')
@section('sitetitle', 'Add KSSKS About Us')
@section('title', 'Add KSSKS About Us')


@section('content')
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('aboutusindex') }}" class="btn btn-success">All KSSKS About Us</a>
        <br><br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add KSSKS About Us</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action=" {{ route('aboutusstore') }} " method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Side Menu Name</label>
                                        <input type="text" class="form-control" name="menu_name">
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
                                            name="description"> {{ old('description') }} </textarea>
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