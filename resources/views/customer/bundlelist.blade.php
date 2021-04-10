@extends('customer.layouts.master')

@section('customer')
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Buy Units</li>
                    </ol>
                </div>
            </div>
            </div>
        </div>
        <div class="content-body mt-3">
            <section id="basic-form-layouts">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header card-head-inverse bg-white text-black-50">
                                <h4 class="card-title font-weight-bold">
                                    <i class="feather icon-user"></i> Select plan</h4>
                            </div>
                            <div class="card-body">

                                @foreach($bundle as $list)
                                    <ul id="bund">
                                        <li>
                                            <a class="text-uppercase text-black" data-id="{{$list->id}}" href="{{route('get.bundle.list')}}">
                                                <strong>{{$list->name}}</strong><br>
                                                <span>Cost: &#8358;{{$list->cost}} | Unit: {{$list->value}} | Duration: {{$list->duration}} days</span>
                                            </a>
                                        </li>
                                    </ul>
                                 @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" id="bundles">

                    </div>
                </div>
            </section>
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

            $('#bund a').click(function (event) {
                event.preventDefault();
                url = $(this).attr('href');
                id = $(this).attr('data-id')
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        id:id
                    },
                    success: function(data){
                        // alert('hello');
                        // codes = $("#bundles");
                        // codes.html(data);
                    },
                    error: function(data){
                        console.log(data.responseText)
                        codes = $("body #bundles").html('');
                       // alert(codes)
                        codes.html(data.responseText);
                    }
                });
            })
        });


    </script>

@endsection
