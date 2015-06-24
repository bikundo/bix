@extends('dashboard')

@section('title', 'Create Post')

@section('content')
    <div class="row">
        <div class="box box-solid">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="error alert alert-danger"></div>
                <div class="success alert alert-success"></div>

                {!! Form::open(array('route' => 'dashboard.posts.store'))  !!}
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <div class="title-editable my-editable-divs text-center" id="post-title"><h1>Enter post title</h1></div>
                <hr/>
                <div class="body-editable my-editable-divs" id="post-body"><p>Enter post body</p></div>
                {!! Form::submit('Save Post', array('class' => 'btn btn-primary btn-block btn-flat', 'id' => 'form-submit')) !!}

                {!! Form::close() !!}
            </div>
            <!-- /.box-body -->
        </div>
    </div>

@endsection