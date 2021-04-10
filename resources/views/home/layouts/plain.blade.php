<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Convert codes from one betting platform to another in a minutes. Start converting here.">
    <meta name="keywords" content="bet, bet converter, convert code, betconverter, convert games">
    <meta name="author" content="betconverter">
    <title>{{config('app.name')}} | Customer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--        <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">--}}
    <link rel="shortcut icon" href="{{asset('favicon_new.png')}}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/customer.css')}}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-177836497-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-177836497-1');
    </script>

</head>
<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">


<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        @yield('plain')
    </div>
</div>

@include('customer.partials.scripts')
@yield('scripts')
</body>
</html>

