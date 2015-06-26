<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kamusi</title>
    <!-- CSS -->
    <link href="{{ asset('/frontend/css/materialize.min.css') }}" rel="stylesheet">
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
    <nav>
        <div class="nav-wrapper blue darken-3">
            <a href="/" class="brand-logo">Kamusi</a>
            <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#" class="waves-effect waves-light"><i class="mdi-action-search"></i></a></li>
                <li><a href="/auth/register" class="waves-effect waves-light">Register</a></li>
                <li><a href="/auth/login" class="waves-effect waves-light">Login</a></li>
            </ul>
            <ul class="side-nav" id="mobile-demo">
                <li><a href="#" class="waves-effect waves-light"><i class="mdi-action-search"></i></a></li>
                <li><a href="#" class="waves-effect waves-light">Register</a></li>
                <li><a href="#" class="waves-effect waves-light">Login</a></li>
            </ul>
        </div>
    </nav>


    @yield('content')
</main>
<footer class="page-footer blue darken-3">
    <div class="footer-copyright">
        <div class="container">
            <i class="mdi-image-filter-drama"></i> 2015
            <a class="grey-text text-lighten-4 right" href="#!">LINK</a>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="{{URL::asset('frontend/js/materialize.min.js')}}"></script>
<script src="{{URL::asset('/js/vue.min.js')}}"></script>
<script src="{{URL::asset('frontend/js/app.js')}}"></script>
</body>
</html>
