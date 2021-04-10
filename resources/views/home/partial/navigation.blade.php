<div class="navigation" style="min-height: 0 !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 p-0">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu"
                            aria-controls="mainmenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand text-uppercase text-white" href="{{route('index.page')}}">
                       <img src="{{asset('logo_main.png')}}" name="betconverter" alt="betconverter">
                        {{-- {{config('app.name')}} --}}
                    </a>

                    <div class="collapse navbar-collapse" id="mainmenu">
                        <ul class="navbar-nav ml-auto">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#about">About</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{route('bundle.page')}}">Pricing</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('faq.page')}}">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contact">contact</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
