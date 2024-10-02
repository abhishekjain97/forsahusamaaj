@extends('layouts.admin_master')
@section('sitetitle', 'All karma Images')
@section('title', 'All karma Images')

@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('workshop.create') }}" class="btn btn-success">Add workshop </a>
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Sr No.</th>
                                    <th>workshop name</th>
                                    <th>workshop type</th>
                                   
                                    <th>workshop venue</th>
                                    <th>date</th>
                                    <th>description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($workshops as $workshop)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $workshop->workshop_name }}</td>
                                    <td>{{ $workshop->workshop_type }}</td>
                                    <td>{{ $workshop->workshop_venue }}</td>
                                    <td>{{ $workshop->date }}</td>
                                    <td>{!! $workshop->description !!}</td>

                                    <td>
                                        <form action="{{ route('workshop.destroy', $workshop->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $workshop->id }}" href="#">
                                                <i class="fas fa-pencil-alt"></i>Edit
                                            </a> --}}
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
                    <!-- /.card-header -->
                    <!-- form start -->

                </div>
                <!-- /.card -->



            </div>
            <!--/.col (left) -->

        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>


@endsection