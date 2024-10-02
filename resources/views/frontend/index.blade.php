@extends('layouts.master')

@section('content')


<div class="slider-bg">
    <!-- slider start-->
    <div id="slider" class="owl-carousel owl-theme slider">
        @foreach ($banners as $banner)
        <div class="item"><img src="{{ asset('uploads/banner/'.$banner->bimages) }}" style="height: 500px;"
                alt="Wedding couple just married">
        </div>
        @endforeach
    </div>
</div>

<!-- slider end-->

<!-- Feature Blog End -->


<div class="our_style expect-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">साहू तेली समाज में आपका स्वागत है</h2>
            <p>साहू समाज की उत्पत्ति उत्तर प्रदेश के प्राचीन ग्रामों में हुई थी, जहां उनके पूर्वज अत्यंत गरीब थे।
                उन्होंने अपने रोजगार के रूप में उत्पादन और विपणन की व्यवस्था की और इस प्रकार धीरे-धीरे समृद्धि हासिल
                की। साहू समाज के लोग खेती, पशुपालन, औद्योगिक क्षेत्र में काम करते हुए और अन्य व्यवसायों में अपना
                जीवन यापन करते हैं।</p>
        </div>

        <div class="expect-slides">
            <div>
                <div class="introduction">
                    <div class="introduction-items" onclick="window.location.href='{{route('memberdirectory')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 50px; " src="{{ asset('frontend_assets/images/directory.png') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{route('memberdirectory')}}">दूरभाष निर्देशिका (Online)</a>
                            </h3>
                        </div>
                    </div>
                    <div class="introduction-items" onclick="window.location.href='{{route('helpdesk')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 50px;" src="{{ asset('frontend_assets/images/helpline.png') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{route('helpdesk')}}">सहायता सेवाएं</a>
                            </h3>
                        </div>
                    </div>
                    <div class="introduction-items" onclick="window.location.href='{{route('businessdirectory')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 50px;" src="{{ asset('frontend_assets/images/contact.png') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{ route('businessdirectory') }}">व्यापार निर्देशिका(Business Directory)</a>
                            </h3>
                        </div>
                    </div>
                    <div class="introduction-items" onclick="window.location.href='{{route('karma_detail')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 38px;border-radius:50%"
                                    src="{{ asset('frontend_assets/images/karma.jpeg') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{ route('karma_detail') }}">मां कर्मा बाई मंदिर | धर्मशाला</a>
                            </h3>
                        </div>
                    </div>
                    <div class="introduction-items" onclick="window.location.href='{{route('coming')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 50px;" src="{{ asset('frontend_assets/images/contact.png') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{ route('coming') }}">नौकरी सेवा(Job Portal)</a>
                            </h3>
                        </div>
                    </div>
                    <div class="introduction-items" onclick="window.location.href='{{route('coming')}}'">
                        <div class="expect-item">
                            <div class="icon">
                                <img style="width: 50px; border-radius:8%"
                                    src="{{ asset('frontend_assets/images/Counseling.jpg') }}">
                            </div>
                            <h3 class="h3">
                                <a href="{{ route('coming') }}">Career Counselling</a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Events section start -->
<div class="events-schedules-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">Events / महोत्सव</h2>
        </div>

        <div class="row justify-content-center flex flex-wrap">
            <?php 
				if(count($mahotsavs) > 3) {
					$count = 3;
				} else {
					$count = count($mahotsavs);
				}
			?>
            @for ($i = 0; $i < $count; $i++) <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="single-events-schedules">
                    <div class="events-image">
                        <a href="{{route('mahotsavimages',$mahotsavs[$i]['id'])}}"><img
                                src="{{asset('uploads/mahotsav/'.$mahotsavs[$i]['image'])}}" alt="image"></a>
                    </div>

                    <div class="events-content">
                        <div><span><i class="fa fa-calendar"></i>
                                {{ date('d, M Y', strtotime($mahotsavs[$i]['date'])) }}</span></div>
                        <div style="margin-bottom: 15px;"><span><i class="fa fa-map-marker"></i>
                                {{ Str::limit($mahotsavs[$i]['address'],30) }}</span></div>
                        <h3 class="h3">
                            <a href="{{route('mahotsavimages',$mahotsavs[$i]['id'])}}">{{ $mahotsavs[$i]['title'] }}</a>
                        </h3>
                        <p>{!! Str::limit($mahotsavs[$i]['description'],140) !!}</p>

                        <!-- <div class="bottom-content">
                            <div class="book-btn">
                                <a href="{{route('mahotsavimages',$mahotsavs[$i]['id'])}}" class="book-btn-one"><i class="fa fa-long-arrow-right"></i> Read More</a>
                            </div>
                        </div> -->
                    </div>
                </div>
        </div>
        @endfor
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="view_more book-btn text-center">
                <a href="{{route('events')}}" class="book-btn-one"><i class="fa fa-angle-right"></i> View More</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Event section end -->


<div class="section-space50 home" style="display:none;">
    <div class="container">

        <div class="row">

            <div class="col-md-4 mb20">
                <h2 class="widget-title1 wt-color"><a href="{{route('events')}}" class="">Upcoming Events</a></h2>
                <div class="row">
                    <div class="col-md-12">
                        <div id="slider4" class="owl-carousel owl-theme">
                            @foreach ($events->take(3) as $event)
                            <div class="col-md-12 item testimonial-block">
                                <div class="real-wedding-block mb30" id="event2">
                                    <div class="col-md-12 real-wedding-img">
                                        <a href="javascript:void(0)" onclick="loadEventDetail({{$event->id}})"><img
                                                width="100%" src="{{asset('uploads/events/'.$event->image)}}"
                                                alt="{{$event->name}}" class="img-responsive"></a>
                                    </div>
                                    <div class="col-md-12 real-wedding-info well-box text-center">
                                        <div class="col-md-12  text-left">
                                            <h2 class="real-wedding-title  text-left"><a href="javascript:void(0)"
                                                    class="title">{{$event->name}}</a></h2>
                                        </div>
                                        <div class="col-md-12  text-left"><i
                                                class="icon-wedding-day icon-size-18"></i><label>Date</label> :
                                            {{ date("d-M-Y", strtotime($event->from_date)) }}</div>
                                        <div class="col-md-12  text-left"><i
                                                class="icon-wedding-location icon-size-18"></i><label>Location</label> :
                                            {{$event->address}}</div>
                                        <div class="col-md-12  text-left">{{ Str::limit($event->description,140) }}
                                        </div>
                                        <div class="col-md-12" style="margin:10px 0px 0px 0px;"><a
                                                href="{{route('events')}}" class="btn-crc2 btn-primary">View All
                                                Events</a></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8 mb20 homelist">
                <div class="section-title text-center">
                    <a href="javascript:void(0)">
                        <h1 style="color:#F9A431; font-weight: bold; font-size:24px; color: #BB2323;">साहू समाज सेवी
                            कर्मचारी संगठन वेब पोर्टल में आपका स्वागत है</h1>
                    </a>
                    <!-- <p>Test.</p> -->
                </div>
                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="couple-icon"><img style="width: 50px; "
                                src="{{ asset('frontend_assets/images/directory.png') }}"></div>
                        <h2 style="font-weight:bold">दूरभाष निर्देशिका (Online) </h2>
                        <a href="{{route('memberdirectory')}}" class="btn-crc2 btn-primary">Click Here</a>
                    </div>
                </div>
                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="vendor-icon"><img style="width: 50px;"
                                src="{{ asset('frontend_assets/images/helpline.png') }}"></div>
                        <h2 style="font-weight:bold">सहायता सेवाएं </h2>
                        <a href="{{route('helpdesk')}}" class="btn-crc2 btn-primary">Help Desk</a>
                    </div>
                </div>
                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="couple-icon"><img style="width: 50px;"
                                src="{{ asset('frontend_assets/images/contact.png') }}"></div>
                        <h2 style="font-weight:bold">व्यापार निर्देशिका(Business Directory) </h2>
                        <a href="{{ route('businessdirectory') }}" class="btn-crc2 btn-primary">Click Here</a>
                    </div>
                </div>
                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="couple-icon"><img style="width: 38px;border-radius:50%"
                                src="{{ asset('frontend_assets/images/karma.jpeg') }}"></div>
                        <h2 style="font-weight:bold">मां कर्मा बाई मंदिर | धर्मशाला</h2>
                        <a href="{{ route('karma_detail') }}" class="btn-crc2 btn-primary">Click Here</a>
                    </div>
                </div>
                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="couple-icon"><img style="width: 50px;"
                                src="{{ asset('frontend_assets/images/contact.png') }}"></div>
                        <h2 style="font-weight:bold">नौकरी सेवा(Job Portal)</h2>
                        <a href="{{ route('coming') }}" class="btn-crc2 btn-primary">Click Here</a>
                    </div>
                </div>

                <div class="col-md-4 couple-block mt10">
                    <div class="box-style-1 white-bg">
                        <div style="cursor:pointer" class="couple-icon"><img
                                style="width: 50px; max-height:153px; border-radius:8%"
                                src="{{ asset('frontend_assets/images/Counseling.jpg') }}"></div>
                        <h2 style="font-weight:bold">Career Counselling</h2>
                        <a href="{{ route('coming') }}" class="btn-crc2 btn-primary">Click Here</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- blog section start -->
<div class="blog-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">Latest Blogs</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua ut enim ad minim veniam quis nostrud exercitation ullamco.</p> -->
        </div>

        <div class="row justify-content-center flex flex-wrap align-item-center">
            @foreach ($blogs1 as $blog)
            <div class="col-lg-6 col-md-12">
                <div class="single-blog-box">
                    <div class="blog-image">
                        <a href="{{ route('news.show', $blog->id) }}">
                            <img src="{{ asset('uploads/news/' . $blog->image) }}" alt="image">
                        </a>
                    </div>

                    <div class="blog-content">
                        <h3>
                            <a href="{{ route('news.show', $blog->id) }}">{{ $blog->title }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-xs-12 col-sm-12 col-lg-6 col-md-12">
                <?php
					
					if(count($blogs) > 2) {
						$blog_count = 2;
					} else {
						$blog_count = count($blogs);
					}
				?>
                @for ($i = 0; $i < $blog_count; $i++) <div class="single-side-blog">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="blog-image bg-1"
                                style="background-image: url({{ asset('uploads/news/' . $blogs[$i]['image']) }});">
                                <a href="{{ route('news.show', $blogs[$i]['id']) }}">
                                    <img src="{{ asset('uploads/news/' . $blogs[$i]['image']) }}" alt="image">
                                </a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-12">
                            <div class="blog-content">
                                <h3>
                                    <a
                                        href="{{ route('news.show', $blogs[$i]['id']) }}">{{ Str::limit(strip_tags($blogs[$i]['title']), 20, '...') }}</a>
                                </h3>
                                <p>{{ Str::limit(strip_tags($blogs[$i]['description']), 70, '...') }}</p>

                                <ul class="blog-box-footer d-flex justify-content-between align-items-center">
                                    <li>
                                        <i class="fa fa-calendar"></i>
                                        {{ date("d-M-Y", strtotime($blogs[$i]['to_date'])) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
            @endfor
        </div>

        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="view_more book-btn text-center">
                <a href="{{route('activity')}}" class="book-btn-one"><i class="fa fa-angle-right"></i> View More</a>
            </div>
        </div>
    </div>
</div>
</div>
<!-- blog section end -->

<!-- Latest News Start -->
<div class="events-schedules-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">Latest News</h2>
        </div>
        <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel2");
            owl.owlCarousel({
                items: 3,
                margin: 10,
                loop: true,
                nav: true
            });
        });
        </script>
        <div class="row justify-content-center flex flex-wrap owl-carousel2 owl-theme">
            <?php 
				if(count($mahotsavs) > 3) {
					$count = 3;
				} else {
					$count = count($mahotsavs);
				}
			?>
            @foreach ($latestNews as $news)
            <div class="col-lg-12">
                <div class="single-events-schedules">
                    <div class="events-image">
                        <a href="{{ route('newsbroadcastDetail', $news->title) }}">
                            <img style="width:500px; height: 250px"
                                src="{{asset('uploads/news_broad_cast/'.$news->image)}}" alt="image">
                            <!-- <div class="latest_news_image" style="background-image: url('{{asset('uploads/news_broad_cast/'.$news->image)}}')"></div> -->
                        </a>
                    </div>

                    <div class="events-content">
                        <div><span><i class="fa fa-calendar"></i>
                                {{ date('F d, Y', strtotime($news->date)) }}</span></div>
                        <div style="margin-bottom: 15px;"><span><i class="fa fa-map-marker"></i>
                                @foreach($cities as $city)
                                <?php if($city->id == $news->city_id) {?> {{ $city->city }}, <?php  } ?>
                                @endforeach

                                @foreach($states as $state)
                                <?php if($state->id == $news->state_id) {?> {{ $state->name }} <?php  } ?>
                                @endforeach</span>
                        </div>
                        <h3 class="h3">
                            <a
                                href="{{ route('newsbroadcastDetail', $news->title) }}">{{ Str::limit($news->title,20) }}</a>
                        </h3>
                        <p>{!! Str::limit($news->description,150) !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div row justify-content-center flex flex-wrap>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="view_more book-btn text-center">
                    <a href="{{ route('newsbroadcast') }}" class="book-btn-one"><i class="fa fa-angle-right"></i> View
                        All</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Latest News end -->

<!-- Jobs Section Start -->
<div class="events-schedules-area-with-color ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">Jobs</h2>
        </div>
        <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel3");
            owl.owlCarousel({
                items: 2,
                margin: 10,
                loop: true,
                nav: true
            });
        });
        </script>
        <div class="row justify-content-center owl-carousel3 owl-theme mb-10">
            @foreach ($jobportals as $jobportal)
            <div class="col-lg-12">
                <div class="events-content-box">
                    <span><i class="fa fa-calendar"></i> Close Date : {{ date('F d, Y', strtotime($jobportal->close_date)) }}</span> <br />
                    <span><i class="fa fa-map-marker"></i> @foreach($states
                                            as $state)
                                            @if($state->id==$jobportal->state_id)
                                            {{ $state->name }},
                                            @endif
                                            @endforeach
                                            @foreach($cities as $city)
                                            @if($city->id==$jobportal->city_id)
                                            {{ $city->city }}
                                            @endif
                                            @endforeach</span>
                    <h3>
                        <a href="{{ route('jobportalDetail', $jobportal->title) }}">{{ Str::limit($jobportal->title,60) }}</a>
                    </h3>
                    <p>{!! Str::limit($jobportal->description,200) !!}</p>
                    <div class="skills">
                        Skills
                        <?php 
                            if (str_contains($jobportal->skill, ',')) {
                                $skill_array = explode(",", $jobportal->skill);
                                foreach($skill_array as $skill) {
                        ?>
                                <div class="skill-items">{{ $skill }}</div>
                        <?php
                                }
                            } else {
                        ?>
                                <div class="skill-items">{{ $jobportal->skill }}</div>
                        <?php
                            }
                        ?>
                        
                    </div>

                    <div class="bottom-content">
                        <div class="info">
                            <h4>Salary: {{ $jobportal->amount }}</h4>
                            <p>By: {{ $jobportal->company_name }}</p>
                        </div>

                        <div class="book-btn">
                            <a href="{{ route('jobportalDetail', $jobportal->title) }}" class="book-btn-one"><i class="bx bx-arrow-to-right"></i> Apply Now</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div row justify-content-center flex flex-wrap>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="view_more book-btn text-center">
                    <a href="{{ route('jobportal') }}" class="book-btn-one"><i class="fa fa-angle-right"></i> View
                        All Jobs</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job Section End -->

<!-- Products Section start -->
<div class="products-area ptb-100">
    <div class="container">
        <div class="section-title">
            <h2 class="h2">Our Products</h2>
        </div>
        <script>
        $(function() {
            // Owl Carousel
            var owl = $(".owl-carousel1");
            owl.owlCarousel({
                items: 3,
                margin: 10,
                loop: true,
                nav: true,
            });
        });
        </script>
        <div class="row justify-content-center owl-carousel1 owl-theme">
            @foreach ($publications as $publication)
            <div class="col-lg-12">
                <div class="single-products">
                    <div class="products-image">
                        <a href="{{ route('publicationDetail', $publication->title) }}">
                            <img src="{{ asset('uploads/publication/' . $publication->image) }}"
                                style="width: 500px; height: 200px" alt="image"></a>
                    </div>

                    <div class="products-content">
                        <h3>
                            <a href="products-details.html">{{ Str::limit($publication->title,20) }}</a>
                        </h3>
                        <h5>{{ $publication->company_name }}</h5>
                        <span>Rs. {{ $publication->price }}</span>
                    </div>

                    <div class="products-footer text-center">
                        <a href="{{ route('publicationDetail', $publication->title) }}" class="booknow-default-btn">Book
                            Now</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div row justify-content-center flex flex-wrap>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="view_more book-btn text-center">
                    <a href="{{ route('publication') }}" class="book-btn-one"><i class="fa fa-angle-right"></i> View
                        All</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Section End -->


<div class="section-space20 bg-light">
    <div class="container-fluid">

        <!--<div class="col-md-4 right-sidebar">
                <div class="row">
                    
                   <div class="col-md-12">
                        <div class="well-box donatebox">
						    <a href="{{ route('donations') }}"><h3 class="donatetitle">दान-पुण्य (DONATE NOW)</h3></a>
                           
									<p>दान देना एक पुण्य कर्म है। माना जाता है कि दान करने से मनुष्य का इस लोक के बाद परलोक में भी कल्याण होता है। </p>
                        </div>
                    </div>
                    <div class="col-md-12 post-holder">
                        <div class="well-box">
                            <h2 class="widget-title wt-color">हमारी टीम के सदस्य <br/><a href="{{route('teams',12)}}"
                                    class="link float-right1" style="float:left; font-size: 15px;"><strong>View
                                        All</strong></a></h2>
                            <div id="sliderKeyPerson" class="owl-carousel owl-theme">
                                @foreach ($keyPerson as $person)
                            <div class="col-md-12 team-profile1">
								<div class="col-md-3"></div>
								<div class="col-md-6">
									<img src="{{asset('uploads/team/'.$person->image)}}" alt=""
										class="img-responsive img-circle">
										<h4 class="teamlocation">{{$person->location}}</h4>
								</div>
								<div class="col-md-3"></div>
								<div class="col-md-12 mt20">
									<h2 class="teamname">{{$person->name}}</h2>
									<h4 class="teamdesignation">{{$person->designation}}</h4>
									<p><a target="_blank" href="{{$person->fb_link}}"><i class="fa fa-facebook-square"></i> Find him on
											Facebook </a></p>
								</div>
							</div>
                            @endforeach


                            </div>
                        </div>
                    </div>

                </div>
            </div>-->







        <div class="col-lg-12">

            <div class="row well-box post-holder">
                <h2 class="widget-title wt-color" style="font-weight: bold;">Business Promotion</h2>

                <div class="col-md-8 post-holder">

                    <div class="row">
                        <div class="col-md-12 tp-testimonial">
                            <div id="slider2" class="owl-carousel owl-theme">
                                @foreach ($businessImages as $businessImage)
                                <div class="item testimonial-block">
                                    <img width="100%"
                                        src="{{asset('uploads/add_business_promotion/'.$businessImage->image)}}" alt="">
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 post-holder">
                    <div class="row">
                        <div class="col-md-12 tp-testimonial">
                            <div id="slider5" class="owl-carousel owl-theme">
                                @foreach ($advertisementImages as $advertisementImage)
                                <div class="item testimonial-block">
                                    <img width="100%" height="380px;"
                                        src="{{asset('uploads/add_business_promotion/'.$advertisementImage->image)}}" />
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="closeModel()">&times;</button>

            </div>
            <div class="modal-body">
                <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="height: 40px;" data-dismiss="modal"
                    onclick="closeModel()">Close</button>
            </div>
        </div>
    </div>
</div>

<style>
.slider-item {

    width: 230px !important;
}
</style>
<script>
function closeModel() {
    $('.modal-body').children('iframe').attr('src', '');
}

function openModel(link) {

    $('.modal-body').children('iframe').attr('src', link);
}
</script>


@endsection