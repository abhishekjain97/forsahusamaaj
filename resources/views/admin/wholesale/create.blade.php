@extends('layouts.admin_master')
@section('title', 'Add Whole Sale Product')


@section('content')



    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('wholesaleproduct.index') }}" class="btn btn-success">All Product</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Product</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action=" {{ route('wholesaleproduct.store') }} " method="POST"
                            enctype="multipart/form-data">

                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input type="text" name="pname" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Fabric </label>
                                            <input type="text" name="pfabric" class="form-control" required>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product \pc Price </label>
                                            <input type="text" name="pprice" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea name="pdesc" id="editor" cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Choose Product Images</label>
                                            <input type="file" name="pimg[]" id="upload_file" onchange="preview_image()"
                                                multiple class="form-control" required>
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
