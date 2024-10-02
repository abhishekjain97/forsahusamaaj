@extends('layouts.master')

@section('content')

<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/croppie.css') }}">

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="https://www.kayasthasamaj.in/">Home</a></li>
                        <li class="active">कायस्थ वैवाहिकी</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1>कायस्थ वैवाहिकी</h1>
                    <h2><a href="https://www.kayasthasamaj.in/marriage" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Details
                        of marriageable person / विवाह-योग्य व्यक्तियों का विवरण</h2>
                    <!-- <p>Welcome! Let's start your partner search with this Sign up.</p> -->
                </div>
            </div>
        </div>
        <div class="row well-box">
            <div class="col-lg-12 col-sm-12">
                <h1><a href="javascript:void(0)"></a></h1>
                <form method="post" id="marriageForm" action="https://www.kayasthasamaj.in/marriage/registration">
                    <div class="row">
                        <input type="hidden" value="e1a06a18da3f55161b296fcb9b2721550d831973" name="session_id" />
                        <input type="hidden" value="" id="imageName" name="photoUpload" />
                        <h2>Profile Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Created For / किसके लिए? :</label>
                                <select class="form-control" id="createProfileFor" name="createProfileFor">
                                    <option value="">Select Create Profile For</option>
                                    <option value="Self">Self</option>
                                    <option value="Son">Son</option>
                                    <option value="Daughter">Daughter</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" style="margin-bottom: 26px;">
                                <label>Gender / लिंग :</label>
                                <div style="margin-top:12px">
                                    <input type="radio" name="gender" value="male" checked=""> Male
                                    <input type="radio" name="gender" value="female"> Female
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name / नाम :</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Surname / कुलनाम :</label>
                                <select class="form-control" id="caste" name="caste">
                                    <option value="" selected disabled>Select Surname</option>
                                    <option value="Ambastha">Ambastha</option>
                                    <option value="Asthana">Asthana</option>
                                    <option value="Bhatnagar">Bhatnagar</option>
                                    <option value="Goud">Goud</option>
                                    <option value="Carna">Carna</option>
                                    <option value="Kulshreshta">Kulshreshta</option>
                                    <option value="Mathur">Mathur</option>
                                    <option value="Nigam">Nigam</option>
                                    <option value="Saxena">Saxena</option>
                                    <option value="Shrivastava">Shrivastava</option>
                                    <option value="Surdhwaja">Surdhwaja</option>
                                    <option value="Sourashtra">Sourashtra</option>
                                    <option value="Valmik">Valmik</option>
                                    <option value="Sinha">Sinha</option>
                                    <option value="Khare">Khare</option>
                                    <option value="Verma">Verma</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date of Birth / जन्म तिथि :</label>
                                <input type="text" class="form-control" id="dob1" name="dob"
                                    placeholder="Enter Date of Birth (DD/MM/YYYY)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Time / जन्म समय: (eg: 01:05 PM)</label>
                                <input type="text" class="form-control" id="birthTime" name="birthTime"
                                    placeholder="Enter Birth Time (01:05 PM)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Place / जन्म स्थान :</label>
                                <input type="text" class="form-control" id="birthPlace" name="birthPlace"
                                    placeholder="Enter Birth Place">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status / वैवाहिक स्थिति :</label>
                                <select class="form-control" id="maritalStatus" name="maritalStatus">
                                    <option value="">Select</option>
                                    <!-- <option value="Married">Married</option> -->
                                    <option value="Unmarried">Unmarried</option>
                                    <option value="Divorced">Divorced</option>
                                    <option value="Widowed">Widowed</option>
                                    <option value="Awaiting Divorce">Awaiting Divorce</option>
                                    <option value="Annulled">Annulled</option>
                                    <option value="Widower">Widower</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Height / ऊंचाई :</label>
                                <select class="form-control" id="height" name="height">
                                    <option value="" disabled selected>Select Height</option>
                                    <option value="4ft 5in">4ft 5in</option>
                                    <option value="4ft 6in">4ft 6in</option>
                                    <option value="4ft 7in">4ft 7in</option>
                                    <option value="4ft 8in">4ft 8in</option>
                                    <option value="4ft 9in">4ft 9in</option>
                                    <option value="4ft 10in">4ft 10in</option>
                                    <option value="4ft 11in">4ft 11in</option>
                                    <option value="5ft">5ft</option>
                                    <option value="5ft 1in">5ft 1in</option>
                                    <option value="5ft 2in">5ft 2in</option>
                                    <option value="5ft 3in">5ft 3in</option>
                                    <option value="5ft 4in">5ft 4in</option>
                                    <option value="5ft 5in">5ft 5in</option>
                                    <option value="5ft 6in">5ft 6in</option>
                                    <option value="5ft 7in">5ft 7in</option>
                                    <option value="5ft 8in">5ft 8in</option>
                                    <option value="5ft 9in">5ft 9in</option>
                                    <option value="5ft 10in">5ft 10in</option>
                                    <option value="5ft 11in">5ft 11in</option>
                                    <option value="6ft">6ft</option>
                                    <option value="6ft 1in">6ft 1in</option>
                                    <option value="6ft 2in">6ft 2in</option>
                                    <option value="6ft 3in">6ft 3in</option>
                                    <option value="6ft 4in">6ft 4in</option>
                                    <option value="6ft 5in">6ft 5in</option>
                                    <option value="6ft 6in">6ft 6in</option>
                                    <option value="6ft 7in">6ft 7in</option>
                                    <option value="6ft 8in">6ft 8in</option>
                                    <option value="6ft 9in">6ft 9in</option>
                                    <option value="6ft 10in">6ft 10in</option>
                                    <option value="6ft 11in">6ft 11in</option>
                                    <option value="7ft">7ft</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Complexion / रंग :</label>
                                <select class="form-control" id="complexion" name="complexion">
                                    <option value="">Select</option>
                                    <option value="Very Fair">Very Fair</option>
                                    <option value="Fair">Fair</option>
                                    <option value="Wheatish">Wheatish</option>
                                    <option value="Wheatish Brown">Wheatish Brown</option>
                                    <option value="Dark">Dark</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Manglik / मांगलिक :</label>
                                <select class="form-control" id="manglik" name="manglik">
                                    <option value="">Select</option>
                                    <option value="Manglik">Manglik</option>
                                    <option value="Non-manglik">Non-manglik</option>
                                    <option value="Anshik manglik">Anshik manglik</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Photo Upload / फोटो अपलोड :</label> <span id='imageSuccess'
                                    style="color:green; font-weight:bold"> </span> <a id="showPreview"
                                    onclick="loadImagePreview()" href="javascript:void(0)"
                                    class="btn btn-primary btn-xs1">Preview</a>
                                <input type="file" class="form-control" name="insert_image" id="insert_image"
                                    accept="image/*">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h2>Education &amp; Profession</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Education / शैक्षणिक योग्यता :</label>
                                <input type="text" class="form-control" id="education" name="education"
                                    placeholder="Enter Education">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Occupation / व्यवसाय :</label>
                                <input type="text" class="form-control" id="occupation" name="occupation"
                                    placeholder="Enter Occupation" value="None">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Annual Income / वार्षिक आय : (Per/Year)</label>
                                <select class="form-control" name="annualIncome">
                                    <option value="Rs. 0|0" selected>Select Income</option>
                                    <option value="Rs. 0|0">Rs. 0</option>
                                    <option value="Rs. 1 Lakh|100000">Rs. 1 Lakh</option>
                                    <option value="Rs. 2 Lakh|200000">Rs. 2 Lakh</option>
                                    <option value="Rs. 3 Lakh|300000">Rs. 3 Lakh</option>
                                    <option value="Rs. 4 Lakh|400000">Rs. 4 Lakh</option>
                                    <option value="Rs. 5 Lakh|500000">Rs. 5 Lakh</option>
                                    <option value="Rs. 6 Lakh|600000">Rs. 6 Lakh</option>
                                    <option value="Rs. 7 Lakh|700000">Rs. 7 Lakh</option>
                                    <option value="Rs. 8 Lakh|800000">Rs. 8 Lakh</option>
                                    <option value="Rs. 9 Lakh|900000">Rs. 9 Lakh</option>
                                    <option value="Rs. 10 Lakh|1000000">Rs. 10 Lakh</option>
                                    <option value="Rs. 11 Lakh|1100000">Rs. 11 Lakh</option>
                                    <option value="Rs. 12 Lakh|1200000">Rs. 12 Lakh</option>
                                    <option value="Rs. 13 Lakh|1300000">Rs. 13 Lakh</option>
                                    <option value="Rs. 14 Lakh|1400000">Rs. 14 Lakh</option>
                                    <option value="Rs. 15 Lakh|1500000">Rs. 15 Lakh</option>
                                    <option value="Rs. 15 - 20 Lakh|2000000">Rs. 15 - 20 Lakh</option>
                                    <option value="Rs. 20 - 25 Lakh|2500000">Rs. 20 - 25 Lakh</option>
                                    <option value="Rs. 25 - 35 Lakh|3500000">Rs. 25 - 35 Lakh</option>
                                    <option value="Rs. 35 - 50 Lakh|5000000">Rs. 35 - 50 Lakh</option>
                                    <option value="Rs. 50 - 70 Lakh|7000000">Rs. 50 - 70 Lakh</option>
                                    <option value="Rs. 70 Lakh - 1 crore|10000000">Rs. 70 Lakh - 1 crore</option>
                                    <option value="Rs. 1 crore - above|100000000">Rs. 1 crore &amp; above</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode / पिन कोड :</label>
                                <input type="text" class="form-control" maxlength="6" name="pincode" id="pincode"
                                    placeholder="Enter Pincode" onkeyup="loadPincodeData()">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City / जिला :</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State / प्रदेश :</label>
                                <input type="text" class="form-control" id="state" name="state"
                                    placeholder="Enter State">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country / देश :</label>
                                <input type="text" class="form-control" id="country" name="country"
                                    placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Address / संपर्क पता :</label>
                                <input type="text" class="form-control" id="contactAddress" name="contactAddress"
                                    placeholder="Enter Contact Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile No / मोबाइल नंबर :</label>
                                <input type="text" class="form-control" id="mobileNo" name="mobileNo" value=""
                                    placeholder="Enter Mobile No">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email ID / ईमेल :</label>
                                <input type="text" class="form-control" id="email" name="email"
                                    placeholder="Enter Email ID">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Phone No / अन्य फोन नंबर :</label>
                                <input type="text" class="form-control" id="otherPhoneNo" name="otherPhoneNo"
                                    placeholder="Enter Other Phone No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Phone Number Relationship / अन्य फोन नंबर संबंध :</label>
                                <select class="form-control" id="phoneNoRelation" id="phoneNoRelation"
                                    name="phoneNoRelation">
                                    <option value="">Select Relationship</option>
                                    <option value="Father">Father</option>
                                    <option value="Mother">Mother</option>
                                    <option value="Brother">Brother</option>
                                    <option value="Sister">Sister</option>
                                    <option value="Uncle">Uncle</option>
                                    <option value="Aunty">Aunty</option>
                                    <option value="Guardian">Guardian</option>
                                    <option value="Candidate">Candidate</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <!-- <h2>Lifestyle &amp; Family</h2> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father's Name / पिता का नाम :</label>
                                <input type="text" class="form-control" id="fatherName" name="fatherName"
                                    placeholder="Enter Father Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father's Occupation / पिता का व्यवसाय :</label>
                                <input type="text" class="form-control" id="fatherOccupation" name="fatherOccupation"
                                    placeholder="Enter Father's Occupation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mother's Name / मां का नाम :</label>
                                <input type="text" class="form-control" id="motherName" name="motherName"
                                    placeholder="Enter Mother Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mother's Occupation / मां का व्यवसाय :</label>
                                <input type="text" class="form-control" id="motherOccupation" name="motherOccupation"
                                    placeholder="Enter Mother's Occupation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brothers / भाई बंधु :</label>
                                <select class="form-control" id="brothers" name="brothers"
                                    onchange="loadMUMBrothers(this.value)">
                                    <option value="0">Select</option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">More than 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="mUmBro" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Married Brothers :</label>
                                        <input type="text" class="form-control" maxlength="2" id="noOfMBrothers"
                                            name="noOfMBrothers" placeholder="Enter no of Married Brothers">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Unmarried Brothers :</label>
                                        <input type="text" class="form-control" maxlength="2" id="noOfUmBrothers"
                                            name="noOfUmBrothers" placeholder="Enter no of Unmarried Brothers">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sisters / बहने :</label>
                                <select class="form-control" id="sisters" name="sisters"
                                    onchange="loadMUMSisters(this.value)">
                                    <option value="0">Select </option>
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="3+">More than 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="mUmSis" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Married Sisters :</label>
                                        <input type="text" class="form-control" maxlength="2" id="noOfMSisters"
                                            name="noOfMSisters" placeholder="Enter no of Married Sisters">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Unmarried Sisters :</label>
                                        <input type="text" class="form-control" maxlength="2" id="noOfUmSisters"
                                            name="noOfUmSisters" placeholder="Enter no of Unmarried Sisters">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    <!-- </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
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
                        src="https://www.kayasthasamaj.in/assets/images/images/loader.gif" /></button>
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
<script src="https://www.kayasthasamaj.in/assets/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
	$("#dob1").datepicker({
			changeMonth: true,
			changeYear: true,
			controlType: 'select',
			dateFormat:'dd/mm/yy',
			endDate: '-18y',
			//oneLine: true,
			//maxDate:0,
			// inline: true,
			yearRange: "-70:-18",
  });

	$.validator.addMethod('birthTime', function (value) {
		return /^([0-9]|0[0-9]|1[0-9]|2[0-3]):([0-5][0-9])\s*([AaPp][Mm])$/.test(value);
	}, 'Please enter a valid birth Time.');

	$('#marriageForm').validate({
	    rules: {
					'createProfileFor':{
						required: true,
					},
					'birthTime': "required birthTime",
	        'name':{
	          required: true,
	        },
	        'caste':{
	        	required: true,
	        },
	        'dob':{
						required: true,
	        },
	        'maritalStatus':{
						required: true,
	        },
	        'height':{
						required: true,
	        },
					'education':{
						required: true,
	        },
					'occupation':{
						required: true,
	        },
					'annualIncome':{
						required: true,
					},
				// 	'pincode':{
				// required: true,
				// number: true,
	      //   },
					'city':{
						required: true,
	        },
					'state':{
						required: true,
	        },
	        'mobileNo':{
						required: true,
						number: true,
						minlength: 10,
						maxlength: 10,
	        },
	        'email':{
						email: true
	        },
					'otherPhoneNo':{
						number: true
					}
	    },
		messages: {
					'createProfileFor':{
						required: "Please select created for",
					},
					'name':{
	          required: "Please enter name",
	        },
					'caste':{
	        	required: "Please select gender",
	        },
	        'dob':{
						required: "Please select dob",
	        },
	        'maritalStatus':{
						required: "Please select marritial status",
	        },
					'height':{
						required: "Please select height",
					},
					'education':{
						required: "Please enter education",
					},
					'occupation':{
						required: "Please enter occupation",
					},
					'annualIncome':{
						required: "Please select annual income",
					},
				// 	'pincode':{
				// required: "Please enter pincode",
				// number: "Please enter numbers only",
	      //   },
					'city':{
						required: "Please enter city",
					},
					'state':{
						required: "Please enter state",
					},
					'mobileNo':{
						required: 'Please enter contact no',
						number: 'Please enter number only',
						minlength: 'Mobile number should be 10 digit number',
						maxlength: 'Mobile number should be 10 digit number',
	        },
					'email':{
						email: 'Please enter valid email id'
	        },
					'otherPhoneNo':{
						number: 'Please enter number only'
					}
			}
    });
})

function loadMUMBrothers(selValue) {
	$("#mUmBro").hide()
	$("#noOfMBrothers").val("")
	$("#noOfUmBrothers").val("")
	if(selValue>0) {
		$("#mUmBro").show()
	}
}

function loadMUMSisters(selValue) {
	$("#mUmSis").hide()
	$("#noOfMSisters").val("")
	$("#noOfUmSisters").val("")
	if(selValue>0) {
		$("#mUmSis").show()
	}
}

function loadPincodeData() {
	$("#city").val("");
	$("#state").val("");
	if($("#pincode").val().length==6) {
		$.ajax({
				 type: "POST",
				 url: "https://www.kayasthasamaj.in/home/loadPincodeData",
				 data: {"pincode":$("#pincode").val()},
				 dataType: "json",
				 success: function (response) {
					 if(response.result.length>0) {
						 $("#city").val(response.result[0].district);
						 $("#state").val(response.result[0].stateName);
					 } else {

					 }
				 }
		 });
	}
}
</script>

<script>
    $(document).ready(function() {
	$("#showPreview").hide();
	$("#loaderImg").hide();
	$image_crop = $('#image_demo').croppie({
		enableExif: true,
		viewport: {
		 width:196,
		 height:196,
		 type:'square' //circle
		},
		boundary:{
		 width:400,
		 height:350
		}
	});

  $('#insert_image').on('change', function(){
		$('.crop_image').attr('disabled', false)
		$("#loaderImg").hide();
    var reader = new FileReader();
    reader.onload = function (event) {
      $image_crop.croppie('bind', {
        url: event.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
    $('#insertimageModal').modal('show');
  });

  $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
      type: 'canvas',
      size: 'viewport'
    }).then(function(response){
		$("#loaderImg").show();
		$('.crop_image').attr('disabled', true)
		$.ajax({
			url:'https://www.kayasthasamaj.in/marriage/insertImage',
			type:'POST',
			data:{"image":response, "session_id":"e1a06a18da3f55161b296fcb9b2721550d831973"},
			dataType:'JSON',
			success:function(data){
				if(data.success) {
					$('#insertimageModal').modal('hide');
					$('#imageName').val(data.result);
					load_images(data.result);
					$("#imageSuccess").html("Image uploaded successfully");
					$('#insert_image').val("");
					$("#showPreview").show();
				} else {
					alert("Image not uploaded, Try again.");
				}
				$('.crop_image').attr('disabled', false)
				$("#loaderImg").hide();
			}
		})
    });
  });

  function load_images(imageName)
  {
		$("#imagePreview").html('<img src="https://www.kayasthasamaj.in/uploads/profilePicture/'+imageName+'" class="img-thumbnail" />');
  }
});
function loadImagePreview() {
	$('#imagePreviewModel').modal('show');
}
</script>

@endsection