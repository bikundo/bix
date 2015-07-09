@extends('dashboard')

@section('title', 'Create Post')
@endsection

@section('header-styles')
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection
@section('content')
    <div class="row">
        <div class="box box-solid">
            <div class="box-header with-border">

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {!! Form::open(['route' => 'dashboard.posts.store', 'files' => 'true', 'id'=>'create_post_form', 'onsubmit'=>'return postForm()'])  !!}
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>


                <h1>
                    <div class="form-group">
                        <input type="text" class="form-control" name="title"/>
                    </div>
                </h1>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-8" style="border-right:1px dashed silver ">
                    <textarea id="summernote" rows="" name="body"></textarea>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="exampleInputFile">Image</label>
                        <input type="file" class="form-images" name="images[]" multiple="true"
                               id="images_input">
                    </div>
                    <div class="form-group">
                        <select  name="tags[]" class="form-control" multiple="multiple">
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            {!! Form::submit('Save Post', array('class' => 'btn btn-primary btn-block btn-flat', 'id' => 'form-submit')) !!}

            {!! Form::close() !!}
        </div>
        <!-- /.box-body -->
    </div>
    </div>

@endsection

@section('footer-scripts')
    <script type="text/javascript">
        $('select').select2({
            placeholder: 'select post tags',
        });
    </script>
    <style>
        .select2 {
            color: black;
        }
    </style>
@endsection