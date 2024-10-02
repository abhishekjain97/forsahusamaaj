@extends('layouts.admin_master')
@section('title', 'Donation')


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
                                    <th>Father Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>donation</th>
                                    <th>donation Type</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($donation as $donations)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $donations->name }}</td>
                                    <td>{{ $donations->father_name }}</td>
                                    <td>{{ $donations->email }}</td>
                                    <td>{{ $donations->phone }}</td>
                                    <td>{{ $donations->donation }}</td>
                                    <td>{{ $donations->donation_type }}</td>
                                    <td>{{ $donations->address }}</td>

                                    <td>
                                        
                                        <form action="{{ route('donationDelete', $donations->id) }}"
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