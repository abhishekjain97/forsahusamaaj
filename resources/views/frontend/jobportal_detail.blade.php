@extends('layouts.master')

@section('content')
<style>
    h6, .h6, h5, .h5, h4, .h4, h3, .h3, h2, .h2, h1, .h1 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
    }
    .mb-4 {
        margin-bottom: 1.5rem !important;
    }
    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        height: var(--bs-card-height);
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0, 0, 0, 0.175);
        border-radius: var(0.375rem;s);
    }
    .card-img, .card-img-top, .card-img-bottom {
        border-top-left-radius: calc(0.375rem - 1px);
        border-top-right-radius: calc(0.375rem - 1px);
    }
    .card-img, .card-img-top, .card-img-bottom {
        width: 100%;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
    }
    .card-img-top {
        height: 350px;
    }
    .card-img-bottom {
        height: 200px;
    }
    img, svg {
        vertical-align: middle;
    }
    .card-title {
        display: -webkit-box;
        -webkit-line-clamp: 1;
        -webkit-box-orient: v
    }
    .card-text{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
        color: var(--bs-card-color);
    }
    .text-muted {
        --bs-text-opacity: 1;
        color: #6c757d !important;
    }
    small, .small {
        font-size: 0.875em;
    }
    .card-title {
        margin-bottom: 0.5rem;
    }
    .input-group {
        position: relative;
        display: flex;
        /* flex-wrap: wrap; */
        align-items: stretch;
        width: 100%;
    }
    .input-group > :not(:first-child):not(.dropdown-menu):not(.valid-tooltip):not(.valid-feedback):not(.invalid-tooltip):not(.invalid-feedback) {
        margin-left: -1px;
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }
    .input-group .btn {
        position: relative;
        z-index: 2;
    }
    button:not(:disabled), [type=button]:not(:disabled), [type=reset]:not(:disabled), [type=submit]:not(:disabled) {
        cursor: pointer;
    }
    .card-body {
        flex: 1 1 auto;
        padding: 1rem 1rem;
        color: var(--bs-card-color);
    }

</style>

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
                    @if(!empty($jobportals))
                    @php $data = $jobportals[0] @endphp
				
				<!-- Side widgets-->
                    <div class="col-lg-12">
                        <!-- Search widget-->
                        <div class="card mb-4">
                            <form method="get" action="{{ route('jobportal') }}">
                            <!-- @csrf -->
                            <div class="card-body">
                                <div class="col-md-3">
                                    <select class="form-control" data-live-search="true" name="state_id" tabindex="-98">
                                        <option value="">Select State</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->id}}">>{{ $state->name }}</option>
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
                       
                    </div>
					
					
                    <div class="col-lg-12">
					
					    <div class="col-lg-4">
						 <figure class="mb-4"><img class="img-fluid rounded" src="{{ asset('uploads/job_portal/' . $data->image) }}" alt="..." /></figure>
						</div>
						<div class="col-lg-8">
							<!-- Post content-->
                        <article>
                            <!-- Post header-->
                            <header class="mb-4">
                                <!-- Post title-->
                                <h1 class="fw-bolder mb-1">{{ $data->title }}</h1>
								<h2 class="fw-bolder mb-1">{{ $data->company_name }}</h2>
                                <!-- Post meta content-->
                                <div class="text-muted fst-italic mb-2"><strong>Post Date</strong> : {{ date('F d, Y', strtotime($data->date)) }} <strong> Close Date</strong> : {{ date('F d, Y', strtotime($data->close_date)) }} <strong></div>
                                <!-- Post categories-->
                                <!-- <a class="badge bg-secondary text-decoration-none link-light" href="#!">Web Design</a>
                                <a class="badge bg-secondary text-decoration-none link-light" href="#!">Freebies</a> -->
                            </header>
                            <!-- Preview image figure-->
                           
                            <!-- Post content-->
							<h4 class="card-title1 h4"><label>Location</label> : @foreach($states as $state)
										 @if($state->id==$data->state_id)
                                            {{ $state->name }},
										@endif
                                        @endforeach
										@foreach($cities as $city)
										  @if($city->id==$data->city_id)
                                            {{ $city->city }}
										@endif
                                        @endforeach
										</h4>
							<h3 class="card-title1 h4"><strong>Salary</strong> : {{ $data->amount }}</h3>
							<h4 class="card-title1 h4"><strong>Skills</strong> : {{ $data->skill }}</h4>
							<h4 class="card-title1 h4"><strong>Requirements</strong> : {{ $data->requirements }}</h4>
							<h4 class="card-title1 h4"><strong>Email</strong> : {{ $data->email }}</h4>
							<h4 class="card-title1 h4"><strong>Phone</strong> : {{ $data->phone }}</h4>
										
										
										
                            
                        </article>
						</div>
						<div class="col-lg-12">
							<section class="mb-5">
                                {!! $data->description !!}
                            </section>
						</div>
						
                        
                        
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