@extends('layouts.admin_master')
@section('sitetitle', 'All Post')
@section('title', 'All Post')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('knowledge.create') }}" class="btn btn-success">Add Knowledge</a>
            <br><br>
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
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Country</th>
                                        <th>Image</th>
                                        <th>Document</th>
                                        <th style="width: 10px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($publisPosts as $publisPost)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $publisPost->name }}</td>
                                            <td>{{ $publisPost->email }}</td>
                                            <td>{{ $publisPost->mobile }}</td>
                                            <td>{{ $publisPost->title }}</td>
                                            <td>{{ $publisPost->category }}</td>
                                            <td>{{ $publisPost->country }}</td>
                                            <td><img src="{{asset('admin_assets/uploads/images/'.$publisPost->image)}}" alt="" height="50px" width="50" ></td>
                                            <td> <a href="{{asset('admin_assets/uploads/docs/'.$publisPost->doc)}}">view File</a> </td>
                                            <td>
                                                <a href="{{ url('admin/posts', $publisPost->id) }}" class="btn btn-danger btn-sm" ><i class="fas fa-trash"></i>Delete</a>
                                                

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
