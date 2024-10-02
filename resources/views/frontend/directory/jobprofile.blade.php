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
                                class="fa fa-arrow-circle-o-left"></i></a> Create Your Job Profile</h1>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 row well-box">
            <form action="{{route('jobprofile')}}" method="post" id="createJobProfileForm" class="createJobProfileForm">
                @csrf
                <div class="col-md-12">
                    <div class="form-group">
                        <label>First Name :</label>
                        <input type="text" class="form-control" name="firstName" value="{{old('firstName')}}"
                            placeholder="Enter First Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Last Name :</label>
                        <input type="text" class="form-control" name="lastName" value="{{old('lastName')}}"
                            placeholder="Enter Last Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Current City :</label>
                        <input type="text" class="form-control" name="currentCity" value="{{old('currentCity')}}"
                            placeholder="Enter Current City Name">
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
                        <label>Total Work Experience :</label>
                        <select class="form-control" name="experience">
                            <option value="" selected="">Select Experience</option>
                            <option value="0">Fresher</option>
                            <option value="1-">Less then 1 year</option>
                            <option value="1"> 1 year</option>
                            <option value="2"> 2 years</option>
                            <option value="3"> 3 years</option>
                            <option value="4"> 4 years</option>
                            <option value="5"> 5 years</option>
                            <option value="6"> 6 years</option>
                            <option value="7"> 7 years</option>
                            <option value="8"> 8 years</option>
                            <option value="9"> 9 years</option>
                            <option value="10"> 10 years</option>
                            <option value="11"> 11 years</option>
                            <option value="12"> 12 years</option>
                            <option value="13"> 13 years</option>
                            <option value="14"> 14 years</option>
                            <option value="15"> 15 years</option>
                            <option value="16"> 16 years</option>
                            <option value="17"> 17 years</option>
                            <option value="18"> 18 years</option>
                            <option value="19"> 19 years</option>
                            <option value="20"> 20 years</option>
                            <option value="20+">20+ years</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Key Skills :(Comma(,) separated)</label>
                        <input type="text" class="form-control" name="keySkills" value="{{old('keySkills')}}"
                            placeholder="Enter Key Skills">
                    </div>
                </div>
                <h2>Latest Job Details</h2>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Job Title (Current or Most Recent) :</label>
                        <input type="text" class="form-control" name="jobTitle" value="{{old('jobTitle')}}"
                            placeholder="Enter Job Title">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Company Details:</label>
                        <input type="text" class="form-control" name="company" placeholder="Enter Company Details">
                    </div>
                </div>
                <div class="col-md-12">
                    <label>Time Period :</label>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="fromYearTP">
                                        <option value="" selected="">Year</option>
                                        <option> 1970</option>
                                        <option> 1971</option>
                                        <option> 1972</option>
                                        <option> 1973</option>
                                        <option> 1974</option>
                                        <option> 1975</option>
                                        <option> 1976</option>
                                        <option> 1977</option>
                                        <option> 1978</option>
                                        <option> 1979</option>
                                        <option> 1980</option>
                                        <option> 1981</option>
                                        <option> 1982</option>
                                        <option> 1983</option>
                                        <option> 1984</option>
                                        <option> 1985</option>
                                        <option> 1986</option>
                                        <option> 1987</option>
                                        <option> 1988</option>
                                        <option> 1989</option>
                                        <option> 1990</option>
                                        <option> 1991</option>
                                        <option> 1992</option>
                                        <option> 1993</option>
                                        <option> 1994</option>
                                        <option> 1995</option>
                                        <option> 1996</option>
                                        <option> 1997</option>
                                        <option> 1998</option>
                                        <option> 1999</option>
                                        <option> 2000</option>
                                        <option> 2001</option>
                                        <option> 2002</option>
                                        <option> 2003</option>
                                        <option> 2004</option>
                                        <option> 2005</option>
                                        <option> 2006</option>
                                        <option> 2007</option>
                                        <option> 2008</option>
                                        <option> 2009</option>
                                        <option> 2010</option>
                                        <option> 2011</option>
                                        <option> 2012</option>
                                        <option> 2013</option>
                                        <option> 2014</option>
                                        <option> 2015</option>
                                        <option> 2016</option>
                                        <option> 2017</option>
                                        <option> 2018</option>
                                        <option> 2019</option>
                                        <option> 2020</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="fromMonthTP">
                                        <option value="" selected="">Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1" style="line-height: 50px;text-align: center;">
                            <strong>To</strong>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <select class="form-control" name="toYearTP">
                                        <option value="" selected="">Year</option>
                                        <option>Present</option>
                                        <option> 2019</option>
                                        <option> 2018</option>
                                        <option> 2017</option>
                                        <option> 2016</option>
                                        <option> 2015</option>
                                        <option> 2014</option>
                                        <option> 2013</option>
                                        <option> 2012</option>
                                        <option> 2011</option>
                                        <option> 2010</option>
                                        <option> 2009</option>
                                        <option> 2008</option>
                                        <option> 2007</option>
                                        <option> 2006</option>
                                        <option> 2005</option>
                                        <option> 2004</option>
                                        <option> 2003</option>
                                        <option> 2002</option>
                                        <option> 2001</option>
                                        <option> 2000</option>
                                        <option> 1999</option>
                                        <option> 1998</option>
                                        <option> 1997</option>
                                        <option> 1996</option>
                                        <option> 1995</option>
                                        <option> 1994</option>
                                        <option> 1993</option>
                                        <option> 1992</option>
                                        <option> 1991</option>
                                        <option> 1990</option>
                                        <option> 1989</option>
                                        <option> 1988</option>
                                        <option> 1987</option>
                                        <option> 1986</option>
                                        <option> 1985</option>
                                        <option> 1984</option>
                                        <option> 1983</option>
                                        <option> 1982</option>
                                        <option> 1981</option>
                                        <option> 1980</option>
                                        <option> 1979</option>
                                        <option> 1978</option>
                                        <option> 1977</option>
                                        <option> 1976</option>
                                        <option> 1975</option>
                                        <option> 1974</option>
                                        <option> 1973</option>
                                        <option> 1972</option>
                                        <option> 1971</option>
                                        <option> 1970</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="toMonthTP">
                                        <option value="" selected="">Month</option>
                                        <option value="01">January</option>
                                        <option value="02">February</option>
                                        <option value="03">March</option>
                                        <option value="04">April</option>
                                        <option value="05">May</option>
                                        <option value="06">June</option>
                                        <option value="07">July</option>
                                        <option value="08">August</option>
                                        <option value="09">September</option>
                                        <option value="10">October</option>
                                        <option value="11">November</option>
                                        <option value="12">December</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <label>Salary :</label>
                            <input type="text" class="form-control" name="salary" value="{{old('salary')}}"
                                placeholder="Enter Salary">
                        </div>
                        <div class="col-md-4">
                            <label>&nbsp;</label>
                            <select class="form-control" name="salaryType">
                                <option value="hour">per hour</option>
                                <option value="day">per day</option>
                                <option value="week">per week</option>
                                <option value="month">per month</option>
                                <option value="year" selected>per year</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description of Your Role :</label>
                        <textarea class="form-control" name="roleDescription"
                            placeholder="Enter Description of Your Role">{{old('roleDescription')}}</textarea>
                    </div>
                </div>
                <h2>Education</h2>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>College Name :</label>
                        <input type="text" class="form-control" name="collegeName" value="{{old('CollegeName')}}"
                            placeholder="Enter College Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>University Name:</label>
                        <input type="text" class="form-control" name="universityName" value="{{old('universityName')}}"
                            placeholder="Enter University Name">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Degree :</label>
                        <input type="text" class="form-control" name="degree" value="{{old('degree')}}"
                            placeholder="Enter Degree">
                    </div>
                </div>

                <div class="col-md-12 row">
                    <div class="col-md-12 mt10">
                        <div class="form-group">
                            <button type="submit" class="btn btn-default">Create Profile</button>
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
				'firstName':{
					required: true,
				},
				'lastName':{
					required: true,
				},
				'currentCity':{
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
				},
				'experience':{
					required: true,
				},
				/*'keySkills':{
					required: true,
				},*/
				'CollegeName':{
					required: true,
				},
				'UniversityName':{
					required: true,
				},
				'degree':{
					required: true,
				}
			}
	});
});
</script>


@endsection