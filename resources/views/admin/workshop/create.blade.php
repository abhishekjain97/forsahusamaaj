@extends('layouts.admin_master')
@section('title', 'Add workshop')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('workshop.index') }}" class="btn btn-success">All workshop</a>
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
                   
                    <form method="POST" action="{{ route('workshop.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">workshop name</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="workshop_name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">workshop venue</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="workshop_venue">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>workshop Type</label>
                                        <select class="form-control select2" id="workshop_type" name="workshop_type">
                                            <option value="" selected="selected" disabled>Select</option>
                                            <option value="free" @if (old('free')=='free' ) selected="selected" @endif>
                                                Free</option>
                                            <option value="paid" @if (old('paid')=='paid' ) selected="selected" @endif>
                                                Paid</option>
                                            
                                        </select>
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