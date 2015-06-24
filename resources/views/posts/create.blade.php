@extends('dashboard')

@section('title', 'Create Post')

@section('content')

    <div class="error alert alert-danger"></div>
    <div class="success alert alert-success"></div>

    {!! Form::open(array('route' => 'posts.store'))  !!}
    <div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
    <div class="body-editable" id="post-body"><p>Enter post body</p></div>
    {!! Form::submit('Save Post', array('class' => 'btn btn-primary', 'id' => 'form-submit')) !!}

    {!! Form::close() !!}

@endsection