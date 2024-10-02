@extends('layouts.master')

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>List of workshop</h1>
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
                    <li class="active">List of workshop</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>workshop name</th>
                                <th>workshop type</th>
                                <th>workshop venue</th>
                                <th>date</th>
                                <th style="text-align: center;">description</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sr = 1; @endphp
                            @foreach ($list_workshop as $list_workshops)
                            <tr>
                                <td> {{ $sr }} </td>
                                <td>{{ $list_workshops->workshop_name }}</td>
                                <td>{{ $list_workshops->workshop_type }}</td>
                                <td>{{ $list_workshops->workshop_venue }}</td>
                                <td>{{ $list_workshops->date }}</td>
                                <td style="word-break: break-all;">{!! $list_workshops->description !!}</td>
                            </tr>

                            @php
                            $sr++;
                            @endphp
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection