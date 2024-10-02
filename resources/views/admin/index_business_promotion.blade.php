@extends('layouts.admin_master')
@section('sitetitle', 'All Business Promotion Images')
@section('title', 'All Business Promotion Images')
@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('businesspromotioncreate') }}" class="btn btn-success">Add Business Promotion Image </a>
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($advertisementImages as $image)
                                <tr>
                                    <td> {{ $sr }} </td>

                                    <td><img src="{{ asset('uploads/add_business_promotion/' . $image->image) }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td>
                                        <form action="{{ route('businesspromotiondestroy', $image->id) }}" method="POST">
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