@extends('dashboard')

@section('title', 'Create Post')
@endsection

@section('header-styles')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
@endsection
@section('content')
    <div class="row">

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

        <div class="row form-container">
            <div class="col-md-9">
                <span class="input input--minoru">
					<input class="input__field input__field--minoru  my-editable-divs" id="title-input"
                           placeholder="title" class="form-control text-center"
                           name="title"
                           type="text"
                           id="input-39"/>
					<label class="input__label input__label--minoru" for="input-39" data-content="Link ">
                    </label>
				</span>

                <div class="box box-info">
                    <div class="box-body">
                        <textarea id="summernote" rows="" name="body"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="box box-info">
                    <div class="box-body">
                        {!! Form::submit('Save Post', array('class' => 'btn btn-primary btn-block btn-flat', 'id' => 'form-submit')) !!}
                        <hr>

                        <div class="form-group">
                            <span class="file-input btn btn-block btn-default btn-sm btn-file">
                                <i class="fa fa-image pull-left"></i> Upload Images
                                <input type="file" class="form-images" name="images[]"
                                       multiple="true"
                                       id="images_input">
                            </span>
                        </div>
                        <div class="form-group">
                            <select name="tags[]" class="form-control" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
    </div>

@endsection

@section('footer-scripts')
    <script type="text/javascript">
        $('select').select2({
            placeholder: 'select post tags',
        });
        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready(function () {
            $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) alert(log);
                }

            });
        });
    </script>
    <style>
        .select2 {
            color: black;
            max-width: 269px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #42a5f5;
            border: 1px solid #2196f3;
            color: white;
        }

        .select2-selection__choice__remove {
            display: none !important;
        }

        .note-toolbar {
            background: rgb(239, 239, 239) !important;
        }

        .form-container {
            padding: 2%;
        }

        #title-input {
            font-size: 1.4em;
        }

        .btn-file {
            position: relative;
            overflow: hidden;
        }

        .btn-file input[type=file] {
            position: absolute;
            top: 0;
            right: 0;
            min-width: 100%;
            min-height: 100%;
            font-size: 100px;
            text-align: right;
            filter: alpha(opacity=0);
            opacity: 0;
            background: red;
            cursor: inherit;
            display: block;
        }

        input[readonly] {
            background-color: white !important;
            cursor: text !important;
        }

        legend {
            display: block;
            width: 100%;
            padding: 0;
            margin-bottom: 20px;
            font-size: 14px;
            line-height: inherit;
            color: #333;
            text-align: center;
            border: 0;
            border-top: 1px solid #e5e5e5;
            border-bottom: 1px solid #e5e5e5;
        }
    </style>
@endsection