<div class="container">
        <div class="row">

            <div class="col-xs-12 col-sm-8 col-md-8">
                <h3>Featured Events </h3>
                <div class="eventslider">
                    @foreach ($featuredEvents as $featuredEvent)
                        <div class="inner-head bg-img img-responsive"
                            data-image-src="{{ asset('/uploads/events/event_banner/' . $featuredEvent->banner) }}">

                            <div class="col-sm-2">
                                <div class="img-box">
                                    <img src="{{ asset('/uploads/events/event_logo/' . $featuredEvent->event_logo) }}"
                                        alt="" height="100px" width="100px">
                                </div>

                            </div>
                            <div class="col-sm-10" style="padding-left: 50px">
                                <div class="description" style="font-size: 22px;">
                                    {{ $featuredEvent->name }}
                                    <br><br>

                                    <div class="date-add"><i class="fa fa-calendar"></i> {{ $featuredEvent->start_date }}
                                        to
                                        {{ $featuredEvent->end_date }}</div>

                                    <div class="date-add"><i class="fa fa-map-marker"></i> {{ $featuredEvent->country }}
                                    </div>
                                    <br>

                                    <a href="{{url('event/'.$featuredEvent->id)}}" class="btn btn-success"> <i class="fa fa-info"></i> View Details</a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                    {{-- <div> <a href="">
                            <img src="https://tiimg.tistatic.com/new_website1/trade-shows/images/online-events-bg.jpg"
                                class="img-responsive" alt="">
                        </a> </div>
                    <div> <a href="">
                            <img src="https://tiimg.tistatic.com/new_website1/trade-shows/images/online-events-bg.jpg"
                                class="img-responsive" alt="">
                        </a> </div> --}}


                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <h3>Sponsored Events </h3>
                <div class="sponsord">
                    @foreach ($sponsoredEvents as $sponsoredEvent)
                        <div class="row" style="background: white; padding:10px">
                            <div class="col-sm-4">
                                <img src="{{ asset('/uploads/events/event_logo/' . $sponsoredEvent->event_logo) }}"
                                    width="100px" height="100px" alt="">
                            </div>
                            <div class="col-sm-8">
                                <h4><a href=""> {{ $sponsoredEvent->name }} </a></h4>

                                <p> <span class="fa fa-calendar"></span> {{ $sponsoredEvent->start_date }} to
                                    {{ $sponsoredEvent->end_date }}</p>
                                <p> <span class="fa fa-map-marker"></span> {{ $sponsoredEvent->country }}</p>
                                <br><br><br>
                                <a href="" class="btn btn-primary">View Detail</a>
                            </div>

                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>