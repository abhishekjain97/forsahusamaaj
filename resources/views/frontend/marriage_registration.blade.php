@extends('layouts.master')

@section('content')

<script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>

<script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/croppie.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/wickedpicker.min.css') }}">
<script type="text/javascript" src="{{ asset('frontend_assets/js/wickedpicker.js') }}"></script>

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Sahu Samaj वैवाहिकी</li>
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
                <div class="section-title mb20 text-center">
                    <h1>Sahu Samaj वैवाहिकी</h1>
                    <h2><a href="{{route('marriage.index')}}" style="float:left"><i
                                title="Click here for go back screen" class="fa fa-arrow-circle-o-left"></i></a> Details
                        of marriageable person / विवाह-योग्य व्यक्तियों का विवरण</h2>
                    <!-- <p>Welcome! Let's start your partner search with this Sign up.</p> -->
                </div>
            </div>
        </div>
        <div class="row well-box">
            <div class="col-lg-12 col-sm-12">
                <h1><a href="javascript:void(0)"></a></h1>
                <form method="post" id="marriageForm" action="{{route('marriage.store')}}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="" id="imageName" name="photoUpload" />
                    <div class="row">
                        <h2>Profile Details</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Created For / किसके लिए? :</label>
                                <select class="form-control select2" id="createProfileFor" name="create_profile_for">
                                    <option value="" selected="selected" disabled>Select Create Profile For</option>
                                    <option value="Self" @if (old('create_profile_for')=='Self' ) selected="selected"
                                        @endif>Self</option>
                                    <option value="Son" @if (old('create_profile_for')=='Son' ) selected="selected"
                                        @endif>Son</option>
                                    <option value="Daughter" @if (old('create_profile_for')=='Daughter' )
                                        selected="selected" @endif>Daughter</option>
                                    <option value="Brother" @if (old('create_profile_for')=='Brother' )
                                        selected="selected" @endif>Brother</option>
                                    <option value="Sister" @if (old('create_profile_for')=='Sister' )
                                        selected="selected" @endif>Sister</option>
                                    <option value="Other" @if (old('create_profile_for')=='Other' ) selected="selected"
                                        @endif>Other</option>
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
                                <input type="text" class="form-control" id="name" value="{{old('name')}}" name="name"
                                    placeholder="Enter First Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Surname / कुलनाम :</label>
                                <select class="form-control select2" id="caste" name="caste">
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
                                <label>Date of Birth / जन्म तिथि :</label>
                                <input type="date" class="form-control" id="dob1" name="dob" value="{{old('dob')}}"
                                    placeholder="Enter Date of Birth (DD/MM/YYYY)" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Time / जन्म समय: (eg: 01:05 PM)</label>
                                <input type="text" class="form-control timepicker" value="{{old('birth_time')}}"
                                    id="birthTime" name="birth_time" placeholder="Enter Birth Time (01:05 PM)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Birth Place / जन्म स्थान :</label>
                                <input type="text" class="form-control" id="birthPlace" value="{{old('birth_place')}}"
                                    name="birth_place" placeholder="Enter Birth Place">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Marital Status / वैवाहिक स्थिति :</label>
                                <select class="form-control select2" id="maritalStatus" name="maritalStatus">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value="Unmarried" @if (old('maritalStatus')=='Unmarried' )
                                        selected="selected" @endif>Unmarried</option>
                                    <option value="Divorced" @if (old('maritalStatus')=='Divorced' ) selected="selected"
                                        @endif>Divorced</option>
                                    <option value="Widowed" @if (old('maritalStatus')=='Widowed' ) selected="selected"
                                        @endif>Widowed</option>
                                    <option value="Awaiting Divorce" @if (old('maritalStatus')=='Awaiting Divorce' )
                                        selected="selected" @endif>Awaiting Divorce</option>
                                    <option value="Annulled" @if (old('maritalStatus')=='Annulled' ) selected="selected"
                                        @endif>Annulled</option>
                                    <option value="Widower" @if (old('maritalStatus')=='Widower' ) selected="selected"
                                        @endif>Widower</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Height / ऊंचाई :</label>
                                <select class="form-control select2" id="height" name="height">
                                    <option value="" disabled selected>Select Height</option>
                                    <option value="4ft 5in" @if (old('height')=='4ft 5in' ) selected="selected" @endif>
                                        4ft 5in</option>
                                    <option value="4ft 6in" @if (old('height')=='4ft 6in' ) selected="selected" @endif>
                                        4ft 6in</option>
                                    <option value="4ft 7in" @if (old('height')=='4ft 7in' ) selected="selected" @endif>
                                        4ft 7in</option>
                                    <option value="4ft 8in" @if (old('height')=='4ft 8in' ) selected="selected" @endif>
                                        4ft 8in</option>
                                    <option value="4ft 9in" @if (old('height')=='4ft 9in' ) selected="selected" @endif>
                                        4ft 9in</option>
                                    <option value="4ft 10in" @if (old('height')=='4ft 10in' ) selected="selected"
                                        @endif>4ft 10in</option>
                                    <option value="4ft 11in" @if (old('height')=='4ft 11in' ) selected="selected"
                                        @endif>4ft 11in</option>
                                    <option value="5ft" @if (old('height')=='5ft' ) selected="selected" @endif>5ft
                                    </option>
                                    <option value="5ft 1in" @if (old('height')=='5ft 1in' ) selected="selected" @endif>
                                        5ft 1in</option>
                                    <option value="5ft 2in" @if (old('height')=='5ft 2in' ) selected="selected" @endif>
                                        5ft 2in</option>
                                    <option value="5ft 3in" @if (old('height')=='5ft 3in' ) selected="selected" @endif>
                                        5ft 3in</option>
                                    <option value="5ft 4in" @if (old('height')=='5ft 4in' ) selected="selected" @endif>
                                        5ft 4in</option>
                                    <option value="5ft 5in" @if (old('height')=='5ft 5in' ) selected="selected" @endif>
                                        5ft 5in</option>
                                    <option value="5ft 6in" @if (old('height')=='5ft 6in' ) selected="selected" @endif>
                                        5ft 6in</option>
                                    <option value="5ft 7in" @if (old('height')=='5ft 7in' ) selected="selected" @endif>
                                        5ft 7in</option>
                                    <option value="5ft 8in" @if (old('height')=='5ft 8in' ) selected="selected" @endif>
                                        5ft 8in</option>
                                    <option value="5ft 9in" @if (old('height')=='5ft 9in' ) selected="selected" @endif>
                                        5ft 9in</option>
                                    <option value="5ft 10in" @if (old('height')=='5ft 10in' ) selected="selected"
                                        @endif>5ft 10in</option>
                                    <option value="5ft 11in" @if (old('height')=='5ft 11in' ) selected="selected"
                                        @endif>5ft 11in</option>
                                    <option value="6ft" @if (old('height')=='6ft' ) selected="selected" @endif>6ft
                                    </option>
                                    <option value="6ft 1in" @if (old('height')=='6ft 1in' ) selected="selected" @endif>
                                        6ft 1in</option>
                                    <option value="6ft 2in" @if (old('height')=='6ft 2in' ) selected="selected" @endif>
                                        6ft 2in</option>
                                    <option value="6ft 3in" @if (old('height')=='6ft 3in' ) selected="selected" @endif>
                                        6ft 3in</option>
                                    <option value="6ft 4in" @if (old('height')=='6ft 4in' ) selected="selected" @endif>
                                        6ft 4in</option>
                                    <option value="6ft 5in" @if (old('height')=='6ft 5in' ) selected="selected" @endif>
                                        6ft 5in</option>
                                    <option value="6ft 6in" @if (old('height')=='6ft 6in' ) selected="selected" @endif>
                                        6ft 6in</option>
                                    <option value="6ft 7in" @if (old('height')=='6ft 7in' ) selected="selected" @endif>
                                        6ft 7in</option>
                                    <option value="6ft 8in" @if (old('height')=='6ft 8in' ) selected="selected" @endif>
                                        6ft 8in</option>
                                    <option value="6ft 9in" @if (old('height')=='6ft 9in' ) selected="selected" @endif>
                                        6ft 9in</option>
                                    <option value="6ft 10in" @if (old('height')=='6ft 10in' ) selected="selected"
                                        @endif>6ft 10in</option>
                                    <option value="6ft 11in" @if (old('height')=='6ft 11in' ) selected="selected"
                                        @endif>6ft 11in</option>
                                    <option value="7ft" @if (old('height')=='7ft' ) selected="selected" @endif>7ft
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Complexion / रंग :</label>
                                <select class="form-control select2" id="complexion" name="complexion">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value="Very Fair" @if (old('Vcomplexion')=='Very Fair' ) selected="selected"
                                        @endif>Very Fair</option>
                                    <option value="Fair" @if (old('complexion')=='Fair' ) selected="selected" @endif>
                                        Fair</option>
                                    <option value="Wheatish" @if (old('complexion')=='Wheatish' ) selected="selected"
                                        @endif>Wheatish</option>
                                    <option value="Wheatish Brown" @if (old('complexion')=='Wheatish Brown' )
                                        selected="selected" @endif>Wheatish Brown</option>
                                    <option value="Dark" @if (old('complexion')=='Dark' ) selected="selected" @endif>
                                        Dark</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Manglik / मांगलिक :</label>
                                <select class="form-control select2" id="manglik" name="manglik">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value="Manglik" @if (old('manglik')=='Manglik' ) selected="selected" @endif>
                                        Manglik</option>
                                    <option value="Non-manglik" @if (old('manglik')=='Non-manglik' ) selected="selected"
                                        @endif>Non-manglik</option>
                                    <option value="Anshik manglik" @if (old('manglik')=='Anshik manglik' )
                                        selected="selected" @endif>Anshik manglik</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>gotra / गोत्र:</label>
                                <select class="form-control select2" id="gotra" name="gotra">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value=" झरिया शाखा" @if (old(' झरिया शाखा')==' झरिया शाखा' ) selected="selected" @endif>
                                        झरिया शाखा</option>
                                    <option value="हरदिहा शाखा" @if (old('हरदिहा शाखा')=='हरदिहा शाखा' ) selected="selected"
                                        @endif>हरदिहा शाखा</option>
                                    <option value="राठौर शाखा" @if (old('राठौर शाखा')=='राठौर शाखा' )
                                        selected="selected" @endif>राठौर शाखा</option>
                                        <option value="रंगहा" @if (old('रंगहा')=='रंगहा' )
                                        selected="selected" @endif>रंगहा</option>
                                        <option value="तेली वैश्य शाखा" @if (old('तेली वैश्य शाखा')=='तेली वैश्य शाखा' )
                                        selected="selected" @endif>तेली वैश्य शाखा</option>
                                        <option value="तरहाने तेली शाखा" @if (old('तरहाने तेली शाखा')=='तरहाने तेली शाखा' )
                                        selected="selected" @endif>तरहाने तेली शाखा</option>

                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
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
                    <div class="row">
                        <h2>Education &amp; Profession</h2>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Education / शैक्षणिक योग्यता :</label>
                                <input type="text" class="form-control" id="education" value="{{old('education')}}"
                                    name="education" placeholder="Enter Education">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Occupation / व्यवसाय :</label>
                                <input type="text" class="form-control" id="occupation" value="{{old('occupation')}}"
                                    name="occupation" placeholder="Enter Occupation" value="None">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Annual Income / वार्षिक आय : (Per/Year)</label>
                                <select class="form-control select2" name="annualIncome">
                                    <option value="" selected="selected" disabled>Select Income</option>
                                    <option value="Rs. 0|0" @if (old('annualIncome')=='Rs. 0|0' ) selected="selected"
                                        @endif>Rs. 0</option>
                                    <option value="Rs. 1 Lakh|100000" @if (old('annualIncome')=='Rs. 1 Lakh|100000' )
                                        selected="selected" @endif>Rs. 1 Lakh</option>
                                    <option value="Rs. 2 Lakh|200000" @if (old('annualIncome')=='Rs. 2 Lakh|200000' )
                                        selected="selected" @endif>Rs. 2 Lakh</option>
                                    <option value="Rs. 3 Lakh|300000" @if (old('annualIncome')=='Rs. 3 Lakh|300000' )
                                        selected="selected" @endif>Rs. 3 Lakh</option>
                                    <option value="Rs. 4 Lakh|400000" @if (old('annualIncome')=='Rs. 4 Lakh|400000' )
                                        selected="selected" @endif>Rs. 4 Lakh</option>
                                    <option value="Rs. 5 Lakh|500000" @if (old('annualIncome')=='Rs. 5 Lakh|500000' )
                                        selected="selected" @endif>Rs. 5 Lakh</option>
                                    <option value="Rs. 6 Lakh|600000" @if (old('annualIncome')=='Rs. 6 Lakh|600000' )
                                        selected="selected" @endif>Rs. 6 Lakh</option>
                                    <option value="Rs. 7 Lakh|700000" @if (old('annualIncome')=='Rs. 7 Lakh|700000' )
                                        selected="selected" @endif>Rs. 7 Lakh</option>
                                    <option value="Rs. 8 Lakh|800000" @if (old('annualIncome')=='Rs. 8 Lakh|800000' )
                                        selected="selected" @endif>Rs. 8 Lakh</option>
                                    <option value="Rs. 9 Lakh|900000" @if (old('annualIncome')=='Rs. 9 Lakh|900000' )
                                        selected="selected" @endif>Rs. 9 Lakh</option>
                                    <option value="Rs. 10 Lakh|1000000" @if (old('annualIncome')=='Rs. 10 Lakh|1000000'
                                        ) selected="selected" @endif>Rs. 10 Lakh</option>
                                    <option value="Rs. 11 Lakh|1100000" @if (old('annualIncome')=='Rs. 11 Lakh|1100000'
                                        ) selected="selected" @endif>Rs. 11 Lakh</option>
                                    <option value="Rs. 12 Lakh|1200000" @if (old('annualIncome')=='Rs. 12 Lakh|1200000'
                                        ) selected="selected" @endif>Rs. 12 Lakh</option>
                                    <option value="Rs. 13 Lakh|1300000" @if (old('annualIncome')=='Rs. 13 Lakh|1300000'
                                        ) selected="selected" @endif>Rs. 13 Lakh</option>
                                    <option value="Rs. 14 Lakh|1400000" @if (old('annualIncome')=='Rs. 14 Lakh|1400000'
                                        ) selected="selected" @endif>Rs. 14 Lakh</option>
                                    <option value="Rs. 15 Lakh|1500000" @if (old('annualIncome')=='Rs. 15 Lakh|1500000'
                                        ) selected="selected" @endif>Rs. 15 Lakh</option>
                                    <option value="Rs. 20 Lakh|2000000" @if (old('annualIncome')=='Rs. 20 Lakh|2000000'
                                        ) selected="selected" @endif>Rs. 20 Lakh</option>
                                    <option value="Rs. 25 Lakh|2500000" @if (old('annualIncome')=='Rs. 25 Lakh|2500000'
                                        ) selected="selected" @endif>Rs. 25 Lakh</option>
                                    <option value="Rs. 35 Lakh|3500000" @if (old('annualIncome')=='Rs. 35 Lakh|3500000'
                                        ) selected="selected" @endif>Rs. 35 Lakh</option>
                                    <option value="Rs. 50 Lakh|5000000" @if (old('annualIncome')=='Rs. 50 Lakh|5000000'
                                        ) selected="selected" @endif>Rs. 50 Lakh</option>
                                    <option value="Rs. 70 Lakh|7000000" @if (old('annualIncome')=='Rs. 70 Lakh|7000000'
                                        ) selected="selected" @endif>Rs. 70 Lakh</option>
                                    <option value="Rs. 1 crore - above" @if (old('annualIncome')=='Rs. 1 crore - above'
                                        ) selected="selected" @endif>Rs. 1 crore &amp; above</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pincode / पिन कोड :</label>
                                <input type="text" class="form-control" maxlength="6" value="{{old('pincode')}}"
                                    name="pincode" id="pincode" placeholder="Enter Pincode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>City / जिला :</label>
                                <input type="text" class="form-control" id="city" value="{{old('city')}}" name="city"
                                    placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>State / प्रदेश :</label>
                                <input type="text" class="form-control" id="state" value="{{old('state')}}" name="state"
                                    placeholder="Enter State">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Country / देश :</label>
                                <input type="text" class="form-control" id="country" value="{{old('country')}}"
                                    name="country" placeholder="Enter Country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contact Address / संपर्क पता :</label>
                                <input type="text" class="form-control" id="contactAddress"
                                    value="{{old('contactAddress')}}" name="contactAddress"
                                    placeholder="Enter Contact Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mobile No / मोबाइल नंबर :</label>
                                <input type="text" class="form-control" id="mobileNo" value="{{old('mobileNo')}}"
                                    name="mobileNo" value="" placeholder="Enter Mobile No">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email ID / ईमेल :</label>
                                <input type="text" class="form-control" id="email" value="{{old('email')}}" name="email"
                                    placeholder="Enter Email ID">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Phone No / अन्य फोन नंबर :</label>
                                <input type="text" class="form-control" id="otherPhoneNo"
                                    value="{{old('otherPhoneNo')}}" name="otherPhoneNo"
                                    placeholder="Enter Other Phone No">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Other Phone Number Relationship / अन्य फोन नंबर संबंध :</label>
                                <select class="form-control select2" id="phoneNoRelation" id="phoneNoRelation"
                                    name="phoneNoRelation">
                                    <option value="" selected="selected" disabled>Select Relationship</option>
                                    <option value="Father" @if (old('phoneNoRelation')=='Father' ) selected="selected"
                                        @endif>Father</option>
                                    <option value="Mother" @if (old('phoneNoRelation')=='Mother' ) selected="selected"
                                        @endif>Mother</option>
                                    <option value="Brother" @if (old('phoneNoRelation')=='Brother' ) selected="selected"
                                        @endif>Brother</option>
                                    <option value="Sister" @if (old('phoneNoRelation')=='Sister' ) selected="selected"
                                        @endif>Sister</option>
                                    <option value="Uncle" @if (old('phoneNoRelation')=='Uncle' ) selected="selected"
                                        @endif>Uncle</option>
                                    <option value="Aunty" @if (old('phoneNoRelation')=='Aunty' ) selected="selected"
                                        @endif>Aunty</option>
                                    <option value="Guardian" @if (old('phoneNoRelation')=='Guardian' )
                                        selected="selected" @endif>Guardian</option>
                                    <option value="Candidate" @if (old('phoneNoRelation')=='Candidate' )
                                        selected="selected" @endif>Candidate</option>
                                    <option value="Other" @if (old('phoneNoRelation')=='Other' ) selected="selected"
                                        @endif>Other</option>
                                </select>
                            </div>
                        </div>
                        <!-- <h2>Lifestyle &amp; Family</h2> -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father's Name / पिता का नाम :</label>
                                <input type="text" class="form-control" value="{{old('fatherName')}}" id="fatherName"
                                    name="fatherName" placeholder="Enter Father Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Father's Occupation / पिता का व्यवसाय :</label>
                                <input type="text" class="form-control" id="fatherOccupation"
                                    value="{{old('fatherOccupation')}}" name="fatherOccupation"
                                    placeholder="Enter Father's Occupation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mother's Name / मां का नाम :</label>
                                <input type="text" class="form-control" id="motherName" value="{{old('motherName')}}"
                                    name="motherName" placeholder="Enter Mother Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Mother's Occupation / मां का व्यवसाय :</label>
                                <input type="text" class="form-control" id="motherOccupation"
                                    value="{{old('motherOccupation')}}" name="motherOccupation"
                                    placeholder="Enter Mother's Occupation">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Brothers / भाई बंधु :</label>
                                <select class="form-control select2" id="brothers" name="brothers"
                                    onchange="loadMUMBrothers(this.value)">
                                    <option value="" selected="selected" disabled>Select</option>
                                    <option value="0" @if (old('brothers')=='0' ) selected="selected" @endif>0</option>
                                    <option value="1" @if (old('brothers')=='1' ) selected="selected" @endif>1</option>
                                    <option value="2" @if (old('brothers')=='2' ) selected="selected" @endif>2</option>
                                    <option value="3" @if (old('brothers')=='3' ) selected="selected" @endif>3</option>
                                    <option value="3+" @if (old('brothers')=='3+' ) selected="selected" @endif>More than
                                        3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="mUmBro" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Married Brothers :</label>
                                        <input type="text" class="form-control" maxlength="2" id="noOfMBrothers"
                                            value="{{old('noOfMBrothers')}}" name="noOfMBrothers"
                                            placeholder="Enter no of Married Brothers">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Unmarried Brothers :</label>
                                        <input type="text" class="form-control" maxlength="2"
                                            value="{{old('noOfUmBrothers')}}" id="noOfUmBrothers" name="noOfUmBrothers"
                                            placeholder="Enter no of Unmarried Brothers">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Sisters / बहने :</label>
                                <select class="form-control select2" id="sisters" name="sisters"
                                    onchange="loadMUMSisters(this.value)">
                                    <option value="" selected="selected" disabled>Select </option>
                                    <option value="0" @if (old('sisters')=='0' ) selected="selected" @endif>0</option>
                                    <option value="1" @if (old('sisters')=='1' ) selected="selected" @endif>1</option>
                                    <option value="2" @if (old('sisters')=='2' ) selected="selected" @endif>2</option>
                                    <option value="3" @if (old('sisters')=='3' ) selected="selected" @endif>3</option>
                                    <option value="3+" @if (old('sisters')=='3+' ) selected="selected" @endif>More than
                                        3</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="mUmSis" style="display:none">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Married Sisters :</label>
                                        <input type="text" class="form-control" value="{{old('noOfMSisters')}}"
                                            maxlength="2" id="noOfMSisters" name="noOfMSisters"
                                            placeholder="Enter no of Married Sisters">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No of Unmarried Sisters :</label>
                                        <input type="text" class="form-control" value="{{old('noOfUmSisters')}}"
                                            maxlength="2" id="noOfUmSisters" name="noOfUmSisters"
                                            placeholder="Enter no of Unmarried Sisters">
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

<script type="text/javascript" src="{{ asset('frontend_assets/js/croppie.js') }}"></script>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

      $('.crop_image').click(function(event){
        $image_crop.croppie('result', {
          type: 'canvas',
          size: 'viewport'
        }).then(function(response){
            $("#loaderImg").show();
            $('.crop_image').attr('disabled', true)
            $.ajax({
                url:'{{route("crop")}}',
                type:'POST',
                data:{"image":response},
                dataType:'JSON',
                success:function(data){
                    $('#insertimageModal').modal('hide');


                    if(data.success) {
                        console.log(data)
                        $('#insertimageModal').modal('hide');
                        $('#imageName').val(data.result);
                        load_images(data.result);
                        // alert(data.result)
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
            $("#imagePreview").html('<img src="{{(asset('uploads/profileimage'))}}/'+imageName+'" class="img-thumbnail" />');
      }
    });
    function loadImagePreview() {
        $('#imagePreviewModel').modal('show');
    }
</script>

<script>
    $('.timepicker').wickedpicker();
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
</script>


@endsection
