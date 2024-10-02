@extends('layouts.admin_master')
@section('sitetitle', 'All Product')
@section('title', 'All Orders')

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
                                        <th>Order Id</th>
                                        <th>Grand Total</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($userOrders as $userOrder)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $userOrder->order_unique_id }}</td>
                                            <td>{{ $userOrder->total_amount }}</td>
                                            <td>{{ $userOrder->order_date }}</td>
                                            <td>{{ $userOrder->delivery_date }}</td>
                                            <td>
                                                @if ($userOrder->order_status == 0)
                                                    <span style="color: red"> <b>{{ 'New Order' }}</b></span>
                                                @elseif($userOrder->order_status == 1)
                                                    <b>{{ 'Packed' }}</b>
                                                @elseif($userOrder->order_status == 2)
                                                    <b>{{ 'Order Shipped' }}</b>
                                                @elseif($userOrder->order_status == 3)
                                                    <b>{{ 'Order Delivered' }}</b>
                                                @elseif($userOrder->order_status == 4)
                                                    <b>{{ 'Order Cancel By User' }}</b>
                                                @elseif($userOrder->order_status == 5)
                                                    <b>{{ 'Order Return' }}</b>
                                                @endif
                                            </td>
                                            <td>{{ $userOrder->payment_method }}</td>
                                            <td><a class="btn btn-primary btn-sm"
                                                    href="{{ url('admin/orders/' . $userOrder->id) }}"> <i
                                                        class="fas fa-eye"></i>View </a></td>


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
