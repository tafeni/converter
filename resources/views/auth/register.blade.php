@extends('home.layouts.plain')

@section('plain')

    <div class="content-body">
        <section id="register" class="row flexbox-container">
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0" style="margin: 100px 0 0 !important;">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <img width="100%" src="{{asset('logo_new.png')}}" alt="branding logo"></div>

                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                                    <span>Create Account</span></h6>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-0 text-center">
                                    <a href="{{ url('social/facebook') }}" class="btn btn-social mb-1 mr-1 btn-outline-facebook">
                                        <span class="fa fa-facebook"></span>
                                        {{--                                    <span class="px-1">facebook</span>--}}
                                    </a>
                                    <a href="{{url('social/google')}}" class="btn btn-social mb-1 mr-1 btn-outline-google">
                                        <span class="fa fa-google font-medium-4"></span>
{{--                                  {{--                                    <span class="px-1">google</span>--}}
                                    </a>
                                    <a href="{{ url('social/twitter') }}" class="btn btn-social mb-1 mr-1 btn-outline-twitter">
                                        <span class="fa fa-twitter font-medium-4"></span>
{{--                                                                            <span class="px-1">twitter</span>--}}
                                    </a>
                                </div>
{{--                                <p class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2"><span>OR Using--}}
{{--                                            Account Details</span>--}}
{{--                                </p>--}}
{{--                                <div class="card-body">--}}
{{--                                    <form class="form-horizontal form-simple" method="POST" id="myform" action="{{ route('register') }}" novalidate>--}}
{{--                                        @if (count($errors) > 0)--}}
{{--                                            <div class="alert alert-danger">--}}
{{--                                                <ul>--}}
{{--                                                    @foreach ($errors->all() as $error)--}}
{{--                                                        <li>{{ $error }}</li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                        @csrf--}}
{{--                                        <fieldset class="form-group position-relative has-icon-left mb-1">--}}
{{--                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required placeholder="Enter Full Name " autocomplete="name" autofocus>--}}
{{--                                            @error('name')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                            <div class="form-control-position">--}}
{{--                                                <i class="feather icon-user"></i>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                        <fieldset class="form-group position-relative has-icon-left mb-1">--}}
{{--                                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required placeholder="Enter Phone No." autofocus>--}}
{{--                                            @error('phone')--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $message }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @enderror--}}
{{--                                            <div class="form-control-position">--}}
{{--                                                <i class="feather icon-phone"></i>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}
{{--                                        <fieldset class="form-group position-relative has-icon-left mb-1">--}}
{{--                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required placeholder="Enter Email" autofocus>--}}
{{--                                            @error('email')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                            <div class="form-control-position">--}}
{{--                                                <i class="feather icon-mail"></i>--}}
{{--                                            </div>--}}
{{--                                        </fieldset>--}}

{{--                                        @error('gender')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                                <strong>{{ $message }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @enderror--}}
{{--                                            <div class="form-control-position">--}}
{{--                                                <i class="feather icon-user"></i>--}}
{{--                                            </div>--}}

{{--                                        <fieldset class="form-group position-relative has-icon-left">--}}
{{--                                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">--}}
{{--                                            <div class="form-control-position">--}}
{{--                                                <i class="fa fa-key"></i>--}}
{{--                                            </div>--}}
{{--                                            @error('password')--}}
{{--                                            <span class="invalid-feedback" role="alert">--}}
{{--                                    <strong>{{ $message }}</strong>--}}
{{--                                </span>--}}
{{--                                            @enderror--}}
{{--                                        </fieldset>--}}
{{--                                            <div class="form-group">--}}
{{--                                                <input type="checkbox" name="terms" id="agree-term" class="agree-term" required />--}}
{{--                                                <label for="agree-term" class="label-agree-term" style="display: inline"><span><span></span></span>I agree to all the statements in <a href="{{route('terms.page')}}" class="term-service">Terms of service</a></label>--}}
{{--                                            </div>--}}
{{--                                        <button type="submit" class="btn btn-black btn-lg btn-block"><i class="feather icon-lock"></i> Register</button>--}}
{{--                                    </form>--}}
{{--                                </div>--}}
                                <p class="text-center"><a href="{{route('index.page')}}"><span class="fa fa-home"></span> Back Home</a> </p>

                                <p class="text-center">Already have an account ? <a href="{{route('login')}}" class="card-link">Login</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
