@extends('layouts.admin_master')
@section('sitetitle', 'Add Banner')
@section('title', 'Add Banner')


@section('content')
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('banner.index') }}" class="btn btn-success">All Banner</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Banner</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action=" {{ route('banner.store') }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Choose Product Images <b style="color: red"> Note: Banner Size must be 1920x900 px</b> </label>
                                            <input type="file" name="bimg" id="upload_file" onchange="preview_image()"
                                                class="form-control" required>
                                            <div class="input-images"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" id="image_preview">

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
