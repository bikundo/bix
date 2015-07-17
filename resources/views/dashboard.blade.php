<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ "Backend" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet"
          type="text/css"/>
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"
          type="text/css"/>
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css"/>
    <!-- Theme style -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet"/>
    <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/_all-skins.min.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("/bower_components/medium-editor/dist/css/medium-editor.min.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("/bower_components/medium-editor/dist/css/themes/bootstrap.min.css")}}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset("/bower_components/summernote/dist/summernote.css")}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset("/bower_components/summernote/dist/summernote-bs3.css")}}" rel="stylesheet"
          type="text/css"/>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    {{--notifications--}}
    {{--<script src="{{ asset ("/backend/js/pnotify.custom.min.js") }}" type="text/javascript"></script>--}}
    {{--vue--}}
    <script src="{{ asset ("/backend/js/vue.min.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("/backend/js/vue-resource.min.js") }}" type="text/javascript"></script>
    {{--end Vue--}}
    {{--<link href="{{ asset("/backend/css/pnotify.custom.min.css")}}" rel="stylesheet" type="text/css"/>--}}
    <link href="{{ asset("/backend/css/jquery.growl.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/css/main.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/css/ns-default.css")}}" rel="stylesheet" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans+Narrow' rel='stylesheet' type='text/css'>
    @yield('header-styles')
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-purple sidebar-mini sidebar-collapse">
<div class="wrapper">

    <!-- Header -->
    @include('header')

            <!-- Sidebar -->
    @include('sidebar')

            <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $page_title or "Page Title" }}
                <small>{{ $page_description or null }}</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Your Page Content Here -->
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->

    <input type="hidden" name="_token" id="CSRFtoken" value="{{ csrf_token() }}"/>
    @include('footer')
    @include('right')

</div>
{{--create overlay--}}
@include('gigs.create')
        <!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/summernote/dist/summernote.min.js") }}"></script>
<!-- AdminLTE App -->

<script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/bower_components/medium-editor/dist/js/medium-editor.js") }}"
        type="text/javascript"></script>
<script src="{{ asset ("/backend/js/jquery.growl.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/js/main.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/js/overlays.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/js/notificationFx.js") }}" type="text/javascript"></script>


<script>
    // initializing editors
    var titleEditor = new MediumEditor('.title-editable', {
        buttonLabels: 'fontawesome',
        toolbar: {
            buttons: ['bold', 'orderedlist', 'unorderedlist', 'underline', 'anchor', 'quote', 'removeFormat', 'h4', 'h5', 'pre', 'strikethrough']
        },
        placeholder: {
            text: 'Type your text here mate'
        },
        anchor: {
            /* These are the default options for anchor form,
             if nothing is passed this is what it used */
            customClassOption: null,
            customClassOptionText: 'Button',
            linkValidation: false,
            placeholderText: 'Paste or type a link',
            targetCheckbox: false,
            targetCheckboxText: 'Open in new window'
        }
    });
    var bodyEditor = new MediumEditor('.body-editable',{
        buttonLabels: 'fontawesome',
        toolbar: {
            buttons: ['bold', 'orderedlist', 'unorderedlist', 'underline', 'anchor', 'quote', 'removeFormat', 'h4', 'h5', 'pre', 'strikethrough']
        },
        placeholder: {
            text: 'Type your text here mate'
        },
        anchor: {
            /* These are the default options for anchor form,
             if nothing is passed this is what it used */
            customClassOption: null,
            customClassOptionText: 'Button',
            linkValidation: false,
            placeholderText: 'Paste or type a link',
            targetCheckbox: false,
            targetCheckboxText: 'Open in new window'
        }
    });
    var descriptionEditor = new MediumEditor('.description-editable', {
        buttonLabels: 'fontawesome',
        toolbar: {
            buttons: ['bold', 'orderedlist', 'unorderedlist', 'underline', 'anchor', 'quote', 'removeFormat', 'h4', 'h5', 'pre', 'strikethrough']
        },
        placeholder: {
            text: 'Type your text here mate'
        },
        anchor: {
            /* These are the default options for anchor form,
             if nothing is passed this is what it used */
            customClassOption: null,
            customClassOptionText: 'Button',
            linkValidation: false,
            placeholderText: 'Paste or type a link',
            targetCheckbox: false,
            targetCheckboxText: 'Open in new window'
        }
    });
    $('#summernote').summernote({
        height: "300px",
    });
    $(function () {
        {{--// initializing insert image on body editor--}}
        {{--$('.body-editable').MediumEditor({--}}
        {{--editor: bodyEditor,--}}
        {{--images: true,--}}
        {{--imagesUploadScript: "{{ URL::to('upload') }}"--}}
        {{--});--}}
        // deactivate editors on show view
        if ($('#hideEditor').length) {
            $('.body-editable').MediumEditor('disable');
            bodyEditor.deactivate();
            titleEditor.deactivate();
        }
    });
    // hiding messages
    $('.error').hide().empty();
    $('.success').hide().empty();

    // create post
    $('#create_post_form').submit(function (e) {
        var contentbody = $('#summernote').code();
        $("#summernote").val($('#summernote').code());
//        alert( $("#summernote").val())
        $(this).append('<input type="hidden" name="post-body" value="' + contentbody + '" /> ');
        return true;
    });
    // update post
    $('body').on('click', '#form-update', function (e) {
        e.preventDefault();
        var postTitle = titleEditor.serialize();
        var postContent = bodyEditor.serialize();
        var token = $('#token').val();
        $.ajax({
            type: 'PUT',
            dataType: 'json',
            url: "{{ URL::action('PostsController@update', array(Request::segment(3))) }}",
            data: {title: postTitle['post-title']['value'], body: postContent['post-body']['value'], _token: token},
            success: function (data) {
                if (data.success === false) {
                    $('.error').append(data.message);
                    $('.error').show();
                } else {
                    $('.success').append(data.message);
//                    $('.success').show();
                    $.growl.notice({ title: "Successful!!", message: data.message});

                }
            },
            error: function (xhr, textStatus, thrownError) {
                $.growl.notice({ title: "Successful!!", message: 'Something went wrong. Please Try again later...'});
            }
        });
        return false;
    });
</script>
@yield('footer-scripts')
</body>
</html>