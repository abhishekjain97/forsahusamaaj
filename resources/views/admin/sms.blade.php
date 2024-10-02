@extends('layouts.admin_master')
@section('title', 'Messages')


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
                                    <th>Type</th>
                                    <th>Sms</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($messages as $sms)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    <td>{{ $sms->type }}</td>
                                    <td>{{ $sms->sms }}</td>

                                    <td>
                                        <a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-lg{{ $sms->id }}" href="#">
                                            <i class="fas fa-pencil-alt"></i>Edit
                                        </a>

                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $sms->id }}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">SMS</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form role="form" action=" {{ route('updatesms', $sms->id) }} "
                                                            method="POST" enctype="multipart/form-data">
                                                            @method('POST')
                                                            @csrf
                                                            <textarea name="sms" class="form-control" cols="30"
                                                                rows="5">{{$sms->sms}}</textarea>
                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-primary">Update</button>
                                                        </form>
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