@extends('layouts.admin_master')
@section('sitetitle', 'Add YouTube News')
@section('title', 'Add YouTube News')


@section('content')
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('youtubenews.index') }}" class="btn btn-success">All YouTube News</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add YouTube News</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action=" {{ route('youtubenews.store') }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input type="text" name="title" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Video Link</label>
                                            <input type="text" name="video_link" class="form-control" required>
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
