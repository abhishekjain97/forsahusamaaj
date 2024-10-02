@extends('layouts.master')

@section('content')
<!-- *** START PAGE MAIN CONTENT *** -->
 <main class="page_main_wrapper">
    <!-- START PAGE TITLE --> 
    <div class="page-title">
        <div class="container">
            <div class="row">
                
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active"><a href="javascript:void(0)">{{$maincat}}</a></li>
                        <li class="active"><a href="{{url($maincat.'/'.$subCat->url)}}">{{$subCat->name}}</a></li>
                        <li class="active"><a href="">{{$knowledge->title}}</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- END OF /. PAGE TITLE --> 
    <div class="container">
        <div class="row row-m">
            <!-- START MAIN CONTENT -->
            <div class="col-sm-8 col-p  main-content">
                <div class="theiaStickySidebar">
                    <div class="post_details_inner">
                        <div class="post_details_block details_block2">
                            <div class="post-header">
                                <ul class="td-category">
                                    @php
                                        $tags = explode(",",$knowledge->tags);
                                    @endphp
                                    @foreach ($tags as $tag)
                                    <li><a class="post-category" href="#">{{$tag}}</a></li>    
                                    @endforeach
                                </ul>
                                <h2>{{$knowledge->title}}</h2>
                                <ul class="authar-info">
                                    <li><a href="#" class="link">by {{$knowledge->author}}</a></li>
                                    @php
                                        $date = date("M j Y", strtotime($knowledge->publish_date));
                                    @endphp
                                    <li>{{$date}}</li>
                                    <li><a href="#" class="link">{{$knowledge->views_count.' views'}}</a></li>
                                </ul>
                            </div> 
                            <figure class="social-icon">
                                <img src="{{ asset('uploads/knowledge/posts/' . $knowledge->thubmnail) }}" class="img-responsive" alt=""/>
                                <div>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                    <a href="#" class="hidden-xs"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="hidden-xs"><i class="fab fa-pinterest-p"></i></a>
                                </div>			
                            </figure>
                            <p>{{$knowledge->short_desc}}</p>
                            {!!$knowledge->long_desc!!}

                        </div>
                        <!-- Post footer -->
                       
                    </div>
                    <!-- START RELATED ARTICLES -->
                    <div class="post-inner post-inner-2">
                        <!--post header-->
                        <div class="post-head">
                            <h2 class="title"><strong>Must </strong> Read</h2>
                        </div>
                        <!-- post body -->
                        <div class="post-body">
                            <div class="post-slider owl-carousel ">
                                <!-- item one -->
                                <div class="item">
                                    <div class="news-grid-2">
                                        <div class="row row-margin">
                                            @foreach ($musReadKnowledges->take(3) as $musReadKnowledge)
                                            @if ($musReadKnowledge->id == $knowledge->id )
                                                @continue
                                            @endif
                                                <div class="col-xs-6 col-sm-4 col-md-4 col-padding">
                                                    <div class="grid-item">
                                                        <div class="grid-item-img">
                                                            <a href="{{url($maincat.'/'.$subCat->url.'/'.$musReadKnowledge->slug)}}">
                                                                <img src="{{ asset('uploads/knowledge/posts/' . $musReadKnowledge->thubmnail) }}" class="img-responsive" alt="">
                                                                <div class="link-icon" style="background: #ED4C54"> 
                                                                    @foreach ($musReadKnowledge->subSubCat as $subcat)
                                                                        {{$subcat->name}}
                                                                    @endforeach
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <h5><a href="{{url($maincat.'/'.$subCat->url.'/'.$musReadKnowledge->slug)}}" class="title">{{$musReadKnowledge->title}}</a></h5>
                                                        @php
                                                            $date = date("M j Y", strtotime($musReadKnowledge->publish_date));
                                                        @endphp
                                                        <ul class="authar-info">
                                                            <li>{{$date}}</li>
                                                            <li class="hidden-sm"><a href="#" class="link">{{$knowledge->views_count.' views'}}</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <!-- Post footer -->
                        <div class="post-footer">
                            <div class="row thm-margin">
                                <div class="col-xs-12 col-sm-8 col-md-9 thm-padding">
                                    <a href="{{url($maincat.'/'.$subCat->url)}}" class="more-btn">More popular posts</a>
                                </div>
                                <div class="hidden-xs col-sm-4 col-md-3 thm-padding">
                                    <div class="social">
                                        <ul>
                                            <li>
                                                <div class="share transition">
                                                    <a href="#" target="_blank" class="ico fb"><i class="fab fa-facebook-f"></i></a>
                                                    <a href="#" target="_blank" class="ico tw"><i class="fab fa-twitter"></i></a>
                                                    <a href="#" target="_blank" class="ico rs"><i class="fas fa-rss"></i></a>
                                                    <a href="#" target="_blank" class="ico pin"><i class="fab fa-pinterest-p"></i></a>
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
                    <!-- END OF /. RELATED ARTICLES -->
                    <!-- START COMMENT -->
                    {{-- <div class="comments-container">
                        <h3>Comments (3)</h3>
                        <ul class="comments-list">
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                    <div class="comment-box">
                                        <div class="comment-content">
                                            <div class="comment-header"> <cite class="comment-author">- Mozammel Hoque</cite>
                                                <time datetime="2012-10-27" class="comment-datetime">25 October 2016 at 12.27 pm</time>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?</p>
                                            <a href="#"  class="btn btn-news"> Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <ul class="comments-list reply-list">
                                    <li>
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                        <div class="comment-box">
                                            <div class="comment-content">
                                                <div class="comment-header"> <cite class="comment-author">- Tahmina Akthr</cite>
                                                    <time datetime="2012-10-27" class="comment-datetime">25 October 2016 at 12.27 pm</time>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?</p>
                                                <a href="#"  class="btn btn-news"> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <!-- Avatar -->
                                        <div class="comment-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                        <div class="comment-box">
                                            <div class="comment-content">
                                                <div class="comment-header"> <cite class="comment-author">- Mozammel Hoque</cite>
                                                    <time datetime="2012-10-27" class="comment-datetime">25 October 2016 at 12.27 pm</time>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?</p>
                                                <a href="#"  class="btn btn-news"> Reply</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <div class="comment-main-level">
                                    <!-- Avatar -->
                                    <div class="comment-avatar"><img src="assets/images/avatar-1.jpg" alt=""></div>
                                    <div class="comment-box">
                                        <div class="comment-content">
                                            <div class="comment-header"> <cite class="comment-author">- Tahmina Akthr</cite>
                                                <time datetime="2012-10-27" class="comment-datetime">25 October 2016 at 12.27 pm</time>
                                            </div>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo?</p>
                                            <a href="#"  class="btn btn-news"> Reply</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div> --}}
                    <!-- END OF /. COMMENT -->
                    <!-- START COMMENTS FORMS -->
                    {{-- <form class="comment-form" action="#" method="post">
                        <h3><strong>Leave</strong> a Comment</h3>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">full name*</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Your name*">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Email*</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Your email address here">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="name">website</label>
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Your website url">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label for="email">Subject</label>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Write subject here">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email">message</label>
                            <textarea class="form-control" id="message" name="message" placeholder="Your Comment*" rows="5"></textarea>
                        </div>
                        <a href="#"  class="btn btn-news"> Submit</a>
                    </form> --}}
                    <!-- END OF /. COMMENTS FORMS -->
                </div>
            </div>
            <!-- END OF /. MAIN CONTENT -->
            <!-- START SIDE CONTENT -->
            <div class="col-sm-4 col-p rightSidebar">
                <div class="theiaStickySidebar">
                    <!-- START ADVERTISEMENT -->
                    <div class="add-inner">
                        <img src="{{ asset('uploads/knowledge/posts/' . $musReadKnowledge->thubmnail) }}" class="img-responsive" alt="">
                    </div>
                    <!-- END OF /. ADVERTISEMENT -->
                    <!-- START SOCIAL ICON -->
                    {{-- <div class="social-media-inner">
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
                    </div> --}}
                    <!-- END OF /. SOCIAL ICON -->
                    <!-- START NAV TABS -->
                    <div class="tabs-wrapper">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Most Viewed</a></li>
                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Popular news</a></li>
                        </ul>
                        <!-- Tab panels one --> 
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade in active" id="home">

                                <div class="most-viewed">
                                    <ul id="most-today" class="content tabs-content">
                                        <li><span class="count">01</span><span class="text"><a href="#">South Africa bounce back on eventful day</a></span></li>
                                        <li><span class="count">02</span><span class="text"><a href="#">Steyn ruled out of series with shoulder fracture</a></span></li>
                                        <li><span class="count">03</span><span class="text"><a href="#">BCCI asks ECB to bear expenses of team's India tour</a></span></li>
                                        <li><span class="count">04</span><span class="text"><a href="#">Duminy, Elgar tons set Australia huge target</a></span></li>
                                        <li><span class="count">05</span><span class="text"><a href="#">English spinners are third-class citizens, says Graeme Swann</a></span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Tab panels two --> 
                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                <div class="popular-news">
                                    <div class="p-post">
                                        <h4><a href="#">It is a long established fact that a reader will be distracted by  </a></h4>
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
                                        <h4><a href="#">It is a long established fact that a reader will be distracted by  </a></h4>
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
                                        <h4><a href="#">It is a long established fact that a reader will be distracted by  </a></h4>
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
<!-- *** END OF /. PAGE MAIN CONTENT *** -->

@endsection