<div class="grid" style="overflow: auto; overflow-x: hidden">
    <div class="dddddddd">
        <h4 class="light center section-headers fancy"><span>Blog</span></h4>
    </div>
    @if (isset($posts) && !empty($posts))
        @foreach($posts as $post)
        <figure class="effect-goliath">
             <img src="/uploads/blog/{{$post->id}}/thumb.jpg" alt="image"/>
            <figcaption>
                <h5>{!! strip_tags($post->title) !!}</h5>

                <p class="small-text">{!! str_limit(strip_tags($post->body, 30)) !!}</p>
                <a href="/blog/{{$post->id}}">View more</a>
            </figcaption>
        </figure>
    @endforeach
    @else
        <h5>posts cooking....</h5>
    @endif

</div>