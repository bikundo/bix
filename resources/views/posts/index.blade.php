@extends('dashboard')

@section('title', 'Posts')

@section('content')

    <h1>All Posts</h1>

    <p>{!! link_to_route('dashboard.posts.create', 'Add new post') !!} </p>

    @if ($posts->count())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Body</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            </thead>

            <tbody>
            @foreach ($posts as $post)
                <tr>
                    <td style="width: 200px;">{!! strip_tags($post->title) !!}</td>
                    <td>{!!  strip_tags(str_limit($post->body, 20)) !!}</td>
                    <td>{!! link_to_route('dashboard.posts.show', 'View', array($post->id), array('class' => 'btn btn-info')) !!}</td>
                    <td>{!! link_to_route('dashboard.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) !!}</td>
                    <td>
                        {!! Form::open(array('method' => 'DELETE', 'route' => array('dashboard.posts.destroy', $post->id))) !!}
                        {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        There are no posts
    @endif

@endsection
