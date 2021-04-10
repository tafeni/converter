<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta http-equiv="cache-control" content="no-cache">
        <meta http-equiv="expires" CONTENT="Mon, 22 Jul 2002 11:12:01 GMT">
        <link rel="shortcut icon" href="{{asset('favicon_new.png')}}" type="image/x-icon">
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome-all.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/webfonts/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/YTPlayer.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/venobox.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap" rel="stylesheet">

        <title> {{config('app.name')}}</title>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177836497-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-177836497-1');
        </script>
        <script data-ad-client="ca-pub-2055367564222558" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    </head>
    <body>

        @yield('basic')
        @include('home.partial.index.index_contact')
        @include('home.partial.footer')
        @include('home.partial.scripts')
        @yield('scripts')
    </body>
</html>
