@extends('customer.layouts.master')

@section('customer')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Trending Codes
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body mt-3">
        @if($trending->count() > 0)
        <div class="row">
            <div class="col-md-8 offset-2">
                <div class="card">
                    <div class="card-body">

                        <form id="trendfrm" action="{{route('get.trending.history')}}" method="GET">
                            @csrf
                            <div id="status">

                            </div>

                            <div class="form">
                                <div class="col-md-12">
                                    <label>Select Odd Range</label>
                                    <select style="display: inline" class="form-control col-6" name="odds" required>
                                        <option>Select Odds</option>
                                        @foreach($data as $key => $list)
                                            <option value="{{$list}}">{{$key}}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" id="trendbtn" class="btn btn-black">Sort Data</button>
                                </div>
                            </div>





                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
{{--                        <h4 class="card-title">Trending Code</h4>--}}

                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="table-responsive" id="trends">
                                @include('customer.partials.trendtable')
                                <div class="loader" id="loader" style="display:none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(function(){

            $('#trendfrm').submit(function (event) {
                event.preventDefault();
                url = $(this).attr('action');
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'GET',
                    data: info,
                    beforeSend: function(){
                        $("#loader").show();
                    },
                    success: function(data){
                       $("body #trends").html(data);
                    },
                    complete:function(data){
                        $("#loader").hide();
                    }
                });
            })
            $(document).on('click','.pagination a',function (event) {

                event.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');
                var page=$(this).attr('href').split('page=')[1];
                $.ajax({
                    url:'?page=' + page,
                    method: 'GET',
                    beforeSend: function(){
                        $("#loader").show();
                    },
                    success: function(data){
                        $("body #trends").html(data);
                    },
                    complete:function(data){
                        $("#loader").hide();
                    }
                });
            })
        });


    </script>

@endsection
