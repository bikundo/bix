<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>LOL</title>
    <!-- CSS -->
    <link href="{{ asset('/frontend/css/materialize.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="{{ asset("/backend/css/hovers.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/frontend/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
</head>
<body>
<main>
    <nav class="light-blue lighten-1" role="navigation">
        <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#">Navbar Link</a></li>
            </ul>

            <ul id="nav-mobile" class="side-nav">
                <li><a href="#">Navbar Link</a></li>
            </ul>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
        </div>
    </nav>


    @yield('content')
</main>
{{--<footer class="page-footer blue darken-3">--}}
    {{--<div class="footer-copyright">--}}
        {{--<div class="container">--}}
            {{--<i class="mdi-image-filter-drama"></i> 2015--}}
            {{--<a class="grey-text text-lighten-4 right" href="#!">LINK</a>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</footer>--}}

<!-- Scripts -->
<script src="{{URL::asset('frontend/js/materialize.min.js')}}"></script>
<script src="{{URL::asset('/js/vue.min.js')}}"></script>
<script src="{{URL::asset('frontend/js/app.js')}}"></script>
</body>
</html>
