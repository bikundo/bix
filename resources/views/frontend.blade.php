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
    <link href='http://fonts.googleapis.com/css?family=Raleway:500' rel='stylesheet' type='text/css'>
    <link href="{{ asset("/backend/css/hovers.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/frontend/css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    {{--style partials--}}
    @yield('header-styles')

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
    <div class="navbar-fixed">
        <nav class="cl-effect-17  light-blue center">
            <div class="center hide-on-med-and-down">
                <a href="#home" data-scroll data-hover="Home">Home</a>
                <a href="#about" data-scroll data-hover="about">About</a>
                <a href="#portfolio" data-scroll data-hover="Portfolio">Portfolio</a>
                <a href="#blog" data-scroll data-hover="Blog">blog</a>
                <a href="#contact" data-scroll data-hover="Contact">Contact</a>
            </div>
            <a href="#" data-activates="mobile-demo" class="button-collapse">
                <i class="material-icons">menu</i>
            </a>
        </nav>

    </div>
    <ul class="side-nav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
    </ul>


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
<script src="{{URL::asset('/js/smooth-scroll.min.js')}}"></script>
<script src="{{URL::asset('/js/vue.min.js')}}"></script>
<script src="{{URL::asset('/js/vue-resource.min.js')}}"></script>
<script src="{{URL::asset('frontend/js/app.js')}}"></script>
@yield('footer-content')
</body>
</html>
