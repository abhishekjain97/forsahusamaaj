@extends('layouts.admin_master')
@section('title', 'Add Gallery')


@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('addimageindex') }}" class="btn btn-success">All Images</a>
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
                    <form method="POST" action="{{ route('addimage') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Choose Gallery</label>
                                        <div class="input-group">
                                            <select name="gallery_category" id="" class="form-control select2">
                                                <option value="" disabled selected>Choose Gallery</option>
                                                @foreach ($galleries as $gallery)
                                                    <option value="{{$gallery->id}}">{{ $gallery->title}}</option>
                                                @endforeach

                                            </select>
                                            
                                        </div>

                                    </div>

                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="exampleInputFile">Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="form-control" name="image[]" multiple>
                                                
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