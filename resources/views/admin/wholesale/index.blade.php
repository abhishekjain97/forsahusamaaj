@extends('layouts.admin_master')
@section('sitetitle', 'All Product')
@section('title', 'All Product')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('wholesaleproduct.create') }}" class="btn btn-success">Add Product</a>
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
                                        <th>Product Name</th>
                                        <th>Product Fabric</th>
                                        <th>Product Price</th>
                                        <th>Product Description</th>
                                        <th>Profuct Image</th>
                                        <th style="width: 180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($wholeSaleProducts as $wholeSaleProduct)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $wholeSaleProduct->pname }}</td>
                                            <td>{{ $wholeSaleProduct->pfabric }}</td>
                                            <td>{{ $wholeSaleProduct->pprice }}</td>
                                            <td>{!!$wholeSaleProduct->pdescription !!}</td>
                                            <td> <img src="{{ asset('uploads/wholesaleproducts/' .  explode(',',$wholeSaleProduct->pimages)[0] ) }}" alt="" height="100px" width="100px" ></td>
                                            <td>
                                                <form action="{{ route('wholesaleproduct.destroy', $wholeSaleProduct->id) }}" method="POST">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('wholesaleproduct.edit', $wholeSaleProduct->id) }}">
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
