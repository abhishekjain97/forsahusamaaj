@extends('layouts.admin_master')
@section('sitetitle', 'All Gallery Images')
@section('title', 'All Gallery Images')
@section('content')

<section class="content">
    <div class="container-fluid">
        <a href="{{ route('addimage') }}" class="btn btn-success">Add Images </a>
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
                                    <th>Gallery</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sr = 1; @endphp
                                @foreach ($galleryImages as $image)
                                <tr>
                                    <td> {{ $sr }} </td>

                                    <td><img src="{{ asset('uploads/gallery/gallery_images/' . $image->image) }}" alt=""
                                            height="100px" width="100px"></td>
                                    <td> 
                                        @foreach ($image->getImageCat as $item)
                                            {{$item->title}}
                                        @endforeach    
                                    </td>
                                    <td>
                                        <form action="{{ route('deletegalleryimage', $image->id) }}" method="POST">
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