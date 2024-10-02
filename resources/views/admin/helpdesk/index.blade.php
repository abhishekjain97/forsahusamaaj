@extends('layouts.admin_master')
@section('sitetitle', 'All Hepl Desk')
@section('title', 'All Hepl Desk')

@section('content')
<section class="content">
    <div class="container-fluid">
        <a href="{{ route('helpdesk.create') }}" class="btn btn-success">Add HelpDesk</a>
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
                                    <th>Category</th>
                                    <th>Plan</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp

                                @foreach ($helpDesk as $help)
                                <tr>
                                    <td> {{ $sr }} </td>
                                    
                                    <td> @foreach ($help->subCat as $cat)
                                        {{$cat->name}}
                                    @endforeach </td>
                                    <td>@foreach ($help->subSubCat as $subcat)
                                        {{$subcat->name}}
                                    @endforeach</td>
                                    <td>{{ $help->title }}</td>
                                    <td><a class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#modal-lg{{ $help->id }}" href="#">
                                            <i class="fas fa-eye"></i>
                                        </a></td>
                                    <td>
                                        <form action="{{ route('helpdesk.destroy', $help->id) }}" method="POST">
                                            <a class="btn btn-info btn-sm" href="{{route('helpdesk.edit',$help->id)}}"> <i
                                                    class="fas fa-pencil-alt"></i>Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                                Delete </button>
                                        </form>



                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-lg{{ $help->id }}">
                                    <div class="modal-dialog modal-lg">
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
                                                        {!! $help->description !!}
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