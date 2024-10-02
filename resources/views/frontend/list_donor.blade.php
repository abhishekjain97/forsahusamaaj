@extends('layouts.master')

@section('content')
<div class="tp-page-head">
    <!-- page header -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-header">
                    <h1>List of Donors</h1>
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
                    <li class="active">List of Donors</li>
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
                    <table  class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Father Name</th>
                                <th style="text-align: center;">Email</th>
                                <th>Phone</th>
                                <th>donation</th>
                                <th>donation Type</th>
                                <th style="text-align: center;">Address</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sr = 1; @endphp
                            @foreach ($list_donor as $list_donors)
                            <tr>
                                <td> {{ $sr }} </td>
                                <td>{{ $list_donors->name }}</td>
                                <td>{{ $list_donors->father_name }}</td>
                                <td>{{ $list_donors->email }}</td>
                                <td>{{ $list_donors->phone }}</td>
                                <td>{{ $list_donors->donation }}</td>
                                <td>{{ $list_donors->donation_type }}</td>
                                <td>{{ $list_donors->address }}</td>
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