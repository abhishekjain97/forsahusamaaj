@extends('layouts.master')

@section('content')
<link rel="stylesheet" type="text/css" href="{{ asset('frontend_assets/css/card-layout.css') }}">

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb float-right">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">{{ $title }}</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">

        <div class="row well-box">

            <div class="container mt-5">
                <div class="row">
                    @if(!empty($newsbroadcasts))
                    @php $data = $newsbroadcasts[0] @endphp

                    <!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('newsbroadcast') }}">
                                <!-- @csrf -->
                                <div class="card-body">
                                    <div class="col-md-3">
                                        <select class="form-control" data-live-search="true" name="state_id"
                                            tabindex="-98">
                                            <option value="">Select State</option>
                                            @foreach($states as $state)
                                            <option value="{{$state->id}}">>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <select class="form-control" data-live-search="true" name="city_id"
                                            tabindex="-98">
                                            <option value="">Select City</option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{ $city->city }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <input class="form-control" type="text" name="title"
                                            placeholder="Enter search title..." aria-label="Enter search title..."
                                            aria-describedby="button-search" />

                                    </div>
                                    <div class="col-md-2">

                                        <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>


                    <div class="col-lg-12">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{ $data->title }}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on
                                    <span class="date_layout">{{ date('F d, Y', strtotime($data->date)) }}</span> by Admin </div>
                                <h3 class="card-title2 h4">
                                    @foreach($cities as $city)
                                    <?php if($city->id == $data->city_id) {?> {{ $city->city }},  <?php  } ?>
                                    @endforeach

                                    @foreach($states as $state)
                                    <?php if($state->id == $data->state_id) {?> {{ $state->name }} <?php  } ?>
                                    @endforeach
                                    <h3>
                                        <!-- Post categories-->
                                        <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded"
                                    src="{{ asset('uploads/news_broad_cast/' . $data->image) }}" alt="..." /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                {!! $data->description !!}
                            </section>
                        </article>

                    </div>


                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
<script>
function showFilter(filterType) {
    $("#sec_" + filterType).show();
}

function removeField(filterType) {
    $("#input_" + filterType).val("");
    $("#sec_" + filterType).hide();
}
</script>
@endsection