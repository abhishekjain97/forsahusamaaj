<!DOCTYPE html>
<html lang="en">



<head>
    <title>Sahu Samaj</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="यहाँ साहू समाज के संबंध में संक्षिप्त जानकारी प्रस्तुत की जा रही है। विस्तृत जानकारी वेबसाइट की ई-पत्रिका में आपको उपलब्ध हो सकेगी www.korissks.org वेबसाइट का निर्माण एक बडे ही पवित्र उद्देश्य को सामने रखकर किया है।  साहू समाज के पूर्वजों के कार्यों और विचारों का प्रचार-प्रसार देश के कोने-कोने में प्रत्येक समाज तक हो और इसका क्षेत्र न केवल भारत हो अपितु संसार के अन्य देशों में भी रसे-बसे साहू जन तक हो। इस उद्देश्य की सफलता हेतु साहू समाज सेवी कर्मचारी संगठन ने वेबसाइट के माध्यम से प्रयास प्रारंभ कर इन्टरनेट और सोशल साइटस् के जरिये भारत के बाहर के देश अमेरिका माॅरिथस, हालैण्ड, इंग्लैण्ड आदि आदि देशों में भी साहू समाज महासम्पर्क अभियान शुरू किया जा रहा हैं। लक्ष्य बड़ा पवित्र व विशाल है, इस हेतु हम श्रेष्ठ समाज को एक बनाने का घोष करते हैं। साहू समाज का इतिहास और समाज के महापुरुषों का जीवन प्रारम्भ से ही संघर्षमय रहा है। विगत् हजारों वर्षों से व्याप्त अकर्मण्यता एवं अज्ञान ने समाज को अपना अहित मानकर उसका पुरजोर विरोध किया, किन्तु हिमालय सी दृढ़ता रखने वाले त्यागी, बलिदानियों का यह समाज निरन्तर सब तूफानों से जूझता हुआ अबाध गति से आगे बढ़ता रहा है। जमाना साहू के संकल्प, जीवट्ता और निर्भिकता को देख स्तम्भित रहा है। भारत के इतिहास में साहू समाज ही पहला समाज है जिसका भारत की आजादी में सर्वाधिक योगदान रहा। अपने समाज के सुनहरे इतिहास को सुनकर हर साहू का मन गौरवान्वित हो जाता है। किन्तु यह सब तब तक रहा जब तक हममें त्याग, समर्पण और सेवा की भावना समाज का आदर्श रही। किन्तु जैसे एक प्रतिष्ठित व संस्कारित परिवार में कभी-कभी परिवार का कोई सदस्य परिवार की मान्यताओं का विरोधी हो जाता है, गलत संस्कारों के प्रभाव में बाहरी तत्वों से सम्बन्ध जोड़ परिवार को क्षति पहुॅंचाने लगता है, परिवार की कार्यक्षमता को कमजोर कर देता है।">
    <meta name="keywords" content="http://korissks.org, kori samaj, kori samaj news ">

	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="fb:app_id" content="" />
    <meta property="fb:pages" content="" />
    <meta property="og:locale" content="hi_IN" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="korissks.org, India's 1st kori community web portal " />
    <meta property="og:headline" content="korissks.org, India's 1st kori community web portal " />
    <meta property="og:description" content="India's 1st kori community web portal" />
    <meta property="og:url" content="https://www.korissks.org/" />
    <meta property="og:image" content="{{ asset('frontend_assets/images/SahuSamaj.png') }}" />
    <meta property="og:image:width" content="150" />
    <meta property="og:image:height" content="100" />
    <meta property="og:site_name" content="Kori Samaj" />

    <!-- Bootstrap -->
    <link href="{{ asset('frontend_assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Template style.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/style.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/slider-product.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/croppie.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/extra.css') }}">
    <!-- Font used in template -->
    <link
        href='{{ asset('frontend_assets/fonts.googleapis.com/css8ee5.css?family=Montserrat:400,700|Roboto:400,400italic,500,500italic,700,700italic,300italic,300') }}'
        rel='stylesheet' type='text/css'>
    <!--font awesome icon -->
    {{-- <link rel="stylesheet" href="{{ asset('frontend_assets/maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') }}">
    --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/css_style.css') }}" >
	



    <!-- favicon icon -->
    <link rel="shortcut icon" href="{{ asset('frontend_assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" href="{{ url('admin_assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('admin_assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <script src="{{ asset('frontend_assets/js/jquery.min.js') }}"></script>
    <style>
        .image-row {
            display: -ms-flexbox;
            /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap;
            /* IE10 */
            flex-wrap: wrap;
            padding: 0 25px;
        }

        /* Create four equal columns that sits next to each other */
        .column {
            -ms-flex: 25%;
            /* IE10 */
            flex: 25%;
            max-width: 100%;
            padding: 0 4px;
        }

        .column img {
            margin-top: 8px;
            vertical-align: middle;
            width: 100%;
        }

        /* Responsive layout - makes a two column-layout instead of four columns */
        @media screen and (max-width: 800px) {
            .column {
                -ms-flex: 50%;
                flex: 50%;
                max-width: 50%;
            }
        }

        /* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
            .column {
                -ms-flex: 100%;
                flex: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="collapse" id="searcharea">
        <!-- top search -->
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="button">Search</button>
            </span>
        </div>
    </div>
    <!-- /.top search -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-6 top-message top-links top-links1"><ul class="listnone">
                     
                        <li><a href="mailto:info@forsahutelisamaj.com" target="_blank">info@forsahutelisamaj.com</a>
                        </li>
                        <li><a href="call:+918510090951" target="_blank">+918510090951</a></li>
                        
                    </ul>
                </div>
                <div class="col-md-6 top-links">
                    <ul class="listnone">
                        @if (session()->has('email'))
                            <li><a href="{{ url('logout') }}"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i>
                                    Logout</a></li>
                        @else
                            <li><a href="{{ url('user_login') }}"><i class="fa fa-sign-in fa-lg"
                                        aria-hidden="true"></i> Log
                                    in</a></li>
                        @endif

                        <li><a href="#" target="_blank"><i class="fa fa-facebook 3x" aria-hidden="true"></i></a>
                        </li>
                        <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2 col-sm-12 logo">
                    <div class="navbar-brand">
                        <a href="{{ url('/') }}"><img
                                src="{{ asset('frontend_assets/images/downloadSahuLogo-removebg-preview.png') }}"
                                alt="Kori Samaj" class="img-responsive" style="height: 63px;"></a>

                    </div>
                </div>
                <div class="col-md-10 col-sm-12 mobilep" >
                    <div class="navigation" id="navigation">
                        <ul>
                            <li class="active" style="font-weight: bold;"><a href="{{ url('/') }}">Home</a></li>
                            <li><a href="#">About Us</a>
                                <ul>
                                    <li><a href="{{ route('aboutkssks', 1) }}" class="animsition-link">About Sahu
                                            Samaj </a></li>
                                    <!-- <li><a href="{{ route('aboutkori', 1) }}" class="animsition-link">साहू के बारे में </a></li> -->

                                    <!-- @foreach ($greatMans as $greatman)
<li><a href="{{ route('greatman', $greatman->id) }}" class="animsition-link">{{ $greatman->menu_name }}</a></li>
@endforeach -->

                                    <!-- <li><a href="#" class="animsition-link">Karma Devi</a></li> -->
                                    <li><a href="{{ route('sahusamaajkesanghathan') }}" class="animsition-link">साहू समाज के संगठन</a></li>
                                    <li><a href="{{ route('famousperson') }}" class="animsition-link">Famous Person</a></li>
                                    <li><a href="{{ route('hamaregaurav') }}" class="animsition-link">हमारे गौरव</a></li>
                                    <li><a href="{{ route('mandirdharamshala') }}" class="animsition-link">धर्मशाला मंदिर</a></li>
                                </ul>
                            </li>

                            @foreach ($menus as $menu)
                                <li><a href="javascript:void(0)">{{ $menu->name }}</a>
                                    <ul>
                                        @foreach ($menu->childrenCategories as $subMenu)
                                            <li><a href="{{ route('teams', $subMenu->id) }}">{{ $subMenu->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach

                            <li><a href="{{ route('activity') }}">Blog</a>
                               
                            </li>


                            <li><a href="#">Our Services</a>
                                <ul>
                                    <li><a href="{{route('memberdirectory')}}">दूरभाष निर्देशिका (Online)</a></li>
                                    <li><a href="{{ route('businessdirectory') }}">व्यापार निर्देशिका(Business Directory)</a></li>
                                    <li><a href="{{route('helpdesk')}}">सहायता सेवाएं</a></li>
                                    <li><a href="{{ route('careercounselling') }}">Career Counselling</a></li>
                                    <li><a href="{{ route('jobportal') }}">नौकरी सेवा(Job Portal)</a></li>
									
                                    <!-- <li><a href="{{ route('marathoncreate') }}">मैराथन</a></li>
                                    <li><a href="{{ route('runforviranganacreate') }}">रन फॉर वीरांगना</a></li>
                                    <li><a href="{{ route('coachingclassescreate') }}">कोचिंग क्लासेज </a></li>
                                    -->
                                </ul>
                            </li>

                            <li><a class="highlight" href="{{ route('mahotsav') }}">कर्मा महोत्सव | 2024</a></li>
                            
                            <li><a href="{{ route('publication') }}">Publications</a></li>
							<li><a href="#">News/Events</a>
                                <ul>
                                    <li><a href="{{ route('newsbroadcast') }}">News</a></li>
                                    <li><a href="{{ route('events') }}">Events</a></li>
                                   
                                </ul>
                            </li>
							
                            {{-- <li><a href="#">Events</a>
                                <ul>
                                    <li><a href="{{ route('events') }}">Upcoming Events</a></li>
                                    <li><a href="#">Past Events</a></li>

                                </ul>
                            </li> --}}


                            {{-- <li><a href="#">समाज के संगठन</a>
                                <ul>

                                    <li><a href="#">राष्ट्रीय कार्यकारिणी</a></li>
                                    <li><a href="#">प्रदेश कार्यकारिणी</a></li>
                                    <li><a href="#">जिला कार्यकारिणी</a></li>

                                    <!-- <li><a href="{{route('marathoncreate')}}">मैराथन</a></li>
                                    <li><a href="{{(route('runforviranganacreate'))}}">रन फॉर वीरांगना</a></li>
                                    <li><a href="{{route('coachingclassescreate')}}">कोचिंग क्लासेज </a></li>
                                    -->
                                </ul>
                            </li> --}}




                            <!-- <li><a href="{{ route('gallery') }}">Gallery</a></li> -->
                            <!-- <li><a href="#">Events</a></li> -->


                            {{-- <li><a href="#">WorkShop</a>
                                <ul>
                                    <li><a href="#">career form</a></li>
                                    <li><a href="#">N/A</a></li>

                                </ul>
                            </li> --}}

                            {{-- <li><a href="#">Blogs</a></li> --}}
                            <li><a href="{{ route('contactus') }}">Contact Us</a></li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <!-- /. Call to action -->
    <div class="footer">
        <!-- Footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-3 ft-link">
                    <h3>About Us</h3>
                    <ul>
                        <li><a href="{{ route('aboutkssks', 1) }}">About Sahu Samaj</a></li>
                        <li><a href="{{ route('aboutkori', 1) }}">FAQ</a></li>
                        <li><a href="{{ route('aboutkori', 1) }}">Contact Us</a></li>
                        <li><a href="{{ route('aboutkori', 1) }}">Karma Devi </a></li>
                        <li><a href="{{ route('greatman', 1) }}">हमारे गौरव</a></li>
                        <li><a href="{{ route('greatman', 2) }}">धर्मशाला मंदिर</a></li>
                    </ul>
                </div>
                <div class="col-md-3 ft-link">
                    <h3>Latest News</h3>
                    <ul>
                        <li><a href="{{ route('gallery') }}">कर्मा महोत्सव | 2023</a></li>
                        <li><a href="{{ route('activity') }}">Our Blogs</a></li>
                        {{-- <li><a href="{{ route('videos') }}">Electronic Media</a></li> --}}
                        <li><a href="{{ route('printmedia') }}">Print Media</a></li>
                        <li><a href="{{ route('gallery') }}">Gallery</a></li>
                    </ul>
                </div>

                <div class="col-md-3 ft-link">
                    <h3>Help Us</h3>
                    <ul>
                        <li><a href="{{ route('donations') }}">By Donation</a></li>
                        <li><a href="{{ route('advertisement') }}">By Advertisement</a></li>
                        <li><a href="{{ route('volunteer') }}">By Volunteering</a></li>
                        
                        <li><a href="{{ route('list_donor') }}">List Of Donors</a></li>
                        {{-- <li><a href="marathoncreate">मैरा`थन</a></li>
                        <li><a href="runforviranganacreate">रन फॉर वीरांगना</a></li>
                        <li><a href="coachingclassescreate">कोचिंग क्लासेज</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-3 ft-link">
                    <h3>Other Useful Links</h3>
                    <ul>
                        <li><a href="{{ route('marriage.create') }}">Marriage Registration</a></li>
                        <li><a href="{{ route('memberdirectory') }}">Member Directory</a></li>
                        <li><a href="{{ route('businessdirectory') }}">Business Directory</a></li>
                        <li><a href="{{ route('helpdesk') }}">Help Desk</a></li>
                        <li><a href="{{ route('contactsignup') }}">Mahasampark Abhiyan</a></li>
                    </ul>
                    {{-- <div class="social-icon">
                        <h3>Be Social &amp; Stay Connected</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#"><i class="fa fa-flickr"></i></a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- /.Footer -->
    <div class="tiny-footer">
        <!-- Tiny footer -->
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="color:#ffffff">Copyright © {{ date('Y') }}. All Rights Reserved.
                    Developed By <a href="https://www.etwosinfotech.com/" target="_blank" rel="noopener noreferrer">Etwos Infotech</a> </div>
            </div>
        </div>
    </div>
    <!-- /. Tiny Footer -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('frontend_assets/js/bootstrap.min.js') }}"></script>
    <!-- Flex Nav Script -->
    <script src="{{ asset('frontend_assets/js/jquery.flexnav.js') }}" type="text/javascript"></script>
    <script src="{{ asset('frontend_assets/js/navigation.js') }}"></script>
    <!-- slider -->
    <script src="{{ asset('frontend_assets/js/owl.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('frontend_assets/js/slider.js') }}"></script>
    <!-- testimonial -->
    <script type="text/javascript" src="{{ asset('frontend_assets/js/testimonial.js') }}"></script>
    <!-- sticky header -->
    <script src="{{ asset('frontend_assets/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/header-sticky.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/jquery-ui-timepicker-addon.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/jquery.validate.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/croppie.js') }}"></script>
    <script src="{{ url('admin_assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('frontend_assets/js/slider-product.js') }}"></script>


    {{-- <script>
                function closeModel() {
                    $('.modal-body').children('iframe').attr('src', '');
                }
                function openModel(link) {
                    $('.modal-body').children('iframe').attr('src', link);
                }
            </script> --}}

    <script>
        $('.select2').select2();
        $(document).ready(function() {
            $("#chk").click(function() {
                if ($('#chk').is(':checked')) {
                    let address = $("#contact_address").val();
                    $("#permanant_address").val(address);
                } else {
                    $("#permanant_address").val('');
                }
            })
        })

        let timerOn = true;

        function timer(remaining) {
            var resendBtn = document.getElementById("resendBtn");
            var displayTimer = document.getElementById("timer");
            var timerDiv = document.getElementById("timerDiv");
            var m = Math.floor(remaining / 60);
            var s = remaining % 60;
            console.log(displayTimer)

            m = m < 10 ? '0' + m : m;
            s = s < 10 ? '0' + s : s;
            displayTimer.innerHTML = m + ':' + s;
            remaining -= 1;

            if (remaining >= 0 && timerOn) {
                setTimeout(function() {
                    timer(remaining);
                }, 1000);

                return;
            }

            if (!timerOn) {
                // Do validate stuff here
                return;
            }
            timerDiv.style.display = "none";
            resendBtn.style.display = "block";

        }

        timer(60);
    </script>

<script>
    $("#state-dropdown").on('change', function() {
        // var state_id = document.getElementById("state-dropdown").value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var state_id = this.value;
        // alert(state_id);
        $("#city-dropdown").html('');
        $.ajax({
            url: '{{ url("get-city-by-state") }}',
            type: "POST",
            data: {
                state_id: state_id

            },
            dataType: 'json',
            success: function(result) {
                $('#city-dropdown').html('<option disabled>Select City</option>');
                $.each(result.cities, function(key, value) {
                    // console.log(value);
                    $("#city-dropdown").append('<option value="' + value.id + '">' + value.city + '</option>');
                });
                

            }
        });
    });


    /* Get State*/
    $('#country-dropdown').on('change', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var country_id = this.value;
        $("#state-dropdown").html('');
        $.ajax({
            url: '{{ url("get-states-by-country") }}',
            type: "POST",
            data: {
                country_id: country_id

            },
            dataType: 'json',
            success: function(result) {
                $('#state-dropdown').html('<option disabled>Select State</option>');
                $.each(result.states, function(key, value) {
                    // console.log(value);
                    $("#state-dropdown").append('<option value="' + value.id + '">' + value.name + '</option>');
                });
                

            }
        });
    });


    // search sub category
    $('#category_id').on('change', function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var category_id = this.value;
        $("#sub_category_id").html('');
        $.ajax({
            url: '{{ url("get-sub-category") }}',
            type: "POST",
            data: {
                category_id: category_id

            },
            dataType: 'json',
            success: function(result) {
                $('#sub_category_id').html('<option disabled>Select Sub Category</option>');
                $.each(result.sub_category, function(key, value) {
                    // console.log(value);
                    $("#sub_category_id").append('<option value="' + value.id + '">' + value.sub_category_name + '</option>');
                });
                

            }
        });
    });
</script>
</body>

</html>
