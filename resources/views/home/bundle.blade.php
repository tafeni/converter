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

        <!-- Pricing Title-->
        <div class="text-center">
            <h3 class="mb-2">Our <b>Plans</b></h3>
            <p class="text-muted w-50 m-auto">
                We have plans that cater to your conversion needs and budget.            </p>
        </div>

        <div class="row my-3">
            <?php $count = 0; ?>
            @foreach($bundle as $list)
            <?php ++$count; ?>
            <div class="col-md-4">
                <div class="card card-pricing @if($list->favorite) favorite @endif">
                    <div class="card-body text-center">
                        <p class="card-pricing-plan-name font-weight-bold text-uppercase">{{$list->desc}}</p>
                        <span class="card-pricing-icon text-primary">
                            <i class="fe-users"></i>
                        </span>
                        <h2 class="card-pricing-price">&#8358;{{$list->cost}} <span>/ {{$list->duration < 30 ? "Week" : "Month" }}</span></h2>
                        <ul class="card-pricing-features">
                            <li>{{$list->value}} credit(s)</li>
                            <li>Valid for {{$list->duration}} days</li>
                            <li>Roll over unused credits</li>
                        </ul>
                        <a href="{{route('login')}}" class="btn btn-green waves-effect waves-light mt-4 mb-2 width-sm">Sign Up</a>
                    </div>
                </div>
            </div>
            @if($count%3 == 0)
        </div>
            <div class="row my-3">
            @endif
            @endforeach

        </div>

    </div>
</div>


@endsection
