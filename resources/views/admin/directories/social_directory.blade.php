@extends('layouts.admin_master')
@section('sitetitle', 'All Marriage Register Users')
@section('title', 'All Marriage Register Users')

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
                                    <th>Image</th>
                                    <th>Designation</th>
                                    <th>City</th>
                                    <th>Organization</th>
                                    <th>Facebook</th>
                                    <th>Twitter</th>
                                    <th>LinkedIn</th>
                                    <th>Instagram</th>
                                    <th style="width: 180px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($socialDir as $social)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $social->name}}</td>
                                    <td> <img src="{{asset('uploads/socialdirectory/'.$social->image)}}" alt=""
                                            height="100px" width="100px"></td>
                                    <td>{{ $social->designation }}</td>
                                    <td>{{ $social->city }}</td>
                                    <td>{{ $social->organization_name }}</td>
                                    <td>{{ $social->facebook ?? 'N/A' }}</td>
                                    <td>{{ $social->twitter ?? 'N/A' }}</td>
                                    <td>{{ $social->linkedin ?? 'N/A' }}</td>
                                    <td>{{ $social->instagram ?? 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('deleteexclusivedir', $social->id) }}" method="POST">
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