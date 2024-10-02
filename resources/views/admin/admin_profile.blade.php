@extends('layouts.admin_master')
@section('sitetitle', 'Profile')
@section('title', 'Profile')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Edit Informations</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" action="{{url('admin/profile')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Name<span class="err_color">*</span> &nbsp;
                                                <span class="err_color"></span> </label>
                                            <input type="text" class="form-control" name="name"
                                                value="{{ $userProfile->name }}" id="exampleInputEmail1"
                                                placeholder="Enter Name">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email<span class="err_color">*</span> &nbsp;
                                                <span class="err_color"></span></label>
                                            <input type="email" class="form-control" name="email"
                                                value="{{ $userProfile->email }}" id="exampleInputPassword1"
                                                placeholder="Enter Email" readonly="">
                                        </div>
                                    </div>

                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="exampleInputFile">Profile</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="profile" class="custom-file-input"
                                                        onchange="ImageChange(this)" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                            </div>
                                            @if ($userProfile->profile != null)
                                                <div class="displayImagesShow" id="displayImagesShow"
                                                    style="margin-top: 5px;" accept="image/*">
                                                    <div class="" style="margin-top: 5px; display: block;">
                                                        <div style="border: 2px solid #dedada;padding: 5px;width: 160px;">
                                                    <img src="{{asset('/admin_assets/dist/img/' . $userProfile->profile)}}" alt="your image" width="100%" height="100">
                                                           <p id="deleteFile" style="margin-top:0;margin-bottom:0;">
                                                             <span>
                                                               <span id="message" style="color:green;">
                                                                 Success                                    </span>
                                                               <i class="fa fa-check" aria-hidden="true" style="color:green;float:right;margin-top: 4px;"></i>
                                                             </span>
                                                           </p> 
                                                           <div id="myBar" style="background-color: green; width: 100%; height: 10px;"></div>
                                                         </div>
                                                       </div>
                                                       </div>

                                                @else
                                                        <div class="displayImagesShow" id="displayImagesShow" style="margin-top: 5px;"
                                                        accept="image/*">
                                                        <div class="" style="margin-top: 5px; display: block;">

                                                        </div>
                                                    </div>
                                                    @endif
                                                    
                                                    

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
