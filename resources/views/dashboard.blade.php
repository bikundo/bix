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
    <link href="{{ asset("/css/main.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/css/ns-default.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset("/css/ns-style-growl.css")}}" rel="stylesheet" type="text/css"/>
    @yield('header-styles')
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="skin-purple sidebar-mini">
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
<script src="{{ asset ("/js/main.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/js/overlays.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/js/notificationFx.js") }}" type="text/javascript"></script>


<script>
    buttonLabels: 'fontawesome'
    // initializing editors
    var titleEditor = new MediumEditor('.title-editable');
    var descriptionEditor = new MediumEditor('.description-editable ');
    var bodyEditor = new MediumEditor('.body-editable');
    $('#summernote').summernote({
        height: "300px"
    });
    $(function () {
        // initializing insert image on body editor
        $('.body-editable').MediumEditor({
            editor: bodyEditor,
            images: true,
            imagesUploadScript: "{{ URL::to('upload') }}"
        });
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
    $('body').on('click', '#form-submit', function (e) {
        e.preventDefault();
        var postTitle = titleEditor.serialize();
        var contentbody = $('#summernote').code();
        var token = $('#token').val();
        console.log(contentbody);

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: "{{ URL::action('PostsController@store') }}",
            data: {title: postTitle['post-title']['value'], body: contentbody, _token: token},
            success: function (data) {
                if (data.success === false) {
                    $('.error').append(data.message);
                    var notification = new NotificationFx({
                        message: '<p>' + data.message + '</p>',
                        layout: 'growl',
                        effect: 'jelly',
                        type: 'success', // notice, warning, error or success
                    });
                    // show the notification
                    notification.show();
                } else {
                    $('.success').append(data.message);
                    var notification = new NotificationFx({
                        message: '<p>' + data.message + '</p>',
                        layout: 'growl',
                        effect: 'jelly',
                        type: 'success', // notice, warning, error or success
                    });
                    // show the notification
                    notification.show();
                }
            },
            error: function (xhr, textStatus, thrownError) {
                alert('Something went wrong. Please Try again later...');
            }
        });
        return false;
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
                    var notification = new NotificationFx({
                        message: '<p>' + data.message + '</p>',
                        layout: 'growl',
                        effect: 'jelly',
                        type: 'success', // notice, warning, error or success
                    });

                    // show the notification
                    notification.show();
                }
            },
            error: function (xhr, textStatus, thrownError) {
                alert('Something went wrong. Please Try again later...');
            }
        });
        return false;
    });
</script>
</body>
</html>