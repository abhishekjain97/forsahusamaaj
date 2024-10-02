@extends('layouts.admin_master')
@section('title', 'Edit Event')


@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('event.index') }}" class="btn btn-success">All Event</a>
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
                        <form method="POST" action="{{ route('event.update',$event->id) }}" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <label>Event Name* <span class="err_color"></span></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name" value="{{ $event->name }}"
                                                placeholder="Enter Event Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <label>Event Address* <span class="err_color"></span></label>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="address"
                                                value="{{ $event->address }}" placeholder="Enter Event Name">
                                        </div>
                                    </div>
									
									<div class="col-sm-4">
                                        <label>From Date* <span class="err_color"></span></label>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="from_date"
                                                value="{{ $event->from_date }}" >
                                        </div>
                                    </div>
									
									<div class="col-sm-4">
                                        <label>To Date* <span class="err_color"></span></label>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="to_date"
                                                value="{{ $event->to_date }}" >
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Photo => <span style="color:red">Leave Blank if you don't update image</span> </label>
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
                                                name="description"> {{ $event->description }} </textarea>
                                        </div>
                                    </div>
                                </div>
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
