@extends('layouts.master')

@section('content')

    <main class="page_main_wrapper">
        <div class="container">
            <br><br>
            <div class="row row-m">
                <!-- START MAIN CONTENT -->
                <div class="col-sm-8 col-p  main-content">
                    <div class="theiaStickySidebar">
                        <div class="post-inner">
                            <!--post header-->
                            <div class="post-head">
                                <h2 class="title"><strong>{{$subsubcat->name}} </strong></h2>
                            </div>
                            <!-- post body -->
                            @foreach ($knowledgeCatPostLists as $knowledgeCatPostList)
                                <div class="post-body">
                                    <div class="news-list-item articles-list">
                                        <div class="img-wrapper">
                                            <a href="{{ url($cat . '/' . $subcat . '/' . $knowledgeCatPostList->slug) }}" class="thumb"><img src="{{ asset('uploads/knowledge/posts/' . $knowledgeCatPostList->thubmnail) }}" alt=""
                                                    class="img-responsive"></a>
                                        </div>
                                        <div class="post-info-2">
                                            <h4><a href="{{ url($cat . '/' . $subcat . '/' . $knowledgeCatPostList->slug) }}"class="title">{{$knowledgeCatPostList->title}}</a></h4>
                                            <ul class="authar-info">
                                                @php
                                                    $date = date("M j Y", strtotime($knowledgeCatPostList->publish_date));
                                                @endphp
                                                <li><i class="ti-timer"></i>{{$date}}</li>
                                                <li><a href="#" class="link"><i class="ti-thumb-up"></i>15 likes</a></li>
                                            </ul>
                                            <p class="hidden-sm">{{Str::limit($knowledgeCatPostList->short_desc, 150)}}</p>
                                        </div>
                                    </div>
                                </div> <!-- /. post body -->
                            @endforeach

                            <!-- Post footer -->
                            <div class="post-footer" style=" height: 50px;">
                                <div class="row thm-margin">
                                    <div class="col-xs-12 col-sm-12 col-md-12 thm-padding" style="font-size: 20px; margin: 10px">
                                        <!-- pagination -->
                                        {{$knowledgeCatPostLists->links()}}
                                    </div>
                                </div>
                            </div> <!-- /.Post footer-->
                        </div>
                    </div>
                </div>
                <!-- END OF /. MAIN CONTENT -->
                <!-- START SIDE CONTENT -->
                <div class="col-sm-4 col-p rightSidebar">
                    <div class="theiaStickySidebar">
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
                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab"
                                        data-toggle="tab">Most Viewed</a></li>
                                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab"
                                        data-toggle="tab">Popular news</a></li>
                            </ul>
                            <!-- Tab panels one -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="home">

                                    <div class="most-viewed">
                                        <ul id="most-today" class="content tabs-content">
                                            <li><span class="count">01</span><span class="text"><a href="#">South Africa
                                                        bounce back on eventful day</a></span></li>
                                            <li><span class="count">02</span><span class="text"><a href="#">Steyn ruled out
                                                        of series with shoulder fracture</a></span></li>
                                            <li><span class="count">03</span><span class="text"><a href="#">BCCI asks ECB to
                                                        bear expenses of team's India tour</a></span></li>
                                            <li><span class="count">04</span><span class="text"><a href="#">Duminy, Elgar
                                                        tons set Australia huge target</a></span></li>
                                            <li><span class="count">05</span><span class="text"><a href="#">English spinners
                                                        are third-class citizens, says Graeme Swann</a></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- Tab panels two -->
                                <div role="tabpanel" class="tab-pane fade" id="profile">
                                    <div class="popular-news">
                                        <div class="p-post">
                                            <h4><a href="#">It is a long established fact that a reader will be distracted
                                                    by </a></h4>
                                            <ul class="authar-info">
                                                <li><a href="#" class="link"><i class="ti-timer"></i> May 15, 2016</a></li>
                                                <li><a href="#" class="link"><i class="ti-thumb-up"></i>15 likes</a></li>
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
                                            <h4><a href="#">It is a long established fact that a reader will be distracted
                                                    by </a></h4>
                                            <ul class="authar-info">
                                                <li><a href="#" class="link"><i class="ti-timer"></i> May 15, 2016</a></li>
                                                <li><a href="#" class="link"><i class="ti-thumb-up"></i>15 likes</a></li>
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
                                            <h4><a href="#">It is a long established fact that a reader will be distracted
                                                    by </a></h4>
                                            <ul class="authar-info">
                                                <li><a href="#" class="link"><i class="ti-timer"></i> May 15, 2016</a></li>
                                                <li><a href="#" class="link"><i class="ti-thumb-up"></i>15 likes</a></li>
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
    </main>

@endsection
