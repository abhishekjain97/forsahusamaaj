@extends('layouts.master')

@section('content')
    <div class="tp-page-head">
        <!-- page header -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>Marathon Registration</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.page header -->
    <div class="tp-breadcrumb">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Veerangana Registration</h1>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="main-container">
        <div class="container">
            <div class="row">

                <div class="col-sm-3"></div>
                <div class="col-sm-6">
                    <div class="well-box">
                        <h2 style="text-align:center">You Are Registered Successfully for Veerangana</h2>
                        <hr>
                        <h3 style="color:red; text-align:center">आपका पंजीकृत संख्या <b>{{ $veeranganaUser->chest_no }}</b>
                        </h3>
                        <b>नोट:- पंजीकरण शुल्क 30 रुपये नगद जमा करने पर कार्यक्रम स्थल पर रन फॉर वीरांगना का चेस्ट नम्बर दिया जाएगा</b>
                    </div>
                </div>
                <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
@endsection
