@extends('layouts.admin_master')
@section('sitetitle', 'All volunteers')
@section('title', 'All volunteers')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('volunteer.create') }}" class="btn btn-success">Add volunteer</a>
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
                                        <th>Image</th>
                                        <th style="width: 180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($volunteers as $volunteer)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td><img src="{{ asset('uploads/volunteer/'.$volunteer->image) }}" alt="" height="100px" width="100px"></td>
                                        
                                            <td>
                                                <form action="{{ route('volunteer.destroy', $volunteer->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('volunteer.edit', $volunteer->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>

                                                </form>

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
