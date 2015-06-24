@extends('dashboard')

@section('title', 'Edit post')

@section('content')

<div class="error alert alert-danger"></div>
<div class="success alert alert-success"></div>

{!! Form::open(array('method' => 'PATCH', 'route' => array('posts.update', $post->id))) !!}
<input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
<div class="title-editable" id="post-title">{!! $post->title !!}</div>
<div class="body-editable" id="post-body">{!! $post->body !!}</div>
<input type="hidden" id="post-id" value="{!! $post->id !!}">
{!! Form::submit('Update Post', array('class' => 'btn btn-primary', 'id' => 'form-update')) !!}

{!! Form::close() !!}

@endsection