<div class="grid" style="overflow: auto; overflow-x: hidden">
    <h4 class="light center section-headers fancy"><span>Portfolio</span></h4>
    @if ( isset($works) && !empty($works))
        @foreach($works as $work)
        <figure class="effect-bubba">
            <img src="/uploads/portfolio/{{$work->id}}/thumb.jpg" alt="image"/>
            <figcaption>
                <h5>{!! strip_tags($work->name) !!}</h5>

                <p>{!! str_limit(strip_tags($work->description, 50)) !!}</p>
                <a href="/portfolio/{{$work->id}}">View more</a>
            </figcaption>
            <div class="white bottom-attached row">
                <span class="right small"> {{$work->created_at->diffForHumans()}}</span>
            </div>
        </figure>
    @endforeach
    @else
        <h5>nothing to see here...</h5>
    @endif
</div>