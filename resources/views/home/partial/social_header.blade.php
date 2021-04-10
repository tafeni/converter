<div class="support-bar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-4">
                <div class="support-bar-left">
{{--                    <label class="languages" for="language">--}}
{{--                        <select name="language" id="language">--}}
{{--                            <option value="0">EN</option>--}}
{{--                            <option value="1">BN</option>--}}
{{--                            <option value="2">HN</option>--}}
{{--                        </select>--}}
{{--                    </label>--}}
                    <div class="follow-us">
                        <span class="title">	Follow Us :</span>
                        <ul class="social-links">
                            <li>
                                <a href="https://twitter.com/myBetConverter?s=08" target="_blank">
                                    <i class="fab fa-twitter"></i>
                                </a>
{{--                                <a href="https://www.facebook.com/BetConverter/" target="_blank">--}}
{{--                                    <i class="fab fa-facebook-f"></i>--}}
{{--                                </a>--}}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-8">
                <div class="support-bar-right">
                    <ul>
                        @auth
                            <li>
                                <a href="{{route('home')}}">
                                    <i class="fas fa-home"></i>
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a  href="{{route('logout')}}" onclick="event.preventDefault();
                                            document.getElementById('logoff-form').submit();" class="nav-link">
                                    <i class="fas fa-sign-out"></i> Logout

                                    <form id="logoff-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </li>
                        @else
                        <li>
                            <a href="{{route('login')}}">
                                <i class="fas fa-sign-in-alt"></i>
                                Login
                            </a>
                        </li>
                        <li>
                            <a href="{{route('register')}}">
                                <i class="far fa-user"></i> Register
                            </a>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
