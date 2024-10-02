@extends('layouts.admin_master')
@section('sitetitle', 'Add Youtube Video')
@section('title', 'Add Youtube Video')


@section('content')
    <!-- /.content-header -->
    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('youtubevideo.index') }}" class="btn btn-success">All Videos</a>
            <br><br>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Videos</h3>
                        </div>

                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form" action=" {{ route('youtubevideo.store') }} " method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Video Name</label>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}" required>    
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Video Link</label>
                                            <input type="text" name="link" class="form-control" value="{{old('link')}}" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Video Id </label>
                                            <input type="text" name="videoid" value="{{old('videoid')}}" class="form-control" required>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Banner Sizes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <ol type="1">
                        <li><b>Banne1 Header Banner :- </b>728x90 pixels</li>
                        <li><b>Banne2 :- </b>970x120 pixels</li>
                        <li><b>Banne3 :- </b>320x270 pixels</li>
                        <li><b>Banne4 :- </b>728x90 pixels</li>
                        <li><b>Banne5 :- </b>320x270 pixels</li>
                        <li><b>Banne6 :- </b>728x90 pixels</li>
                        <li><b>Banne7 :- </b>970x120 pixels</li>
                        <li><b>Banne8 :- </b>728x90 pixels</li>
                        <li><b>Banne9 :- </b>320x270 pixels</li>
                        <li><b>Banne10 :- </b>728x90 pixels</li>
                        <li><b>Banne11 :- </b>728x90 pixels</li>
                        <li><b>Banne12 :- </b>970x120 pixels</li>
                      </ol>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

@endsection
