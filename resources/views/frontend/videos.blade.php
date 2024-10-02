@extends('layouts.master')

@section('content')

<div class="tp-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div style="float:right">
                    <ol class="breadcrumb">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li class="active">Eletronic Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12 content-right">
                <div class="section-title text-center">
                    <h1>Eletronic Media</h1>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            @foreach ($youtubeNews->taKe(1) as $video)
                            @php
                            $embeded_link = 'https://www.youtube.com/embed/' . $video->video_link . '?autoplay=1';
                            @endphp
                            <div class="col-md-3 video">
                                <div style="margin-bottom:10px">
                                    <img data-toggle="modal" data-target="#myModal"
                                        onclick="openModel('{{ $embeded_link }}')" src="{{ $video->video_image }}"
                                        class="img-responsive" />
                                    <a data-toggle="modal" data-target="#myModal"
                                        onclick="openModel('{{ $embeded_link }}')"></a>
                                </div>
                                <h4 style="text-align:center">{{ $video->title }}</h4>
                            </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" onclick="closeModel()">&times;</button>
                
            </div>
            <div class="modal-body">
                <iframe width="560" height="315" src="" frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" style="height: 40px;" data-dismiss="modal"
                    onclick="closeModel()">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    function closeModel() {
$('.modal-body').children('iframe').attr('src', '');
}
function openModel(link) {
$('.modal-body').children('iframe').attr('src', link);
}
</script>
@endsection