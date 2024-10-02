@extends('layouts.master')

@section('content')
<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Advertisement</li>
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
                <div class="section-title mb60 text-center">
                    <h1 id="heading">Advertisement</h1>
                </div>
            </div>
        </div>
        <div class="row well-box post-holder">



            <div class="col-md-7 post-holder">
                <h2 class="widget-title wt-color" style="font-weight: bold;">Advertising</h2>
                <div class="row">
                    <div class="col-md-12 tp-testimonial">
                        <div id="slider4" class="owl-carousel owl-theme">
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

<script>
    $(".post-meta-story").hide();
    function loadadvertisementImageDetail(id) {
$("#advertisementImageDetails"+id).slideToggle();
}

</script>
@endsection