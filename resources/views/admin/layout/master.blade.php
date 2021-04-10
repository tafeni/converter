<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="Stack admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, stack admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Bet Converter">
    <link rel="shortcut icon" href="{{asset('favicon_new.png')}}" type="image/x-icon">
    <title>{{config('app.name')}} | Customer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--        <link rel="apple-touch-icon" href="../../../app-assets/images/ico/apple-icon-120.png">--}}
    {{--        <link rel="shortcut icon" type="image/x-icon" href="{{asset('admin/images/ico/favicon.ico')}}">--}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/menu/menu-types/horizontal-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/customer.css')}}">
</head>
<body class="horizontal-layout horizontal-menu 2-columns  " data-open="hover" data-menu="horizontal-menu" data-col="2-columns">

@include('admin.partial.topnav')
@include('admin.partial.mainnav')

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        @yield('admin')
    </div>
</div>
<div class="sidenav-overlay"></div>
<div class="drag-target"></div>
@include('admin.partial.footer')
@include('admin.partial.scripts')

@yield('scripts')
</body>
</html>
