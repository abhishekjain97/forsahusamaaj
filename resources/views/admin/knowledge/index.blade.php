@extends('layouts.admin_master')
@section('sitetitle', 'All Knowledge')
@section('title', 'All Knowledge')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <a href="{{ route('knowledge.create') }}" class="btn btn-success">Add Knowledge</a>
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
                                        <th>Title</th>
                                        <th>Sub Menu</th>
                                        <th>Sub-Sub Menu</th>
                                        <th>Is Featured</th>
                                        <th>Publish Date</th>
                                        <th style="width: 180px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $sr = 1; @endphp
                                    @foreach ($knowledges as $knowledge)
                                        <tr>
                                            <td> {{ $sr }} </td>
                                            <td>{{ $knowledge->title }}</td>
                                            <td>
                                                @foreach ($knowledge->subSubCat as $subsubcat)
                                                    {{ $subsubcat['name'] }}
                                                @endforeach
                                            </td>
                                            @foreach ($knowledge->subCat as $subcat)
                                                <td>{{ $subcat['name'] }}</td>
                                            @endforeach
                                            <td>
                                                @if ($knowledge->is_featured == 1)
                                                    {{ 'Featured' }}
                                                @else
                                                    {{ 'Not Featured' }}
                                                @endif
                                            </td>
                                            <td>
                                                @php
                                                $date = date("M j Y",
                                                strtotime($knowledge->publish_date));
                                                @endphp
                                                {{ $date }}
                                            </td>
                                            <td>
                                                <form action="{{ route('knowledge.destroy', $knowledge->id) }}"
                                                    method="POST">
                                                    <a class="btn btn-info btn-sm"
                                                        href="{{ route('knowledge.edit', $knowledge->id) }}">
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
