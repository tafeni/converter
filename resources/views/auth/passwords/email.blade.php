@extends('home.layouts.plain')

@section('plain')
<div class="container" style="margin-top: 70px">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
{{--                    <div class="card-title text-center">--}}
{{--                        <div class="p-1">--}}
{{--                            <img width="100%" src="{{asset('logo_new.png')}}" alt="branding logo"></div>--}}
{{--                    </div>--}}
                    <h4 class="text-center">{{ __('Reset Password') }}</h4>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div id="info">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-black">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                        <p class="text-center" style="margin-top: 20px"><a href="{{route('index.page')}}"><span class="fa fa-home"></span> Back Home</a> </p>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
