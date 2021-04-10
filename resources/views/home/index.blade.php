@extends('home.layouts.master')

@section('basic')
@include('home.partial.slider')


<div class="progress-area ">
    <div class="container">
        <div class="row" style="padding-bottom: 30px">
            <div id="trending" class="col-lg-6 col-md-6">
                <div class="card remove-border-radius" style="box-shadow: none">
                    <div class="card-body">
                        <h5 class="card-title text-white text-center">Trending Codes for {{isset($trend_date)?$trend_date: ' '}}</h5>
                        <div class="table-wrapper-scroll-y my-custom-scrollbar">
                            <table class="table trend" >
                                <thead style="; border-bottom: 1px solid #eeeeee">
                                <tr style="border-bottom: none">
                                    <td>Influencers</td>
                                    <td>Bookies</td>
                                    <td>Codes</td>
                                    <td>Odds</td>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($latest))
                                    @forelse($latest as $list)
                                        <tr id="trends">
                                            <td class>{{$list->influencer}}</td>
                                            <td><span class= "remove-border-radius">{{$list->booky}}</span></td>
                                            <td><span data-toggle="tooltip" title="Click to Copy" class="myoutline remove-border-radius text-center" id="{{$list->code}}">{{$list['code']}}</span></td>
                                            <td><span class=" remove-border-radius">{{$list->odd}}</span></td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @else
                                    <tr><td colspan="4" class="text-center text-white">No Records at the moment</td></tr>
                                @endif
                                </tbody>
                            </table>
                            <div class="float-right" style="padding: 5px 7px">
                                <a class="text-green" href="{{route('get.trending.history')}}"><i class="fas fa-angle-double-right"></i> view more</a> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6" >
{{--                <div class="card remove-border-radius" style="border:1px solid #0b2e13;background: #f4f4f4 !important;">--}}
{{--                    <div class="card-body" style="padding-bottom: 0px">--}}
{{--                        <h5 class="card-title text-black text-center" style="margin-bottom: 0px">This Week's Winning Codes</h5>--}}
{{--                        <div class="table-wrapper-scroll-y my-custom-scrollbar">--}}
{{--                            <table class="table trend"  >--}}
{{--                                <thead style="; border-bottom: 1px solid #eeeeee">--}}
{{--                                <tr style="border-bottom: none">--}}
{{--                                    <td><strong>Influencers</strong></td>--}}
{{--                                    <td><strong>Bookies</strong></td>--}}
{{--                                    <td><strong>Codes</strong></td>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}

{{--                                    @foreach($win as $value)--}}
{{--                                        <tr>--}}
{{--                                            <td><span class= "remove-border-radius">{{$value['influencer']}}</span></td>--}}
{{--                                            <td><span class=" remove-border-radius">{{$value['bookie']}}</span></td>--}}
{{--                                            <td><span class=" remove-border-radius">{{$value['code']}}</span></td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}

{{--                                </tbody>--}}
{{--                            </table>--}}

{{--                    </div>--}}
                        <img src="{{asset('assets/img/slider/strider.jpg')}}" class="d-block w-100" alt="...">

{{--                    </div>--}}
{{--            </div>--}}
        </div>
    </div>
</div>
<div class="clearfix"></div>
{{--<section class="download-area-bottom">--}}
{{--    <div class="container-fluid">--}}
{{--        <div class="row">--}}
{{--            <div class="col-12">--}}
{{--                <div class="section-title">--}}
{{--                    <h2 class="title text-center"> <span>Pricing</span> </h2>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--            --}}

{{--            @foreach($bundle as $list)--}}
{{--                <div class="col">--}}
{{--                    <div class="single-download-box">--}}
{{--                        <h4 style="font-size: 19px">{{$list->name}}</h4>--}}
{{--                        <p class="">Get {{$list->value}} units for {{$list->duration}} days at &#8358;{{$list->cost}}</p>--}}
{{--                        <a href="{{route('get.bundle.list')}}" class="boxed-btn btn-black">Buy now</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

@include('home.partial.index.index_about')

<!-- amazing feature start -->
<section class="amazing-feature-area" id="features">
    <div class="right-image">
        <img src="{{asset('assets/img/amazing-feature.png')}}" alt="amazing feature image">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12">

                <div class="left-content">
                    <div class="section-title bg-white text-left">
                        <h3 class="sub-title">an exhaustive list of</h3>
                        <h2 class="title"> Book <span>Makers.</span> </h2>
                        <p class="text">
                            Betconverter provides access to code conversion across multiple bookmakers.
                        </p>
                    </div>
                    <div class="feature-list-box-wrapper">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <i class="flaticon-money-2"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6>BET9JA</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <i class="flaticon-money-2"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6>1xBET</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <i class="flaticon-money-2"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6>BETKING</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="single-feature-box">
                                    <div class="icon">
                                        <div class="icon-inner">
                                            <i class="flaticon-money-2"></i>
                                        </div>
                                    </div>
                                    <div class="content">
                                        <h6>SPORTYBET</h6>
                                    </div>
                                </div>
                            </div>

{{--                            <div class="col-lg-6 col-md-6">--}}
{{--                                <div class="single-feature-box">--}}
{{--                                    <div class="icon">--}}
{{--                                        <div class="icon-inner">--}}
{{--                                            <i class="flaticon-pay"></i>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="content">--}}
{{--                                        <h6></h6>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- amazing feature end -->

@endsection
@section('scripts')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){

            $("select[name=fromname]").on('change',function (e) {
                data = $(this).children('option:selected').val();
                dat = data.split("|");
                result = $("select[name=toname] option[value=" + dat[0] + "]");
                if(result.length > 0){
                    $("select[name=toname]").each(function(){
                        $(this).children('option').show();
                    });
                    result.css('display','none');
                }else{
                    $("select[name=toname]").each(function(){
                        $(this).children('option').show();
                    });
                }
            });

            $('[data-toggle="tooltip"]').tooltip();
            $('#trends .myoutline').click(function(e){
                e.preventDefault();
                var $temp = $("<input>");
                //data = $(this).attr('id');
                $("body").append($temp);
                $temp.val($(this).attr('id')).select();
                document.execCommand("copy");
                $temp.remove();
                // data.select();
                // data.setSelectionRange(0, 99999);
                // copies = document.execCommand('copy');
                alert("selected code has been copied");
            });
            $('#contactfrm').submit(function (event) {
                event.preventDefault();
                url = $(this).attr('action');
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'POST',
                    dataType: 'json',
                    data: info,
                    beforeSend: function(){
                        $('form button[type="submit"]').prop("disabled", true);
                        $("#loader").show();
                    },
                    success: function(data){
                        $('#contactfrm')[0].reset();
                        codes = $("body #check").html('');
                        codes.append('<div class="alert alert-success text-center" style="font-size: 18px;margin-top: 30px"><strong>'+ data.success +'</strong><div>');
                    },
                    error: function(data){
                        state = $("body #check").html('');
                        err = data.responseJSON;
                        console.log(err)
                        $.each(err, function(index, value)
                        {
                            state.append('<div class="alert alert-danger"><strong>'+value +'</strong><div>');
                        });
                    },
                    complete:function(data){

                        $('form button[type="submit"]').prop("disabled", false);
                        $("#loader").hide();
                    }
                });
            });
            $('#convertsfrm').submit(function (event) {
                event.preventDefault();
                url = $(this).attr('action');
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'POST',
                    dataType: 'json',
                    data: info,
                    beforeSend: function(){
                        $('form button[type="submit"]').prop("disabled", false);
                        $("#coded").show();
                        $("#loader").show();
                    },
                    success: function(data){
                        code = data.code;

                        codes = $("#check").html('');
                        codes.append('' +
                            '<div class="text-center text-capitalize" style="font-size: 20px;margin-top: 5px"><strong>'+ data.state +'</strong>' +
                            '<div class="text-center" style="font-size: 35px;margin-top: 30px"><strong>'+ data.code +'</strong>' +
                            '<div><div class="text-center text-capitalize" style="font-size: 12px;margin-top: 10px"><strong>'+ data.message +'</strong></div>');
                    },
                    error: function(data) {
                        state = $("#check").html('');
                        err = data.responseJSON;

                        state.append('<div class="text-center text-danger text-capitalize" style="font-size: 20px;margin-top: 5px">' +
                            '<strong>'+ err.error +'</strong>');
                    },
                    complete:function(data){

                        $('form button[type="submit"]').prop("disabled", false);
                        $("#loader").hide();
                    }
                });
            })
        });


    </script>

@endsection
