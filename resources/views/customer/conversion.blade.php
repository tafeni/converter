@extends('customer.layouts.master')

@section('customer')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Convert Code
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body" style="margin-top: 50px">
        <section id="basic-form-layouts">
            <div class="row">
                @if($data == null || $data->status == false)
                    <div class="col-md-6 offset-3">
                        <div class="card" style="height: auto !important;">
                            <div class="card-content">
                                <div class="card-body">
                                    <h5 class="form-section text-center">
                                        <i class="feather icon-user"></i> Insufficient Unit
                                    </h5>
                                    <article class="text-danger font-weight-bold text-center">
                                        Please you do not have sufficient unit for code conversion
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="check">

                                    </div>
                                </div>
                                <form id="convertfrm" class="form" action="{{route('post.user.convert')}}" method="POST">
                                    @csrf
                                    <div id="status">

                                    </div>
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <i class="feather icon-user"></i> Enter  Info
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="code">Enter Code</label>
                                                    <input type="text" id="code" class="form-control" value="{{old('code')}}" placeholder="Enter Code" required name="code">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="fromname">Convert From</label>
                                                    <select name="fromname" class="form-control" required>
                                                        <option>Select....</option>
                                                        @foreach($fromname as $list)
                                                            <option value="{{$list->slug}}|{{$list->name}}">{{$list->name}}</option>
                                                        @endforeach
                                                    </select>                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="toname">Convert To</label>
                                                    <select name="toname" id="toname" class="form-control" required>
                                                        <option>Select....</option>
                                                        @foreach($toname as $list)
                                                            <option value="{{$list->slug}}">{{$list->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 offset-5">
                                                <button type="submit" id="convertbtn" class="btn btn-blue">Convert code</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                    <div class="card" style="height: auto !important;">
                        <div class="card-content">
                            <div class="card-body">
{{--                            <h4 class="form-section text-center">--}}
{{--                                <i class="feather icon-user"></i> Converted Code--}}
{{--                            </h4>--}}
                            <div id="coded" style="">
                                <div class="loader" id="loader" style="display:none"></div>
                                <div id="code_res"></div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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

        $(document).ajaxSend(function() {
            $('form button[type="button"]').prop("disabled", false);
        });

        $( document ).ajaxComplete(function() {
            $('form button[type="button"]').prop("enabled", false);
            $( "#loader" ).hide();
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

            $('#convertbtn').click(function () {
                $('#convertfrm').submit();
            });

            $('#convertfrm').on('submit',function (event) {
                var toname = $('#toname').val();
                if(toname == 'bnaija'){
                    $('#code_res').html('');
                    $( "#loader" ).show();
                    $("#code_res").append('<div class="text-center text-danger" style="font-size: 17px;margin-top: 10px">Conversion to Bet9ja may take a minute</div>');

                }else{
                    $('#code_res').html('');
                    $( "#loader" ).show();
                }
                event.preventDefault();
                url = $(this).attr('action');
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'POST',
                    dataType: 'json',
                    data: info,
                    success: function(data){
                        code = data.code;
                        codes = $("#code_res").html('');
                        codes.append('' +
                            '<div class="text-center " style="font-size: 20px;margin-top: 5px">' +
                            '<span class="text-capitalize"><strong>'+ data.state +'</strong></span> ' +
                            '<span style="font-size:15px">'+ data.describe +' </span>' +
                            '<div class="text-center" style="font-size: 35px;margin-top: 30px"><strong>'+ data.code +'</strong>' +
                            '<div><div class="text-center text-capitalize" style="font-size: 12px;margin-top: 10px"><strong>'+ data.message +'</strong></div>'
                        );
                    },
                    error: function(data) {
                        state = $("#code_res").html('');
                        err = data.responseJSON;

                        state.append('<div class="text-center text-danger text-capitalize" style="font-size: 20px;margin-top: 5px">' +
                            '<strong>'+ err.error +'</strong>');
                    },
                });
            })
        });


    </script>

@endsection
