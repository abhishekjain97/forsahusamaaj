@extends('layouts.master')
@section('content')

<script src="{{asset('frontend_assets/js/jquery.min.3.3.1.js')}}"></script>
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <!-- <ol class="breadcrumb">
										<li><a href="#">Home</a></li>
										<li class="active">Job Profile</li>
								</ol> -->
            </div>
            <div class="col-md-9">
                <div style="float:right">
                    <a href="{{route('jobportal')}}" class="btn btn-default btn-xs1">Register with
                        us</a>
                    <a href="{{route('jobpost')}}" class="btn btn-default btn-xs1">Employers /
                        Post Job</a>
                    <a href="{{route('jobprofile')}}" class="btn btn-default btn-xs1">Create
                        Your Job Profile</a>
                </div>
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
                <div class="section-title mb20 text-center">
                    <h1><a href="{{route('jobportal')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Post a
                        Job</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 row well-box">
            <form action="{{route('jobpost')}}" method="post" id="createJobProfileForm" class="createJobProfileForm">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Name :</label>
                        <input type="text" class="form-control" name="companyName" value="{{old('companyName')}}"
                            placeholder="Enter Company Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Job Title :</label>
                        <input type="text" class="form-control" name="jobTitle" value="{{old('jobTitle')}}"
                            placeholder="Enter Job Title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Job Description :</label>
                        <textarea rows="4" class="form-control" name="jobDescription"
                            placeholder="Enter Job Description">{{old('jobDescription')}}</textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Job Type :</label>
                        <select class="form-control" name="jobType">
                            <option selected disabled>Select Job Type</option>
                            <option>Full-time</option>
                            <option>Part-time</option>
                            <option>Temporary</option>
                            <option>Contract</option>
                            <option>Internship</option>
                            <option>Commission</option>
                            <option>Volunteer</option>
                            <option>Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Experience Required: (Ex: 2 to 4 Years)</label>
                    <div class="row">
                        <div class="col-md-5">
                            <select class="form-control" name="experienceFrom">
                                <option value="" selected="">Select</option>
                                <option> 0</option>
                                <option> 1</option>
                                <option> 2</option>
                                <option> 3</option>
                                <option> 4</option>
                                <option> 5</option>
                                <option> 6</option>
                                <option> 7</option>
                                <option> 8</option>
                                <option> 9</option>
                                <option> 10</option>
                                <option> 11</option>
                                <option> 12</option>
                                <option> 13</option>
                                <option> 14</option>
                                <option> 15</option>
                                <option> 16</option>
                                <option> 17</option>
                                <option> 18</option>
                                <option> 19</option>
                                <option> 20</option>
                                <option> 21</option>
                                <option> 22</option>
                                <option> 23</option>
                                <option> 24</option>
                                <option> 25</option>
                                <option> More than 25 Years</option>
                            </select>
                        </div>
                        <div class="col-md-1" style="line-height: 50px;text-align: center;">
                            <strong>To</strong>
                        </div>
                        <div class="col-md-5">
                            <select class="form-control" name="experienceTo">
                                <option value="" selected="">Select</option>
                                <option> 0</option>
                                <option> 1</option>
                                <option> 2</option>
                                <option> 3</option>
                                <option> 4</option>
                                <option> 5</option>
                                <option> 6</option>
                                <option> 7</option>
                                <option> 8</option>
                                <option> 9</option>
                                <option> 10</option>
                                <option> 11</option>
                                <option> 12</option>
                                <option> 13</option>
                                <option> 14</option>
                                <option> 15</option>
                                <option> 16</option>
                                <option> 17</option>
                                <option> 18</option>
                                <option> 19</option>
                                <option> 20</option>
                                <option> 21</option>
                                <option> 22</option>
                                <option> 23</option>
                                <option> 24</option>
                                <option> 25</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Salary Offered :</label>
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="minSalary" value="{{old('minSalary')}}"
                                placeholder="e.g. 5,000.00">
                        </div>
                        <div class="col-md-4">
                            <input type="text" class="form-control" name="maxSalary" value="{{old('maxSalary')}}"
                                placeholder="e.g. 6,000.00">
                        </div>
                        <div class="col-md-4">
                            <select class="form-control" name="salaryPeriod">
                                <option value="per hour">per hour</option>
                                <option value="per day">per day</option>
                                <option value="per week">per week</option>
                                <option value="per month">per month</option>
                                <option value="per year" selected="">per year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Key Skills :(Comma(,) separated)</label>
                        <input type="text" class="form-control" name="keySkills" value="{{old('keySkills')}}"
                            placeholder="Enter Key Skills">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>No of Position :</label>
                        <input type="text" class="form-control" name="noOfPosition" value="{{old('noOfPosition')}}"
                            placeholder="Enter No of Position">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Location :</label>
                        <input type="text" class="form-control" name="location" value="{{old('location')}}"
                            placeholder="Enter City Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Address :</label>
                        <textarea class="form-control" name="address" value="{{old('address')}}"
                            placeholder="Street Address, City and State"></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Country :</label>
                        <select class="form-control" name="country">
                            <option>India</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Phone Number :</label>
                        <input type="text" class="form-control" name="phoneNumber" value="{{old('phoneNumber')}}"
                            placeholder="Enter Phone Number">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Email :</label>
                        <input type="text" class="form-control" name="email" value="{{old('email')}}"
                            placeholder="Enter Email">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Website Link :</label>
                        <input type="text" class="form-control" name="url" value="{{old('url')}}"
                            placeholder="Enter Website Link">
                    </div>
                </div>
                <div class="col-md-12 row">
                    <div class="col-md-12 mt10">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Post Job</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {

	$('#createJobProfileForm').validate({
	    rules: {
				'companyName':{
					required: true,
				},
				'jobTitle':{
					required: true,
				},
				'jobDescription':{
					required: true,
				},
				'jobType':{
					required: true,
				},
				'experienceFrom':{
					required: true,
				},
				'experienceTo':{
					required: true,
				},
				'location':{
					required: true,
				},
				'phoneNumber':{
					required: true,
					number:true,
					minlength:10,
					maxlength:10
				},
				'email':{
					required: true,
					email:true
				}
			}
	});
});
</script>

@endsection