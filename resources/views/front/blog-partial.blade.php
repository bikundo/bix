<div class="grid">
    @foreach($posts as $post)
        <figure class="effect-duke">
            {!!  HTML::image($post->images, 'a picture') !!}
            <figcaption>
                <h5>{!! strip_tags($post->title) !!}</h5>

                <p>{!! str_limit(strip_tags($post->body, 50)) !!}</p>
                <a href="#">View more</a>
            </figcaption>
        </figure>
    @endforeach
</div>