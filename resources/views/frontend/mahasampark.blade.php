@extends('layouts.master')

@section('content')

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
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a> Details
                        of the head of the family / परिवार के मुखिया का विवरण</h1>
                    <p>कृपया फार्म को ध्यान पूर्वक देखें सभी विशिष्टियां (कॉलम) सही एवं स्पष्ट भरें । जानकारी भरने में
                        आपका मात्र दो मिनिट का समय अवश्य लगेगा परन्तु इससे कोरी समाज को आपका महत्वपूर्ण सहयोग प्राप्त
                        होगा। कोरी समाज महासम्पर्क अभियान के प्रपत्र (फार्म) में जानकारी भरने पर कोई सदस्यता शुल्क
                        नहीं है अभियान पूर्णता नि:शुल्क है।</p>
                </div>
            </div>
        </div>
        <div class="row well-box">
            <!-- <h1><a href="javascript:void(0)">Details of the head of the family / परिवार के मुखिया का विवरण</a></h1> -->
            <form action="{{route('contactsignup')}}" method="post" id="signupStep1" class="signupStep1"
                enctype="multipart/form-data">
                @csrf
                <div class="col-md-12 row">
                    <h2>परिशिष्ट - 1</h2>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>First Name / नाम :</label>
                            <input type="text" class="form-control" id="hodName" name="hodName"
                                placeholder="Enter First Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Surname / कुलनाम :</label>
                            <select class="form-control select2 " id="hodSurname" name="hodSurname">
                                <option value="" selected disabled>Select Surname</option>
                                <option value="माहौरकर (Mahaurkar)">माहौरकर (Mahaurkar)</option>
                                <option value="मांधाता पटेल (Mandhata Patel)">मांधाता पटेल (Mandhata Patel)</option>
                                <option value="सिपाही (Sipahi) (Muslim Kolis)">सिपाही (Sipahi) (Muslim Kolis)
                                </option>
                                <option value="सालुंके (Salunkhe)">सालुंके (Salunkhe)</option>
                                <option value="गंगा पुत्र (Ganga Putra)">गंगा पुत्र (Ganga Putra)</option>
                                <option value="महावर (Mahawar)">महावर (Mahawar)</option>
                                <option value="माहौर (Mahaur)">माहौर (Mahaur)</option>
                                <option value="पाटिल (Patil)">पाटिल (Patil)</option>
                                <option value="पटेल (Patel)">पटेल (Patel)</option>
                                <option value="डाभी (Dabhi)">डाभी (Dabhi)</option>
                                <option value="चुडासामा (Chudasama)">चुडासामा (Chudasama)</option>
                                <option value="ठक्कर (Thakkar)">ठक्कर (Thakkar)</option>
                                <option value="ठाकोर (Thakor)">ठाकोर (Thakor)</option>
                                <option value="पाटीदार (Patidar)">पाटीदार (Patidar)</option>
                                <option value="ठाकरदा (Thakarda)">ठाकरदा (Thakarda)</option>
                                <option value="बारिया (Baria)">बारिया (Baria)</option>
                                <option value="अम्बिगा (Ambiga)">अम्बिगा (Ambiga)</option>
                                <option value="अम्बिगर (Ambiger)">अम्बिगर (Ambiger)</option>
                                <option value="सरवैया (Sarvaiya)">सरवैया (Sarvaiya)</option>
                                <option value="पाटनवाडिया (Patanwadia)">पाटनवाडिया (Patanwadia)</option>
                                <option value="तलपड़ा (Talpada)">तलपड़ा (Talpada)</option>
                                <option value="जेठवा (Jethava)">जेठवा (Jethava)</option>
                                <option value="खांत (khant)">खांत (khant)</option>
                                <option value="परमार (Parmar)">परमार (Parmar)</option>
                                <option value="मकवाना (Makwana)">मकवाना (Makwana)</option>
                                <option value="सूर्यवंशी (Suryawanshi)">सूर्यवंशी (Suryawanshi)</option>
                                <option value="कमलवंशी (kamalvanshi)">कमलवंशी (kamalvanshi)</option>
                                <option value="शाक्या ((Shakya)">शाक्या ((Shakya)</option>
                                <option value="शाक्यवाल (Shakyawal)">शाक्यवाल (Shakyawal)</option>
                                <option value="शाक्यवार (Shakyawar)">शाक्यवार (Shakyawar)</option>
                                <option value="मुदिराजा (Mudiraja)">मुदिराजा (Mudiraja)</option>
                                <option value="मुथरैयार (Mutharaiyar)">मुथरैयार (Mutharaiyar)</option>
                                <option value="शियाल (Shiyal)">शियाल (Shiyal)</option>
                                <option value="चौहान (Chauhan)">चौहान (Chauhan)</option>
                                <option value="शंखवार (Shankhwar)">शंखवार (Shankhwar)</option>
                                <option value="भगत (Bhagat)">भगत (Bhagat)</option>
                                <option value="जादव (Jadav)">जादव (Jadav)</option>
                                <option value="जाधव (Jadhav)">जाधव (Jadhav)</option>
                                <option value="कबीरपंथी (kabirpanthi)">कबीरपंथी (kabirpanthi)</option>
                                <option value="पंथी (Panthi)">पंथी (Panthi)</option>
                                <option value="कश्यप (kashyap)">कश्यप (kashyap)</option>
                                <option value="कुशवाहा (kushwaha)">कुशवाहा (kushwaha)</option>
                                <option value="कोलीसोन (kolison)">कोलीसोन (kolison)</option>
                                <option value="महादेव (Mahadeo)">महादेव (Mahadeo)</option>
                                <option value="मतिया ( Matia)">मतिया ( Matia)</option>
                                <option value="वैती (Vaity)">वैती (Vaity)</option>
                                <option value="मंगेला (Mangela)">मंगेला (Mangela)</option>
                                <option value="बंडोलिया (Bandolia)">बंडोलिया (Bandolia)</option>
                                <option value="तन्तुवाय (Tantuvay)">तन्तुवाय (Tantuvay)</option>
                                <option value="तान्ती (Tanti)">तान्ती (Tanti)</option>
                                <option value="खरवा (kharwa)">खरवा (kharwa)</option>
                                <option value="चुवलिया (Chuvaliya)">चुवलिया (Chuvaliya)</option>
                                <option value="राठवा (Rathwa)">राठवा (Rathwa)</option>
                                <option value="घेडिया (Ghedia)">घेडिया (Ghedia)</option>
                                <option value="पागी (Pagi)">पागी (Pagi)</option>
                                <option value="सकवार (Sakwar)">सकवार (Sakwar)</option>
                                <option value="सकरवाल (Sakarwal)">सकरवाल (Sakarwal)</option>
                                <option value="मल्हार (Malhar)">मल्हार (Malhar)</option>
                                <option value="डोंगर (Dongar)">डोंगर (Dongar)</option>
                                <option value="परकारी (Parkari)">परकारी (Parkari)</option>
                                <option value="वाडियारा (Wadiyara)">वाडियारा (Wadiyara)</option>
                                <option value="भुइयार (Bhuiyar)">भुइयार (Bhuiyar)</option>
                                <option value="पटेलिया (Patelia)">पटेलिया (Patelia)</option>
                                <option value="ऐरवार (Airwar)">ऐरवार (Airwar)</option>
                                <option value="कैथिया (kaithia)">कैथिया (kaithia)</option>
                                <option value="राठदा (Rathda)">राठदा (Rathda)</option>
                                <option value="कब्बालिगा (kabbaliga)">कब्बालिगा (kabbaliga)</option>
                                <option value="गोहिल (Gohil)">गोहिल (Gohil)</option>
                                <option value="राठोड (Rathod)">राठोड (Rathod)</option>
                                <option value="चावडा (Chavada)">चावडा (Chavada)</option>
                                <option value="वासावा (Vasava)">वासावा (Vasava)</option>
                                <option value="मेर (Mer)">मेर (Mer)</option>
                                <option value="अराया (Araya)">अराया (Araya)</option>
                                <option value="मुक्कुवा (Mukkuva)">मुक्कुवा (Mukkuva)</option>
                                <option value="वाघेला (Vaghela)">वाघेला (Vaghela)</option>
                                <option value="भोई (Bhoi)">भोई (Bhoi)</option>
                                <option value="नाइक (Naik)">नाइक (Naik)</option>
                                <option value="वाधेर (Vadher)">वाधेर (Vadher)</option>
                                <option value="टोकरे (Tokre)">टोकरे (Tokre)</option>
                                <option value="भुंईयार (Bhuiyar)">भुंईयार (Bhuiyar)</option>
                                <option value="बुनकर (Bunker)">बुनकर (Bunker)</option>
                                <option value="कैथवार (Kaithwar)">कैथवार (Kaithwar)</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Photo Upload / फोटो अपलोड :</label>
                            <input type="file" class="form-control" id="photoUpload" name="photoUpload">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" style="margin-bottom: 26px;">
                            <label>Gender / लिंग :</label>
                            <div style="margin-top:12px">
                                <input type="radio" name="hodGender" value="male" checked> Male
                                <input type="radio" name="hodGender" value="female"> Female
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Father/Husband Name / पिता/पति का नाम :</label>
                            <input type="text" class="form-control" id="fatherName" name="fatherName"
                                placeholder="Enter Father/Husband Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Home Address / निवास का पता :</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter Address">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pincode / पिन कोड :</label>
                            <input type="text" class="form-control" id="pincode" name="pincode"
                                placeholder="Enter Pincode" maxlength="6" onkeyup="loadPincodeData()">
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
                            <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email ID / ईमेल :</label>
                            <input type="text" class="form-control" id="hodEmail" name="hodEmail"
                                placeholder="Enter Email ID">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date of Birth / जन्म तिथि :</label>
                            <input type="text" class="form-control" id="dob" name="dob"
                                placeholder="Enter Date of Birth (DD/MM/YYYY)" autocomplete="off">
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
                                <option value="Married">Married</option>
                                <option value="Unmarried">Unmarried</option>
                                <option value="Divorced">Divorced</option>
                                <option value="Widowed">Widowed</option>
                                <option value="Awaiting Divorce">Awaiting Divorce</option>
                                <option value="Annulled">Annulled</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Marriage Anniversary Date / विवाह दिनांक : (If Married) </label>
                            <input type="text" class="form-control" id="marriageAnniversaryDate"
                                name="marriageAnniversaryDate"
                                placeholder="Enter Marriage Anniversary Date (DD/MM/YYYY)" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Mobile No / मोबाइल नंबर :</label>
                            <input type="text" class="form-control" id="hodMobileNo" name="hodMobileNo"
                                placeholder="Enter Mobile No">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Landline No / लैंडलाइन नंबर :</label>
                            <input type="text" class="form-control" id="LandlineNo" name="LandlineNo"
                                placeholder="Enter Landline No">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education / शैक्षणिक योग्यता :</label>
                            <input type="text" class="form-control" name="education" placeholder="Enter Education">
                        </div>
                    </div>
                    <!-- </div>
                        <div class="col-md-12 row"> -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Occupation / व्यवसाय :</label>
                            <select class="form-control" id="occupation" name="occupation"
                                onchange="loadOccupation(this.value)">
                                <option value="">Select</option>
                                <option value="govt job">Govt Job / सरकारी नौकरी</option>
                                <option value="private job">Private Job / प्राइवेट नौकरी</option>
                                <option value="semi govt job">Semi Govt Job / अर्ध सरकारी नौकरी</option>
                                <option value="unemployed">Unemployed / बेरोज़गार</option>
                                <option value="education">Education / शिक्षा</option>
                                <option value="social work">Social Work / सामाजिक कार्य</option>
                                <option value="professional">Business/Industrial व्यापार/औद्योगिक</option>
                                <!-- <option value="professional">Professional</option> -->
                                <option value="retired">Retired / सेवानिवृत</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- Govt job, private job -->
                <div class="col-md-12 row hide-occu" id="job">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department Name / विभाग का नाम :</label>
                            <input type="text" class="form-control" id="departmentName" name="departmentName"
                                placeholder="Enter Department Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation / पद :</label>
                            <input type="text" class="form-control" id="designation" name="designation"
                                placeholder="Enter Designation">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="unemployed">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>What do you want to do / क्या करना चाहते है :</label>
                            <select class="form-control" id="whatDoYouWant" name="whatDoYouWant">
                                <option value="job">Job</option>
                                <option value="business">Business</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job/Business Description / कार्य/व्यवसाय का विवरण :</label>
                            <input type="text" class="form-control" id="businessDescription" name="businessDescription"
                                placeholder="Enter Business Description">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Education / शैक्षणिक योग्यता :</label>
                            <input type="text" class="form-control" name="unemployed_education"
                                placeholder="Enter Education">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Experiance / अनुभव :</label>
                            <input type="text" class="form-control" id="experiance" name="experiance"
                                placeholder="Enter Experiance">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Expected Salary Monthly / अपेक्षित वेतन मासिक :</label>
                            <input type="text" class="form-control" id="expectedSalary" name="expectedSalary"
                                placeholder="Enter Expected Salary">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="education">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Class Name / कक्षा का नाम :</label>
                            <input type="text" class="form-control" id="className" name="className"
                                placeholder="Enter Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>School/University Name / स्कूल/विश्वविद्यालय का नाम :</label>
                            <input type="text" class="form-control" id="universityName" name="universityName"
                                placeholder="Enter University Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>City / जिला :</label>
                            <input type="text" class="form-control" id="city" name="educationCity"
                                placeholder="Enter City">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="socialwork">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Organization Name / संस्था का नाम :</label>
                            <input type="text" class="form-control" id="organizationName" name="organizationName"
                                placeholder="Enter Organization Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation / पद :</label>
                            <input type="text" class="form-control" id="socialDesignation" name="socialDesignation"
                                placeholder="Enter Designation">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>What kind of social work / किस प्रकार का सामाजिक कार्य :</label>
                            <input type="text" class="form-control" id="kindOfSocialWork" name="kindOfSocialWork"
                                placeholder="Enter Kind Of Social Work">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Extra Activity / अतिरिक्त गतिविधि :</label>
                            <input type="text" class="form-control" id="extraActivity" name="extraActivity"
                                placeholder="Enter Extra Activity">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="bussiness">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business/Industrial Name / व्यापार/औद्योगिक का नाम :</label>
                            <input type="text" class="form-control" id="bussinessName" name="bussinessName"
                                placeholder="Enter Business Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business/Industrial Description / व्यापार/औद्योगिक का विवरण :</label>
                            <input type="text" class="form-control" id="bussinessDescription"
                                name="bussinessDescription" placeholder="Enter Business Description">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="professional">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business/Industrial Name / व्यापार/औद्योगिक नाम :</label>
                            <input type="text" class="form-control" id="professionalName" name="professionalName"
                                placeholder="Enter Business/Industrial Name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Business/Industrial Description / व्यापार/औद्योगिक का विवरण :</label>
                            <input type="text" class="form-control" id="professionalDesignation"
                                name="professionalDesignation" placeholder="Enter Business/Industrial Description">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row hide-occu" id="retired">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department Name / विभाग का नाम : (Previous job/business/)</label>
                            <input type="text" class="form-control" id="rtrDepartmentName" name="rtrDepartmentName"
                                placeholder="Enter Department Name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Designation / पद : </label>
                            <input type="text" class="form-control" id="rtrDesignation" name="rtrDesignation"
                                placeholder="Enter Designation">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Job Description / कार्य का विवरण :</label>
                            <input type="text" class="form-control" id="rtrJobDescription" name="rtrJobDescription"
                                placeholder="Enter Job Description">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Currently Work Description / वर्तमान में काम का विवरण :</label>
                            <input type="text" class="form-control" id="" name="rtrWorkDescription"
                                placeholder="Enter Currently Work Description">
                        </div>
                    </div>
                </div>

                <div class="col-md-12 row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Blood Group / रक्त समूह :</label>
                            <select class="form-control" id="bloodGroup" name="bloodGroup">
                                <option value="">Select</option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>No of Family Member / परिवार सदस्यों की कुल संख्या :</label>
                            <input class="text-input form-control" type="text" name="fappNumber" id="fappNumber"
                                placeholder="Enter No of Family Member" maxlength="2" onkeyup="loadFemilyDtl()">
                        </div>
                    </div>
                    <div class="col-md-12 well-boxs" style="padding: 0px 30px;display:none" id="femilyDtlSec">
                        <div class="row" style="border:1px solid #c2c2c2; padding:10px" id="femilyDtl">
                        </div>
                    </div>

                    <div class="col-md-12 mt10">
                        <div class="form-group">
                            <button type="submit" id="signupBtn" class="btn btn-default">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('frontend_assets/js/jquery.validate.js') }}"></script>
<script type="text/javascript">
    var femilyDtl = '<div class="col-md-12"><div class="row tt"><div class="col-md-6"><div class="form-group"><label>Name / नाम:</label><input type="text" class="form-control" id="fmname%id%" name="fmname%id%" placeholder="Enter Name"><label class="error-cum" id="errorFDName%id%"></label></div></div><div class="col-md-6"><div class="form-group"><label>Relationship With Head / मुखिया से संबंध :</label><select class="form-control" id="relationshipHOD%id%" name="relationshipHOD%id%"><option value="">Select</option><option value="father">Father</option><option value="mother">Mother</option><option value="wife">Wife</option><option value="husband">Husband</option><option value="son">Son</option><option value="daughter">Daughter</option><option value="sister">Sister</option><option value="brother">Brother</option><option value="other">Other</option></select><label class="error-cum" id="errorFDRel%id%"></label></div></div></div></div>'

function loadFemilyDtl(selVal) {
$("#femilyDtl").html("");
$("#femilyDtlSec").hide();
if($("#fappNumber").val()>0 && $("#fappNumber").val()<11) {
    for (var i = 1; i <= $("#fappNumber").val(); i++) {
        var femilyDtlHtml = femilyDtl.replace(/%id%/g, i);
        $("#femilyDtl").append(femilyDtlHtml);
    }
    $("#femilyDtlSec").show();
} else {
    $("#femilyDtlSec").hide();
    if($("#fappNumber").val()>10) {
        alert("No of family member field does not allow more then 10 family member.")
    }
}
}

function loadOccupation(selVal) {
$("#job").hide();
$("#unemployed").hide();
$("#education").hide();
$("#socialwork").hide();
$("#bussiness").hide();
$("#professional").hide();
$("#retired").hide();

if(selVal=="govt job" || selVal=="private job" || selVal=="semi govt job") {
    $("#job").show();
}else if(selVal=="unemployed") {
    $("#unemployed").show();
}else if(selVal=="education") {
    $("#education").show();
}else if(selVal=="social work") {
    $("#socialwork").show();
}else if(selVal=="bussiness/industrial") {
    $("#bussiness").show();
}else if(selVal=="professional") {
    $("#professional").show();
}else if(selVal=="retired") {
    $("#retired").show();
}
}


$(document).ready(function(){
$("#dob").datepicker({
        changeMonth: true,
        changeYear: true,
        controlType: 'select',
        dateFormat:'dd/mm/yy',
        //oneLine: true,
        //maxDate:0,
        inline: true,
        //yearRange: 'c-50:c-18'
        yearRange: "-90:-18", // last hundred years
});
$("#marriageAnniversaryDate").datepicker({
        changeMonth: true,
        changeYear: true,
        controlType: 'select',
        dateFormat:'dd/mm/yy',
        oneLine: true,
        //inline: true,
        //maxDate:0,
        yearRange: "-90:+0"
});

$("#signupStep1").validate({
    rules: {
      'hodName':{
        required: true,
      },
        'hodSurname':{
        required: true,
      },
      'fatherName':{
          required: true,
      },
      'address':{
                required: true,
      },
      'pincode':{
                required: true,
                number: true,
      },
      'city':{
                required: true,
      },
      'state':{
                required: true,
      },
        'dob': {
            required: true,
        },
      'hodMobileNo':{
            required: true,
            number: true,
            minlength: 10,
            maxlength: 10,
        },
        'fappNumber':{
            required: true,
            number: true
        }
    },
messages: {
    'hodName':{
        required: "Please enter name",
      },
        'hodSurname':{
        required: "Please enter surname",
      },
      'fatherName':{
          required: "Please enter father name",
      },
      'address':{
                required: "Please enter address",
      },
      'pincode':{
            required: "Please enter pincode",
            number: "Please enter numbers only",
      },
      'city':{
            required: "Please enter city",
      },
      'state':{
            required: 'Please enter state',
      },
        'dob': {
            required: 'Please enter/select date of birth',
        },
      'hodMobileNo':{
            required: 'Please enter mobile no',
            number: 'Please enter numbers only',
            minlength: 'Mobile number should be 10 digit number',
            maxlength: 'Mobile number should be 10 digit number',
        },
        'fappNumber':{
            required: 'Please enter no of family member',
            number: "Please enter numbers only",
        }
    },
    
});
});
</script>
@endsection