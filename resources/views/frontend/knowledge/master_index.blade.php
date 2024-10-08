@extends('layouts.master')

@section('content')
    @if ($maincat == 'knowledge')
        @if ($knowledges->count() > 0)
            @if ($getSubCat->name == 'News')
                <main class="page_main_wrapper">
                    <!-- START NEWSTRICKER -->
                    <div class="container">
                        <div class="newstricker_inner">
                            <div class="trending"><strong>Trending</strong> Now</div>
                            <div class="news-ticker owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">Lorem Ipsum is simply dummy text of the printing and typesetting
                                        industry.</a>
                                </div>
                                <div class="item">
                                    <a href="#">It is a long established fact that a reader will be distracted by the
                                        readable.</a>
                                </div>
                                <div class="item">
                                    <a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END OF /. NEWSTRICKER -->

                    @foreach ($knowledgeSliders->chunk(4) as $key => $knowledgeSlider)
                        {{-- {{ $knowledgeSlider->title }} --}}
                        {{-- {{ $key }} --}}
                        <!-- START POST BLOCK SECTION -->
                        <section class="slider-inner">
                            <div class="container">
                                <div class="row thm-margin">
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="slider-wrapper">
                                            <div id="owl-slider" class="owl-carousel owl-theme">
                                                <!-- Slider item one -->
                                                @foreach ($knowledgeSlider->take(1) as $item1)
                                                    <div class="item">
                                                        <div class="slider-post post-height-1">
                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}"
                                                                class="news-image"><img
                                                                    src="{{ asset('uploads/knowledge/posts/' . $item1->thubmnail) }}"
                                                                    alt="" class="img-responsive"></a>

                                                            <div class="post-text">
                                                                @foreach ($item1->subSubCat as $sub)
                                                                    <span class="post-category">{{ $sub->name }}</span>
                                                                @endforeach

                                                                <h2><a
                                                                        href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}">{{ $item1->title }}</a>
                                                                </h2>
                                                                <ul class="authar-info">
                                                                    <li class="authar"><a href="#">by david hall</a></li>
                                                                    @php
                                                                    $date = date("M j Y", strtotime($item1->publish_date));
                                                                    @endphp

                                                                    <li class="date">{{ $date }}</li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!-- /.Slider item one -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="row slider-right-post thm-margin">

                                            {{-- {{ $item1->id }}
                                            --}}
                                            @foreach ($knowledgeSlider as $item2)
                                                @if ($item1->id == $item2->id)
                                                    @continue
                                                @endif

                                                <div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
                                                    <div class="slider-post post-height-2">
                                                        <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}"
                                                            class="news-image"><img
                                                                src="{{ asset('uploads/knowledge/posts/' . $item2->thubmnail) }}"
                                                                alt="" class="img-responsive"></a>
                                                        <div class="post-text">
                                                            @foreach ($item2->subSubCat as $sub)
                                                                <span class="post-category">{{ $sub->name }}</span>
                                                            @endforeach
                                                            <h4><a
                                                                    href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}">{{ $item2->title }}</a>
                                                            </h4>
                                                            <ul class="authar-info">
                                                                <li class="authar hidden-xs hidden-sm"><a
                                                                        href="#">{{ $item2->author }}</a>
                                                                </li>
                                                                @php
                                                                $date = date("M j Y", strtotime($item2->publish_date));
                                                                @endphp
                                                                <li class="hidden-xs">{{ $date }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END OF /. POST BLOCK SECTION -->


                    @endforeach

                    {{-- @foreach ($knowledges as $item)
                        @foreach ($item->subSubCat as $item1)
                            {{ $item1->name }}
                            {{ $item->title }}
                        @endforeach
                    @endforeach --}}

                    {{-- @foreach ($knowledges as $item)


                        @foreach ($item->knowledge as $item1)
                            {{ $item->name }}
                            {{ $item1->title }}

                        @endforeach



                    @endforeach --}}

                    <div class="container">
                        <div class="row row-m">
                            <!-- START MAIN CONTENT -->
                            <div class="col-sm-8 col-p main-content">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE ONE (Popular news) -->
                                    @foreach ($knowledges as $knowledgeCat)
                                        @if ($knowledgeCat->knowledges->count() > 0)
                                            <div class="post-inner">
                                                <!--post header-->
                                                <div class="post-head">
                                                    <h2 class="title"><strong>{{ $knowledgeCat->name }}</strong></h2>
                                                    {{-- <div class="filter-nav">
                                                        <ul>
                                                            <li><a href="#" class="active">all</a></li>
                                                            <li><a href="#">business</a></li>
                                                            <li><a href="#">gadgets</a></li>
                                                            <li><a href="#">design</a></li>
                                                            <li><a href="#">fashion</a></li>
                                                            <li><a href="#">video</a></li>
                                                        </ul>
                                                    </div> --}}
                                                </div>
                                                <!-- post body -->
                                                <div class="post-body">

                                                    <!-- item one -->

                                                    <div class="item">
                                                        <div class="row">
                                                            <div class="col-sm-6 main-post-inner bord-right">
                                                                @foreach ($knowledgeCat->knowledges->take(1) as $knowledge)
                                                                    <article>
                                                                        <figure>
                                                                            <a
                                                                                href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"><img
                                                                                    src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                    height="242" width="345" alt=""
                                                                                    class="img-responsive"></a>
                                                                            {{-- <span
                                                                                class="post-category">{{ $knowledgeCat->name }}</span>
                                                                            --}}
                                                                        </figure>
                                                                        <div class="post-info">
                                                                            <h3><a
                                                                                    href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}
                                                                                </a></h3>
                                                                            <ul class="authar-info">
                                                                                @php
                                                                                $date = date("M j Y",
                                                                                strtotime($knowledge->publish_date));
                                                                                @endphp
                                                                                <li><i class="ti-timer"></i>{{ $date }}</li>
                                                                                <li class="like"><a href="#"><i
                                                                                            class="ti-thumb-up"></i>15
                                                                                        likes</a></li>
                                                                            </ul>
                                                                            <p>{{ Str::limit($knowledge->short_desc, 150) }}
                                                                            </p>
                                                                        </div>
                                                                    </article>
                                                                @endforeach

                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="news-list">
                                                                    @foreach ($knowledgeCat->knowledges->take(4) as $knowledge)

                                                                        <div class="news-list-item">
                                                                            <div class="img-wrapper">
                                                                                <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                    class="thumb">
                                                                                    <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                        alt="" class="img-responsive">

                                                                                </a>
                                                                            </div>
                                                                            <div class="post-info-2">
                                                                                <h5><a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                        class="title">{{ $knowledge->title }}</a>
                                                                                </h5>
                                                                                <ul class="authar-info">
                                                                                    @php
                                                                                    $date = date("M j Y",
                                                                                    strtotime($knowledge->publish_date));
                                                                                    @endphp
                                                                                    <li><i class="ti-timer"></i> {{ $date }}
                                                                                    </li>
                                                                                    <li class="like hidden-xs hidden-sm"><a
                                                                                            href="#"><i
                                                                                                class="ti-thumb-up"></i>15
                                                                                            likes</a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- item two -->


                                                </div>
                                                <!-- Post footer -->
                                                <div class="post-footer">
                                                    <div class="row thm-margin">
                                                        <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                            <a href="{{ url('list/' . $maincat . '/' . $getSubCat->url . '/' . $knowledgeCat->id) }}"
                                                                class="more-btn">View All</a>
                                                        </div>
                                                        <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                            <div class="social">
                                                                <ul>
                                                                    <li>
                                                                        <div class="share transition">
                                                                            <a href="#" target="_blank" class="ico fb"><i
                                                                                    class="fab fa-facebook-f"></i></a>
                                                                            <a href="#" target="_blank" class="ico tw"><i
                                                                                    class="fab fa-twitter"></i></a>
                                                                            <a href="#" target="_blank" class="ico rs"><i
                                                                                    class="fas fa-rss"></i></a>
                                                                            <a href="#" target="_blank" class="ico pin"><i
                                                                                    class="fab fa-pinterest-p"></i></a>
                                                                            <i class="ti-share ico-share"></i>
                                                                        </div>
                                                                    </li>
                                                                    <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                    <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!-- END OF /. POST CATEGORY STYLE ONE (Popular news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START POST CATEGORY STYLE TWO (Travel news) -->
                                    <div class="post-inner post-inner-2">
                                        <!--post header-->
                                        <div class="post-head">
                                            <h2 class="title"><strong>Travel</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-3.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-1.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-2.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-3.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-4.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-4.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-5.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-6.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-7.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-8.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  END OF /. POST CATEGORY STYLE TWO (Travel news) -->
                                </div>
                            </div>
                            <!-- END OF /. MAIN CONTENT -->
                            <!-- START SIDE CONTENT -->
                            <div class="col-sm-4 col-p rightSidebar">
                                <div class="theiaStickySidebar">
                                    <!-- START WEATHER -->
                                    <div class="weather-wrapper">
                                        <div class="row thm-margin">
                                            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 weather-week thm-padding">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div>Tue, 34°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-sun"></i>
                                                        <div>Wed, 38°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-cloud"></i>
                                                        <div>thu, 32°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-rain"></i>
                                                        <div>Fri, 31°F</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap active">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Tuesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div class="main-temp">34°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 13mph WSW</div>
                                                        <div class="humidity">Humidity: 91%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-sun"></i>
                                                        <div class="main-temp">38°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloud"></i>
                                                        <div class="main-temp">32°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Friday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-rain"></i>
                                                        <div class="main-temp">31°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 16mph WSW</div>
                                                        <div class="humidity">Humidity: 93%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. WEATHER -->
                                    <!-- START SOCIAL ICON -->
                                    <div class="social-media-inner">
                                        <ul class="social-media clearfix">
                                            <li>
                                                <a href="#" class="rss">
                                                    <i class="fas fa-rss"></i>
                                                    <div>2,035</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="fb">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <div>3,794</div>
                                                    <p>Fans</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="insta">
                                                    <i class="fab fa-instagram"></i>
                                                    <div>941</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="you_tube">
                                                    <i class="fab fa-youtube"></i>
                                                    <div>7,820</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter">
                                                    <i class="fab fa-twitter"></i>
                                                    <div>1,562</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="pint">
                                                    <i class="fab fa-pinterest-p"></i>
                                                    <div>1,310</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                        </ul> <!-- /.social icon -->
                                    </div>
                                    <!-- END OF /. SOCIAL ICON -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START NAV TABS -->
                                    <div class="tabs-wrapper">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab">Most Viewed</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                    data-toggle="tab">Popular news</a></li>
                                        </ul>
                                        <!-- Tab panels one -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                                <div class="most-viewed">
                                                    <ul id="most-today" class="content tabs-content">
                                                        <li><span class="count">01</span><span class="text"><a
                                                                    href="#">South
                                                                    Africa
                                                                    bounce back on eventful day</a></span></li>
                                                        <li><span class="count">02</span><span class="text"><a
                                                                    href="#">Steyn
                                                                    ruled
                                                                    out
                                                                    of series with shoulder fracture</a></span></li>
                                                        <li><span class="count">03</span><span class="text"><a href="#">BCCI
                                                                    asks
                                                                    ECB to
                                                                    bear expenses of team's India tour</a></span></li>
                                                        <li><span class="count">04</span><span class="text"><a
                                                                    href="#">Duminy,
                                                                    Elgar
                                                                    tons set Australia huge target</a></span></li>
                                                        <li><span class="count">05</span><span class="text"><a
                                                                    href="#">English
                                                                    spinners
                                                                    are third-class citizens, says Graeme Swann</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Tab panels two -->
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="popular-news">
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. NAV TABS -->
                                </div>
                            </div>
                            <!-- END OF /. SIDE CONTENT -->
                        </div>
                    </div>
                    <!-- START FEATURED NEWS -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="featured-inner">
                                    <div id="featured-owl" class="owl-carousel">
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-1.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-2.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-3.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-4.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-5.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. FEATURED NEWS -->
                    <!-- START YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="youtube-wrapper">
                                    <div class="playlist-title">
                                        <h4>Latest Video News</h4>
                                    </div>
                                    <div id="rypp-demo-1" class="RYPP r16-9"
                                        data-ids="PQEX8QQ1fWg,cIyVNoY3_L4,3WWlhPmqXQI,kssD4L2NBw0,YcwrRA2BIlw,HMpmI2F2cMs,intentionally_erroneus">
                                        <div class="RYPP-video">
                                            <div class="RYPP-video-player">
                                                <!-- Will be replaced -->
                                            </div>
                                        </div>
                                        <div class="RYPP-playlist">
                                            <header>
                                                <h2 class="_h1 RYPP-title">Playlist title</h2>
                                                <p class="RYPP-desc">Playlist subtitle <a href="#"
                                                        target="_blank">#hashtag</a>
                                                </p>
                                            </header>
                                            <div class="RYPP-items"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row row-m">
                            <div class="col-sm-8 main-content col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE THREE (More news) -->
                                    <div class="post-inner">
                                        <!-- post header -->
                                        <div class="post-head">
                                            <h2 class="title"><strong>More</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-1.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Holliday Recipes </span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-2.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-3.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-4.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-5.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-6.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-7.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-8.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. POST CATEGORY STYLE THREE (More news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START CARD POST -->
                                    <div class="row row-m">
                                        <div class="col-sm-6 col-p">
                                            <div class="posts card-post">
                                                <div class="post-grid post-grid-item">
                                                    <figure class="posts-thumb">
                                                        <span class="post-category">National</span>
                                                        <a href="#"><img src="assets/images/378x270-1.jpg" alt=""></a>
                                                    </figure>
                                                    <div class="posts-inner">
                                                        <a href="#" class="posts-link"></a>
                                                        <h6 class="posts-title"><a href="#">The Alchemists team is appearing
                                                                in
                                                                L.A.
                                                                Beach for charity</a></h6>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do
                                                            eiusmod
                                                            tempor incididunt ut labore et dolore
                                                            magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum
                                                            laborem.
                                                        </p>
                                                    </div>
                                                    <div class="posts__footer card__footer">
                                                        <div class="post-author">
                                                            <figure class="post-author-avatar hidden-xs">
                                                                <img src="assets/images/avatar-1.jpg"
                                                                    alt="Post Author Avatar">
                                                            </figure>
                                                            <div class="post-author-info ">
                                                                <h4 class="post-author-name">Naeem Khan</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="post-meta">
                                                            <li class="meta-item "><i class="ti-eye"></i> 2369</li>
                                                            <li class="meta-item "><a href="#"><i class="ti-heart"></i>
                                                                    530</a>
                                                            </li>
                                                            <li class="meta-item "><a href="#"><i class="ti-comments"></i>
                                                                    18</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-p">
                                            <div class="posts">
                                                <ul>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">Trainings are getting really
                                                                    hard
                                                                    reaching the final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The victory againts The
                                                                    Sharks
                                                                    brings us
                                                                    closer to the Final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid hidden-sm">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The next match against The
                                                                    Clovers
                                                                    will
                                                                    be this Friday</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. CARD POST -->
                                </div>
                            </div>
                            <div class="col-sm-4 rightSidebar col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START GAMES RESULT POST -->
                                    <div class="panel_inner games-news">
                                        <div class="panel_header">
                                            <h4><strong>Last</strong> Game Results</h4>
                                        </div>
                                        <div class="panel_body">
                                            <div class="games-result-header">
                                                <h3 class="games-result-title">Championship Quarter Finals</h3>
                                                <time class="games-result-date" datetime="2016-03-24">Saturday, March 24th,
                                                    2017</time>
                                            </div>
                                            <div class="games-result-main">
                                                <!-- 1st Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_1.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Alchemists</h5>
                                                        <div class="games-result-team-desc">Elric School</div>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->
                                                <div class="games-result-score-inner">
                                                    <div class="games-result-score">
                                                        <span class="games-result-score-result winner">107</span>
                                                        <span>-</span>
                                                        <span class="games-result-score-result loser">102</span>
                                                    </div>
                                                    <div class="games-result-score-label">Final Score</div>
                                                </div>
                                                <!-- 2nd Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_2.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Sharks</h5>
                                                        <div class="games-result-team-desc">Marine College</div>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Scoreboard</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>T</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Alchemists</th>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td>22</td>
                                                        <td>24</td>
                                                        <td>107</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sharks</th>
                                                        <td>22</td>
                                                        <td>34</td>
                                                        <td>20</td>
                                                        <td>26</td>
                                                        <td>102</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END OF /. GAMES RESULT POST -->
                                    <!-- START CATEGORIES WIDGET -->
                                    <div class="panel_inner categories-widget">
                                        <div class="panel_header">
                                            <h4><strong>Hot</strong> Categories</h4>
                                        </div>
                                        <div class="panel_body">
                                            <ul class="category-list">
                                                <li><a href="#">Business <span>12</span></a></li>
                                                <li><a href="#">Sport <span>26</span></a></li>
                                                <li><a href="#">LifeStyle <span>55</span></a></li>
                                                <li><a href="#">Fashion <span>37</span></a></li>
                                                <li><a href="#">Technology <span>62</span></a></li>
                                                <li><a href="#">Music <span>10</span></a></li>
                                                <li><a href="#">Culture <span>43</span></a></li>
                                                <li><a href="#">Design <span>74</span></a></li>
                                                <li><a href="#">Entertainment <span>11</span></a></li>
                                                <li><a href="#">video <span>41</span></a></li>
                                                <li><a href="#">Travel <span>11</span></a></li>
                                                <li><a href="#">Food <span>29</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END OF /. CATEGORIES WIDGET -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="articles-wrapper">
                        <div class="container">
                            <div class="row row-m">
                                <div class="col-sm-8 main-content col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>Latest</strong> articles</h2>
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">There are many variations of passages
                                                                of
                                                                Lorem
                                                                Ipsum available, but the majority have</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-2.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Contrary to popular belief, Lorem
                                                                Ipsum is
                                                                not
                                                                simply random text. It has roots in a piece</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-3.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">The standard chunk of Lorem Ipsum used
                                                                since
                                                                the
                                                                1500s is reproduced below for those interested.</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-4.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">It is a long established fact that a
                                                                reader
                                                                will
                                                                be distracted by the readable </a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/340x215-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Replication For Dummies 4 Easy Steps
                                                                To
                                                                Professional DVD</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- /. post body -->
                                            <!--Post footer-->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <!-- pagination -->
                                                        <ul class="pagination">
                                                            <li class="active"><span class="ti-angle-left"></span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li class="disabled"><span class="extend">...</span></li>
                                                            <li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#"><i class="ti-angle-right"></i></a></li>
                                                        </ul> <!-- /.pagination -->
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.Post footer-->
                                        </div>
                                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                                    </div>
                                </div>
                                <div class="col-sm-4 rightSidebar col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START ARCHIVE -->
                                        <div class="archive-wrapper">
                                            <div id="datepicker"></div>
                                        </div>
                                        <!-- END OF /. ARCHIVE -->
                                        <!-- START POLL WIDGET -->
                                        <div class="panel_inner poll-widget">
                                            <div class="panel_header">
                                                <h4><strong>Poll</strong></h4>
                                            </div>
                                            <div class="panel_body poll-content">
                                                <form method="get" id="home_poll">
                                                    <h6>Is it fair for the WICB to ask for 20% of players' fees to allow
                                                        them to
                                                        participate in overseas T20 leagues?</h6>
                                                    <ul>
                                                        <li><input id="poll_5444" value="5444" name="poll"
                                                                type="radio"><label for="poll_5444">Yes, they have invested
                                                                in developing
                                                                talent</label>
                                                        </li>
                                                        <li><input id="poll_5445" value="5445" name="poll"
                                                                type="radio"><label for="poll_5445">No, this is restraint of
                                                                trade</label></li>
                                                    </ul>
                                                    <a href="#" class="btn btn-news">Submit</a>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- END OF /. POLL WIDGET -->
                                        <!-- START TAGS -->
                                        <div class="panel_inner">
                                            <div class="panel_header">
                                                <h4><strong>Tags </strong></h4>
                                            </div>
                                            <div class="panel_body">
                                                <div class="tags-inner">
                                                    <a class="ui tag">Nature</a>
                                                    <a class="ui tag">Fashion</a>
                                                    <a class="ui tag">Wordpress</a>
                                                    <a class="ui tag">Photo</a>
                                                    <a class="ui tag">Travel</a>
                                                    <a class="ui tag">Hotel</a>
                                                    <a class="ui tag">Business</a>
                                                    <a class="ui tag">Culture</a>
                                                    <a class="ui tag">Sports</a>
                                                    <a class="ui tag">Design</a>
                                                    <a class="ui tag">Entertainment </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF /. TAGS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            @endif
            @if ($getSubCat->url == 'articles')
                <main class="page_main_wrapper">
                    <!-- START NEWSTRICKER -->
                    <div class="container">
                        <div class="newstricker_inner">
                            <div class="trending"><strong>Trending</strong> Now</div>
                            <div class="news-ticker owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">this is</a>
                                </div>
                                <div class="item">
                                    <a href="#">It is a long established fact that a reader will be distracted by the
                                        readable.</a>
                                </div>
                                <div class="item">
                                    <a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END OF /. NEWSTRICKER -->

                    @foreach ($knowledgeSliders->chunk(3) as $key => $knowledgeSlider)
                        {{-- {{ $knowledgeSlider->title }} --}}
                        {{-- {{ $key }} --}}
                        <!-- START POST BLOCK SECTION -->

                        <section class="slider-inner">
                            <div class="container">
                                <div class="row thm-margin slider-shadow">
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="slider-wrapper">
                                            <div id="owl-slider" class="owl-carousel owl-theme">
                                                @foreach ($knowledgeSlider->take(1) as $item1)
                                                    <!-- Slider item one -->
                                                    <div class="item">
                                                        <div class="slider-post post-height-1">
                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}"
                                                                class="news-image"><img
                                                                    src="{{ asset('uploads/knowledge/posts/' . $item1->thubmnail) }}"
                                                                    alt="" class="img-responsive"></a>
                                                            <div class="post-text">
                                                                @foreach ($item1->subSubCat as $sub)
                                                                    <span class="post-category">{{ $sub->name }}</span>
                                                                @endforeach
                                                                <h2><a
                                                                        href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}">{{ $item1->title }}</a>
                                                                </h2>
                                                                <ul class="authar-info">
                                                                    <li class="authar"><a href="#">by david hall</a></li>
                                                                    @php
                                                                    $date = date("M j Y", strtotime($item1->publish_date));
                                                                    @endphp

                                                                    <li class="date">{{ $date }}</li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.Slider item one -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="row slider-right-post thm-margin">
                                            @foreach ($knowledgeSlider as $item2)
                                                @if ($item1->id == $item2->id)
                                                    @continue
                                                @endif

                                                <div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
                                                    <div class="slider-post post-height-3">
                                                        <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}"
                                                            class="news-image"><img
                                                                src="{{ asset('uploads/knowledge/posts/' . $item2->thubmnail) }}"
                                                                alt=""></a>
                                                        <div class="post-text">
                                                            @foreach ($item2->subSubCat as $sub)
                                                                <span class="post-category">{{ $sub->name }}</span>
                                                            @endforeach

                                                            <h4><a
                                                                    href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}">{{ $item2->title }}</a>
                                                            </h4>
                                                            <ul class="authar-info">
                                                                <li class="authar hidden-xs hidden-sm"><a
                                                                        href="#">{{ $item2->author }}</a>
                                                                </li>
                                                                @php
                                                                $date = date("M j Y", strtotime($item2->publish_date));
                                                                @endphp
                                                                <li class="hidden-xs">{{ $date }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END OF /. POST BLOCK SECTION -->



                    @endforeach

                    {{-- @foreach ($knowledges as $item)
                        @foreach ($item->subSubCat as $item1)
                            {{ $item1->name }}
                            {{ $item->title }}
                        @endforeach
                    @endforeach --}}

                    {{-- @foreach ($knowledges as $item)


                        @foreach ($item->knowledge as $item1)
                            {{ $item->name }}
                            {{ $item1->title }}

                        @endforeach



                    @endforeach --}}

                    <div class="container">
                        <div class="row row-m">
                            <!-- START MAIN CONTENT -->
                            <div class="col-sm-8 col-p main-content">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE ONE (Popular news) -->
                                    @foreach ($knowledges as $knowledgeCat)
                                    @if ($knowledgeCat->knowledges->count() > 0)

                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>{{ $knowledgeCat->name }}</strong></h2>
                                                {{-- <div class="filter-nav">
                                                    <ul>
                                                        <li><a href="#" class="active">all</a></li>
                                                        <li><a href="#">business</a></li>
                                                        <li><a href="#">gadgets</a></li>
                                                        <li><a href="#">design</a></li>
                                                        <li><a href="#">fashion</a></li>
                                                        <li><a href="#">video</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">

                                                <!-- item one -->

                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            @foreach ($knowledgeCat->knowledges->take(1) as $knowledge)
                                                                <article>
                                                                    <figure>
                                                                        <a
                                                                            href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"><img
                                                                                src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                height="242" width="345" alt=""
                                                                                class="img-responsive"></a>
                                                                        {{-- <span
                                                                            class="post-category">{{ $knowledgeCat->name }}</span>
                                                                        --}}
                                                                    </figure>
                                                                    <div class="post-info">
                                                                        <h3><a
                                                                                href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}
                                                                            </a></h3>
                                                                        <ul class="authar-info">
                                                                            @php
                                                                            $date = date("M j Y",
                                                                            strtotime($knowledge->publish_date));
                                                                            @endphp
                                                                            <li><i class="ti-timer"></i>{{ $date }}</li>
                                                                            <li class="like"><a href="#"><i
                                                                                        class="ti-thumb-up"></i>15
                                                                                    likes</a></li>
                                                                        </ul>
                                                                        <p>{{ Str::limit($knowledge->short_desc, 150) }}</p>
                                                                    </div>
                                                                </article>
                                                            @endforeach

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-list">
                                                                @foreach ($knowledgeCat->knowledges->take(4) as $knowledge)

                                                                    <div class="news-list-item">
                                                                        <div class="img-wrapper">
                                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                class="thumb">
                                                                                <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                    alt="" class="img-responsive">

                                                                            </a>
                                                                        </div>
                                                                        <div class="post-info-2">
                                                                            <h5><a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                    class="title">{{ $knowledge->title }}</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                @php
                                                                                $date = date("M j Y",
                                                                                strtotime($knowledge->publish_date));
                                                                                @endphp
                                                                                <li><i class="ti-timer"></i> {{ $date }}
                                                                                </li>
                                                                                <li class="like hidden-xs hidden-sm"><a
                                                                                        href="#"><i
                                                                                            class="ti-thumb-up"></i>15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->


                                            </div>
                                            <!-- Post footer -->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <a href="{{ url('list/' . $maincat . '/' . $getSubCat->url . '/' . $knowledgeCat->id) }}"
                                                            class="more-btn">View All</a>
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    <!-- END OF /. POST CATEGORY STYLE ONE (Popular news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START POST CATEGORY STYLE TWO (Travel news) -->
                                    <div class="post-inner post-inner-2">
                                        <!--post header-->
                                        <div class="post-head">
                                            <h2 class="title"><strong>Travel</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-3.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-1.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-2.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-3.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-4.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-4.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-5.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-6.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-7.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-8.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  END OF /. POST CATEGORY STYLE TWO (Travel news) -->
                                </div>
                            </div>
                            <!-- END OF /. MAIN CONTENT -->
                            <!-- START SIDE CONTENT -->
                            <div class="col-sm-4 col-p rightSidebar">
                                <div class="theiaStickySidebar">
                                    <!-- START WEATHER -->
                                    <div class="weather-wrapper">
                                        <div class="row thm-margin">
                                            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 weather-week thm-padding">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div>Tue, 34°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-sun"></i>
                                                        <div>Wed, 38°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-cloud"></i>
                                                        <div>thu, 32°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-rain"></i>
                                                        <div>Fri, 31°F</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap active">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Tuesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div class="main-temp">34°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 13mph WSW</div>
                                                        <div class="humidity">Humidity: 91%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-sun"></i>
                                                        <div class="main-temp">38°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloud"></i>
                                                        <div class="main-temp">32°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Friday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-rain"></i>
                                                        <div class="main-temp">31°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 16mph WSW</div>
                                                        <div class="humidity">Humidity: 93%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. WEATHER -->
                                    <!-- START SOCIAL ICON -->
                                    <div class="social-media-inner">
                                        <ul class="social-media clearfix">
                                            <li>
                                                <a href="#" class="rss">
                                                    <i class="fas fa-rss"></i>
                                                    <div>2,035</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="fb">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <div>3,794</div>
                                                    <p>Fans</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="insta">
                                                    <i class="fab fa-instagram"></i>
                                                    <div>941</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="you_tube">
                                                    <i class="fab fa-youtube"></i>
                                                    <div>7,820</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter">
                                                    <i class="fab fa-twitter"></i>
                                                    <div>1,562</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="pint">
                                                    <i class="fab fa-pinterest-p"></i>
                                                    <div>1,310</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                        </ul> <!-- /.social icon -->
                                    </div>
                                    <!-- END OF /. SOCIAL ICON -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START NAV TABS -->
                                    <div class="tabs-wrapper">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab">Most Viewed</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                    data-toggle="tab">Popular news</a></li>
                                        </ul>
                                        <!-- Tab panels one -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                                <div class="most-viewed">
                                                    <ul id="most-today" class="content tabs-content">
                                                        <li><span class="count">01</span><span class="text"><a
                                                                    href="#">South
                                                                    Africa
                                                                    bounce back on eventful day</a></span></li>
                                                        <li><span class="count">02</span><span class="text"><a
                                                                    href="#">Steyn
                                                                    ruled
                                                                    out
                                                                    of series with shoulder fracture</a></span></li>
                                                        <li><span class="count">03</span><span class="text"><a href="#">BCCI
                                                                    asks
                                                                    ECB to
                                                                    bear expenses of team's India tour</a></span></li>
                                                        <li><span class="count">04</span><span class="text"><a
                                                                    href="#">Duminy,
                                                                    Elgar
                                                                    tons set Australia huge target</a></span></li>
                                                        <li><span class="count">05</span><span class="text"><a
                                                                    href="#">English
                                                                    spinners
                                                                    are third-class citizens, says Graeme Swann</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Tab panels two -->
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="popular-news">
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. NAV TABS -->
                                </div>
                            </div>
                            <!-- END OF /. SIDE CONTENT -->
                        </div>
                    </div>
                    <!-- START FEATURED NEWS -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="featured-inner">
                                    <div id="featured-owl" class="owl-carousel">
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-1.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-2.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-3.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-4.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-5.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. FEATURED NEWS -->
                    <!-- START YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="youtube-wrapper">
                                    <div class="playlist-title">
                                        <h4>Latest Video News</h4>
                                    </div>
                                    <div id="rypp-demo-1" class="RYPP r16-9"
                                        data-ids="PQEX8QQ1fWg,cIyVNoY3_L4,3WWlhPmqXQI,kssD4L2NBw0,YcwrRA2BIlw,HMpmI2F2cMs,intentionally_erroneus">
                                        <div class="RYPP-video">
                                            <div class="RYPP-video-player">
                                                <!-- Will be replaced -->
                                            </div>
                                        </div>
                                        <div class="RYPP-playlist">
                                            <header>
                                                <h2 class="_h1 RYPP-title">Playlist title</h2>
                                                <p class="RYPP-desc">Playlist subtitle <a href="#"
                                                        target="_blank">#hashtag</a>
                                                </p>
                                            </header>
                                            <div class="RYPP-items"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row row-m">
                            <div class="col-sm-8 main-content col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE THREE (More news) -->
                                    <div class="post-inner">
                                        <!-- post header -->
                                        <div class="post-head">
                                            <h2 class="title"><strong>More</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-1.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Holliday Recipes </span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-2.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-3.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-4.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-5.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-6.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-7.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-8.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. POST CATEGORY STYLE THREE (More news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START CARD POST -->
                                    <div class="row row-m">
                                        <div class="col-sm-6 col-p">
                                            <div class="posts card-post">
                                                <div class="post-grid post-grid-item">
                                                    <figure class="posts-thumb">
                                                        <span class="post-category">National</span>
                                                        <a href="#"><img src="assets/images/378x270-1.jpg" alt=""></a>
                                                    </figure>
                                                    <div class="posts-inner">
                                                        <a href="#" class="posts-link"></a>
                                                        <h6 class="posts-title"><a href="#">The Alchemists team is appearing
                                                                in
                                                                L.A.
                                                                Beach for charity</a></h6>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do
                                                            eiusmod
                                                            tempor incididunt ut labore et dolore
                                                            magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum
                                                            laborem.
                                                        </p>
                                                    </div>
                                                    <div class="posts__footer card__footer">
                                                        <div class="post-author">
                                                            <figure class="post-author-avatar hidden-xs">
                                                                <img src="assets/images/avatar-1.jpg"
                                                                    alt="Post Author Avatar">
                                                            </figure>
                                                            <div class="post-author-info ">
                                                                <h4 class="post-author-name">Naeem Khan</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="post-meta">
                                                            <li class="meta-item "><i class="ti-eye"></i> 2369</li>
                                                            <li class="meta-item "><a href="#"><i class="ti-heart"></i>
                                                                    530</a>
                                                            </li>
                                                            <li class="meta-item "><a href="#"><i class="ti-comments"></i>
                                                                    18</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-p">
                                            <div class="posts">
                                                <ul>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">Trainings are getting really
                                                                    hard
                                                                    reaching the final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The victory againts The
                                                                    Sharks
                                                                    brings us
                                                                    closer to the Final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid hidden-sm">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The next match against The
                                                                    Clovers
                                                                    will
                                                                    be this Friday</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. CARD POST -->
                                </div>
                            </div>
                            <div class="col-sm-4 rightSidebar col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START GAMES RESULT POST -->
                                    <div class="panel_inner games-news">
                                        <div class="panel_header">
                                            <h4><strong>Last</strong> Game Results</h4>
                                        </div>
                                        <div class="panel_body">
                                            <div class="games-result-header">
                                                <h3 class="games-result-title">Championship Quarter Finals</h3>
                                                <time class="games-result-date" datetime="2016-03-24">Saturday, March 24th,
                                                    2017</time>
                                            </div>
                                            <div class="games-result-main">
                                                <!-- 1st Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_1.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Alchemists</h5>
                                                        <div class="games-result-team-desc">Elric School</div>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->
                                                <div class="games-result-score-inner">
                                                    <div class="games-result-score">
                                                        <span class="games-result-score-result winner">107</span>
                                                        <span>-</span>
                                                        <span class="games-result-score-result loser">102</span>
                                                    </div>
                                                    <div class="games-result-score-label">Final Score</div>
                                                </div>
                                                <!-- 2nd Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_2.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Sharks</h5>
                                                        <div class="games-result-team-desc">Marine College</div>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Scoreboard</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>T</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Alchemists</th>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td>22</td>
                                                        <td>24</td>
                                                        <td>107</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sharks</th>
                                                        <td>22</td>
                                                        <td>34</td>
                                                        <td>20</td>
                                                        <td>26</td>
                                                        <td>102</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END OF /. GAMES RESULT POST -->
                                    <!-- START CATEGORIES WIDGET -->
                                    <div class="panel_inner categories-widget">
                                        <div class="panel_header">
                                            <h4><strong>Hot</strong> Categories</h4>
                                        </div>
                                        <div class="panel_body">
                                            <ul class="category-list">
                                                <li><a href="#">Business <span>12</span></a></li>
                                                <li><a href="#">Sport <span>26</span></a></li>
                                                <li><a href="#">LifeStyle <span>55</span></a></li>
                                                <li><a href="#">Fashion <span>37</span></a></li>
                                                <li><a href="#">Technology <span>62</span></a></li>
                                                <li><a href="#">Music <span>10</span></a></li>
                                                <li><a href="#">Culture <span>43</span></a></li>
                                                <li><a href="#">Design <span>74</span></a></li>
                                                <li><a href="#">Entertainment <span>11</span></a></li>
                                                <li><a href="#">video <span>41</span></a></li>
                                                <li><a href="#">Travel <span>11</span></a></li>
                                                <li><a href="#">Food <span>29</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END OF /. CATEGORIES WIDGET -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="articles-wrapper">
                        <div class="container">
                            <div class="row row-m">
                                <div class="col-sm-8 main-content col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>Latest</strong> articles</h2>
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">There are many variations of passages
                                                                of
                                                                Lorem
                                                                Ipsum available, but the majority have</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-2.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Contrary to popular belief, Lorem
                                                                Ipsum is
                                                                not
                                                                simply random text. It has roots in a piece</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-3.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">The standard chunk of Lorem Ipsum used
                                                                since
                                                                the
                                                                1500s is reproduced below for those interested.</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-4.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">It is a long established fact that a
                                                                reader
                                                                will
                                                                be distracted by the readable </a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/340x215-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Replication For Dummies 4 Easy Steps
                                                                To
                                                                Professional DVD</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- /. post body -->
                                            <!--Post footer-->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <!-- pagination -->
                                                        <ul class="pagination">
                                                            <li class="active"><span class="ti-angle-left"></span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li class="disabled"><span class="extend">...</span></li>
                                                            <li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#"><i class="ti-angle-right"></i></a></li>
                                                        </ul> <!-- /.pagination -->
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.Post footer-->
                                        </div>
                                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                                    </div>
                                </div>
                                <div class="col-sm-4 rightSidebar col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START ARCHIVE -->
                                        <div class="archive-wrapper">
                                            <div id="datepicker"></div>
                                        </div>
                                        <!-- END OF /. ARCHIVE -->
                                        <!-- START POLL WIDGET -->
                                        <div class="panel_inner poll-widget">
                                            <div class="panel_header">
                                                <h4><strong>Poll</strong></h4>
                                            </div>
                                            <div class="panel_body poll-content">
                                                <form method="get" id="home_poll">
                                                    <h6>Is it fair for the WICB to ask for 20% of players' fees to allow
                                                        them to
                                                        participate in overseas T20 leagues?</h6>
                                                    <ul>
                                                        <li><input id="poll_5444" value="5444" name="poll"
                                                                type="radio"><label for="poll_5444">Yes, they have invested
                                                                in developing
                                                                talent</label>
                                                        </li>
                                                        <li><input id="poll_5445" value="5445" name="poll"
                                                                type="radio"><label for="poll_5445">No, this is restraint of
                                                                trade</label></li>
                                                    </ul>
                                                    <a href="#" class="btn btn-news">Submit</a>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- END OF /. POLL WIDGET -->
                                        <!-- START TAGS -->
                                        <div class="panel_inner">
                                            <div class="panel_header">
                                                <h4><strong>Tags </strong></h4>
                                            </div>
                                            <div class="panel_body">
                                                <div class="tags-inner">
                                                    <a class="ui tag">Nature</a>
                                                    <a class="ui tag">Fashion</a>
                                                    <a class="ui tag">Wordpress</a>
                                                    <a class="ui tag">Photo</a>
                                                    <a class="ui tag">Travel</a>
                                                    <a class="ui tag">Hotel</a>
                                                    <a class="ui tag">Business</a>
                                                    <a class="ui tag">Culture</a>
                                                    <a class="ui tag">Sports</a>
                                                    <a class="ui tag">Design</a>
                                                    <a class="ui tag">Entertainment </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF /. TAGS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            @endif

            @if ($getSubCat->url == 'press-release')
                <main class="page_main_wrapper">
                    <!-- START NEWSTRICKER -->
                    <div class="container">
                        <div class="newstricker_inner">
                            <div class="trending"><strong>Trending</strong> Now</div>
                            <div class="news-ticker owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">this is</a>
                                </div>
                                <div class="item">
                                    <a href="#">It is a long established fact that a reader will be distracted by the
                                        readable.</a>
                                </div>
                                <div class="item">
                                    <a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END OF /. NEWSTRICKER -->

                    @foreach ($knowledgeSliders->chunk(3) as $key => $knowledgeSlider)
                        {{-- {{ $knowledgeSlider->title }} --}}
                        {{-- {{ $key }} --}}
                        <!-- START POST BLOCK SECTION -->

                        <section class="slider-inner">
                            <div class="container">
                                <div class="row thm-margin slider-shadow">
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="slider-wrapper">
                                            <div id="owl-slider" class="owl-carousel owl-theme">
                                                @foreach ($knowledgeSlider->take(1) as $item1)
                                                    <!-- Slider item one -->
                                                    <div class="item">
                                                        <div class="slider-post post-height-1">
                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}"
                                                                class="news-image"><img
                                                                    src="{{ asset('uploads/knowledge/posts/' . $item1->thubmnail) }}"
                                                                    alt="" class="img-responsive"></a>
                                                            <div class="post-text">
                                                                @foreach ($item1->subSubCat as $sub)
                                                                    <span class="post-category">{{ $sub->name }}</span>
                                                                @endforeach
                                                                <h2><a
                                                                        href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}">{{ $item1->title }}</a>
                                                                </h2>
                                                                <ul class="authar-info">
                                                                    <li class="authar"><a href="#">by david hall</a></li>
                                                                    @php
                                                                    $date = date("M j Y", strtotime($item1->publish_date));
                                                                    @endphp

                                                                    <li class="date">{{ $date }}</li>

                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.Slider item one -->
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                                        <div class="row slider-right-post thm-margin">
                                            @foreach ($knowledgeSlider as $item2)
                                                @if ($item1->id == $item2->id)
                                                    @continue
                                                @endif
                                                <div class="col-xs-6 col-sm-12 col-md-12 thm-padding ">
                                                    <div class="slider-post post-height-2">
                                                        <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}"
                                                            class="news-image"><img
                                                                src="{{ asset('uploads/knowledge/posts/' . $item2->thubmnail) }}"
                                                                alt="" class="img-responsive"></a>
                                                        <div class="post-text">
                                                            @foreach ($item1->subSubCat as $sub)
                                                                <span class="post-category">{{ $sub->name }}</span>
                                                            @endforeach
                                                            <h4><a
                                                                    href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item2->slug) }}">{{ $item2->title }}</a>
                                                            </h4>
                                                            <ul class="authar-info">
                                                                <li class="authar hidden-xs hidden-sm"><a
                                                                        href="#">{{ $item2->author }}</a>
                                                                </li>
                                                                @php
                                                                $date = date("M j Y", strtotime($item2->publish_date));
                                                                @endphp
                                                                <li class="hidden-xs">{{ $date }}</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- END OF /. POST BLOCK SECTION -->



                    @endforeach

                    {{-- @foreach ($knowledges as $item)
                        @foreach ($item->subSubCat as $item1)
                            {{ $item1->name }}
                            {{ $item->title }}
                        @endforeach
                    @endforeach --}}

                    {{-- @foreach ($knowledges as $item)


                        @foreach ($item->knowledge as $item1)
                            {{ $item->name }}
                            {{ $item1->title }}

                        @endforeach



                    @endforeach --}}

                    <div class="container">
                        <div class="row row-m">
                            <!-- START MAIN CONTENT -->
                            <div class="col-sm-8 col-p main-content">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE ONE (Popular news) -->
                                    @foreach ($knowledges as $knowledgeCat)
                                    @if ($knowledgeCat->knowledges->count() > 0)

                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>{{ $knowledgeCat->name }}</strong></h2>
                                                {{-- <div class="filter-nav">
                                                    <ul>
                                                        <li><a href="#" class="active">all</a></li>
                                                        <li><a href="#">business</a></li>
                                                        <li><a href="#">gadgets</a></li>
                                                        <li><a href="#">design</a></li>
                                                        <li><a href="#">fashion</a></li>
                                                        <li><a href="#">video</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">

                                                <!-- item one -->

                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            @foreach ($knowledgeCat->knowledges->take(1) as $knowledge)
                                                                <article>
                                                                    <figure>
                                                                        <a
                                                                            href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"><img
                                                                                src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                height="242" width="345" alt=""
                                                                                class="img-responsive"></a>
                                                                        {{-- <span
                                                                            class="post-category">{{ $knowledgeCat->name }}</span>
                                                                        --}}
                                                                    </figure>
                                                                    <div class="post-info">
                                                                        <h3><a
                                                                                href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}
                                                                            </a></h3>
                                                                        <ul class="authar-info">
                                                                            @php
                                                                            $date = date("M j Y",
                                                                            strtotime($knowledge->publish_date));
                                                                            @endphp
                                                                            <li><i class="ti-timer"></i>{{ $date }}</li>
                                                                            <li class="like"><a href="#"><i
                                                                                        class="ti-thumb-up"></i>15
                                                                                    likes</a></li>
                                                                        </ul>
                                                                        <p>{{ Str::limit($knowledge->short_desc, 150) }}</p>
                                                                    </div>
                                                                </article>
                                                            @endforeach

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-list">
                                                                @foreach ($knowledgeCat->knowledges->take(4) as $knowledge)

                                                                    <div class="news-list-item">
                                                                        <div class="img-wrapper">
                                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                class="thumb">
                                                                                <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                    alt="" class="img-responsive">

                                                                            </a>
                                                                        </div>
                                                                        <div class="post-info-2">
                                                                            <h5><a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                    class="title">{{ $knowledge->title }}</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                @php
                                                                                $date = date("M j Y",
                                                                                strtotime($knowledge->publish_date));
                                                                                @endphp
                                                                                <li><i class="ti-timer"></i> {{ $date }}
                                                                                </li>
                                                                                <li class="like hidden-xs hidden-sm"><a
                                                                                        href="#"><i
                                                                                            class="ti-thumb-up"></i>15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->


                                            </div>
                                            <!-- Post footer -->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <a href="{{ $knowledgeCat->id }}" class="more-btn">View All</a>
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    <!-- END OF /. POST CATEGORY STYLE ONE (Popular news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START POST CATEGORY STYLE TWO (Travel news) -->
                                    <div class="post-inner post-inner-2">
                                        <!--post header-->
                                        <div class="post-head">
                                            <h2 class="title"><strong>Travel</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-3.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-1.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-2.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-3.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-4.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-4.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-5.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-6.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-7.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-8.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--  END OF /. POST CATEGORY STYLE TWO (Travel news) -->
                                </div>
                            </div>
                            <!-- END OF /. MAIN CONTENT -->
                            <!-- START SIDE CONTENT -->
                            <div class="col-sm-4 col-p rightSidebar">
                                <div class="theiaStickySidebar">
                                    <!-- START WEATHER -->
                                    <div class="weather-wrapper">
                                        <div class="row thm-margin">
                                            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 weather-week thm-padding">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div>Tue, 34°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-sun"></i>
                                                        <div>Wed, 38°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-cloud"></i>
                                                        <div>thu, 32°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-rain"></i>
                                                        <div>Fri, 31°F</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap active">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Tuesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div class="main-temp">34°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 13mph WSW</div>
                                                        <div class="humidity">Humidity: 91%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-sun"></i>
                                                        <div class="main-temp">38°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloud"></i>
                                                        <div class="main-temp">32°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Friday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-rain"></i>
                                                        <div class="main-temp">31°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 16mph WSW</div>
                                                        <div class="humidity">Humidity: 93%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. WEATHER -->
                                    <!-- START SOCIAL ICON -->
                                    <div class="social-media-inner">
                                        <ul class="social-media clearfix">
                                            <li>
                                                <a href="#" class="rss">
                                                    <i class="fas fa-rss"></i>
                                                    <div>2,035</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="fb">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <div>3,794</div>
                                                    <p>Fans</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="insta">
                                                    <i class="fab fa-instagram"></i>
                                                    <div>941</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="you_tube">
                                                    <i class="fab fa-youtube"></i>
                                                    <div>7,820</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter">
                                                    <i class="fab fa-twitter"></i>
                                                    <div>1,562</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="pint">
                                                    <i class="fab fa-pinterest-p"></i>
                                                    <div>1,310</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                        </ul> <!-- /.social icon -->
                                    </div>
                                    <!-- END OF /. SOCIAL ICON -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START NAV TABS -->
                                    <div class="tabs-wrapper">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab">Most Viewed</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                    data-toggle="tab">Popular news</a></li>
                                        </ul>
                                        <!-- Tab panels one -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                                <div class="most-viewed">
                                                    <ul id="most-today" class="content tabs-content">
                                                        <li><span class="count">01</span><span class="text"><a
                                                                    href="#">South
                                                                    Africa
                                                                    bounce back on eventful day</a></span></li>
                                                        <li><span class="count">02</span><span class="text"><a
                                                                    href="#">Steyn
                                                                    ruled
                                                                    out
                                                                    of series with shoulder fracture</a></span></li>
                                                        <li><span class="count">03</span><span class="text"><a href="#">BCCI
                                                                    asks
                                                                    ECB to
                                                                    bear expenses of team's India tour</a></span></li>
                                                        <li><span class="count">04</span><span class="text"><a
                                                                    href="#">Duminy,
                                                                    Elgar
                                                                    tons set Australia huge target</a></span></li>
                                                        <li><span class="count">05</span><span class="text"><a
                                                                    href="#">English
                                                                    spinners
                                                                    are third-class citizens, says Graeme Swann</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Tab panels two -->
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="popular-news">
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. NAV TABS -->
                                </div>
                            </div>
                            <!-- END OF /. SIDE CONTENT -->
                        </div>
                    </div>
                    <!-- START FEATURED NEWS -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="featured-inner">
                                    <div id="featured-owl" class="owl-carousel">
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-1.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-2.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-3.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-4.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-5.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. FEATURED NEWS -->
                    <!-- START YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="youtube-wrapper">
                                    <div class="playlist-title">
                                        <h4>Latest Video News</h4>
                                    </div>
                                    <div id="rypp-demo-1" class="RYPP r16-9"
                                        data-ids="PQEX8QQ1fWg,cIyVNoY3_L4,3WWlhPmqXQI,kssD4L2NBw0,YcwrRA2BIlw,HMpmI2F2cMs,intentionally_erroneus">
                                        <div class="RYPP-video">
                                            <div class="RYPP-video-player">
                                                <!-- Will be replaced -->
                                            </div>
                                        </div>
                                        <div class="RYPP-playlist">
                                            <header>
                                                <h2 class="_h1 RYPP-title">Playlist title</h2>
                                                <p class="RYPP-desc">Playlist subtitle <a href="#"
                                                        target="_blank">#hashtag</a>
                                                </p>
                                            </header>
                                            <div class="RYPP-items"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row row-m">
                            <div class="col-sm-8 main-content col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE THREE (More news) -->
                                    <div class="post-inner">
                                        <!-- post header -->
                                        <div class="post-head">
                                            <h2 class="title"><strong>More</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-1.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Holliday Recipes </span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-2.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-3.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-4.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-5.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-6.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-7.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-8.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. POST CATEGORY STYLE THREE (More news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START CARD POST -->
                                    <div class="row row-m">
                                        <div class="col-sm-6 col-p">
                                            <div class="posts card-post">
                                                <div class="post-grid post-grid-item">
                                                    <figure class="posts-thumb">
                                                        <span class="post-category">National</span>
                                                        <a href="#"><img src="assets/images/378x270-1.jpg" alt=""></a>
                                                    </figure>
                                                    <div class="posts-inner">
                                                        <a href="#" class="posts-link"></a>
                                                        <h6 class="posts-title"><a href="#">The Alchemists team is appearing
                                                                in
                                                                L.A.
                                                                Beach for charity</a></h6>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do
                                                            eiusmod
                                                            tempor incididunt ut labore et dolore
                                                            magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum
                                                            laborem.
                                                        </p>
                                                    </div>
                                                    <div class="posts__footer card__footer">
                                                        <div class="post-author">
                                                            <figure class="post-author-avatar hidden-xs">
                                                                <img src="assets/images/avatar-1.jpg"
                                                                    alt="Post Author Avatar">
                                                            </figure>
                                                            <div class="post-author-info ">
                                                                <h4 class="post-author-name">Naeem Khan</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="post-meta">
                                                            <li class="meta-item "><i class="ti-eye"></i> 2369</li>
                                                            <li class="meta-item "><a href="#"><i class="ti-heart"></i>
                                                                    530</a>
                                                            </li>
                                                            <li class="meta-item "><a href="#"><i class="ti-comments"></i>
                                                                    18</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-p">
                                            <div class="posts">
                                                <ul>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">Trainings are getting really
                                                                    hard
                                                                    reaching the final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The victory againts The
                                                                    Sharks
                                                                    brings us
                                                                    closer to the Final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid hidden-sm">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The next match against The
                                                                    Clovers
                                                                    will
                                                                    be this Friday</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. CARD POST -->
                                </div>
                            </div>
                            <div class="col-sm-4 rightSidebar col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START GAMES RESULT POST -->
                                    <div class="panel_inner games-news">
                                        <div class="panel_header">
                                            <h4><strong>Last</strong> Game Results</h4>
                                        </div>
                                        <div class="panel_body">
                                            <div class="games-result-header">
                                                <h3 class="games-result-title">Championship Quarter Finals</h3>
                                                <time class="games-result-date" datetime="2016-03-24">Saturday, March 24th,
                                                    2017</time>
                                            </div>
                                            <div class="games-result-main">
                                                <!-- 1st Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_1.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Alchemists</h5>
                                                        <div class="games-result-team-desc">Elric School</div>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->
                                                <div class="games-result-score-inner">
                                                    <div class="games-result-score">
                                                        <span class="games-result-score-result winner">107</span>
                                                        <span>-</span>
                                                        <span class="games-result-score-result loser">102</span>
                                                    </div>
                                                    <div class="games-result-score-label">Final Score</div>
                                                </div>
                                                <!-- 2nd Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_2.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Sharks</h5>
                                                        <div class="games-result-team-desc">Marine College</div>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Scoreboard</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>T</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Alchemists</th>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td>22</td>
                                                        <td>24</td>
                                                        <td>107</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sharks</th>
                                                        <td>22</td>
                                                        <td>34</td>
                                                        <td>20</td>
                                                        <td>26</td>
                                                        <td>102</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END OF /. GAMES RESULT POST -->
                                    <!-- START CATEGORIES WIDGET -->
                                    <div class="panel_inner categories-widget">
                                        <div class="panel_header">
                                            <h4><strong>Hot</strong> Categories</h4>
                                        </div>
                                        <div class="panel_body">
                                            <ul class="category-list">
                                                <li><a href="#">Business <span>12</span></a></li>
                                                <li><a href="#">Sport <span>26</span></a></li>
                                                <li><a href="#">LifeStyle <span>55</span></a></li>
                                                <li><a href="#">Fashion <span>37</span></a></li>
                                                <li><a href="#">Technology <span>62</span></a></li>
                                                <li><a href="#">Music <span>10</span></a></li>
                                                <li><a href="#">Culture <span>43</span></a></li>
                                                <li><a href="#">Design <span>74</span></a></li>
                                                <li><a href="#">Entertainment <span>11</span></a></li>
                                                <li><a href="#">video <span>41</span></a></li>
                                                <li><a href="#">Travel <span>11</span></a></li>
                                                <li><a href="#">Food <span>29</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END OF /. CATEGORIES WIDGET -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="articles-wrapper">
                        <div class="container">
                            <div class="row row-m">
                                <div class="col-sm-8 main-content col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>Latest</strong> articles</h2>
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">There are many variations of passages
                                                                of
                                                                Lorem
                                                                Ipsum available, but the majority have</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-2.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Contrary to popular belief, Lorem
                                                                Ipsum is
                                                                not
                                                                simply random text. It has roots in a piece</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-3.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">The standard chunk of Lorem Ipsum used
                                                                since
                                                                the
                                                                1500s is reproduced below for those interested.</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-4.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">It is a long established fact that a
                                                                reader
                                                                will
                                                                be distracted by the readable </a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/340x215-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Replication For Dummies 4 Easy Steps
                                                                To
                                                                Professional DVD</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- /. post body -->
                                            <!--Post footer-->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <!-- pagination -->
                                                        <ul class="pagination">
                                                            <li class="active"><span class="ti-angle-left"></span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li class="disabled"><span class="extend">...</span></li>
                                                            <li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#"><i class="ti-angle-right"></i></a></li>
                                                        </ul> <!-- /.pagination -->
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.Post footer-->
                                        </div>
                                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                                    </div>
                                </div>
                                <div class="col-sm-4 rightSidebar col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START ARCHIVE -->
                                        <div class="archive-wrapper">
                                            <div id="datepicker"></div>
                                        </div>
                                        <!-- END OF /. ARCHIVE -->
                                        <!-- START POLL WIDGET -->
                                        <div class="panel_inner poll-widget">
                                            <div class="panel_header">
                                                <h4><strong>Poll</strong></h4>
                                            </div>
                                            <div class="panel_body poll-content">
                                                <form method="get" id="home_poll">
                                                    <h6>Is it fair for the WICB to ask for 20% of players' fees to allow
                                                        them to
                                                        participate in overseas T20 leagues?</h6>
                                                    <ul>
                                                        <li><input id="poll_5444" value="5444" name="poll"
                                                                type="radio"><label for="poll_5444">Yes, they have invested
                                                                in developing
                                                                talent</label>
                                                        </li>
                                                        <li><input id="poll_5445" value="5445" name="poll"
                                                                type="radio"><label for="poll_5445">No, this is restraint of
                                                                trade</label></li>
                                                    </ul>
                                                    <a href="#" class="btn btn-news">Submit</a>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- END OF /. POLL WIDGET -->
                                        <!-- START TAGS -->
                                        <div class="panel_inner">
                                            <div class="panel_header">
                                                <h4><strong>Tags </strong></h4>
                                            </div>
                                            <div class="panel_body">
                                                <div class="tags-inner">
                                                    <a class="ui tag">Nature</a>
                                                    <a class="ui tag">Fashion</a>
                                                    <a class="ui tag">Wordpress</a>
                                                    <a class="ui tag">Photo</a>
                                                    <a class="ui tag">Travel</a>
                                                    <a class="ui tag">Hotel</a>
                                                    <a class="ui tag">Business</a>
                                                    <a class="ui tag">Culture</a>
                                                    <a class="ui tag">Sports</a>
                                                    <a class="ui tag">Design</a>
                                                    <a class="ui tag">Entertainment </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF /. TAGS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            @endif

            @if ($getSubCat->url == 'reports')
                <main class="page_main_wrapper">
                    <!-- START NEWSTRICKER -->
                    <div class="container">
                        <div class="newstricker_inner">
                            <div class="trending"><strong>Trending</strong> Now</div>
                            <div class="news-ticker owl-carousel owl-theme">
                                <div class="item">
                                    <a href="#">this is</a>
                                </div>
                                <div class="item">
                                    <a href="#">It is a long established fact that a reader will be distracted by the
                                        readable.</a>
                                </div>
                                <div class="item">
                                    <a href="#">Contrary to popular belief, Lorem Ipsum is not simply random text.</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  END OF /. NEWSTRICKER -->

                    @foreach ($knowledgeSliders->chunk(4) as $key => $knowledgeSlider)
                        {{-- {{ $knowledgeSlider->title }} --}}
                        {{-- {{ $key }} --}}
                        <!-- START POST BLOCK SECTION -->
                        <section class="slider-inner">
                            <div class="container">
                                <div class="row slider-right-post thm-margin">
                                    @foreach ($knowledgeSlider->take(4) as $item1)
                                        <div class="col-xs-6 col-sm-3 col-md-3 thm-padding">
                                            <div class="slider-post post-height-3">
                                                <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}"
                                                    class="news-image"><img
                                                        src="{{ asset('uploads/knowledge/posts/' . $item1->thubmnail) }}"
                                                        alt=""></a>
                                                <div class="post-text">
                                                    @foreach ($item1->subSubCat as $sub)
                                                        <span class="post-category">{{ $sub->name }}</span>
                                                    @endforeach
                                                    <h4><a
                                                            href="{{ url($maincat . '/' . $getSubCat->url . '/' . $item1->slug) }}">{{ $item1->title }}</a>
                                                    </h4>
                                                    <ul class="authar-info">
                                                        <li class="authar"><a href="#">by {{ $item1->author }}</a></li>
                                                        @php
                                                        $date = date("M j Y", strtotime($item1->publish_date));
                                                        @endphp

                                                        <li class="date">{{ $date }}</li>

                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>


                        <!-- END OF /. POST BLOCK SECTION -->



                    @endforeach

                    {{-- @foreach ($knowledges as $item)
                        @foreach ($item->subSubCat as $item1)
                            {{ $item1->name }}
                            {{ $item->title }}
                        @endforeach
                    @endforeach --}}

                    {{-- @foreach ($knowledges as $item)


                        @foreach ($item->knowledge as $item1)
                            {{ $item->name }}
                            {{ $item1->title }}

                        @endforeach



                    @endforeach --}}

                    <div class="container">
                        <div class="row row-m">
                            <!-- START MAIN CONTENT -->
                            <div class="col-sm-8 col-p main-content">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE ONE (Popular news) -->
                                    @foreach ($knowledges as $knowledgeCat)
                                    @if ($knowledgeCat->knowledges->count() > 0)

                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>{{ $knowledgeCat->name }}</strong></h2>
                                                {{-- <div class="filter-nav">
                                                    <ul>
                                                        <li><a href="#" class="active">all</a></li>
                                                        <li><a href="#">business</a></li>
                                                        <li><a href="#">gadgets</a></li>
                                                        <li><a href="#">design</a></li>
                                                        <li><a href="#">fashion</a></li>
                                                        <li><a href="#">video</a></li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">

                                                <!-- item one -->

                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            @foreach ($knowledgeCat->knowledges->take(1) as $knowledge)
                                                                <article>
                                                                    <figure>
                                                                        <a
                                                                            href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"><img
                                                                                src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                height="242" width="345" alt=""
                                                                                class="img-responsive"></a>
                                                                        {{-- <span
                                                                            class="post-category">{{ $knowledgeCat->name }}</span>
                                                                        --}}
                                                                    </figure>
                                                                    <div class="post-info">
                                                                        <h3><a
                                                                                href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}">{{ $knowledge->title }}
                                                                            </a></h3>
                                                                        <ul class="authar-info">
                                                                            @php
                                                                            $date = date("M j Y",
                                                                            strtotime($knowledge->publish_date));
                                                                            @endphp
                                                                            <li><i class="ti-timer"></i>{{ $date }}</li>
                                                                            <li class="like"><a href="#"><i
                                                                                        class="ti-thumb-up"></i>15
                                                                                    likes</a></li>
                                                                        </ul>
                                                                        <p>{{ Str::limit($knowledge->short_desc, 150) }}</p>
                                                                    </div>
                                                                </article>
                                                            @endforeach

                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-list">
                                                                @foreach ($knowledgeCat->knowledges->take(4) as $knowledge)

                                                                    <div class="news-list-item">
                                                                        <div class="img-wrapper">
                                                                            <a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                class="thumb">
                                                                                <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}"
                                                                                    alt="" class="img-responsive">

                                                                            </a>
                                                                        </div>
                                                                        <div class="post-info-2">
                                                                            <h5><a href="{{ url($maincat . '/' . $getSubCat->url . '/' . $knowledge->slug) }}"
                                                                                    class="title">{{ $knowledge->title }}</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                @php
                                                                                $date = date("M j Y",
                                                                                strtotime($knowledge->publish_date));
                                                                                @endphp
                                                                                <li><i class="ti-timer"></i> {{ $date }}
                                                                                </li>
                                                                                <li class="like hidden-xs hidden-sm"><a
                                                                                        href="#"><i
                                                                                            class="ti-thumb-up"></i>15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                @endforeach

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->


                                            </div>
                                            <!-- Post footer -->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <a href="{{ $knowledgeCat->id }}" class="more-btn">View All</a>
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                    <!-- END OF /. POST CATEGORY STYLE ONE (Popular news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START POST CATEGORY STYLE TWO (Travel news) -->
                                    {{-- <div class="post-inner post-inner-2">
                                        <!--post header-->
                                        <div class="post-head">
                                            <h2 class="title"><strong>Travel</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-3.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-1.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-2.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-3.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-4.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-play"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <article>
                                                                <figure>
                                                                    <a href="#"><img src="assets/images/340x215-4.jpg"
                                                                            height="242" width="345" alt=""
                                                                            class="img-responsive"></a>
                                                                    <span class="post-category">Travel</span>
                                                                </figure>
                                                                <div class="post-info">
                                                                    <h3><a href="#">Fusce ac orci sagittis mattis magna
                                                                            ultrices
                                                                            libero</a></h3>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                    <p class="p">Sed ut perspiciatis unde omnis iste natus
                                                                        sit
                                                                        voluptatem accusantium doloremque laudantium,
                                                                        totamrem
                                                                        aperiam,
                                                                        eaque ipsa quae ab illo inventore</p>
                                                                </div>
                                                            </article>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="news-grid-2">
                                                                <div class="row row-margin">
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-5.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Lorem Ipsum is
                                                                                    simply
                                                                                    dummy
                                                                                    text of the printing.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-6.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">It is a long
                                                                                    established
                                                                                    fact
                                                                                    that a reader will be distracted by</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-7.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">There are many
                                                                                    variations
                                                                                    of
                                                                                    passages of Lorem Ipsum.</a></h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-6 col-sm-6 col-md-6 col-padding">
                                                                        <div class="grid-item">
                                                                            <div class="grid-item-img">
                                                                                <a href="#">
                                                                                    <img src="assets/images/165x110-8.jpg"
                                                                                        class="img-responsive" alt="">
                                                                                    <div class="link-icon"><i
                                                                                            class="fa fa-camera"></i>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <h5><a href="#" class="title">Contrary to
                                                                                    popular
                                                                                    belief,
                                                                                    Lorem Ipsum is not simply random
                                                                                    text.</a>
                                                                            </h5>
                                                                            <ul class="authar-info">
                                                                                <li>May 15, 2016</li>
                                                                                <li class="like hidden-sm"><a href="#">15
                                                                                        likes</a>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <!--  END OF /. POST CATEGORY STYLE TWO (Travel news) -->
                                </div>
                            </div>
                            <!-- END OF /. MAIN CONTENT -->
                            <!-- START SIDE CONTENT -->
                            {{-- <div class="col-sm-4 col-p rightSidebar">
                                <div class="theiaStickySidebar">
                                    <!-- START WEATHER -->
                                    <div class="weather-wrapper">
                                        <div class="row thm-margin">
                                            <div class="col-xs-3 col-sm-4 col-md-3 col-lg-3 weather-week thm-padding">
                                                <div class="list-group">
                                                    <a href="#" class="list-group-item active">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div>Tue, 34°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-sun"></i>
                                                        <div>Wed, 38°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-cloud"></i>
                                                        <div>thu, 32°F</div>
                                                    </a>
                                                    <a href="#" class="list-group-item">
                                                        <i class="flaticon-rain"></i>
                                                        <div>Fri, 31°F</div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-xs-9 col-sm-8 col-md-9 col-lg-9 bhoechie-tab thm-padding">
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap active">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Tuesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloudy"></i>
                                                        <div class="main-temp">34°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 13mph WSW</div>
                                                        <div class="humidity">Humidity: 91%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-sun"></i>
                                                        <div class="main-temp">38°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Wednesday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-cloud"></i>
                                                        <div class="main-temp">32°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 11mph WSW</div>
                                                        <div class="humidity">Humidity: 89%</div>
                                                    </div>
                                                </div>
                                                <!-- weather temperature -->
                                                <div class="weather-temp-wrap">
                                                    <div class="city-day">
                                                        <div class="city">Dhaka</div>
                                                        <div class="day">Friday, 8.00pm</div>
                                                    </div>
                                                    <div class="weather-icon">
                                                        <i class="flaticon-rain"></i>
                                                        <div class="main-temp">31°F</div>
                                                    </div>
                                                    <div class="break">
                                                        <div class="wind-condition"> Wind: 16mph WSW</div>
                                                        <div class="humidity">Humidity: 93%</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. WEATHER -->
                                    <!-- START SOCIAL ICON -->
                                    <div class="social-media-inner">
                                        <ul class="social-media clearfix">
                                            <li>
                                                <a href="#" class="rss">
                                                    <i class="fas fa-rss"></i>
                                                    <div>2,035</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="fb">
                                                    <i class="fab fa-facebook-f"></i>
                                                    <div>3,794</div>
                                                    <p>Fans</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="insta">
                                                    <i class="fab fa-instagram"></i>
                                                    <div>941</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="you_tube">
                                                    <i class="fab fa-youtube"></i>
                                                    <div>7,820</div>
                                                    <p>Subscribers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter">
                                                    <i class="fab fa-twitter"></i>
                                                    <div>1,562</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="pint">
                                                    <i class="fab fa-pinterest-p"></i>
                                                    <div>1,310</div>
                                                    <p>Followers</p>
                                                </a>
                                            </li>
                                        </ul> <!-- /.social icon -->
                                    </div>
                                    <!-- END OF /. SOCIAL ICON -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START NAV TABS -->
                                    <div class="tabs-wrapper">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home"
                                                    role="tab" data-toggle="tab">Most Viewed</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                                    data-toggle="tab">Popular news</a></li>
                                        </ul>
                                        <!-- Tab panels one -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                                <div class="most-viewed">
                                                    <ul id="most-today" class="content tabs-content">
                                                        <li><span class="count">01</span><span class="text"><a
                                                                    href="#">South
                                                                    Africa
                                                                    bounce back on eventful day</a></span></li>
                                                        <li><span class="count">02</span><span class="text"><a
                                                                    href="#">Steyn
                                                                    ruled
                                                                    out
                                                                    of series with shoulder fracture</a></span></li>
                                                        <li><span class="count">03</span><span class="text"><a href="#">BCCI
                                                                    asks
                                                                    ECB to
                                                                    bear expenses of team's India tour</a></span></li>
                                                        <li><span class="count">04</span><span class="text"><a
                                                                    href="#">Duminy,
                                                                    Elgar
                                                                    tons set Australia huge target</a></span></li>
                                                        <li><span class="count">05</span><span class="text"><a
                                                                    href="#">English
                                                                    spinners
                                                                    are third-class citizens, says Graeme Swann</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- Tab panels two -->
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <div class="popular-news">
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <div class="p-post">
                                                        <h4><a href="#">It is a long established fact that a reader will be
                                                                distracted
                                                                by </a></h4>
                                                        <ul class="authar-info">
                                                            <li class="date"><a href="#"><i class="ti-timer"></i> May 15,
                                                                    2016</a>
                                                            </li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <div class="reatting-2">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star-half-alt"></i>
                                                            <i class="far fa-star"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. NAV TABS -->
                                </div>
                            </div> --}}
                            <!-- END OF /. SIDE CONTENT -->
                        </div>
                    </div>
                    <!-- START FEATURED NEWS -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="featured-inner">
                                    <div id="featured-owl" class="owl-carousel">
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-1.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-2.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-3.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-4.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="featured-post">
                                                <a href="#" class="news-image"><img
                                                        src="assets/images/featured-620x370-5.jpg" alt=""
                                                        class="img-responsive"></a>
                                                <div class="reatting">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-half-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <div class="post-text">
                                                    <span class="post-category">Business</span>
                                                    <h4>Lorem Ipsum is simply dummy text of the printing </h4>
                                                    <ul class="authar-info">
                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                        <li class="like"><a href="#"><i class="ti-thumb-up"></i>15 likes</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. FEATURED NEWS -->
                    <!-- START YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="youtube-wrapper">
                                    <div class="playlist-title">
                                        <h4>Latest Video News</h4>
                                    </div>
                                    <div id="rypp-demo-1" class="RYPP r16-9"
                                        data-ids="PQEX8QQ1fWg,cIyVNoY3_L4,3WWlhPmqXQI,kssD4L2NBw0,YcwrRA2BIlw,HMpmI2F2cMs,intentionally_erroneus">
                                        <div class="RYPP-video">
                                            <div class="RYPP-video-player">
                                                <!-- Will be replaced -->
                                            </div>
                                        </div>
                                        <div class="RYPP-playlist">
                                            <header>
                                                <h2 class="_h1 RYPP-title">Playlist title</h2>
                                                <p class="RYPP-desc">Playlist subtitle <a href="#"
                                                        target="_blank">#hashtag</a>
                                                </p>
                                            </header>
                                            <div class="RYPP-items"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END OF /. YOUTUBE VIDEO -->
                    <div class="container">
                        <div class="row row-m">
                            <div class="col-sm-8 main-content col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START POST CATEGORY STYLE THREE (More news) -->
                                    <div class="post-inner">
                                        <!-- post header -->
                                        <div class="post-head">
                                            <h2 class="title"><strong>More</strong> News</h2>
                                            <div class="filter-nav">
                                                <ul>
                                                    <li><a href="#" class="active">all</a></li>
                                                    <li><a href="#">business</a></li>
                                                    <li><a href="#">gadgets</a></li>
                                                    <li><a href="#">design</a></li>
                                                    <li><a href="#">fashion</a></li>
                                                    <li><a href="#">video</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post body -->
                                        <div class="post-body">
                                            <div class="post-slider owl-carousel owl-theme">
                                                <!-- item one -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-1.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Holliday Recipes </span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-2.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-3.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-4.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- item two -->
                                                <div class="item">
                                                    <div class="row">
                                                        <div class="col-sm-6 main-post-inner bord-right">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-5.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="80"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-6.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-7.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="reatting">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4>Lorem Ipsum is simply dummy text of the printing
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div class="more-post">
                                                                <a href="#" class="news-image"><img
                                                                        src="assets/images/620x370-8.jpg" alt=""
                                                                        class="img-responsive"></a>
                                                                <div class="progressber" data-percent="60"></div>
                                                                <div class="post-text">
                                                                    <span class="post-category">Business</span>
                                                                    <h4><a href="#">Lorem Ipsum is simply dummy text of the
                                                                            printing</a>
                                                                    </h4>
                                                                    <ul class="authar-info">
                                                                        <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                        <li class="like"><a href="#"><i
                                                                                    class="ti-thumb-up"></i>15
                                                                                likes</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- footer post -->
                                        <div class="post-footer">
                                            <div class="row thm-margin">
                                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                    <a href="#" class="more-btn">More popular posts</a>
                                                </div>
                                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                    <div class="social">
                                                        <ul>
                                                            <li>
                                                                <div class="share transition">
                                                                    <a href="#" target="_blank" class="ico fb"><i
                                                                            class="fab fa-facebook-f"></i></a>
                                                                    <a href="#" target="_blank" class="ico tw"><i
                                                                            class="fab fa-twitter"></i></a>
                                                                    <a href="#" target="_blank" class="ico rs"><i
                                                                            class="fas fa-rss"></i></a>
                                                                    <a href="#" target="_blank" class="ico pin"><i
                                                                            class="fab fa-pinterest-p"></i></a>
                                                                    <i class="ti-share ico-share"></i>
                                                                </div>
                                                            </li>
                                                            <li><a href="#"><i class="ti-heart"></i></a></li>
                                                            <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. POST CATEGORY STYLE THREE (More news) -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add728x90-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                    <!-- START CARD POST -->
                                    <div class="row row-m">
                                        <div class="col-sm-6 col-p">
                                            <div class="posts card-post">
                                                <div class="post-grid post-grid-item">
                                                    <figure class="posts-thumb">
                                                        <span class="post-category">National</span>
                                                        <a href="#"><img src="assets/images/378x270-1.jpg" alt=""></a>
                                                    </figure>
                                                    <div class="posts-inner">
                                                        <a href="#" class="posts-link"></a>
                                                        <h6 class="posts-title"><a href="#">The Alchemists team is appearing
                                                                in
                                                                L.A.
                                                                Beach for charity</a></h6>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do
                                                            eiusmod
                                                            tempor incididunt ut labore et dolore
                                                            magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum
                                                            laborem.
                                                        </p>
                                                    </div>
                                                    <div class="posts__footer card__footer">
                                                        <div class="post-author">
                                                            <figure class="post-author-avatar hidden-xs">
                                                                <img src="assets/images/avatar-1.jpg"
                                                                    alt="Post Author Avatar">
                                                            </figure>
                                                            <div class="post-author-info ">
                                                                <h4 class="post-author-name">Naeem Khan</h4>
                                                            </div>
                                                        </div>
                                                        <ul class="post-meta">
                                                            <li class="meta-item "><i class="ti-eye"></i> 2369</li>
                                                            <li class="meta-item "><a href="#"><i class="ti-heart"></i>
                                                                    530</a>
                                                            </li>
                                                            <li class="meta-item "><a href="#"><i class="ti-comments"></i>
                                                                    18</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-p">
                                            <div class="posts">
                                                <ul>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">Trainings are getting really
                                                                    hard
                                                                    reaching the final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The victory againts The
                                                                    Sharks
                                                                    brings us
                                                                    closer to the Final</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                    <li class="post-grid hidden-sm">
                                                        <div class="posts-inner">
                                                            <span class="post-category">National</span>
                                                            <h6 class="posts-title"><a href="#">The next match against The
                                                                    Clovers
                                                                    will
                                                                    be this Friday</a></h6>
                                                            <ul class="authar-info">
                                                                <li><i class="ti-timer"></i> May 15, 2016</li>
                                                                <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                        likes</a>
                                                                </li>
                                                            </ul>
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisi ng elit, sed
                                                                do
                                                                eiusmod
                                                                tempor incididunt ut labore...</p>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END OF /. CARD POST -->
                                </div>
                            </div>
                            <div class="col-sm-4 rightSidebar col-p">
                                <div class="theiaStickySidebar">
                                    <!-- START GAMES RESULT POST -->
                                    <div class="panel_inner games-news">
                                        <div class="panel_header">
                                            <h4><strong>Last</strong> Game Results</h4>
                                        </div>
                                        <div class="panel_body">
                                            <div class="games-result-header">
                                                <h3 class="games-result-title">Championship Quarter Finals</h3>
                                                <time class="games-result-date" datetime="2016-03-24">Saturday, March 24th,
                                                    2017</time>
                                            </div>
                                            <div class="games-result-main">
                                                <!-- 1st Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_1.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Alchemists</h5>
                                                        <div class="games-result-team-desc">Elric School</div>
                                                    </div>
                                                </div>
                                                <!-- 1st Team / End -->
                                                <div class="games-result-score-inner">
                                                    <div class="games-result-score">
                                                        <span class="games-result-score-result winner">107</span>
                                                        <span>-</span>
                                                        <span class="games-result-score-result loser">102</span>
                                                    </div>
                                                    <div class="games-result-score-label">Final Score</div>
                                                </div>
                                                <!-- 2nd Team -->
                                                <div class="games-result-team">
                                                    <div class="games-result-team-logo">
                                                        <a href="#"><img src="assets/images/game_results_logo_2.png"
                                                                class="img-responsive" alt=""></a>
                                                    </div>
                                                    <div class="games-result-team-info">
                                                        <h5 class="games-result-team-name">Sharks</h5>
                                                        <div class="games-result-team-desc">Marine College</div>
                                                    </div>
                                                </div>
                                                <!-- 2nd Team / End -->
                                            </div>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table text-center">
                                                <thead>
                                                    <tr>
                                                        <th>Scoreboard</th>
                                                        <th>1</th>
                                                        <th>2</th>
                                                        <th>3</th>
                                                        <th>4</th>
                                                        <th>T</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th>Alchemists</th>
                                                        <td>30</td>
                                                        <td>31</td>
                                                        <td>22</td>
                                                        <td>24</td>
                                                        <td>107</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Sharks</th>
                                                        <td>22</td>
                                                        <td>34</td>
                                                        <td>20</td>
                                                        <td>26</td>
                                                        <td>102</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <!-- END OF /. GAMES RESULT POST -->
                                    <!-- START CATEGORIES WIDGET -->
                                    <div class="panel_inner categories-widget">
                                        <div class="panel_header">
                                            <h4><strong>Hot</strong> Categories</h4>
                                        </div>
                                        <div class="panel_body">
                                            <ul class="category-list">
                                                <li><a href="#">Business <span>12</span></a></li>
                                                <li><a href="#">Sport <span>26</span></a></li>
                                                <li><a href="#">LifeStyle <span>55</span></a></li>
                                                <li><a href="#">Fashion <span>37</span></a></li>
                                                <li><a href="#">Technology <span>62</span></a></li>
                                                <li><a href="#">Music <span>10</span></a></li>
                                                <li><a href="#">Culture <span>43</span></a></li>
                                                <li><a href="#">Design <span>74</span></a></li>
                                                <li><a href="#">Entertainment <span>11</span></a></li>
                                                <li><a href="#">video <span>41</span></a></li>
                                                <li><a href="#">Travel <span>11</span></a></li>
                                                <li><a href="#">Food <span>29</span></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END OF /. CATEGORIES WIDGET -->
                                    <!-- START ADVERTISEMENT -->
                                    <div class="add-inner">
                                        <img src="assets/images/add320x270-1.jpg" class="img-responsive" alt="">
                                    </div>
                                    <!-- END OF /. ADVERTISEMENT -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <section class="articles-wrapper">
                        <div class="container">
                            <div class="row row-m">
                                <div class="col-sm-8 main-content col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                                        <div class="post-inner">
                                            <!--post header-->
                                            <div class="post-head">
                                                <h2 class="title"><strong>Latest</strong> articles</h2>
                                            </div>
                                            <!-- post body -->
                                            <div class="post-body">
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">There are many variations of passages
                                                                of
                                                                Lorem
                                                                Ipsum available, but the majority have</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-2.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Contrary to popular belief, Lorem
                                                                Ipsum is
                                                                not
                                                                simply random text. It has roots in a piece</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-3.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">The standard chunk of Lorem Ipsum used
                                                                since
                                                                the
                                                                1500s is reproduced below for those interested.</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/218x150-4.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">It is a long established fact that a
                                                                reader
                                                                will
                                                                be distracted by the readable </a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="news-list-item articles-list">
                                                    <div class="img-wrapper">
                                                        <a href="#" class="thumb"><img src="assets/images/340x215-1.jpg"
                                                                alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="post-info-2">
                                                        <h4><a href="#" class="title">Replication For Dummies 4 Easy Steps
                                                                To
                                                                Professional DVD</a></h4>
                                                        <ul class="authar-info">
                                                            <li><i class="ti-timer"></i> May 15, 2016</li>
                                                            <li class="like"><a href="#"><i class="ti-thumb-up"></i>15
                                                                    likes</a>
                                                            </li>
                                                        </ul>
                                                        <p class="hidden-sm">Lorem Ipsum is simply dummy text of the
                                                            printing
                                                            and
                                                            typesetting industry. Lorem Ipsum has been the industry's
                                                            standard
                                                            dummy
                                                            text ever since the 1500s, when an unknown printer took a
                                                            galley...
                                                        </p>
                                                    </div>
                                                </div>
                                            </div> <!-- /. post body -->
                                            <!--Post footer-->
                                            <div class="post-footer">
                                                <div class="row thm-margin">
                                                    <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                                        <!-- pagination -->
                                                        <ul class="pagination">
                                                            <li class="active"><span class="ti-angle-left"></span></li>
                                                            <li class="active"><span>1</span></li>
                                                            <li><a href="#">2</a></li>
                                                            <li><a href="#">3</a></li>
                                                            <li class="disabled"><span class="extend">...</span></li>
                                                            <li>
                                                            <li><a href="#">12</a></li>
                                                            <li><a href="#"><i class="ti-angle-right"></i></a></li>
                                                        </ul> <!-- /.pagination -->
                                                    </div>
                                                    <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                                        <div class="social">
                                                            <ul>
                                                                <li>
                                                                    <div class="share transition">
                                                                        <a href="#" target="_blank" class="ico fb"><i
                                                                                class="fab fa-facebook-f"></i></a>
                                                                        <a href="#" target="_blank" class="ico tw"><i
                                                                                class="fab fa-twitter"></i></a>
                                                                        <a href="#" target="_blank" class="ico rs"><i
                                                                                class="fas fa-rss"></i></a>
                                                                        <a href="#" target="_blank" class="ico pin"><i
                                                                                class="fab fa-pinterest-p"></i></a>
                                                                        <i class="ti-share ico-share"></i>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#"><i class="ti-heart"></i></a></li>
                                                                <li><a href="#"><i class="ti-twitter"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> <!-- /.Post footer-->
                                        </div>
                                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                                    </div>
                                </div>
                                <div class="col-sm-4 rightSidebar col-p">
                                    <div class="theiaStickySidebar">
                                        <!-- START ARCHIVE -->
                                        <div class="archive-wrapper">
                                            <div id="datepicker"></div>
                                        </div>
                                        <!-- END OF /. ARCHIVE -->
                                        <!-- START POLL WIDGET -->
                                        <div class="panel_inner poll-widget">
                                            <div class="panel_header">
                                                <h4><strong>Poll</strong></h4>
                                            </div>
                                            <div class="panel_body poll-content">
                                                <form method="get" id="home_poll">
                                                    <h6>Is it fair for the WICB to ask for 20% of players' fees to allow
                                                        them to
                                                        participate in overseas T20 leagues?</h6>
                                                    <ul>
                                                        <li><input id="poll_5444" value="5444" name="poll"
                                                                type="radio"><label for="poll_5444">Yes, they have invested
                                                                in developing
                                                                talent</label>
                                                        </li>
                                                        <li><input id="poll_5445" value="5445" name="poll"
                                                                type="radio"><label for="poll_5445">No, this is restraint of
                                                                trade</label></li>
                                                    </ul>
                                                    <a href="#" class="btn btn-news">Submit</a>
                                                </form>
                                            </div>
                                        </div>
                                        <!-- END OF /. POLL WIDGET -->
                                        <!-- START TAGS -->
                                        <div class="panel_inner">
                                            <div class="panel_header">
                                                <h4><strong>Tags </strong></h4>
                                            </div>
                                            <div class="panel_body">
                                                <div class="tags-inner">
                                                    <a class="ui tag">Nature</a>
                                                    <a class="ui tag">Fashion</a>
                                                    <a class="ui tag">Wordpress</a>
                                                    <a class="ui tag">Photo</a>
                                                    <a class="ui tag">Travel</a>
                                                    <a class="ui tag">Hotel</a>
                                                    <a class="ui tag">Business</a>
                                                    <a class="ui tag">Culture</a>
                                                    <a class="ui tag">Sports</a>
                                                    <a class="ui tag">Design</a>
                                                    <a class="ui tag">Entertainment </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF /. TAGS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </main>
            @endif

        @else
            <h1>Post Not available </h1>
        @endif

    @endif

    @if ($maincat == 'Events')
        {{ 'thie is event' }}
    @endif

@endsection
