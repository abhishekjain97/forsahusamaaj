@extends('layouts.admin_master')
@section('sitetitle', 'Change Password')
@section('title', 'Change Password')
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informations</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->

                        <form method="POST" action="{{ url('admin/change_password') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Old Password<span class="err_color">*</span>
                                                &nbsp; <span class="err_color"></span> </label>
                                            <div class="input-group">
                                                <input type="password" class="form-control box_pass" name="current-password"
                                                    value="" id="exampleInputPassword1" placeholder="Old-Password">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="eyeicon fa fa-eye"
                                                            data-item="fa-eye"
                                                            onclick="showeye(this,'current-password')"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">New Password<span class="err_color">*</span>
                                                &nbsp; <span class="err_color"></span></label>

                                            <div class="input-group">
                                                <input type="password" class="form-control box_pass" name="password"
                                                    value="" id="exampleInputPassword1" placeholder="New-Password">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="eyeicon fa fa-eye"
                                                            data-item="fa-eye"
                                                            onclick="showeye(this,'password')"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Confirm Password<span
                                                    class="err_color">*</span> &nbsp; <span
                                                    class="err_color"></span></label>

                                            <div class="input-group">
                                                <input type="password" class="form-control box_pass"
                                                    name="password_confirmation" value="" id="exampleInputPassword1"
                                                    placeholder="Confirm-Password">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"><i class="eyeicon fa fa-eye"
                                                            data-item="fa-eye"
                                                            onclick="showeye(this,'password_confirmation')"></i></span>
                                                </div>
                                            </div>
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
