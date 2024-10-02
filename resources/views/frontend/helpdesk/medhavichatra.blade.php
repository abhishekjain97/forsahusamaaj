@extends('layouts.master')

@section('content')

<div class="tp-dashboard-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-12 dashboard-nav">
                <ul class="nav nav-pills nav-justified">
                    <li class="active"><a href="{{route('kids')}}">बच्चों के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li><a href="{{route('young')}}">युवाओ के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i> </a></li>
                    <li><a href="{{route('womens')}}">महिलाओं के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li ><a><i class="fa fa-angle-double-right"></i> बुज़ुर्गों के लिए </a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

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
                            <li class=""><a
                                    href="{{route('kids')}}">छात्रवृत्ति</a></li>
                            <li class="active"><a href="javascript:void(0)">मेघावी
                                    छात्र सम्मान</a></li>
                            <li class=""><a
                                    href="{{route('pratiyogita')}}">प्रतियोगिता/गतिविधि</a>
                            </li>
                            <li class=""><a href="{{route('careermargdarshan')}}">कैरियर
                                    मार्गदर्शन</a></li>
                            <!-- <li class=""><a href="helpdesk/paramarsh">परामर्श</a></li> -->
                        </ul>
                    </div>
                    <div class="col-md-10" style="padding: 0px 20px;">
                        <div>
                            <div class="sticky-sign"><i class="fa fa-bookmark"></i></div>
                            <h2 class="post-title">
                                <a href="#"><i class="fa fa-caret-right" aria-hidden="true"></i> मेघावी छात्र सम्मान /
                                    Meritorious student honor</a>
                            </h2>
                            <h3 class="heading-h3"> मेघावी छात्र सम्मानं </h3>
                            <p>कोरी समाज के संगठनों एवं सार्वदेशिक कोरी युवा प्रतिनिधि संस्था की ओर से 10वीं और
                                12वीं बोर्ड की परीक्षा में उत्कृष्ट प्रदर्शन करनेवाले छात्र-छात्राओं को प्रोत्साहित और
                                पुरुस्कृत करने के लिए हर साल मेधावी छात्र सम्मान समारोह का आयोजन किया जाता है। मेधावी
                                छात्र सम्मान समारोह में उन सभी विद्यार्थियों को सम्मानित किया जाता हैं जो 10वीं एवं
                                12वीं कक्षा में मध्यप्रदेश बोर्ड से 70 % या उससे अधिक और सीबीएसई एवं आईसीएसई बोर्ड से 80
                                % या उससे अधिक अंक प्राप्त किये हो।<br /><br />

                                मेधावी छात्र सम्मान समारोह कोरी समाज का एक सराहनीय और उत्कृष्ट कार्यक्रम है, जिसमें
                                छात्र एवं छात्राओं का उत्साहवर्धन किया जाता हैं । मेधावी छात्र सम्मान समारोह से छात्रों
                                को काफी उत्साह मिलता है।</p>

                            <h3 class="heading-h3">मेधावी छात्र सम्मान से सम्मानित विद्यार्थी कोरी समाज की प्रतिभा है
                                ।</h3>
                            <p>मेधावी छात्र एवं छात्राओं को प्रोत्साहित करके समाज भावी पीढ़ी के बेहतर भविष्य का खाका
                                तैयार कर सकता है।<br />
                                विद्यार्थी देश का वर्तमान और भविष्य होते है। इन्हें बेहतर शिक्षा देकर ही हम उन्नतिशील
                                समाज का निर्माण कर सकते है।<br />
                                बेहतर माहौल देने के उद्देश्य से समाज द्वारा मेधावी छात्र एवं छात्राओं को सम्मानित और
                                प्रोत्साहित किया जाना अति आवश्यक है। इससे एक स्वस्थ प्रतिस्पर्धा समाज में आएगी जो समाज
                                को विश्व के मंच पर स्थापित करेगी।<br />
                                विद्यार्थी यह मुकाम कठिन परिश्रम से प्राप्त करता है। ऐसे विद्यार्थियों को सम्मानित
                                करने से समाज व राष्ट्र का कल्याण होता हैं।<br />
                                सम्मान समारोह द्वारा समाज में सकारात्मक बदलाव लाया जा सकता है। मेघावी छात्र सम्मान उसी
                                का एक उदाहरण है।<br />
                                समाज की प्रतिभा को आगे बढ़ाने में इस तरह के मंच किसी भी विद्यार्थी के जीवन के लिए मील का
                                पत्थर साबित हो सकते हैं। सकारात्मक एवं अच्छी सोच के साथ परिश्रम करने पर सफलता की मंजिल
                                तक पहुंचने से उन्हें कोई रोक नहीं सकता है।<br /><br />

                                यह मेघावी छात्र सम्मान में पंजीयन हेतु जानकारी दी गयी है।<br />
                                <b>छात्रवृत्ति प्राप्त करने / मेधावी छात्र सम्मान के लिए नीचे दिए गए फॉर्म को भरेें,</b>
                                <form action="#" method="post"
                                    id="getScholarshipForm" class="getScholarshipForm" enctype="multipart/form-data">
                                    <div class="row well-box">
                                        <div class="col-md-6">
                                            <label class="control-label">Name / नाम<span
                                                    class="required">*</span></label>
                                            <input name="name" type="text" placeholder="Enter Name"
                                                class="form-control input-md">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="hidden" value="" id="imageName" name="photoUpload" />
                                            <label class="control-label">Photo Upload / तस्वीर संलग्न करें<span
                                                    class="required">*</span></label>
                                            <input type="file" class="form-control" name="insert_image"
                                                id="insert_image" accept="image/*">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Father Name / पिता का नाम<span
                                                    class="required">*</span></label>
                                            <input name="fatherName" type="text" placeholder="Enter Father Name"
                                                class="form-control input-md">
                                        </div>
                                        <div class="col-md-6" style="margin-bottom:13px">
                                            <label class="control-label">Gender / लिंग<span
                                                    class="required">*</span></label>
                                            <div style="margin-top:10px">
                                                <input type="radio" name="gender" value="male" checked=""> Male
                                                <input type="radio" name="gender" value="female"> Female
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">DOB / जन्म तिथि<span
                                                    class="required">*</span></label>
                                            <input name="dob" id="dob" type="text" placeholder="Enter DOB"
                                                class="form-control input-md" autocomplete="off">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Contact Number / सम्पर्क सूत्र<span
                                                    class="required">*</span></label>
                                            <input name="mobileNumber" type="text" placeholder="Enter Contact Number"
                                                class="form-control input-md">
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
                                        <div class="col-md-6">
                                            <label class="control-label">Class Name / कक्षा <span
                                                    class="required">*</span></label>
                                            <input name="className" type="text" placeholder="Enter Class Name"
                                                class="form-control input-md">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">School Name / विद्यालय का नाम</label>
                                            <input name="schoolName" type="text" placeholder="Enter School Name"
                                                class="form-control input-md">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="control-label">Current/Preview Perchantage / वर्तमान / पूर्व
                                                प्रतिशत(%)</label>
                                            <input name="perchantage" type="text" placeholder="Enter Perchantage"
                                                class="form-control input-md">
                                        </div>
                                        <!-- <div class="col-md-6">
                                            <label class="control-label">Registration ID</label><br/> <span style="color: #7a7b72;font-weight:bold;font-size: 13px;">(If not registered on Mahasampark Abhiyan, Click <a href="home/signup" target="_blank">here</a> for registration)</span>
                                            <input name="mahasamparkId" type="text" placeholder="Enter Valid Registration ID" class="form-control input-md">
                                        </div> -->
                                        <div class="col-md-12 mt10">
                                            <button type="submit" class="btn btn-default">Submit</button>
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                               
                            </p>
                            <p>क्या आपने अपने परिवार की जानकारी कोरी समाज महासम्पर्क अभियान में भर दी है ? अगर नहीं तो
                                अभी भरें। इसे भरने में मात्र दो मिनिट का समय अवश्य लगेगा परन्तु इससे कोरी समाज को आपका
                                महत्वपूर्ण सहयोग प्राप्त होगा। कोरी समाज महासम्पर्क अभियान के प्रपत्र (फार्म) में
                                जानकारी भरने पर कोई सदस्यता शुल्क नहीं है अभियान पूर्णता नि:शुल्क है। <a
                                    href="{{route('contactsignup')}}" class="btn btn-default btn-xs1">Join
                                    Mahasampark Abhiyan</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection