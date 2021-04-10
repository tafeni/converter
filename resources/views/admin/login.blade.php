@extends('home.layouts.plain')

@section('plain')

    <div class="content-body">
        <section id="login" class="row flexbox-container">
            <div class="col-12 col-sm-12 d-flex align-items-center justify-content-center">
                <div class="col-lg-4 col-sm-12 col-md-8 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center">
                                <div class="p-1">
                                    <img width="100%" src="{{asset('logo_new.png')}}" alt="branding logo">
                                </div>
                            </div>

                        </div>
                        <div class="card-content">
                            <div class="card-body pt-0 text-center">

                            </div>
                            <div class="card-body">
                                <form class="form-horizontal form-simple" method="POST" action="{{ route('admin.login') }}" class="myform" novalidate>
                                    @if (count($errors) > 0)
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                        <div class="form-control-position">
                                            <i class="feather icon-user"></i>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        <div class="form-control-position">
                                            <i class="fa fa-key"></i>
                                        </div>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                        @enderror
                                    </fieldset>
                                    <button type="submit" class="btn btn-black btn-lg btn-block"><i class="feather icon-unlock"></i> Login</button>
                                </form>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="">
                                <p class="text-center"><a href="{{route('index.page')}}"><span class="fa fa-home"></span> Back Home</a> </p>

{{--                                @if (Route::has('password.request'))--}}
{{--                                    <p class="float-sm-left text-center m-0">--}}
{{--                                        <a href="{{ route('password.request') }}" class="card-link">Recover password</a>--}}
{{--                                    </p>--}}
{{--                                @endif--}}

{{--                                <p class="float-sm-right text-center m-0">New Account? <a href="{{route('register')}}" class="card-link">Sign Up</a></p>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
