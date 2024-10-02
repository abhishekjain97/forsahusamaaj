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
                    <form action="{{route('coachingclassesstore')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row well-box">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Full Name Of Candidate <span
                                            class="required">*</span></label>
                                    <input name="name" type="text" value="{{old('name')}}" class="form-control input-md">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Full Name Of Father/Husband<span
                                            class="required">*</span></label>
                                    <input name="father_name" type="text" class="form-control input-md" value="{{old('father_name')}}">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Full Name Of Mother's <span
                                            class="required">*</span></label>
                                    <input name="mother_name" type="text" class="form-control input-md" value="{{old('mother_name')}}">
                                </div>


                                <div class="col-md-6" style="margin-bottom:13px">
                                    <label class="control-label">Gender<span class="required">*</span></label>
                                    <div style="margin-top:10px">
                                        <input type="radio" name="gender" value="male"> Male
                                        <input type="radio" name="gender" value="female"> Female
                                    </div>
                                </div>


                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Addres<span class="required">*</span></label>
                                    <textarea name="contact_address" id="contact_address"
                                        class="form-control">{{old('contact_address')}}</textarea>
                                </div>

                                <div class="col-md-6">

                                    <label class="control-label">Permanand Address<span
                                            class="required">*</span></label>
                                    &nbsp;
                                    <input type="checkbox" id="chk">
                                    <label style="color:red">Same As Address </label>
                                    <textarea name="permanant_address" id="permanant_address"
                                        class="form-control">{{old('permanant_address')}}</textarea>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Date Of Birth <span class="required">*</span></label>
                                    <input name="dob" type="date" value="{{old('dob')}}" class="form-control input-md">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Mobile No<span class="required">*</span></label>
                                    <input name="mobile" type="number" min="1" value="{{old('mobile')}}" class="form-control input-md">
                                </div>
                            </div>
                            <br>

                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th scope="col">Exam Name</th>
                                        <th scope="col">Year</th>
                                        <th scope="col">Organisation</th>
                                        <th scope="col">Position</th>
                                        <th scope="col">Marks</th>
                                        <th scope="col">Obtain Marks</th> 
                                        <th scope="col">Percentage</th> 
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <th>High School</th>
                                        <td> <input type="text" class="form-control" name="high_school_year" value="{{old('high_school_year')}}" > </td>
                                        <td> <input type="text" class="form-control" name="high_school_organisation" value="{{old('high_school_organisation')}}" > </td>
                                        <td> <input type="text" class="form-control" name="high_school_position" value="{{old('high_school_position')}}" > </td>
                                        <td> <input type="text" class="form-control" name="high_school_marks" value="{{old('high_school_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="high_school_obtain_marks" value="{{old('high_school_obtain_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="high_school_percentage" value="{{old('high_school_percentage')}}" > </td>
                                      </tr>
                                      <tr>
                                        <th>Intermediate</th>
                                        <td> <input type="text" class="form-control" name="intermediate_year" value="{{old('intermediate_year')}}" > </td>
                                        <td> <input type="text" class="form-control" name="intermediate_organisation" value="{{old('intermediate_organisation')}}" > </td>
                                        <td> <input type="text" class="form-control" name="intermediate_position" value="{{old('intermediate_position')}}" > </td>
                                        <td> <input type="text" class="form-control" name="intermediate_marks" value="{{old('intermediate_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="intermediate_obtain_marks" value="{{old('intermediate_obtain_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="intermediate_percentage" value="{{old('intermediate_percentage')}}" > </td>
                                      </tr>
                                      <tr>
                                        <th>Graduation</th>
                                        <td> <input type="text" class="form-control" name="graduation_year" value="{{old('graduation_year')}}" > </td>
                                        <td> <input type="text" class="form-control" name="graduation_organisation" value="{{old('graduation_organisation')}}" > </td>
                                        <td> <input type="text" class="form-control" name="graduation_position" value="{{old('graduation_position')}}" > </td>
                                        <td> <input type="text" class="form-control" name="graduation_marks" value="{{old('graduation_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="graduation_obtain_marks" value="{{old('graduation_obtain_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="graduation_percentage" value="{{old('graduation_percentage')}}" > </td>
                                      </tr>
                                      <tr>
                                        <th>Post Graduation</th>
                                        <td> <input type="text" class="form-control" name="post_graduation_year" value="{{old('post_graduation_year')}}" > </td>
                                        <td> <input type="text" class="form-control" name="post_graduation_organisation" value="{{old('post_graduation_organisation')}}" > </td>
                                        <td> <input type="text" class="form-control" name="post_graduation_position" value="{{old('post_graduation_position')}}" > </td>
                                        <td> <input type="text" class="form-control" name="post_graduation_marks" value="{{old('post_graduation_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="post_graduation_obtain_marks" value="{{old('post_graduation_obtain_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="post_graduation_percentage" value="{{old('post_graduation_percentage')}}" > </td>
                                      </tr>

                                      <tr>
                                        <th>Diploma</th>
                                        <td> <input type="text" class="form-control" name="diploma_year" value="{{old('diploma_year')}}" > </td>
                                        <td> <input type="text" class="form-control" name="diploma_organisation" value="{{old('diploma_organisation')}}" > </td>
                                        <td> <input type="text" class="form-control" name="diploma_position" value="{{old('diploma_position')}}" > </td>
                                        <td> <input type="text" class="form-control" name="diploma_marks" value="{{old('diploma_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="diploma_obtain_marks" value="{{old('diploma_obtain_marks')}}" > </td>
                                        <td> <input type="text" class="form-control" name="diploma_percentage" value="{{old('diploma_percentage')}}" > </td>
                                      </tr>
                                    </tbody>
                                  </table>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Signature Upload<span class="required">*</span></label>
                                    <input type="file" class="form-control" name="signature" accept="image/*">
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Photo Upload<span class="required">*</span></label>
                                    <input type="file" class="form-control" name="image" accept="image/*">
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Father's Occupation<span class="required">*</span></label>
                                    <input type="text" class="form-control"  name="occupation" value="{{old('occupation')}}" >
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Father's Annual Income<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="annual_income" value="{{old('annual_income')}}" >
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="control-label">Cast<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="cast" value="{{old('cast')}}" >
                                </div>

                                <div class="col-md-6">
                                    <label class="control-label">Sub-Cast<span class="required">*</span></label>
                                    <input type="text" class="form-control" name="sub_cast" value="{{old('sub_cast')}}" >
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