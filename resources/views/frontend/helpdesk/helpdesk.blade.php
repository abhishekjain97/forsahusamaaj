@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">बच्चों के लिए</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a><i class="fa fa-angle-double-right"
                                aria-hidden="true"></i> बच्चों के लिए</a>
                    </li>
                    <li><a href="{{route('young')}}"> युवाओ के लिए <i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li><a href="{{route('womens')}}">महिलाओं के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li><a href="{{route('oldpeople')}}"> बुज़ुर्गों के लिए <i class="fa fa-angle-double-down" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <!-- <h1>बच्चों के लिए</h1> -->
                    <h1><a href="javascript:void(0)"> बच्चों के लिए / For Children </a></h1>

                </div>
            </div>
            <div class="col-md-12 mt20">
                <div class="row well-box">
                    <div class="col-md-2 widget widget-category" style="border-right: 1px solid #dedbd5;">
                        <ul class="listnone angle-double-right">
                            <li class="active"><a href="javascript:void(0)">छात्रवृत्ति</a></li>
                            <li class=""><a href="{{route('medhavichatra')}}">मेघावी छात्र
                                    सम्मान</a></li>
                            <li class=""><a
                                    href="{{route('pratiyogita')}}">प्रतियोगिता/गतिविधि</a>
                            </li>
                            <li class=""><a href="{{route('careermargdarshan')}}">कैरियर
                                    मार्गदर्शन</a></li>
                            <!-- <li class=""><a href="helpdesk/paramarsh">परामर्श</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-10" style="padding: 0px 20px;">
                        <div class="sticky-sign"><i class="fa fa-bookmark"></i></div>
                        <h2 class="post-title">
                            <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> छात्रवृत्ति /
                                Scholarship</a>
                        </h2>
                        <div>
                            <div class="widget widget-category" id="get">
                                <ul class="listnone angle-double-right">
                                    <li><a href="#get">पितृ शिक्षा स्मृति छात्रवृत्ति योजना</a></li>
                                    <li><a href="#give">क्या आप अपने पूर्वजों की स्मृति में पितृ स्मृति छात्रवृत्ति
                                            देना चाहते हैं ।</a></li>
                                </ul>
                            </div>
                            <hr />
                            <h3 class="heading-h3">छात्रवृत्ति क्या हैं </h3>
                            <p>विद्यार्थी को अपनी शिक्षा पूरी करने हेतु आर्थिक सहायता छात्रवृत्ति के रूप में दी जाती है।
                                छात्रवृत्ति प्रदान करने के अनेक आधार होते हैं, जैसे- मेधावी छात्र, निर्धन छात्र, आदि।
                                छात्रवृत्ति में प्राप्त राशि वापस लौटानी नहीं पड़ती हैं।</p>

                            <h3 class="heading-h3">पितृ शिक्षा स्मृति छात्रवृत्ति योजना </h3>
                            <p>आजकल बच्चों की स्कूल फीस भरना भी कठिन हो चला है। बड़े-बड़े स्कूलों की मोटी फीस भरना हर किसी
                                के बस की बात नहीं है, यहां तक कि एक मध्यवर्गीय परिवार या गरीब परिवारों के लिए एक अच्छे
                                स्कूल में बच्चे की नर्सरी की पढ़ाई का खर्च उठाना तक मुश्किल हो रहा है। ऐसे में जरूरत खड़ी
                                होती है एक ऐसी योजना की जो अपने समाज के बच्चे की स्कूल फीस में आर्थिक मदद कर सके। कोरी
                                समाज में आज ऐसे कुछ लोग मौजूद हैं, जो समाज के बच्चों की स्कूली पढ़ाई के लिए आर्थिक सहायता
                                छात्रवृत्ति के रूप में मुहैया कराते हैं।</p>

                            <p>स्वजाति बंधुओं की निस्वार्थ सहायता तथा उनके लिए आगे बढ़कर हर सम्भव मदद करने का भाव कोरी
                                समाज सेवी कर्मचारी संगठन की संस्कृति का आधार है। इस भाव से कोरी समाज के कुछ परिवारों ने
                                निर्धन को आर्थिक सहायता, शिक्षा हेतु छात्रवृत्ति, रोजगार हेतु अनुदान, बीमार, निर्धन,
                                विधवा और आर्थिक रूप से कमजोर जरूरतमंद को हर सम्भव मदद पहुंचाने का संकल्प लिया हैं।</p>

                            <p>संकल्पित कोरी समाज के कुछ परिवारों ने कोरी समाज सेवी कर्मचारी संगठन के माध्यम से अपने
                                देवतुल्य पूर्वजों की स्मृति में पितृ स्मृति छात्रवृत्ति नाम से छात्रवृत्ति देना शुरू की
                                है जिसके अंतर्गत प्रत्येक परिवार अपने पूर्वजों की स्मृति में रुपये 5000 या उससे अधिक की
                                राशि संस्था के माध्यम से छात्रवृत्ति के रूप में समाज के जरूरतमंदों को सहायता स्वरूप
                                प्रदान की जाती है।</p>

                            <p>कोरी समाज के ऐसे स्वजाति बंधु जिन्हें परिस्थितिवश अपने परिवार के लिए आर्थिक सहायता की
                                आवश्यकता है। वह सभी संस्था के माध्यम से सहायता प्राप्त कर सकते हैं ।<br /><br>

                                <b>छात्रवृत्ति सहायता प्राप्त करने के लिए कृपया फार्म को ध्यान पूर्वक देखें सभी
                                    विशिष्टियां (कॉलम) सही एवं स्पष्ट भरें ।</b>
                            </p>
                            <form action="#" method="post"
                                id="getScholarshipForm" class="getScholarshipForm">
                                <div class="row well-box">
                                    <div class="col-md-6">
                                        <label class="control-label">Name / नाम<span class="required">*</span></label>
                                        <input name="getName" type="text" placeholder="Enter Name"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Photo Upload / तस्वीर संलग्न करें</label>
                                        <input type="file" class="form-control" id="photoUpload" name="getPhotoUpload">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Father Name / पिता का नाम<span
                                                class="required">*</span></label>
                                        <input name="getFatherName" type="text" placeholder="Enter Father Name"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6" style="margin-bottom:13px">
                                        <label class="control-label">Gender / लिंग</label><span
                                            class="required">*</span>
                                        <div style="margin-top:10px">
                                            <input type="radio" name="genderGetSp" value="male" checked=""> Male
                                            <input type="radio" name="genderGetSp" value="female"> Female
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">DOB / जन्म तिथि<span
                                                class="required">*</span></label>
                                        <input name="getDob" type="text" placeholder="Enter DOB"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Contact Number / सम्पर्क सूत्र <span
                                                class="required">*</span></label>
                                        <input name="getMobileNumber" type="text" placeholder="Enter Contact Number"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Email / ईमेल</label>
                                        <input name="getEmailId" type="email" placeholder="Enter Email"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">City / शहर<span class="required">*</span></label>
                                        <input name="getCity" type="text" placeholder="Enter City"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Class Name / कक्षा<span
                                                class="required">*</span></label>
                                        <input name="getClassName" type="text" placeholder="Enter Class Name"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">School Name / विद्यालय का नाम</label>
                                        <input name="getSchoolName" type="text" placeholder="Enter School Name"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Current/Preview Perchantage / वर्तमान / पूर्व
                                            प्रतिशत</label>
                                        <input name="getPerchantage" type="text"
                                            placeholder="Enter Current/Preview Perchantage"
                                            class="form-control input-md">
                                    </div>
                                    <div class="col-md-12 mt10">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                        <button type="button" class="btn btn-primary"
                                            data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                                <p>क्या आपने अपने परिवार की जानकारी कोरी समाज महासम्पर्क अभियान में भर दी है ? अगर
                                    नहीं तो अभी भरें। इसे भरने में मात्र दो मिनिट का समय अवश्य लगेगा परन्तु इससे कोरी
                                    समाज को आपका महत्वपूर्ण सहयोग प्राप्त होगा। कोरी समाज महासम्पर्क अभियान के प्रपत्र
                                    (फार्म) में जानकारी भरने पर कोई सदस्यता शुल्क नहीं है अभियान पूर्णता नि:शुल्क है। <a
                                        href="{{route('contactsignup')}}" class="btn btn-default btn-xs1">Join
                                        Mahasampark Abhiyan</a></p>
                                {{-- <hr id="give" />

                                <h3 class="heading-h3">क्या आप अपने पूर्वजों की स्मृति में पितृ स्मृति छात्रवृत्ति देना
                                    चाहते हैं ।</h3>
                                <p>क्या आप अपने पूर्वजों की स्मृति में अपने स्वजाति बंधुओं की सहायता करना चाहते हैं।अपने
                                    पूर्वजों को इस पुण्य कार्य के माध्यम से श्रद्धांजलि अर्पित करना चाहते है।</p>

                                <h3 class="heading-h3">पितृ शिक्षा स्मृति छात्रवृत्ति योजना </h3>
                                <p>
                                    पितृ स्मृति छात्रवृत्ति सहायता एक ऐसी योजना हैं जो कोरी समाज के स्वजाति बंधुओं के
                                    बच्‍चे की स्‍कूल फीस में आर्थिक मदद करती है। कोरी समाज में आज ऐसे परिवार मौजूद
                                    हैं, जो अपने देवतुल्य पूर्वजों की स्मृति में समाज के बच्चों की स्‍कूली पढ़ाई के लिए
                                    आर्थिक सहायता "पितृ स्मृति छात्रवृत्ति" के रूप में मुहैया कराते हैं।<br /><br />

                                    पितृ स्मृति छात्रवृत्ति सहायता के माध्यम से कोरी समाज के कुछ परिवारों ने निर्धन को
                                    आर्थिक सहायता, शिक्षा हेतु छात्रवृत्ति, बीमार, निर्धन, विधवा और आर्थिक रूप से कमजोर
                                    जरूरतमंद को हर सम्भव मदद पहुंचाने का संकल्प लिया हैं। इन परिवारों ने सार्वदेशिक
                                    कोरी युवा प्रतिनिधि संस्था के माध्यम से अपने देवतुल्य पूर्वजों की स्मृति में "पितृ
                                    स्मृति छात्रवृत्ति" नाम से छात्रवृत्ति देना शुरू की है। जिसके अंतर्गत परिवार अपने
                                    पूर्वजों की स्मृति में रुपये 5000 या उससे अधिक की राशि संस्था के माध्यम से कोरी
                                    समाज के ऐसे जरूरतमंद स्वजाति बंधुओं को उपलब्ध करते है जिन्हें किसी परिस्थितिवश अपने
                                    परिवार के लिए आर्थिक सहायता की आवश्यकता है।<br /><br />

                                    आप अपने पूर्वजों की स्मृति में श्रद्धांजलि स्वरूप अपने स्वजाति बंधुओं की सहायता देना
                                    शुरू करें ।<br /><br />

                                    <b>छात्रवृत्ति सहायता शुरू करने के लिए कृपया फार्म देखें और सभी विशिष्टियां (कॉलम)
                                        सही एवं स्पष्ट भरें ।</b>
                                    <form action="#" method="post" id="giveScholarshipForm" class="giveScholarshipForm">
                                        <div class="row well-box">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Name (In memory of ) / नाम (इन की स्मृति
                                                    में )<span class="required">*</span></label>
                                                <input name="name" type="text" placeholder="Enter Name"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6" style="margin-bottom:13px">
                                                <label class="control-label">Gender / लिंग<span
                                                        class="required">*</span></label>
                                                <div style="margin-top:10px">
                                                    <input type="radio" name="genderGiveSp" value="male" checked="">
                                                    Male
                                                    <input type="radio" name="genderGiveSp" value="female"> Female
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Photo Upload / तस्वीर संलग्न करें</label>
                                                <input type="file" class="form-control" id="photoUpload"
                                                    name="photoUpload">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Date of Birth / जन्मतिथि<span
                                                        class="required">*</span></label>
                                                <input name="dob" type="text" placeholder="Enter Date of Birth"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Death of Anniversary / पुण्यतिथि<span
                                                        class="required">*</span></label>
                                                <input name="doa" type="text" placeholder="Enter Death of Anniversary"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Scholarship Amount / छात्रवृत्ति राशि<span
                                                        class="required">*</span></label>
                                                <input name="amount" type="text" placeholder="Enter Scholarship Amount"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Name of Provider / प्रदाता का नाम<span
                                                        class="required">*</span></label>
                                                <input name="nameProvider" type="text"
                                                    placeholder="Enter Name of Provider" class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">RelationShip / रिश्ता<span
                                                        class="required">*</span></label>
                                                <input name="relationShip" type="text" placeholder="Enter RelationShip"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Contact Number / सम्पर्क सूत्र<span
                                                        class="required">*</span></label>
                                                <input name="mobileNumber" type="text"
                                                    placeholder="Enter Contact Number" class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">Email / ईमेल</label>
                                                <input name="emailId" type="email" placeholder="Enter Email"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="control-label">City / शहर<span
                                                        class="required">*</span></label>
                                                <input name="city" type="text" placeholder="Enter City"
                                                    class="form-control input-md">
                                            </div>
                                            <div class="col-md-12 mt10">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                                <button type="button" class="btn btn-primary"
                                                    data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                    <p>क्या आपने अपने परिवार की जानकारी कोरी समाज महासम्पर्क अभियान में भर दी है ? अगर
                                        नहीं तो अभी भरें। इसे भरने में मात्र दो मिनिट का समय अवश्य लगेगा परन्तु इससे
                                        कोरी समाज को आपका महत्वपूर्ण सहयोग प्राप्त होगा। कोरी समाज महासम्पर्क अभियान
                                        के प्रपत्र (फार्म) में जानकारी भरने पर कोई सदस्यता शुल्क नहीं है अभियान पूर्णता
                                        नि:शुल्क है। <a href="#" class="btn btn-default btn-xs1">Join Mahasampark
                                            Abhiyan</a></p>
                                </p> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection