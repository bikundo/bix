<div class="grid" style="overflow: auto; overflow-x: hidden">
    <h4 class="light center section-headers fancy"><span>Portfolio</span></h4>
    @foreach($works as $work)
        <figure class="effect-bubba">
            {!!  HTML::image($work->images, 'a picture') !!}
            <figcaption>
                <h5>{!! strip_tags($work->name) !!}</h5>

                <p>{!! str_limit(strip_tags($work->description, 50)) !!}</p>
                <a href="/auth/login">View more</a>
            </figcaption>
            <div class="white bottom-attached row">
                <span class="right small"> {{$work->created_at->diffForHumans()}}</span>
            </div>
        </figure>
    @endforeach
</div>