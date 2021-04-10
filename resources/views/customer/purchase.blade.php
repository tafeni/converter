<div class="card">
    <div class="card-header">
        <h4 class="card-title"><i class="feather icon-credit-card"></i> Purchase Detail</h4>
    </div>
    <div class="card-body">
        <form action="{{route('pay')}}" method="POST">
            @csrf
            <input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
            <input type="hidden" name="first_name" value="{{$fname}}"> {{-- required --}}
            <input type="hidden" name="last_name" value="{{$lname}}"> {{-- required --}}
            <input type="hidden" name="orderID" value="{{$bundle->id}}">
            <input type="hidden" name="quantity" value="1">
            <input type="hidden" name="amount" value="{{$bundle->cost * 100}}">
            <input type="hidden" name="currency" value="NGN">
            <input type="hidden" name="metadata" value="{{ json_encode($array = ['customerid' => $user->id,'first_name'=>$fname,'last_name'=>$lname, 'bundle_id'=>$bundle->id]) }}" >
            {{-- required in kobo --}}
            {{-- For other necessary things you want to add to your payload. it is optional though --}}
            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
            <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Cost</th>
                                <th>Credits</th>
                                <th>Duration (Days)</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="text-uppercase"> {{$bundle->name}}</td>
                                <td> &#8358;{{number_format($bundle->cost)}}</td>
                                <td> {{$bundle->value}}</td>
                                <td> {{$bundle->duration}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="payment_method">

                        <div class="order_button">
                            <button type="submit" style="border: none" class="btn-block btn-green">Proceed to payment</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

</div>



