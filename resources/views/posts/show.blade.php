@extends('dashboard')

@section('title', 'View Post')

@section('content')
    <div class="box box-solid">
        <div class="box-body">
            <article>
                {!! $post->body !!}
            </article>
        </div>
        <!-- /.box-body -->
    </div>

@endsection