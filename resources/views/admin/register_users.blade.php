@extends('layouts.admin_master')
@section('sitetitle', 'Register Users')
@section('title', 'Register Users')

@section('content')

<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Id Photo</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($registerUsers as $registerUser)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $registerUser->name }}</td>
                                    <td>{{ $registerUser->email }}</td>
                                    <td>
                                        @if ($registerUser->mobile == null)
                                        {{ 'NA' }}
                                        @else
                                        {{$registerUser->mobile}}
                                        @endif
                                    </td>
                                    <td><img src="{{ asset('uploads/registration'. $registerUser->insert_image) }}"
                                            alt="" height="100px" width="100px"></td>
                                    <td>
                                    <td>
                                        <a href="{{ url('admin/deletereguser', $registerUser->id) }}"
                                            class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</a>
                                    </td>

                                </tr>
                                @php
                                $sr++;
                                @endphp
                                @endforeach


                            </tbody>

                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>


@endsection