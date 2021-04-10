@extends('home.layouts.master')

@section('basic')
    <div class="heder-slider-area header-bg">
        <div class="overlay"></div>
        @include('home.partial.social_header')

        @include('home.partial.navigation')
        <br>
    </div>
    <div class="row justify-content-center mt-5">
        <div class="col-xl-10">
            <!-- faq area start  -->
            <section class="faq-area">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-12">
                            <div class="section-title bg-white">
                                <h2 class="title">
                                    Frequently <span>asked</span> Questions
                                </h2>
{{--                                <p class="text">--}}
{{--                                    Betpivot is the most advanced sports trading &amp; affialiate platform and highest stakes across multiple bookmakers and--}}
{{--                                    exchanges.--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-10">
                            <div id="accordion">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                WHY USE BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body">
                                            To get the best sport betting experience without being restricted to a single bookmaker; Betconverter lets you convert your codes within seconds to any bookmaker of your choice.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                DO I NEED ANY SKILLS TO USE BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body">
                                            No. As long as you know how to use the keyboard on your phone or computer, then you can use Betconverter
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                DO I NEED TO PAY BEFORE I CAN USE BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body">
                                            No payment is required, just sign up and start using Betconverter, all conversions are free. </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading7">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse7" aria-expanded="false" aria-controls="collapseFour">
                                                HOW DOES BETCONVERTER.COM WORK?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse7" class="collapse" aria-labelledby="heading7" data-parent="#accordion">
                                        <div class="card-body">
                                            The system takes (from) your Home bookmaker’s code and converts it (to) your Away Bookmaker’s and this is done within Seconds. Please note that not all games types convert as some game options may not be available on your away bookmaker</div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading8">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse8" aria-expanded="false" aria-controls="collapseFour">
                                                WHO CAN BENEFIT FROM BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse8" class="collapse" aria-labelledby="heading8" data-parent="#accordion">
                                        <div class="card-body">
                                            Anyone who wants to convert codes from one one sports betting platform to another.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading9">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse9" aria-expanded="false" aria-controls="collapseFour">
                                                DO I NEED TO REGISTER BEFORE I CAN USE BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse9" class="collapse" aria-labelledby="heading9" data-parent="#accordion">
                                        <div class="card-body">
                                            Yes, you need to sign up before using Betconverter.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading10">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse10" aria-expanded="false" aria-controls="collapseFour">
                                                HOW LONG DOES IT TAKE TO GET THE RESULTS FROM BETCONVERTER.COM?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse10" class="collapse" aria-labelledby="heading10" data-parent="#accordion">
                                        <div class="card-body">
                                            Results are returned in 10 seconds or less.
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="heading11">
                                        <h5 class="mb-0">
                                            <img src="{{asset('assets/img/ask-icon.png')}}" alt="">
                                            <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse11" aria-expanded="false" aria-controls="collapseFour">
                                                WILL YOU SELL OR SHARE MY PERSONAL INFORMATION TO A THIRD PARTY?
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="collapse11" class="collapse" aria-labelledby="heading11" data-parent="#accordion">
                                        <div class="card-body">
                                            Betconverter will not share your information with third parties.
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- faq area end  -->
        </div>
    </div>
@endsection
