@extends('layouts.master')

@section('content')

<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>Marathon Registration</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.page header -->
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="active">Marathon Registration</h1>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            @if (session('error'))
            <div class="alert alert-danger alert-dismissible" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                {{ session('error') }}
            </div>

            @endif

            @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible alert-block" id="success-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <ul>
                    <li> {{ session()->get('success') }}</li>
                </ul>
            </div>
            @endif
            <div class="col-md-12">
                <div class="well-box">
                    <form action="{{route('marathonstore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row well-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Participant Name<span class="required">*</span></label>
                                    <input name="name" type="text" placeholder="Enter Name"
                                        class="form-control input-md">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Father Name<span class="required">*</span></label>
                                    <input name="fatherName" type="text" placeholder="Enter Father Name"
                                        class="form-control input-md">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Address<span class="required">*</span></label>
                                    <textarea name="address" class="form-control"></textarea>
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile No<span class="required">*</span></label>
                                    <input name="mobile" type="text" placeholder="Enter Father Name"
                                        class="form-control input-md">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Date Of Birth<span class="required">*</span></label>
                                    <input name="dob" type="date" class="form-control input-md">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Aadhar No<span class="required">*</span></label>
                                    <input name="aadhar_no" type="number" min="1" class="form-control input-md">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    {{-- <input type="hidden" value="" id="imageName" name="photoUpload" /> --}}
                                    <label class="control-label">Signature Upload<span class="required">*</span></label>
                                    <input type="file" class="form-control" name="signature" accept="image/*">
                                </div>

                                <div class="col-md-6">
                                    {{-- <input type="hidden" value="" id="imageName" name="photoUpload" /> --}}
                                    <label class="control-label">Photo Upload<span class="required">*</span></label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">State<span class="required">*</span></label>
                                    <input name="state" type="text" class="form-control input-md">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">District<span class="required">*</span></label>
                                    <input name="district" type="text" class="form-control input-md">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6" style="margin-bottom:13px">
                                    <label class="control-label">Gender<span class="required">*</span></label>
                                    <div style="margin-top:10px">
                                        <input type="radio" name="gender" value="male" checked=""> Male
                                        <input type="radio" name="gender" value="female"> Female
                                    </div>
                                </div>

                                <div class="col-md-6" style="margin-bottom:13px">
                                    <label class="control-label">Gender<span class="required">*</span></label>
                                    <div style="margin-top:10px">
                                        <input type="checkbox" name="agree" required> <b>I hereby agree that tha organizer shall not be liable for any accident, Injury Death lose or damaged a consequence of my participation in the 12.500 K.M. Marathon race. I also hereby declare that I am medically fit to tackle the course.</b>
                                        
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-12 mt10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection