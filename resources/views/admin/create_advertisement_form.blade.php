@extends('layouts.admin_master')
@section('title', 'Add Advertisement')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('advertisingindex') }}" class="btn btn-success">All Advertisement</a>
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
                    <form method="POST" action="{{ route('advertisingstore') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="image">
                                                
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