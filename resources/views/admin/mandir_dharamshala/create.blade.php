@extends('layouts.admin_master')
@section('title', 'Add Mandir Dharamshala')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('mandirdharamshala.index') }}" class="btn btn-success">All Mandir Dharamshala</a>
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
                    <form method="POST" action="{{ route('mandirdharamshala.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">State</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select class="form-control" data-live-search="true" name="state_id"
                                                    tabindex="-98">
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
                                                <select class="form-control" data-live-search="true" name="city_id"
                                                    tabindex="-98">
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
                                        <label for="exampleInputFile">Tagline</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="tagline">

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Location</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="location">

                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Type</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <select name="sanghanthantype" class="form-control">
                                                    <option value="">Select Type</option>
                                                    <option value="Dharmshala">Dharmshala</option>
                                                    <option value="Mandir">Mandir</option>
                                                    <option value="Both">Both</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Contact Person Name</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="contact_person_name">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Moblie No</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="tel" id="phone" name="mobile_no" class="form-control"
                                                    placeholder="+910123456789" pattern="[+0-9]{10,13}">
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
                                        <label for="exampleInputFile">Website</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="text" class="form-control" name="website">

                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <!-- <input type="file" class="custom-file-input" name="image"
                                                                onchange="ImageChange(this)" 
                                                                multiple> -->
                                                <input type="file" class="custom-file-input" name="image[]" multiple>
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <div class="displayImagesShow" id="displayImagesShow" style="margin-top: 5px;"
                                            accept="image/*"></div>
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