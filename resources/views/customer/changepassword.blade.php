@extends('customer.layouts.master')

@section('customer')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Change Password
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body" style="margin-top: 50px">
        <section id="basic-form-layouts">
            <div class="row match-height">
                <div class="col-md-8 offset-2">
                    <div class="card">
                        <div class="card-content collapse show">
                            <div class="card-body">
                                <div class="card-text">
                                    <div id="check">

                                    </div>
                                </div>
                                <form id="changepass" class="form" action="{{route('post.change.password')}}" method="POST">
                                    @csrf
                                    <div id="status">

                                    </div>
                                    <div class="form-body">
                                        <h4 class="form-section">
                                            <i class="feather icon-user"></i> Change Password
                                        </h4>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code">Enter Password</label>
                                                    <input type="password" id="password" class="form-control" placeholder="Enter Password" name="password">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="code">Confirm Password</label>
                                                    <input type="password" id="password_confirmation" class="form-control" placeholder="Confirm Password" name="password_confirmation">
                                                    <div class="form-control-position">
                                                        <i class="fa fa-key"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">

                                            <div class="col-md-6 offset-5">
                                                <button type="submit" id="convertbtn" class="btn btn-blue">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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

            $('#changepass').submit(function (event) {
                event.preventDefault();
                url = $(this).attr('action');
                info = $(this).serialize();
                $.ajax({
                    url:url,
                    method: 'POST',
                    dataType: 'json',
                    data: info,
                    success: function(data){
                        codes = $("#check").html('');
                        codes.append('<div class="alert alert-success text-center" style="font-size: 18px;margin-top: 30px"><strong>'+ data.success +'</strong><div>');
                    },
                    error: function(data){
                        state = $("#check").html('');
                        err = data.responseJSON;
                        $.each(err, function(index, value)
                        {
                            console.log()
                            state.append('<div class="alert alert-danger"><strong>'+value +'</strong><div>');
                        });
                    }
                });
            })
        });


    </script>

@endsection

