@extends('layouts.admin_master')
@section('sitetitle', 'Add Team')
@section('title', 'Add Team')


@section('content')
<!-- /.content-header -->
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('team.index') }}" class="btn btn-success">All Teams</a>
        <br><br>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add Team</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" action=" {{ route('team.store') }} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" id="imageName" name="image" />
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
								
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Team Category</label>
                                        <select class="form-control select2" name="team_category" style="width: 100%;"
                                            id="banner_no">
                                            <option value="" selected="selected" disabled>Select Team Category</option>
                                            @foreach ($teamCategories as $teamCategory)
                                            <option value="{{$teamCategory->id}}">{{$teamCategory->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Member Name</label>
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                            required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Designation</label>
                                        <input type="text" name="designation" value="{{old('designation')}}" class="form-control"
                                            required>
                                    </div>
                                </div>
								
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" name="location" value="{{old('location')}}" class="form-control"
                                            required>
                                    </div>
                                </div>
								
								
								
                            </div>

                            <div class="row">
							
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="description" value="{{old('description')}}" class="form-control"
                                            >
                                    </div>
                                </div>
								
								
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Member's Facebook Link</label>
                                        <input type="text" name="fb_link" value="{{old('fb_link')}}"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Photo Upload / फोटो अपलोड :</label> <span id='imageSuccess'
                                            style="color:green; font-weight:bold"> </span><a id="showPreview"
                                            onclick="loadImagePreview()" href="javascript:void(0)"
                                            class="btn btn-primary btn-xs1">Preview</a>
                                        <input type="file" class="form-control" name="insert_image" id="insert_image"
                                            accept="image/*">
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="image_preview">

                            </div>

                            <input type="checkbox" name="key_person" value="1"> Key Person
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

<div id="insertimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Crop & Insert Image</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div id="image_demo"></div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image">Crop Image <img id="loaderImg"
                        src="{{asset('frontend_assets/images/loader.gif')}}" /></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div id="imagePreviewModel" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Image Preview</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-center" id="imagePreview">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection