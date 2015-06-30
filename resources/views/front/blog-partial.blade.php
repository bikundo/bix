<div class="grid" style="overflow: auto; overflow-x: hidden">
    <div class="dddddddd">
        <h4 class="light center section-headers fancy"><span>Blog</span></h4>
    </div>
    @foreach($posts as $post)
        <figure class="effect-goliath">
            {!!  HTML::image($post->images, 'a picture') !!}
            <figcaption>
                <h5>{!! strip_tags($post->title) !!}</h5>

                <p class="small-text">{!! str_limit(strip_tags($post->body, 30)) !!}</p>
                <a href="/auth/login">View more</a>
            </figcaption>
        </figure>
    @endforeach
</div>