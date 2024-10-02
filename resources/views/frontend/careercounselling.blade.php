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
        -webkit-box-orient: vertical;
    }
    .card-text{
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        max-height: 84px;
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
        <div class="row">
            <div class="col-md-12">
                <div class="section-title mb20 text-center">
                    <h1><a href="{{url('/')}}" style="float:left"><i title="Click here for go back screen"
                                class="fa fa-arrow-circle-o-left"></i></a>Work Shop</h1>
                </div>
            </div>
        </div>
        <div class="row well-box">
           
            
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
					 <!-- Side widgets-->
                    
					
                    <div class="col-lg-12">
                       
                        <!-- Nested row for non-featured blog posts-->
                        @if(!empty($careercounsellings))
                        
					        
					        <table class="career-counselling" >
								<tr>
								<th class="t1" >S.No.</th>
								<th class="t2" >Career Counselling Program</th>
								<th  class="t3" >Date</th>
								<th class="t4"  >Vanue</th>
								<th  class="t5" >Description</th>
								<th  class="t6" >Action</th>
								</tr>
								
								@for ($i = $start; $i < count($careercounsellings); $i++)
								<tr>
								<td class="t1" >{{ $i }}</td>
								<td class="t2" >{{ Str::limit($careercounsellings[$i]->title,50) }}</td>
								<td class="t3" >{{ date('F d, Y', strtotime($careercounsellings[$i]->date)) }}</td>
								<td class="t4" >{{ Str::limit($careercounsellings[$i]->vanue,80) }}</td>
								<td class="t5" >{!! Str::limit($careercounsellings[$i]->description,100) !!}</td>
								<td class="t6" ><a class="btn btn-primary" href="{{ route('careercounsellingDetail', $careercounsellings[$i]->title) }}">Apply Now</a></td>
								</tr>
							
							<div class="col-lg-4" style="display:none;">
                                <!-- Blog post-->
                                <div class="card mb-4">
                                    <a href="{{ route('careercounsellingDetail', $careercounsellings[$i]->title) }}"><div class="card-img-bottom" style="background-image: url('{{ asset('uploads/career_counselling/' . $careercounsellings[$i]->image) }}')"></div></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ date('F d, Y', strtotime($careercounsellings[$i]->date)) }}</div>
                                        <h2 class="card-title h4">{{ Str::limit($careercounsellings[$i]->title,20) }}</h2>
										<h3 class="card-title2 h4">Vanue : {{ Str::limit($careercounsellings[$i]->vanue,200) }}</h3>
																	
                                        <div class="card-text mb-4">{!! $careercounsellings[$i]->description !!}</div>
                                        <a class="btn btn-primary" href="{{ route('careercounsellingDetail', $careercounsellings[$i]->title) }}">Apply Now</a>
                                    </div>
                                </div>
                                
                            </div>
                            @endfor
							</table>
                       
                        <!-- Pagination-->
                        @if($dataType == "withoutSearch")
                            {{ $careercounsellings->links() }}
                        @endif
                        
                        @endif
                    </div>
                   
                </div>
            </div>

        </div>
    </div>
</div>

@endsection