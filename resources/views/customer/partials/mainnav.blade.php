<div class="header-navbar navbar-expand-sm navbar navbar-horizontal navbar-fixed navbar-light navbar-without-dd-arrow navbar-shadow menu-border" role="navigation" data-menu="menu-wrapper">
    <!-- Horizontal menu content-->
    <div class="navbar-container main-menu-content" data-menu="menu-container">
        <!-- include ../../../includes/mixins-->
        <ul class="nav navbar-nav" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="nav-link" href="{{route('index.page')}}">
                    <i class="feather icon-archive"></i><span>Home Page</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="fa fa-home"></i><span>Dashboard</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="nav-link " href="{{route('get.user.convert')}}">
                    <i class="feather icon-cpu bold"></i><span>Convert Code</span></a>
            </li>
{{--            <li class=" nav-item">--}}
{{--                <a class="nav-link" href="{{route('get.bundle.list')}}">--}}
{{--                    <i class="feather icon-credit-card"></i><span>Buy Units</span></a>--}}
{{--            </li>--}}
            <li class=" nav-item">
                <a class="nav-link" href="{{route('get.trending.history')}}">
                    <i class="feather icon-trending-up"></i><span>Trending Codes</span></a>
            </li>
{{--            <li class=" nav-item">--}}
{{--                <a class="nav-link" href="{{route('get.payment.history')}}">--}}
{{--                    <i class="fa fa-history"></i><span>Payment History</span></a>--}}
{{--            </li>--}}
            <li class=" nav-item">
                <a class="nav-link" href="{{route('get.conversion.history')}}">
                    <i class="fa fa-history"></i><span>Conversion History</span></a>
            </li>
{{--            <li class="dropdown nav-item" data-menu="dropdown">--}}
{{--                <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">--}}
{{--                    <i class="feather icon-box"></i>--}}
{{--                    <span data-i18n="Apps">Payments</span>--}}
{{--                </a>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li data-menu="">--}}
{{--                        <a class="dropdown-item" href="{{route('get.bundle.list')}}" data-i18n="Email Application" data-toggle="dropdown">--}}
{{--                            Buy Units--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li data-menu="">--}}
{{--                        <a class="dropdown-item" href="{{route('get.payment.history')}}" data-toggle="dropdown">--}}
{{--                            Payment History--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                    <li data-menu="">--}}
{{--                        <a class="dropdown-item" href="{{route('get.conversion.history')}}" data-toggle="dropdown">--}}
{{--                            Conversion History--}}
{{--                        </a>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </li>--}}
        </ul>
    </div>
    <!-- /horizontal menu content-->
</div>
