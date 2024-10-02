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
                    @if(!empty($sanghathans))
                    @php $data = $sanghathans[0] @endphp
				
				<!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('sahusamaajkesanghathan') }}">
                            <!-- @csrf -->
                            <div class="card-body">
                                <div class="col-md-3">
                                    <select class="form-control" data-live-search="true" name="state_id" tabindex="-98">
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" data-live-search="true" name="city_id" tabindex="-98">
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <input class="form-control" type="text" name="title" placeholder="Enter search title..." aria-label="Enter search title..." aria-describedby="button-search" />
                                    
                                </div>
								<div class="col-md-2">
                                    
                                    <button class="btn btn-primary" id="button-search" type="submit">Go!</button>
                                </div>
                            </div>
                            </form>
                        </div>
                        <!-- Categories widget-->
                        <!-- <div class="card mb-4">
                            <div class="card-header">Categories</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">Web Design</a></li>
                                            <li><a href="#!">HTML</a></li>
                                            <li><a href="#!">Freebies</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="list-unstyled mb-0">
                                            <li><a href="#!">JavaScript</a></li>
                                            <li><a href="#!">CSS</a></li>
                                            <li><a href="#!">Tutorials</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- Side widget-->
                        <!-- <div class="card mb-4">
                            <div class="card-header">Side Widget</div>
                            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
                        </div> -->
                    </div>
					
					
                    <div class="col-lg-12">
                        <!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{ $data->title }}</h1>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2">Posted on {{ date('F d, Y', strtotime($data->date)) }} by Admin</div>
                                <!-- Post categories-->
                                <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                            </header>
                            <!-- Preview image figure-->
                            <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('uploads/sahu_samaaj_sanghathan/' . $data->image) }}" alt="..." /></figure>
                            <!-- Post content-->
                            <section class="mb-5">
                                {!! $data->description !!}
                            </section>
                        </article>
                        <!-- Comments section-->
                        <!-- <section class="mb-5">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <form class="mb-4"><textarea class="form-control" rows="3" placeholder="Join the discussion and leave a comment!"></textarea></form>
                               
                                    <div class="d-flex mb-4">
                                        
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            If you're going to lead a space frontier, it has to be government; it'll never be private enterprise. Because the space frontier is dangerous, and it's expensive, and it has unquantified risks.
                                          
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    And under those conditions, you cannot establish a capital-market evaluation of that enterprise. You can't get investors.
                                                </div>
                                            </div>
                                           
                                            <div class="d-flex mt-4">
                                                <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                                <div class="ms-3">
                                                    <div class="fw-bold">Commenter Name</div>
                                                    When you put money directly to a problem, it makes a good headline.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="d-flex">
                                        <div class="flex-shrink-0"><img class="rounded-circle" src="https://dummyimage.com/50x50/ced4da/6c757d.jpg" alt="..." /></div>
                                        <div class="ms-3">
                                            <div class="fw-bold">Commenter Name</div>
                                            When I look at the universe and all the ways the universe wants to kill us, I find it hard to reconcile that with statements of beneficence.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section> -->
                    </div>
                    
                    
                    @endif
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    function showFilter(filterType) {
        $("#sec_"+filterType).show();
    }
    
    function removeField(filterType) {
        $("#input_"+filterType).val("");
        $("#sec_"+filterType).hide();
    }
</script>
@endsection