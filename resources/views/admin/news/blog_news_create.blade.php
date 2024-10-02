@extends('layouts.admin_master')
@section('title', 'Add Blog News')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('blog.index') }}" class="btn btn-success">All Blog News</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{ route('blog.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" name="title"
                                                value="{{ old('title') }}" placeholder="Enter Title">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Photo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="image"
                                                        onchange="ImageChange(this,'1')">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            <div class="displayImagesShow" id="displayImagesShow" style="margin-top: 5px;"
                                                accept="image/*"></div>
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

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>Status</label>
                                            <br>
                                            Active <input type="radio" name="status" value="1" >
                                            Inactive <input type="radio" name="status" checked value="0" >
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
