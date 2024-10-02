@extends('layouts.admin_master')
@section('title', 'Add jobportal')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('jobportal.index') }}" class="btn btn-success">All Job Portal</a>
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
                    <form method="POST" action="{{ route('jobportal.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">State</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select class="form-control" data-live-search="true" name="state_id" tabindex="-98">
                                                    <option value="">Select State</option>
                                                    @foreach($states as $state)
                                                        <option value="{{$state->id}}">{{ $state->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">City</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select class="form-control" data-live-search="true" name="city_id" tabindex="-98">
                                                    <option value="">Select City</option>
                                                    @foreach($cities as $city)
                                                        <option value="{{$city->id}}">{{ $city->city }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>
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
                                        <label for="exampleInputFile">Amount</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="amount">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Company Name</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="company_name">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Close Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="close_date">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Delivery Date</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="date" class="form-control" name="delivery_time">

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
                                        <label for="exampleInputFile">Skill</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="skill">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Requirements</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="requirements">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Email</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="email" class="form-control" name="email">

                                            </div>
                                        </div>

                                    </div>

                                </div>
								
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Phone</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="phone">

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