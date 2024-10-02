@extends('layouts.admin_master')
@section('title', 'ContactUs')


@section('content')

<section class="content">
    <div class="container-fluid">

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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($contact as $contacts)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $contacts->name }}</td>
                                    <td>{{ $contacts->email }}</td>
                                    <td>{{ $contacts->phone }}</td>
                                    <td>{{ $contacts->message }}</td>

                                    <td>
                                        {{-- <a class="btn btn-danger btn-sm" data-toggle="modal"
                                             href="{{ route('contactUsDelete' .$contacts->id) }}">
                                            <i class="fas fa-trash"></i>Delete
                                        </a> --}}
                                        <form action="{{ route('contactUsDelete', $contacts->id) }}"
                                            method="POST">
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