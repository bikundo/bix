@extends('dashboard')

@section('title', 'Posts')

@section('header-styles')
    <link href="{{ asset("/backend/css/hovers.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')
    <style>
        .grid {
            margin-left: 1%;
            margin-right: 1%;
            overflow: auto;
        }
    </style>

    @if ($posts->count())
        <div class="grid">
            @foreach ($posts as $post)
                <figure class="effect-zoe">
                    {!!  HTML::image($post->images, 'a picture') !!}
                    <figcaption>
                        <h5>{!! strip_tags($post->title) !!}</h5>

                        <p class="icon-links pull-right">
                            <a href="{{url('dashboard/posts/'.$post->id.'/edit')}}">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>
                        </p>

                        <p class="description">{!! str_limit(strip_tags($post->body, 50)) !!}</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>

    @else
        There are no posts
    @endif

@endsection
