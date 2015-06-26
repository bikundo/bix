<div class="row">
    @foreach($posts as $post)
        <div class="col m3">
            <h4 class="light">Small</h4>

            <div class="card small">
                <div class="card-image">
                    {!!  HTML::image($post->images, 'a picture') !!}
                    <span class="card-title">{!! strip_tags($post->title) !!}</span>
                </div>
                <div class="card-content">
                    {!! str_limit(strip_tags($post->body, 30)) !!}
                </div>
                <div class="card-action">
                    <a href="#">This is a link</a>
                </div>
            </div>
        </div>
    @endforeach
</div>