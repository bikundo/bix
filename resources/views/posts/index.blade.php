@extends('dashboard')

@section('title', 'Posts')

@section('header-styles')
    <link href="{{ asset("/backend/css/hovers.css")}}" rel="stylesheet" type="text/css"/>
@endsection
@section('content')

    @if ($posts->count())
        <div class="grid">
            @foreach ($posts as $post)
                <?php $img = head($post->images)?>
                <figure class="effect-zoe">
                    {!!  HTML::image($img, 'a picture') !!}
                    <figcaption>
                        <h5>{!! strip_tags($post->title) !!}</h5>

                        <p class="icon-links pull-right">
                            <a href="{{url('dashboard/posts/'.$post->id.'/edit')}}">
                                <i class="fa fa-edit fa-lg"></i>
                            </a>
                        </p>

                        <p class="description">Zoe never had the patience of her sisters. She deliberately punched the
                            bear in his face.</p>
                    </figcaption>
                </figure>
            @endforeach
        </div>

    @else
        There are no posts
    @endif

@endsection
