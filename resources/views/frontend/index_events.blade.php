@extends('layouts.master')

@section('content')

    <br>

    <section class="slider-inner">
        <div class="container">
            <div class="row thm-margin">
                <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                    <div class="slider-wrapper">
                        <div>
                            <!-- Slider item one -->
                            @foreach ($events->take(1) as $event)
                                <div class="item">
                                    <div class="slider-post post-height-1 eventImage">
                                        <a href="{{url('events/'.$event->id)}}" class="news-image"><img
                                                src="{{ asset('uploads/events/event_banner/' . $event->banner) }}" alt=""
                                                class="img-responsive"></a>
                                        <div class="post-text">
                                            {{-- <span class="post-category">Health & Fitness</span> --}}
                                            <h2><a href="{{url('events/'.$event->id)}}"> {{ $event->name }} </a></h2>
                                            <ul class="authar-info">
                                                <li class="date"> <span class="fa fa-calendar"></span>
                                                    {{ $event->start_date }} To {{ $event->end_date }} </li>
                                                <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                    {{ $event->country }} </li>
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
                        @foreach ($events->take(2) as $event2)
                            @if ($event->id == $event2->id)
                                @continue
                            @endif
                            <div class="col-xs-6 col-sm-12 col-md-12 thm-padding">
                                <div class="slider-post post-height-2">
                                    <a href="{{url('events/'.$event2->id)}}" class="news-image"><img
                                            src="{{ asset('uploads/events/event_banner/' . $event2->banner) }}" alt=""
                                            class="img-responsive"></a>
                                    <div class="post-text">

                                        <h4><a href="{{url('events/'.$event2->id)}}"> {{ $event2->name }} </a></h4>
                                        <ul class="authar-info">
                                            <li class="date"> <span class="fa fa-calendar"></span>
                                                {{ $event2->start_date }} To {{ $event2->end_date }} </li>
                                            <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                {{ $event2->country }} </li>
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


    <br>

    <section class="slider-inner">
        <div class="container">
            <br>
            <div class="row thm-margin" style="background: white; padding: 10px" >
                <h2> Sponsored </h2>
                <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                    <div class="slider-wrapper">
                        <div>
                            <!-- Slider item one -->
                            @foreach ($sponsoredEvents->take(1) as $sponsoredEvent)
                                <div class="item">
                                    <div class="slider-post post-height-1 eventImage">
                                        <a href="{{url('events/'.$sponsoredEvent->id)}}" class="news-image"><img
                                                src="{{ asset('uploads/events/event_banner/' . $sponsoredEvent->banner) }}" alt=""
                                                class="img-responsive"></a>
                                        <div class="post-text">
                                            {{-- <span class="post-category">Health & Fitness</span> --}}
                                            <h2><a href="{{url('events/'.$sponsoredEvent->id)}}"> {{ $sponsoredEvent->name }} </a></h2>
                                            <ul class="authar-info">
                                                <li class="date"> <span class="fa fa-calendar"></span>
                                                    {{ $sponsoredEvent->start_date }} To {{ $sponsoredEvent->end_date }} </li>
                                                <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                    {{ $sponsoredEvent->country }} </li>
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
                        @foreach ($sponsoredEvents->take(4) as $sponsoredEvent2)
                            @if ($sponsoredEvent->id == $sponsoredEvent2->id)
                                @continue
                            @endif
                            <div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
                                <div class="slider-post post-height-2">
                                    <a href="{{url('events/'.$sponsoredEvent2->id)}}" class="news-image"><img
                                            src="{{ asset('uploads/events/event_banner/' . $sponsoredEvent2->banner) }}" alt=""
                                            class="img-responsive"></a>
                                    <div class="post-text">

                                        <h4><a href="{{url('events/'.$sponsoredEvent2->id)}}"> {{ $sponsoredEvent2->name }} </a></h4>
                                        <ul class="authar-info">
                                            <li class="date"> <span class="fa fa-calendar"></span>
                                                {{ $sponsoredEvent2->start_date }} To {{ $sponsoredEvent2->end_date }} </li>
                                            <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                {{ $sponsoredEvent2->country }} </li>
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

    <br>

    <section class="slider-inner">
        <div class="container">
            <h2> <u>Featured</u> </h2>
            <br>
            <div class="row thm-margin">
                <div class="col-xs-12 col-sm-6 col-md-6 thm-padding">
                    <div class="slider-wrapper">
                        <div>
                            <!-- Slider item one -->
                            @foreach ($featuredEvents->take(1) as $featuredEvent)
                                <div class="item">
                                    <div class="slider-post post-height-1 eventImage">
                                        <a href="{{url('events/'.$featuredEvent->id)}}" class="news-image"><img
                                                src="{{ asset('uploads/events/event_banner/' . $featuredEvent->banner) }}" alt=""
                                                class="img-responsive"></a>
                                        <div class="post-text">
                                            {{-- <span class="post-category">Health & Fitness</span> --}}
                                            <h2><a href="{{url('events/'.$featuredEvent->id)}}"> {{ $featuredEvent->name }} </a></h2>
                                            <ul class="authar-info">
                                                <li class="date"> <span class="fa fa-calendar"></span>
                                                    {{ $featuredEvent->start_date }} To {{ $featuredEvent->end_date }} </li>
                                                <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                    {{ $featuredEvent->country }} </li>
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
                        @foreach ($featuredEvents->take(2) as $featuredEvent2)
                            @if ($featuredEvent->id == $featuredEvent2->id)
                                @continue
                            @endif
                            <div class="col-xs-6 col-sm-6 col-md-6 thm-padding">
                                <div class="slider-post post-height-3">
                                    <a href="{{url('events/'.$featuredEvent2->id)}}" class="news-image"><img
                                            src="{{ asset('uploads/events/event_banner/' . $featuredEvent2->banner) }}"
                                            alt=""></a>
                                    <div class="post-text">

                                        <h4><a href="{{url('events/'.$featuredEvent2->id)}}"> {{ $featuredEvent2->name }} </a></h4>
                                        <ul class="authar-info">
                                            <li class="date"> <span class="fa fa-calendar"></span>
                                                {{ $featuredEvent2->start_date }} To {{ $featuredEvent2->end_date }} </li>
                                            <li class="authar"> <span class="fa fa-map-marker"> </span>
                                                {{ $featuredEvent2->country }} </li>
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

    <br>
    {{-- <section class="articles-wrapper">
        <div class="container">
            <div class="row row-m">
                <div class="col-sm-12 main-content col-p">
                    <div class="theiaStickySidebar">
                        <!-- START POST CATEGORY STYLE FOUR (Latest articles ) -->
                        <div class="post-inner">
                            <!--post header-->
                            <!-- post body -->
                            <div class="post-body">
                                @foreach ($events as $event)
                                    <div class="col-lg-3 col-sm-6 card-background ">
                                        <div class="card hovercard">
                                            <div class="cardheader"
                                                style=" background: url({{ asset('/uploads/events/event_banner/' . $event->banner) }});">
                                            </div>
                                            <div class="avatar">
                                                <img alt=""
                                                    src="{{ asset('/uploads/events/event_logo/' . $event->event_logo) }}">
                                            </div>
                                            <div class="info">
                                                <h4>
                                                    <a target="_blank" href="#">{{ $event->name }}</a>
                                                </h4>
                                                <p><span class="fa fa-calendar"></span> {{ $event->start_date }} to
                                                    {{ $event->end_date }} </p>
                                                <p><span class="fa fa-map-marker"></span> {{ $event->country }} </p>

                                            </div>

                                        </div>

                                    </div>
                                @endforeach

                            </div> <!-- /. post body -->

                        </div>
                        <!-- END OF /. POST CATEGORY STYLE FOUR (Latest articles ) -->
                    </div>
                </div>

            </div>
        </div>
    </section> --}}

    @php
    $abhi = 'https://tiimg.tistatic.com/new_website1/trade-shows/images/online-events-bg.jpg';
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @foreach ($events as $event)
                    <div class="col-lg-4 col-sm-6 card-background" style="margin-left: 15px" >
                        <div class="card hovercard">
                            <div class="cardheader"
                                style=" background: url({{ asset('/uploads/events/event_banner/' . $event->banner) }}); ">
                            </div>
                            <div class="avatar">
                                <img alt="" src="{{ asset('/uploads/events/event_logo/' . $event->event_logo) }}">
                            </div>
                            <div class="info">
                                <h4>
                                    <a href="{{url('events/'.$event->id)}}">{{ $event->name }}</a>
                                </h4>
                                <p><span class="fa fa-calendar"></span> {{ $event->start_date }} to
                                    {{ $event->end_date }} </p>
                                <p><span class="fa fa-map-marker"></span> {{ $event->country }} </p>
                                    <button class="btn btn-primary">View Detail</button>
                            </div>

                        </div>

                    </div>
                @endforeach


            </div>

            {{-- <div class="col-sm-3 ">
                <h3>Sponsored Events</h3>
                <div class="my-sidebar">
                    <div class="row">
                        <div class="col-sm-4">asdfads</div>
                        <div class="col-sm-8">asdfads</div>
                    </div>
                </div>


            </div> --}}



        </div>
    </div>
<br>

    {{-- <div class="container">
        <div class="col-md-3">sfads</div>
        <div class="col-md-3">asdf</div>
        <div class="col-md-3">asdfas</div>
        <div class="col-md-3">asdfas</div>
    </div> --}}

@endsection
