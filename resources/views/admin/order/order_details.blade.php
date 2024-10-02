@extends('layouts.admin_master')
@section('sitetitle', 'All Product')
@section('title', 'Orders Details')

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Order Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td> <b>Order Id</b></td>
                                        <td>{{ $userOrder->order_unique_id }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Order Date</b></td>
                                        <td>{{ $userOrder->order_date }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Delivery Date</b></td>
                                        <td>{{ $userOrder->delivery_date }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Order Total</b></td>
                                        <td>{{ $userOrder->total_amount }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Payment Method</b></td>
                                        <td>{{ $userOrder->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Order Status</b></td>
                                        <td style="color: green">
                                            @if ($userOrder->order_status == 0)
                                                {{ 'New' }}
                                            @endif
                                            @if ($userOrder->order_status == 1)
                                                {{ 'Packed' }}
                                            @endif
                                            @if ($userOrder->order_status == 2)
                                                {{ 'Order Shipped' }}
                                            @endif
                                            @if ($userOrder->order_status == 3)
                                                {{ 'Order Delivered' }}
                                            @endif
                                            @if ($userOrder->order_status == 4)
                                                {{ 'Order Return' }}
                                            @endif
                                            @if ($userOrder->order_status == 5)
                                                {{ 'Order Cancel By User' }}
                                            @endif
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Customer Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td> <b>Customer Name</b></td>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Customer Email</b></td>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Customer Mobile</b></td>
                                        <td>{{ $user->mobile }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Update Order Status</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{ url('admin/updateorderstatus/' . $userOrder->id) }}" method="post">
                                @csrf
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="orderstatus" class="form-control">
                                                    <option value="1">Packed</option>
                                                    <option value="2">Order Shipped</option>
                                                    <option value="3">Order Delivered</option>
                                                </select>
                                            </td>
                                            <td> <button class="btn btn-primary">Update</button> </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Shipping Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td> <b>Name</b></td>
                                        <td>{{ $userAddress->name }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Mobile</b></td>
                                        <td>{{ $userAddress->mobile }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Locality</b></td>
                                        <td>{{ $userAddress->locality }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Pincode</b></td>
                                        <td>{{ $userAddress->pincode }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Landmark</b></td>
                                        <td>{{ $userAddress->landmark }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>Alternative Mobile</b></td>
                                        <td>{{ $userAddress->altmobile }}</td>
                                    </tr>

                                    <tr>
                                        <td> <b>Address</b></td>
                                        <td>{{ $userAddress->address }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>City</b></td>
                                        <td>{{ $userAddress->city }}</td>
                                    </tr>
                                    <tr>
                                        <td> <b>State</b></td>
                                        <td>{{ $userAddress->state }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <section class="content">
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
                                                    <th>Product Quantity</th>
                                                    <th>Product Size</th>
                                                    <th>Product Color</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $sr = 1; @endphp
                                                @foreach ($orderProducts as $orderProduct)
                                                    <tr>
                                                        <td> {{ $sr }} </td>
                                                        <td>{{ $orderProduct->product_name }}</td>
                                                        <td>{{ $orderProduct->product_qty }}</td>
                                                        <td>{{ $orderProduct->product_size }}</td>
                                                        <td>{{ $orderProduct->color }}</td>
                                                        <td><a class="btn btn-primary btn-sm" data-toggle="modal"
                                                                data-target="#modal-lg{{ $orderProduct->product_id }}"
                                                                href="#">
                                                                <i class="fas fa-eye"></i>View
                                                            </a></td>
                                                    </tr>
                                                    <div class="modal fade" id="modal-lg{{ $orderProduct->product_id }}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h4 class="modal-title">Product</h4>
                                                                    <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="card">
                                                                                <div class="card-header">
                                                                                    <h3 class="card-title">Product Images
                                                                                    </h3>
                                                                                </div>
                                                                                <!-- /.card-header -->
                                                                                <div class="card-body">

                                                                                    <div id="carouselExampleIndicators{{ $orderProduct->product_id }}"
                                                                                        class="carousel slide"
                                                                                        data-ride="carousel">
                                                                                        <div class="carousel-inner">
                                                                                            @php
                                                                                            $productImages =
                                                                                            explode(',',$orderProduct->images);

                                                                                            @endphp
                                                                                            @foreach ($productImages as $key => $productImage)
                                                                                                <div
                                                                                                    class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                                                                                    <img class="d-block w-100"
                                                                                                        src="{{ asset('uploads/products/' . $productImage) }}"
                                                                                                        alt="Product Image"
                                                                                                        style="height: 100%; width: 100%">
                                                                                                </div>
                                                                                            @endforeach
                                                                                        </div>
                                                                                        <a class="carousel-control-prev"
                                                                                            href="#carouselExampleIndicators{{ $orderProduct->product_id }}"
                                                                                            role="button" data-slide="prev">
                                                                                            <span
                                                                                                class="carousel-control-prev-icon"
                                                                                                aria-hidden="true"></span>
                                                                                            <span> <b
                                                                                                    style="color: black">Previous</b></span>
                                                                                        </a>
                                                                                        <a class="carousel-control-next"
                                                                                            href="#carouselExampleIndicators{{ $orderProduct->product_id }}"
                                                                                            role="button" data-slide="next">
                                                                                            <span aria-hidden="true"></span>
                                                                                            <span> <b
                                                                                                    style="color: black">Next</b>
                                                                                            </span>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.card-body -->
                                                                            </div>
                                                                            <!-- /.card -->
                                                                        </div>
                                                                        <div class="col-sm-6">
                                                                            <h3><strong>Product's Detail</strong></h3>
                                                                            <hr>
                                                                            <span><strong>Product's Name :
                                                                                </strong></span><span>
                                                                                {{ $orderProduct->product_name }}
                                                                            </span><br>
                                                                            <hr>
                                                                            <span><strong>Product's Color :
                                                                                </strong></span><span>
                                                                                {{ $orderProduct->color }}</span><br>
                                                                            <hr>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                            </div>
                                                            <!-- /.modal-content -->
                                                        </div>
                                                        <!-- /.modal-dialog -->
                                                    </div>
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

                        <!-- /.container-fluid -->
                    </section>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
