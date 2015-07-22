@extends('dashboard')

@section('title', 'Create Post')
@endsection

@section('header-styles')
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <link href="{{ asset("/bower_components/admin-lte/plugins/iCheck/polaris/polaris.css")}}" rel="stylesheet"
          type="text/css"/>
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

        <form role="form" action="/dashboard/portfolio" method="post" id="new-job-form"
              enctype="multipart/form-data">
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"/>

            <div class="row form-container">
                <div class="col-md-9">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Description of the project</h3>
                        </div>
                        <div class="box-body">
                            <div class="description-editable my-editable-divs" id="description">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="box box-info">
                        <div class="box-body">
                            <div class="form-group" style="background: rgb(245, 247, 249)">
                         <span class="input input--minoru">
					        <input class="input__field input__field--minoru" placeholder="Name of the project" type="text"
                           name="name"
                           id="input-38"/>
					<label class="input__label input__label--minoru" for="input-38" data-content=" Name">
                    </label>
				</span>
                            </div>
                            <div class="form-group" style="background: rgb(245, 247, 249)">
                        <span class="input input--minoru">
					<input class="input__field input__field--minoru  my-editable-divs" name="url"
                           type="text" placeholder="link or URL of the project"
                           id="input-39"/>
					<label class="input__label input__label--minoru" for="input-39" data-content="Link ">
                    </label>
				</span>
                            </div>
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
                                <select name="categories[]" class="form-control" multiple="multiple">
                                    @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <hr>
                                <div class="iradio">
                                 <label for="published"><h4>Publish it?</h4></label>
                                  <input type="checkbox" value="1" name="published" id="published">
                                </div>
                            <hr>
                            {!! Form::submit('Save', array('class' => 'btn btn-primary btn-block btn-flat', 'id' => 'form-submit')) !!}
                        </div>
                    </div>
                </div>
            </div>

        {!! Form::close() !!}
    </div>
    </div>
    <script>
        $("#new-job-form").submit(function (eventObj) {
            var desc = descriptionEditor.serialize();
            var d = desc['description']['value'];
            $(this).append('<input type="hidden" name="description" value="' + d + '" /> ');
            return true;
        });
    </script>

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
            $('input').iCheck({
                checkboxClass: 'icheckbox_polaris',
                radioClass: 'iradio_polaris'
            });
            $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log) console.log(log);
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

        .description-editable {
            color: black !important;
        }
    </style>
    <script src="{{ asset("/bower_components/admin-lte/plugins/iCheck/icheck.min.js")}}"></script>
@endsection