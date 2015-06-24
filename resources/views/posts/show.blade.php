@extends('dashboard')

@section('title', 'View Post')

@section('content')

<p>{{ link_to_route('posts.index', 'Return to all posts') }}</p>
<div id="hideEditor" style="display:none;"></div>
<div id="post-title" class="title-editable">{{ $post->title }}</div>

<div id="post-body" class="body-editable">{{ $post->body }}</div>

@endsection