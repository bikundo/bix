<!doctype html>

<html lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{'Bikundo.co | Blog'}}</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/images/touch/chrome-touch-icon-192x192.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">
    <link rel="apple-touch-icon-precomposed" href="apple-touch-icon-precomposed.png">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="/images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <link href='//fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en'
          rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link rel="stylesheet" href=" {{ asset('/bower_components/material-design-lite/material.min.css') }}">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="{{URL::asset('js/prettify.js')}}"></script>
    <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <link rel="stylesheet" href=" {{ asset('/css/blog.css') }}">
    <link rel="stylesheet" href=" {{ asset('/css/prettify.css') }}">


</head>
<body onload="prettyPrint()">
<div class="demo-blog demo-blog--blogpost mdl-layout mdl-js-layout has-drawer is-upgraded">

    <main class="mdl-layout__content">


        <section>
            @yield('content')
        </section>
        <footer class="mdl-mini-footer">
            <div class="mdl-mini-footer--left-section">
                <button class="mdl-mini-footer--social-btn social-btn social-btn__twitter"></button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__blogger"></button>
                <button class="mdl-mini-footer--social-btn social-btn social-btn__gplus"></button>
            </div>
            <div class="mdl-mini-footer--right-section">
                <button class="mdl-mini-footer--social-btn social-btn__share"><i class="material-icons">share</i>
                </button>
            </div>
        </footer>
    </main>
    <div class="mdl-layout__obfuscator"></div>
</div>
<script src="{{URL::asset('bower_components/material-design-lite/material.min.js')}}"></script>
<script>
    $(document).ready(function(){
  $('pre').addClass("prettyprint");
});
</script>
</body>
</html>
