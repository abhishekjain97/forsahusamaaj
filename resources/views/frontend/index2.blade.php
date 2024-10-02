@extends('layouts.master2')

@section('content')
    @foreach ($knowledgeSliders->chunk(5) as $key => $knowledgeSlider)

        <section class="block-wrapper p-30" style="background: url(images/banner-bg.png) no-repeat center center/cover">
            <div class="container">
                <div class="row">

                    <!-- col end-->
                    <div class="col-lg-6 pl-0 pr-0" style="padding:12px">
                        <div id="featured-slider-2" class="owl-carousel ts-overlay-style ts-featured">
                            @foreach ($knowledgeSlider->take(1) as $item1)
                                <div class="item"
                                    style="background-image:url({{ asset('uploads/knowledge/posts/' . $item1->thubmnail) }})">
                                    @foreach ($item1->subCat as $sub)
                                        <span class="post-cat ts-orange-bg">{{ $sub->name }}</span>
                                    @endforeach

                                    <div class="overlay-post-content">
                                        <div class="post-content">
                                            <h2 class="post-title lg">
                                                <a
                                                    href="{{ url('knowledge/' . $item1->subCat[0]->url . '/' . $item1->slug) }}">{{ $item1->title }}</a>
                                            </h2>
                                            <ul class="post-meta-info">
                                                <li class="author">
                                                    <a href="#">
                                                        <i class="fa fa-user-circle-o"></i> {{ $item1->author }}
                                                    </a>
                                                </li>
                                                <li>
                                                    @php
                                                        $date = date('M j Y', strtotime($item1->publish_date));
                                                    @endphp

                                                    <i class="fa fa-clock-o"></i>
                                                    {{ $date }}
                                                </li>
                                                <li class="active">
                                                    <i class="fa fa-eye"></i>
                                                    {{ $item1->views_count }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!--/ Featured post end -->

                                </div>
                            @endforeach
                            <!-- Item 1 end -->
                        </div>
                        <!-- Featured owl carousel end-->
                    </div>
                    <!-- col end-->
                    <div class="col-lg-6">
                        <div class="ts-post-overlay-style-1 ts-post-style-5">
                            <div class="row" style="padding: 10px">
                                @foreach ($knowledgeSlider as $item2)
                                    @if ($item1->id == $item2->id)
                                        @continue
                                    @endif

                                    <div class="col-lg-6" style="padding: 4px">
                                        <div class="ts-overlay-style">
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    @foreach ($item2->subCat as $sub)
                                                        <span class="post-cat ts-orange-bg">{{ $sub->name }}</span>
                                                    @endforeach


                                                    <a href="#">
                                                        <img class="img-fluid"
                                                            src="{{ asset('uploads/knowledge/posts/' . $item2->thubmnail) }}"
                                                            alt="">
                                                    </a>
                                                </div>

                                                <div class="overlay-post-content">
                                                    <div class="post-content">
                                                        <h3 class="post-title">
                                                            <a
                                                                href="{{ url('knowledge/' . $item2->subCat[0]->url . '/' . $item2->slug) }}">
                                                                {{ $item2->title }} </a>
                                                        </h3>
                                                        <ul class="post-meta-info">
                                                            <li>
                                                                @php
                                                                    $date = date('M j Y', strtotime($item2->publish_date));
                                                                @endphp

                                                                <i class="fa fa-clock-o"></i>
                                                                {{ $date }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end item-->
                                        </div>
                                    </div>

                                @endforeach


                            </div>
                            <!-- ts overlay style end-->

                            <!-- ts overlay style end-->
                        </div>
                    </div>

                    <!--col end-->
                </div>
            </div>
        </section>
    @endforeach

    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    @foreach ($knowledges as $knowledgeCat)
                        @if ($knowledgeCat->getSubCatKnowleadges->count() > 0)

                            <div class="ts-grid-box category-box-item-3">
                                <h2 class="ts-title float-left">{{ $knowledgeCat->name }}</h2>
                                <a href="#" class="view-all-link float-right">View All</a>
                                <div class="clearfix"></div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        @foreach ($knowledgeCat->getSubCatKnowleadges->take(1) as $knowledge)
                                            <div class="item">
                                                <div class="ts-post-thumb">
                                                    <a class="post-cat ts-orange-bg" href="#">Travel</a>
                                                    <a
                                                        href="{{ url('knowledge/' . $knowledge->subCat[0]->url . '/' . $knowledge->slug) }}">
                                                        <img class="img-fluid"
                                                            src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                            alt="">
                                                    </a>
                                                </div>
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a
                                                            href="{{ url('knowledge/' . $knowledge->subCat[0]->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}
                                                        </a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="javascript:void(0)">
                                                                <i class="fa fa-user-circle-o"></i> {{ $knowledge->author }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            @php
                                                                $date = date('M j Y', strtotime($knowledge->publish_date));
                                                            @endphp

                                                            <i class="fa fa-clock-o"></i>
                                                            {{ $date }}
                                                        </li>
                                                        <li class="active">
                                                            <i class="fa fa-eye"></i>
                                                            {{ $knowledge->views_count }}
                                                        </li>
                                                    </ul>
                                                    <p>
                                                        {{ Str::limit($knowledge->short_desc, 100) }}
                                                    </p>
                                                </div>
                                            </div>

                                        @endforeach
                                        <!-- ts-grid-box end-->
                                    </div>
                                    <!-- col end-->
                                    <div class="col-lg-6">
                                        <div class="row">
                                            @foreach ($knowledgeCat->getSubCatKnowleadges->take(4) as $knowledge)

                                            <div class="col-lg-6">
                                                <div class="item mb-20">
                                                    <div class="ts-post-thumb">
                                                        <a href="{{ url('knowledge/' . $knowledge->subCat[0]->url . '/' . $knowledge->slug) }}">
                                                            <img class="img-fluid" src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <h3 class="post-title">
                                                            <a href="{{ url('knowledge/' . $knowledge->subCat[0]->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}</a>
                                                        </h3>
                                                        <span class="post-date-info">
                                                            @php
                                                            $date = date("M j Y",
                                                            strtotime($knowledge->publish_date));
                                                            @endphp
                                                            <i class="fa fa-clock-o"></i>
                                                           {{$date}}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- col end-->
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- row end-->

                            </div>
                            <div class="border-top border-top1 mb-30"></div>
                        @endif
                    @endforeach
                    <!-- ts-populer-post-box end-->





                    <!-- row end-->

                </div>
                <!-- col end-->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="ts-grid-box widgets ts-social-list-item">
                            <h3 class="ts-title">Follow us</h3>
                            <ul>
                                <li class="ts-facebook">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                        <b>5.5 k </b>
                                        <span>Likes</span>
                                    </a>

                                </li>
                                <li class="ts-google-plus">
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>

                                </li>
                                <li class="ts-twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                        <b>12.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-pinterest">
                                    <a href="#">
                                        <i class="fa fa-pinterest-p"></i>
                                        <b>5.5 k </b>
                                        <span>Photos</span>
                                    </a>
                                </li>
                                <li class="ts-linkedin">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-youtube">
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-instragram">
                                    <a href="#">
                                        <i class="fa fa-instagram"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-dribble">
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                                <li class="ts-behance">
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                        <b>5.5 k </b>
                                        <span>Follwers</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img class="img-fluid" src="images/banner/sidebar-banner2.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <div class="widgets post-list-item">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation">
                                    <a class="active" href="#home" aria-controls="home" role="tab" data-toggle="tab">
                                        <i class="fa fa-clock-o"></i>
                                        Recent
                                    </a>
                                </li>
                                <li role="presentation">
                                    <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">
                                        <i class="fa fa-heart"></i>
                                        Favorites
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active ts-grid-box post-tab-list" id="home">
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"> sports</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">Tourism in Dubai is booming by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media ">
                                        <img class="d-flex sidebar-img" src="images/news/tech/tech4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="blue-color"> Technology</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">Tesla just lost its of global finance</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/sports/sports3.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"> Sports</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">easy teriya chicken with broccoli</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="pink-color"> Fashion</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">Tourism in Dubai is booming by gun</a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->

                                </div>
                                <!--ts-grid-box end -->

                                <div role="tabpanel" class="tab-pane ts-grid-box post-tab-list" id="profile">
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"> sports</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">18 month old shoots himself by gun </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media ">
                                        <img class="d-flex sidebar-img" src="images/news/tech/tech4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="blue-color"> Technology</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">17 month old shoots himself by gun </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/sports/sports4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="green-color"> Sportd</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">20 month old shoots himself by gun </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->
                                    <div class="post-content media">
                                        <img class="d-flex sidebar-img" src="images/news/fashion/fashion4.jpg" alt="">
                                        <div class="media-body">
                                            <span class="post-tag">
                                                <a href="#" class="pink-color"> Fashion</a>
                                            </span>
                                            <h4 class="post-title">
                                                <a href="#">18 month old shoots himself by gun </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <!--post-content end-->

                                </div>
                                <!--ts-grid-box end -->
                            </div>
                            <!-- tab content end-->
                        </div>
                        <!-- widgets end-->
                    </div>
                </div>
            </div>
            <!-- row end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper start-->
    <section class="block-wrapper mb-30 hot-topics-heighlight">
        <div class="container">

            <div class="ts-grid-box">
                <h2 class="ts-title">Hot Topics</h2>

                <div class="owl-carousel" id="hot-topics-slider">
                    <div class="item ts-blue-light-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/tech/tech1.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">Technology</a>
                        </div>

                        <div class="post-content">

                            <h3 class="post-title">
                                <a href="#">Tourism in Dubai is booming by international tourist</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item ts-green-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/sports/sports1.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">sports</a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#">10 critical points from Zuckerberg’s epic manifesto</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item ts-pink-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/music/music2.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">Music</a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#">The clock is ticking for e-cig companies to block users</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item ts-yellow-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/travel/travel1.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">Travel</a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#">Google vote-shifting threatens both right & left</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item ts-blue-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/tech/tech2.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">Technology</a>
                        </div>

                        <div class="post-content">

                            <h3 class="post-title">
                                <a href="#">Youth vaping an 'epidemic' crackdown coming</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->

                    <div class="item ts-green-heighlight heighlight">
                        <div class="ts-post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="images/news/sports/sports2.jpg" alt="">
                            </a>
                            <a class="post-cat" href="#">sports</a>
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="#">Tourism in Dubai is booming by international tourist</a>
                            </h3>
                            <span class="post-date-info">
                                <i class="fa fa-clock-o"></i>
                                March 21, 2019
                            </span>
                        </div>
                    </div>
                    <!-- ts-grid-box end-->
                </div>
                <!-- most-populers end-->
            </div>
            <!-- ts-populer-post-box end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

    <!-- ad banner 2 start-->
    <section class="block-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-img text-center">
                        <a href="index.html">
                            <img class="img-fluid" src="images/banner/banner2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- col end -->
            </div>
            <!-- row  end -->
        </div>
        <!-- container end -->
    </section>
    <!-- ad banner 2 end-->

    <!-- watch now start-->
    <section class="block-wrapper">
        <div class="container">

            <div class="row">
                <div class="col-lg-9">
                    <div class="ts-grid-box watch-post mb-30">
                        <h2 class="ts-title">Watch Now</h2>
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="tab-content featured-post" id="nav-tabContent">
                                    <div class="tab-pane ts-overlay-style fade show active" id="nav-home" role="tabpanel"
                                        aria-labelledby="nav-home-tab">
                                        <div class="item" style="background-image: url(images/news/travel/travel2.jpg)">

                                            <a class="post-cat ts-orange-bg" href="#">TRAVEL</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">They’re back! Kennedy Darling, LeCras named to
                                                            return</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="images/avater/author1.jpg" alt=""> Donald
                                                                Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                    <div class="tab-pane ts-overlay-style fade" id="nav-profile" role="tabpanel"
                                        aria-labelledby="nav-profile-tab">
                                        <div class="item" style="background-image: url(images/news/health/health2.jpg)">

                                            <a class="post-cat ts-purple-bg" href="#">Health</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">retro prawn cocktail – straight from the 80’s!</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="images/avater/author1.jpg" alt=""> Donald
                                                                Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                    <div class="tab-pane ts-overlay-style fade" id="nav-contact" role="tabpanel"
                                        aria-labelledby="nav-contact-tab">
                                        <div class="item" style="background-image: url(images/news/fashion/fashion1.jpg)">
                                            <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                            <a href="https://www.youtube.com/watch?v=_0UO1NcheAE" class="ts-video-btn">
                                                <i class="fa fa-play-circle-o"></i>
                                            </a>
                                            <div class="overlay-post-content">
                                                <div class="post-content">
                                                    <h3 class="post-title md">
                                                        <a href="#">10 critical points from Zuckerberg’s epic security
                                                            manifesto</a>
                                                    </h3>
                                                    <ul class="post-meta-info">
                                                        <li class="author">
                                                            <a href="#">
                                                                <img src="images/avater/author1.jpg" alt=""> Donald
                                                                Ramos
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <i class="fa fa-clock-o"></i>
                                                            March 21, 2019
                                                        </li>
                                                        <li class="active">
                                                            <i class="icon-fire"></i>
                                                            3,005
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- overlay post content-->
                                        </div>
                                        <!-- item end-->
                                    </div>
                                    <!--tab-pane ts-overlay-style end-->
                                </div>

                            </div>
                            <!-- col end-->

                            <div class="col-lg-5">
                                <div class="nav post-list-box" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home"
                                        role="tab" aria-controls="nav-home" aria-selected="true">
                                        <div class="post-content media">
                                            <img class="d-flex" src="images/news/travel/travel2.jpg" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Tesla just lost its head of global finance
                                                </h4>
                                                <span class="post-date-info">
                                                    <i class="fa fa-clock-o"></i>
                                                    March 21, 2019
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <div class="post-content media">
                                            <img class="d-flex" src="images/news/health/health2.jpg" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Beats did announce something, after all

                                                </h4>
                                                <span class="post-date-info">
                                                    <i class="fa fa-clock-o"></i>
                                                    March 21, 2019
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                        role="tab" aria-controls="nav-contact" aria-selected="false">
                                        <div class="post-content media">
                                            <img class="d-flex" src="images/news/fashion/fashion1.jpg" alt="">
                                            <div class="media-body align-self-center">
                                                <h4 class="post-title">
                                                    Tourism in Dubai boom tourist favorite place
                                                </h4>
                                                <span class="post-date-info">
                                                    <i class="fa fa-clock-o"></i>
                                                    March 21, 2019
                                                </span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- nav item end-->
                                </div>
                                <!-- watch list post end-->
                            </div>
                            <!-- col end -->
                        </div>
                        <!-- row end-->
                    </div>
                    <!-- ts-populer-post-box end-->

                    <!-- tranding post start -->
                    <div class="row category-style">
                        <div class="col-lg-4">
                            <div class="ts-grid-box ts-col-box">
                                <h2 class="ts-title">Fashion</h2>
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                        <a href="#">
                                            <img class="img-fluid" src="images/news/fashion/fashion3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Tourism in Dubai is booming by international tourist</a>
                                        </h3>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->

                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a class="post-cat ts-pink-bg" href="#">Fashion</a>
                                        <a href="#">
                                            <img class="img-fluid" src="images/news/fashion/fashion2.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h3 class="post-title">
                                            <a href="#">Beats did announce something today, after all</a>
                                        </h3>
                                    </div>
                                </div>
                                <!-- ts-grid-box end-->
                            </div>
                            <!-- ts-populer-post-box end-->
                        </div>
                        <!-- col end-->
                        <div class="col-lg-8">
                            <div class="ts-grid-box ts-tranding-post">
                                <h2 class="ts-title">Trending</h2>
                                <!-- arrow start -->
                                <div class="ts-arrow">
                                    <a class="control-prev" href="#carouselExampleIndicators" role="button"
                                        data-slide="prev">
                                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                                    </a>
                                    <a class="control-next" href="#carouselExampleIndicators" role="button"
                                        data-slide="next">
                                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                                    </a>
                                </div>
                                <!-- arrow end -->

                                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="ts-overlay-style">
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="#">
                                                            <img class="img-fluid" src="images/news/sports/sports3.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md">
                                                                <a href="#">New York Fashion Week continues with its
                                                                    penultimate day featuring looks from Marc Jacobs and
                                                                    more</a>
                                                            </h3>
                                                            <ul class="post-meta-info">
                                                                <li class="author">
                                                                    <a href="#">
                                                                        <img src="images/avater/author1.jpg" alt="">
                                                                        Donald Ramos
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    March 21, 2019
                                                                </li>
                                                                <li class="active">
                                                                    <i class="icon-fire"></i>
                                                                    3,005
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- ts-overlay-style end-->

                                        <div class="carousel-item">
                                            <div class="ts-overlay-style">
                                                <div class="item">
                                                    <div class="ts-post-thumb">
                                                        <a href="#">
                                                            <img class="img-fluid" src="images/news/fashion/fashion4.jpg"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h3 class="post-title md">
                                                                <a href="#">They’re back! Kennedy Darling, LeCras named
                                                                    Kennedy Darling, LeCras named to return</a>
                                                            </h3>
                                                            <ul class="post-meta-info">
                                                                <li class="author">
                                                                    <a href="#">
                                                                        <img src="images/avater/author1.jpg" alt="">
                                                                        Donald Ramos
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <i class="fa fa-clock-o"></i>
                                                                    March 21, 2019
                                                                </li>
                                                                <li class="active">
                                                                    <i class="icon-fire"></i>
                                                                    3,005
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- carousel-inner end -->



                                    <!-- slider dot start -->
                                    <ol class="slider-indicators carousel-indicators heighlight clearfix">
                                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                            <div class="post-content media">
                                                <div class="d-flex post-count">01</div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="post-title">
                                                        <a href="#">The time get back all of the respect from
                                                        </a>
                                                    </h4>
                                                    <span class="post-date-info">
                                                        <i class="fa fa-clock-o"></i>
                                                        March 21, 2019
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li data-target="#carouselExampleIndicators" data-slide-to="1">
                                            <div class="post-content media">
                                                <div class="d-flex post-count">02</div>
                                                <div class="media-body align-self-center">
                                                    <h4 class="post-title">
                                                        <a href="#">Google vote-shifting threatens both right
                                                        </a>
                                                    </h4>
                                                    <span class="post-date-info">
                                                        <i class="fa fa-clock-o"></i>
                                                        March 21, 2019
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                    </ol>
                                    <!-- slider dot end -->
                                </div>
                                <!-- watch now content end-->
                            </div>
                        </div>
                    </div>
                    <!-- tranding post end -->

                </div>
                <!-- col end-->
                <div class="col-lg-3">
                    <div class="right-sidebar">
                        <div class="ts-grid-box widgets">
                            <h2 class="ts-title">Follow us</h2>
                            <ul class="ts-social-list">
                                <li class="ts-facebook">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Likes</span>
                                </li>
                                <li class="ts-google-plus">
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-twitter">
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-pinterest">
                                    <a href="#">
                                        <i class="fa fa-pinterest-p"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Photos</span>
                                </li>
                                <li class="ts-linkedin">
                                    <a href="#">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                                <li class="ts-youtube">
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                    <b>12.5 k </b>
                                    <span>Follwers</span>
                                </li>
                            </ul>
                        </div>
                        <!-- widgets end-->

                        <div class="widgets widget-banner">
                            <a href="#">
                                <img src="images/banner/sidebar-banner1.jpg" alt="">
                            </a>
                        </div>
                        <!-- widgets end-->
                        <div class="widgets ts-grid-box widgets-populer-post">
                            <div class="topic-list">
                                hot Topics
                            </div>
                            <div class="ts-overlay-style">
                                <div class="item">
                                    <div class="ts-post-thumb">
                                        <a href="#">
                                            <img class="img-fluid" src="images/news/tech/tech3.jpg" alt="">
                                        </a>
                                    </div>
                                    <div class="overlay-post-content">
                                        <div class="post-content">
                                            <h3 class="post-title">
                                                <a href="#">Tourism in Dubai is boom international tourist</a>
                                            </h3>
                                            <span class="post-date-info">
                                                <i class="fa fa-clock-o"></i>
                                                March 21, 2019
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ts-overlay-style  end-->

                            <div class="post-content media">
                                <img class="d-flex sidebar-img" src="images/news/sports/sports2.jpg" alt="">
                                <div class="media-body align-self-center">
                                    <h4 class="post-title">
                                        <a href="#">18 month shoots himself by gun </a>
                                    </h4>
                                </div>
                            </div>
                            <!-- post content end-->
                            <div class="post-content media">
                                <img class="d-flex sidebar-img" src="images/news/tech/tech2.jpg" alt="">
                                <div class="media-body align-self-center">
                                    <h4 class="post-title">
                                        <a href="#">easy lemon rice (yellow rice) </a>
                                    </h4>
                                </div>
                            </div>
                            <!-- post content end-->
                        </div>
                        <!-- widgets end-->
                    </div>
                    <!-- right sidebar end-->
                </div>
                <!-- col end-->
            </div>

        </div>
        <!-- container end-->
    </section>
    <!-- watch now end-->

    <!-- post wraper start-->
    <section class="block-wrapper mb-45" id="more-news-section">
        <div class="container">
            <div class="ts-grid-box ts-grid-box-heighlight">
                <h2 class="ts-title">More News</h2>

                <div class="owl-carousel" id="more-news-slider">
                    <div class="ts-overlay-style">
                        <div class="item">
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/sports/sports4.jpg" alt="">
                                </a>
                            </div>
                            <a class="post-cat ts-green-bg" href="#">Sports</a>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Man plans to ride out Hurricane Florence on a boat out Hurricane</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                    <div class="ts-overlay-style">
                        <div class="item">
                            <a class="post-cat ts-yellow-bg" href="#">Food</a>
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/foods/food2.jpg" alt="">
                                </a>
                            </div>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">help us make mfs better with our better with our reader survey</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                    <div class="ts-overlay-style">
                        <div class="item">
                            <a class="post-cat ts-orange-bg" href="#">Travel</a>
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/travel/travel4.jpg" alt="">
                                </a>
                            </div>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Tourism in Dubai is booming international tourist most visited
                                            place</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                    <div class="ts-overlay-style">
                        <div class="item">
                            <a class="post-cat ts-pink-bg" href="#">Music</a>
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/music/music2.jpg" alt="">
                                </a>
                            </div>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Tourism in Dubai is booming international tourist most visited
                                            place</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                    <div class="ts-overlay-style">
                        <div class="item">
                            <a class="post-cat ts-green-bg" href="#">sports</a>
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/sports/sports2.jpg" alt="">
                                </a>
                            </div>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Tourism in Dubai is booming international tourist most visited
                                            place</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                    <div class="ts-overlay-style">
                        <div class="item">
                            <a class="post-cat ts-orange-bg" href="#">Travel</a>
                            <div class="ts-post-thumb">
                                <a href="#">
                                    <img class="img-fluid" src="images/news/travel/travel6.jpg" alt="">
                                </a>
                            </div>
                            <div class="overlay-post-content">
                                <div class="post-content">
                                    <h3 class="post-title">
                                        <a href="#">Tourism in Dubai is booming international tourist most visited
                                            place</a>
                                    </h3>
                                    <span class="post-date-info">
                                        <i class="fa fa-clock-o"></i>
                                        March 21, 2019
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end item-->
                    </div>
                    <!-- ts-overlay-style end-->
                </div>
                <!-- most-populers end-->
            </div>
            <!-- ts-populer-post-box end-->
        </div>
        <!-- container end-->
    </section>
    <!-- post wraper end-->

    <!-- footer social list start-->
    <section class="ts-footer-social-list">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="footer-logo">
                        <a href="#">
                            <img src="images/logo/footer_logo.png" alt="">
                        </a>
                    </div>
                    <!-- footer logo end-->
                </div>
                <!-- col end-->

                <div class="col-lg-8 align-self-center">
                    <ul class="footer-social">
                        <li class="ts-facebook">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                                <span>Facebook</span>
                            </a>
                        </li>
                        <li class="ts-google-plus">
                            <a href="#">
                                <i class="fa fa-google-plus"></i>
                                <span>Google Plus</span>
                            </a>
                        </li>
                        <li class="ts-twitter">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                                <span>Twitter</span>
                            </a>
                        </li>
                        <li class="ts-pinterest">
                            <a href="#">
                                <i class="fa fa-pinterest-p"></i>
                                <span>pinterest</span>
                            </a>
                        </li>
                        <li class="ts-linkedin">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                                <span>Linkedin</span>
                            </a>

                        </li>
                    </ul>
                </div>
                <!-- col end-->

            </div>
        </div>
    </section>
    <!-- footer social list end-->

    <!-- newslater start -->
    <section class="ts-newslatter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ts-newslatter-content">
                        <h2>
                            Sign up for the Newsletter
                        </h2>
                        <p>
                            Join our newsletter and get updates in your inbox. We won’t spam you and we respect your
                            privacy.
                        </p>
                    </div>
                </div>
                <!-- col end-->

                <div class="col-lg-6 align-self-center">
                    <div class="newsletter-form">
                        <form action="#" method="post" class="media align-items-end">
                            <div class="email-form-group media-body">
                                <i class="fa fa-paper-plane" aria-hidden="true"></i>
                                <input type="email" name="email" id="newsletter-form-email" class="form-control"
                                    placeholder="Enter Your Email" autocomplete="off" required>
                            </div>
                            <div class="d-flex ts-submit-btn">
                                <button class="btn btn-primary">Subscribe</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- newslater end -->

@endsection
