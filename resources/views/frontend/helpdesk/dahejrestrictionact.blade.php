@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">महिलाओं के लिए</li>
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
                    <li ><a href="{{route('kids')}}">बच्चों के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li><a href="{{route('young')}}">युवाओ के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i> </a></li>
                    <li class="active"><a href="{{route('womens')}}">महिलाओं के लिए<i class="fa fa-angle-double-down" aria-hidden="true"></i></a></li>
                    <li ><a><i class="fa fa-angle-double-right"></i> बुज़ुर्गों के लिए </a></li>
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
                    <h1><a href="javascript:void(0)"> महिलाओं के लिए / For Womens </a></h1>

                </div>
            </div>
            <div class="col-md-12 mt20">
                <div class="row well-box">
                    <div class="col-md-2 widget widget-category" style="border-right: 1px solid #dedbd5;">
                        <ul class="listnone angle-double-right">
                            <li class=""><a href="{{route('womens')}}">महिला सशक्तीकरण </a>
                            </li>
                            <li class="active"><a href="{{route('dahejrestrictionact')}}">दहेज
                                    प्रतिबंध अधिनियम</a></li>
                        </ul>
                    </div>

                    <div class="col-md-10" style="padding: 0px 20px;">
                        <div>
                            <div class="sticky-sign"><i class="fa fa-bookmark"></i></div>
                            <h2 class="post-title">
                                <a href="javascript:void(0)"><i class="fa fa-caret-right" aria-hidden="true"></i>दहेज
                                    प्रतिबंध अधिनियम</a>
                            </h2>
                            <h3 class="heading-h3"> यह क़ानून किस बारे में है?</h3>

                            <p>यह अधिनियम विवाह के समय, दोनों पक्षों पर, दहेज देने या लेने की प्रथा पर रोक लगाताहैl यह
                                क़ानून दहेज की माँग करने और विज्ञापन देने पर भी दण्डित करता हैl<br /><br />

                                दहेज से जुड़े गंभीर अपराध जैसे दहेज़ मृत्युऔर दहेज़ से जुड़ी क्रूरता भारतीय दंड संहिता के
                                तहत दंडनीय हैंl<br /><br />

                                यह क़ानून विवाह पक्षों को उपहारों की एक सूची बनाने के लिए कर्तव्यबद्ध करता
                                हैl<br /><br />

                                इसके बावजूद भी यदि किसी शादी में दहेज का आदान प्रदान हुआ है, तो यह क़ानून आदेश देता है कि
                                जिस व्यक्ति को दहेज मिला है, उसे वह वधू को देना होगा I<br /><br />

                                दहेज प्रथा निषेध अधिनियम-यह कानून दहेज लेने और दहेज देने दोनों ही चिज़ों को रोकने के लिए
                                बनाया गया है।और साथ ही साथ दहेज लेना और दहेज देना ये दोनों ही इस कानून के तहत अपराध
                                है।यदि कोई व्यक्ति जो दहेज देता है या फिर दहेज की मांग करता है या दहेज लेता है वो इस
                                कानून के तहत अपराध करता है।
                            </p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #d6d8db;">
                                            <th>दहेज क्या है  </th>
                                            <th>किसके द्वारा दिया जाता है</th>
                                            <th>किसको दिया जाता है </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>धन और संपत्ति सहित कोई भी मूल्यवान वस्तु </td>
                                            <td>दुल्हन/ दूल्हा उनके माता पिता या कोई और </td>
                                            <td>दुल्हन या दूल्हा,उनके माता-पिता या कोई और</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>दहेज, शादी के संबंध में किसी भी समय दिया जा सकता है<br /><br />
                                मुसलमानों के निजी कानूनों के अनुसार, निकाह के दौरान, वधू को वर पक्ष की ओर से धन या
                                संपत्ति दी जाती है, जिसकी वह हक़दार है । इसे मेहर कहते हैं और इसे दहेज की परिभाषा में
                                शामिल नहीं किया गया है ।<br /><br />
                                दहेज के लिए एक समझौता दंडनीय है, भले ही असली दहेज का भुगतान न हो।
                            </p>
                            <h3 class="heading-h3"> दहेज लेने या देने पर क्या सज़ा निर्धारित की गई है?</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #d6d8db;">
                                            <th>किसे दंडित किया जा सकता है </th>
                                            <th>जेल की अवधि</th>
                                            <th>जुर्माना</th>
                                            <th>अपवाद</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>कोई भी व्यक्ति जो दहेज देता है या लेता है </td>
                                            <td>कोई भी व्यक्ति जो दहेज देने या लेने में किसी की सहायता करता है </td>
                                            <td></td>
                                            <td>कम से कम 5 वर्ष</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>
                                राज और सिमरन शादी कर रहे हैंI सिमरन के पिता;सीतापति ने राज के पिता राजा भोज को दहेज के
                                रूप में 10 लाख रुपये और एक गाड़ी भेंट कीIसीतापति और राजा भोज दोनों को 5 साल तक के लिए
                                कारावास की सज़ा दी जा सकती है । साथ ही उन्हें 10 लाख रूपये और गाड़ी का मूल्य भी जुर्माने
                                के तौर पर देने को कहा जाएगा I</p>

                            <h3 class="heading-h3">क्या शादी के समय उपहार देना भी जुर्म है?</h3>
                            <p>शादी में वर/वधू पक्ष द्वारा तोहफे या उपहार देना दंडनीय नहीं है, यदि यह स्वेच्छा से किया
                                गया हो।<br /><br />
                                नियमों के अनुसार उपहारों को एक सूची में दर्ज़ किया जाना चाहिए <a
                                    href="https://wcd.nic.in/act/dowry-prohibition-rules">(दहेज निषेध नियमावली के नियम २
                                    के अनुसार)।</a><br /><br />
                                वधू पक्ष की ओर से उपहार, रिवाज़ और व्यक्ति की वित्तीय क्षमता को ध्यान में रख कर दिया जाना
                                चाहिए ।
                            </p>
                            <h3 class="heading-h3">दहेज की माँग करने पर क्या सज़ा दी जाती है?</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #d6d8db;">
                                            <th>किसे दंडित किया जा सकता है </th>
                                            <th>जेल की अवधि</th>
                                            <th>जुर्माना</th>
                                            <th>अपवाद</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>कोई भी व्यक्ति जो वर या वधू पक्ष से दहेज की माँग करता है </td>
                                            <td></td>
                                            <td>6 महीने से 2 साल के बीच </td>
                                            <td>10,000 रूपए तक</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>उदाहरण : शादी के दिन,राजा भोज (लड़के के पिता)ने सुपंदी (जिसने रिश्ता करवायाहै ) द्वारा
                                सीतापति (लड़की के पिता) को कहलवाया कि यदि 10 लाख रूपए का इंतज़ाम नहीं हो पाया तो वह यह
                                शादी नहीं होने देंगेI ऐसी परिस्थिति में सीतापति पुलिस स्टेशन जाकर राजा भोज और सुपंदी,
                                दोनों के खिलाफ़ दहेज माँगने की शिकायत को दर्ज़ करवा सकते हैं I</p>
                            <h3 class="heading-h3">दहेज के लिए विज्ञापन देने की क्या सज़ा तय की गई है?</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr style="background-color: #d6d8db;">
                                            <th></th>
                                            <th>कारावास की अवधि </th>
                                            <th>जुर्माना</th>
                                            <th>अपवाद</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>-ऐसा कोई भी व्यक्ति जो अपने बेटे या बेटी या सम्बन्धीसे शादी करने के लिए
                                                , संपत्ति या व्यापार में हिस्सा देने का इश्तहार देता है </td>
                                            <td>-ऐसा कोई भी व्यक्ति जो इस प्रकार के इश्तहार प्रकाशित करता है </td>
                                            <td></td>
                                            <td>6 महीने– 5 साल</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <p>उदाहरण : सीतापति अखबार में इश्तहार छपवाता है कि उसकी बेटी से शादी करने पर वह अपनी जायदाद
                                का आधा हिस्सा वर के नाम कर देगा; ऐसी परिस्थिति में सीतापति और अखबार के प्रकाशक, दोनों को
                                इस क़ानून के तहत दण्डित किया जा सकता है l</p>
                            <h3 class="heading-h3">दहेज के मामलों पर किन अदालतों में सुनवाई हो सकती है?</h3>
                            <p>इस कानून के तहत दहेज के अपराध के मामलों का विचारण निम्नलिखित न्यायालयों में हो सकता है:-
                            </p>
                            <div class="widget widget-category" id="get">
                                <ul class="listnone angle-double-right">
                                    <li><a href="#">महानगर मजिस्ट्रेट (अधिक जनसँख्या वाले शहरी क्षेत्र)</a></li>
                                    <li><a href="#">प्रथम वर्ग न्यायिक मजिस्ट्रेट</a></li>
                                    <li><a href="#">कोई उच्च न्यायलय (जैसे कि सेशन न्यायालय)</a></li>
                                </ul>
                            </div>
                            <h3 class="heading-h3">इस क़ानून के तहत केस अदालत तक कैसे आता है?</h3>
                            <p>अदालत में न्यायिक प्रक्रिया तब शुरू होती है जब उसे इस कानून के तहत अपराध घटित होने की
                                सूचना प्राप्त होती है–</p>
                            <div class="widget widget-category" id="get">
                                <ul class="listnone angle-double-right">
                                    <li><a href="#">जज की जानकारी से</a></li>
                                    <li><a href="#">पुलिस के चालान पेश करने
                                            पर</a></li>
                                    <li><a href="#">कपीड़ित या उसके रिश्तेदार द्वारा की गई निजी शिकायत</a></li>
                                    <li><a href="#">सरकार द्वारा चिन्हित सामाजिक संस्था द्वारा की गयी शिकायत ।</a></li>
                                </ul>
                            </div>
                            <p>स्त्रोत: <a href="https://nyaaya.in/hi/law-explainers/dowry-prohibition/">न्याय</a></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection