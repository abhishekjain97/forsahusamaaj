@extends('layouts.admin_master')
@section('title', 'Add Career Counselling')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('careercounselling.index') }}" class="btn btn-success">All Career Counselling</a>
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
                    <form method="POST" action="{{ route('careercounselling.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                               

                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Title</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="title">

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="date">

                                            </div>
                                        </div>

                                    </div>

                                </div>

								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Vanue</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="vanue">

                                            </div>
                                        </div>

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

                                    </div>

                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="displayImagesShow" id="displayImagesShow" style="margin-top: 5px;"
                                            accept="image/*"></div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="  control-label" for="description">Description</label>
                                        <textarea class="form-control" rows="6" id="description"
                                            name="description">Write Your Description</textarea>

                                    </div>
                                </div>

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