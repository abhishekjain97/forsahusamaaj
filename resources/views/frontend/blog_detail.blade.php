@extends('layouts.master')

@section('content')
<div class="main-container">
    

    <div class="blog-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="blog-details-desc">
                        <div class="article-content">
                            <div class="article-image">
                                <img src="{{ asset('uploads/news/' . $blogNews->image) }}" alt="image">
                            </div>

                            <ul class="entry-meta">
                                @if($blogNews->posted_by)
                                <li>
                                    {{$blogNews->name}}
                                </li>
                                <li>
                                    <a href="mailto:{{$blogNews->email}}">
                                        <i class="fa fa-envelope"></i>
                                        {{$blogNews->email}}
                                    </a>
                                </li>
                                <li>
                                    <a href="tel:{{$blogNews->mobile}}">
                                        <i class="fa fa-phone"></i>
                                        {{$blogNews->mobile}}
                                    </a>
                                </li>
                                @else
                                <li>
                                    Admin
                                </li>
                                @endif
                                <li>
                                    <i class="fa fa-calendar"></i>
                                    {{$blogNews->created_at->format('M d, Y')}}
                                </li>
                            </ul>

                            <h3 class="h3">{{$blogNews->title}}</h3>
                            
                            {!! $blogNews->description !!}

                        </div>


                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <aside class="widget-area ms-3" id="secondary">
                      

                        <div class="widget widget_plonk_posts_thumb">
                            <h3 class="widget-title">Latest News</h3>
                            @foreach ($allBlogs as $blog)
                                @if ($blog->id == $blogNews->id)
                                @continue
                                @endif
                                <article class="item">
                                    <a href="blog-details.html" class="thumb">
                                        <span class="fullimage cover bg1" role="img" style="background-image: url('{{ asset('uploads/news/' . $blog->image) }}')"></span>
                                    </a>

                                    <div class="info">
                                        <h4 class="h4 title usmall">
                                            <a href="{{route('news.show',$blog->id)}}">{{$blog->title}}</a>
                                        </h4>

                                        <span><i class="fa fa-calendar"></i> {{$blog->created_at->format('M d, Y')}}</span>
                                    </div>
                                </article>
                            @endforeach
                        </div>

                       
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection