@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">About KSSKS</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            @if ($greatMan != null)
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h1>About {{$greatMan->menu_name}}</h1>
                </div>
            </div>
            @endif

            <div class="col-md-12 mt20">
                <div class="row">
                    @if ($greatMan == null)
                    <div class="col-md-12 mt20">
                        <div class="row">
                            <div class="error-block mb80">
                                <h1>404</h1>
                                <h2><i class="fa fa-warning"></i>oooopppss! page was not found, Sorry! it looks like
                                    that page
                                    has gone missing.</h2>
                                <p>Please use navigation above to browse wedding topics, or go back to <a
                                        href="{{url('/')}}">KSSKS.</a> </p>
                            </div>
                        </div>
                    </div>
                    @else
                    <div class="col-md-12 content-right">
                        <!-- <div class="col-md-12 st-accordion"> -->
                        <div class="panel-group">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title acc-fontsize">
                                        <a role="button">
                                            <i class="fa fa-caret-right" aria-hidden="true"></i>
                                            {{$greatMan->menu_name}} </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse">
                                    <div class="panel-body">
                                        {!! $greatMan->description !!}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function getActive(id){
        var a = document.getElementById("menu"+id);
        a.classList.add('active')
    }
</script>


@endsection