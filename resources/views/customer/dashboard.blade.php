@extends('customer.layouts.master')

@section('customer')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="row grouped-multiple-statistics-card">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                                <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                                            <span class="card-icon primary d-flex justify-content-center mr-3">
                                                <i class="icon p-1 icon-bar-chart customize-icon font-large-2 p-1"></i>
                                            </span>
                                    <div class="stats-amount mr-3">
                                        <h3 class="heading-text text-bold-600">{{$credit}} units</h3>
                                        <p class="sub-heading">Credit Balance</p>
                                    </div>
{{--                                    <span class="inc-dec-percentage">--}}
{{--                                                <small class="success"><i class="fa fa-long-arrow-up"></i> 5.2%</small>--}}
{{--                                            </span>--}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                                <div class="d-flex align-items-start mb-sm-1 mb-xl-0 border-right-blue-grey border-right-lighten-5">
                                            <span class="card-icon danger d-flex justify-content-center mr-3">
                                                <i class="icon p-1 icon-pie-chart customize-icon font-large-2 p-1"></i>
                                            </span>
                                    <div class="stats-amount mr-3">
                                        <h3 class="heading-text text-bold-600 text-capitalize">{{$bundle}}</h3>
                                        <p class="sub-heading">Current Bundle</p>
                                    </div>
{{--                                    <span class="inc-dec-percentage">--}}
{{--                                                <small class="danger"><i class="fa fa-long-arrow-down"></i> --}}
{{--                                                    </small>--}}
{{--                                            </span>--}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                                <div class="d-flex align-items-start border-right-blue-grey border-right-lighten-5">
                                            <span class="card-icon success d-flex justify-content-center mr-3">
                                                <i class="icon p-1 icon-graph customize-icon font-large-2 p-1"></i>
                                            </span>
                                    <div class="stats-amount mr-3">
                                        <h3 class="heading-text text-bold-600">{{$convert}}</h3>
                                        <p class="sub-heading">Conversions</p>
                                    </div>
{{--                                    <span class="inc-dec-percentage">--}}
{{--                                                <small class="success"><i class="fa fa-long-arrow-up"></i> 10.0%</small>--}}
{{--                                            </span>--}}
                                </div>
                            </div>
                            <div class="col-lg-6 col-xl-3 col-sm-6 col-12">
                                <div class="d-flex align-items-start">
                                            <span class="card-icon warning d-flex justify-content-center mr-3">
                                                <i class="icon p-1 icon-basket-loaded customize-icon font-large-2 p-1"></i>
                                            </span>
                                    <div class="stats-amount mr-3">
                                        <h3 class="heading-text text-bold-600">{{$expiry}}</h3>
                                        <p class="sub-heading">Bundle Expiry</p>
                                    </div>
{{--                                    <span class="inc-dec-percentage">--}}
{{--                                                <small class="danger"><i class="fa fa-long-arrow-down"></i> 13.6%</small>--}}
{{--                                            </span>--}}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            @if($status == false)
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
            @endif
        </div>
    </div>

{{--    @if(!$user->phone_verify)--}}
{{--        <div class="row">--}}
{{--            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 col-8 col-sm-12 offset-2">--}}
{{--                <div class="card info-time-tracking">--}}
{{--            <div class="card-content">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12 pt-2 pb-2 border-bottom-blue-grey border-bottom-lighten-5">--}}
{{--                        <div class="info-time-tracking-title d-flex justify-content-between align-items-center">--}}
{{--                            <h4 class="pl-2 mb-0 title-info-time-heading text-bold-700 text-danger ">Phone Number Verification</h4>--}}
{{--                            <span class="pr-2">--}}
{{--                                <i class="icon icon-settings"></i>--}}
{{--                            </span>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}

{{--                            <div class="row">--}}
{{--                                <div class="col-md-5 col-sm-12 border-right-blue-grey border-right-lighten-5">--}}
{{--                                    <div class="general-task-loading pr-2 pl-4 px-sm-4 px-md-2 py-md-2 d-flex justify-content-start">--}}
{{--                                        <div id="general_task_radial_bar_chart"></div>--}}
{{--                                        <div class="task-content d-flex flex-column align-items-start justify-content-center">--}}
{{--                                            <h5 class="font-weight-bold mt-2 mt-sm-0">General task loading</h5>--}}
{{--                                            <p class="leading-para">--}}
{{--                                                The system automatically detects the loading of your tasks. including sales and revenue.--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12">--}}
{{--                                    <div class="justify-content-start">--}}
{{--                                        <div id="info_tracking_total_stats"></div>--}}
{{--                                        <div class="pl-2 ml-50 stats-content flex-column align-items-start justify-content-center pr-2">--}}
{{--                                            <div id="coded" style="">--}}
{{--                                                <div class="loader" id="loader" style="display:none"></div>--}}
{{--                                                <div id="code_res"></div>--}}
{{--                                            </div><br>--}}
{{--                                            @if($gen_token)--}}
{{--                                                <h5 class="font-weight-bold">Verification</h5>--}}
{{--                                                <p class="leading-para" id="msgx">Enter verification code sent to your phone number via SMS</p>--}}
{{--                                                <form class="" id="verifyCode" action="{{route('post.phone.code.verify')}}">--}}
{{--                                                    @csrf--}}
{{--                                                    <div class="input-group mb-3">--}}
{{--                                                        <input type="number" id="phonev" class="form-control col-12" placeholder="Enter Verification Code" name="code" required>--}}
{{--                                                        <button class="btn btn-primary" type="submit" id="button-addon2">Verify</button>--}}
{{--                                                    </div>--}}
{{--                                                </form>--}}
{{--                                                <div id="congrats" class="hide">--}}
{{--                                                    <p class="">Congratulations, your phone number has been verified. You can start <a href="{{route('get.user.convert')}}">Converting Now</a> </p>--}}
{{--                                                </div>--}}
{{--                                            @else--}}
{{--                                                <h5 class="font-weight-bold">E</h5>--}}
{{--                                                <p class="leading-para" id="msgx">--}}
{{--                                                    @if($user->phone)--}}
{{--                                                        Confirm phone number and click to get verification code. (Before sending click the drop down to select Country Code)--}}
{{--                                                    @else--}}
{{--                                                        Enter phone number and click to get verification code. (Before sending click the drop down to select Country Code)--}}
{{--                                                    @endif--}}
{{--                                                    </p>--}}
{{--                                                    <form class="form" id="phoneCode" action="{{route('post.send.phone.code')}}">--}}
{{--                                                        @csrf--}}

{{--                                                        <div class="input-group mb-3">--}}

{{--                                                            <input type="tel" id="phone" required class="form-control" placeholder="" value="{{$user->phone}}" name="phone">--}}


{{--                                                        </div>--}}
{{--                                                        <button class="btn btn-primary mb-3" type="submit" id="code">Send Code</button>--}}
{{--                                                    </form>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    @endif--}}
@endsection

@section('scripts')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{asset('phone/build/js/intlTelInput-jquery.min.js')}}"></script>

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



            var phones = $("#phone").intlTelInput({
                        allowDropdown:true,
                        nationalMode: true,
                        //separateDialCode: true,
                        formatOnDisplay: true,
                        autoHideDialCode:true,
                        autoPlaceholder:"polite",
                        utilsScript:"{{asset('phone/build/js/utils.js')}}"
                    });
            window.phones = phones;

            $('#congrats').hide();
            $('#phoneCode').on('submit',function (event) {

                event.preventDefault();

                //let number = phones.getNumber();
                let number;
                let token = $('input[name ="_token"]').val();
                let numberx = $('#phone').intlTelInput("getNumber");
                let nu = $('#phone').intlTelInput("getSelectedCountryData");
                let format = new RegExp("^(\\+)?(\\d+)$");
                let result = format.test(numberx);
                if(result == true){
                    number = numberx;
                }else{
                    numberx = numberx.replace(/\s+/g, '')
                    numberx = parseInt(numberx);
                    number = "+"+nu.dialCode+numberx
                }

                //console.log(number)

                //console.log(phones.getNumber(intlTelInputUtils.numberFormat.E164));
                url = $(this).attr('action');
                //info = $(this).serialize();

                $.ajax({
                    url:url,
                    method: 'POST',
                   // dataType: 'json',
                    data: {
                        _token:token,
                        phone:number
                    },
                    beforeSend: function(){
                        $('form button[type="submit"]').prop("disabled", false);
                        $("#coded").show();
                        $("#loader").show();
                    },
                    success: function(data){
                        location.reload();
                    },
                    error: function(data) {
                       // console.log(data.responseText)
                        codes = $("#msgx").html('');
                        codes.append('' +
                            '<span class="text-capitalize text-primary font-weight-bold"><strong>'+ data.responseText +'</span> '
                        );
                    },
                    complete:function(data){

                        $('form button[type="submit"]').prop("disabled", false);
                        $("#loader").hide();
                    }
                });
            })
            $('#verifyCode').on('submit',function (event) {
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
                        $('#verifyCode').remove();
                        $('#msgx').remove();
                        $('#congrats').show();
                    },
                    error: function(data) {
                        codes = $("#msgx").html('');
                        codes.append('' +
                            '<span class="text-capitalize text-primary font-weight-bold"><strong>'+ data.message +'</span> '
                        );
                    },
                    complete:function(data){

                        $('form button[type="submit"]').prop("disabled", false);
                        $("#loader").hide();
                    }
                });
            })

            function getNum(){
                var input = document.querySelector("#phone");
                var iti = window.intlTelInput(input, {
                    separateDialCode:true,
                    utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@17.0.3/build/js/utils.js",
                });

// store the instance variable so we can access it in the console e.g. window.iti.getNumber()
                window.iti = iti;

                function getValue(){
                    var iti = intlTelInput(input);
                    var number = iti.getNumber();

                }
            }
        });


    </script>

@endsection
