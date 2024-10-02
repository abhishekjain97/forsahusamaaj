@extends('layouts.admin_master')
@section('title', 'Add Print Media News')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('printmedia.index') }}" class="btn btn-success">All Print Media News</a>
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
                        <form method="POST" action="{{ route('printmedia.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
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
