@extends('layouts.admin_master')
@section('sitetitle', 'All Events')
@section('title', 'All Events')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('event.create') }}" class="btn btn-success">Add Event</a>
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
                                        <th>Name</th>
                                        <th>Address</th>
										<th>From Date - To Date</th>
                                        <th>Description</th>
                                        <th style="width: 180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($events as $event)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td><img src="{{ asset('uploads/events/'.$event->image) }}" alt="" height="100px" width="100px"></td>
                                            <td>{{ $event->name }}</td>
                                            <td>{{ $event->address }}</td>
											<td>{{ $event->from_date }} - {{ $event->to_date }}</td>
                                            <td><a class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#modal-lg{{ $event->id }}" href="#">
                                                <i class="fas fa-eye"></i>
                                            </a></td>
                                            <td>
                                                <form action="{{ route('event.destroy', $event->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('event.edit', $event->id) }}">
                                                        <i class="fas fa-pencil-alt"></i>Edit
                                                    </a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                        Delete </button>

                                                </form>

                                            </td>
                                        </tr>

                                        <div class="modal fade" id="modal-lg{{ $event->id }}">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Description</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                {!! $event->description !!}
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                            data-dismiss="modal">Close</button>

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
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
