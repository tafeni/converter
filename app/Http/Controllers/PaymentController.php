<?php

namespace App\Http\Controllers;

use App\Events\UserPayment;
use App\Models\Bundle;
use App\Models\Conversion;
use App\Models\Payment;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Unicodeveloper\Paystack\Facades\Paystack;

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);

    }

    public function redirectToGateway()
    {
        return Paystack::getAuthorizationUrl()->redirectNow();
    }

    public function handleGatewayCallback()
    {
        $paymentDetails = Paystack::getPaymentData();
        $status = $paymentDetails['data']['status'];
        $user = $this->getUser();
        $bundle_id = $paymentDetails['data']['metadata']['bundle_id'];
        $bundle = Bundle::find($bundle_id);
        $wallet = Wallet::where('user_id',$user->id)->first();
        if($status==='success'){
            if($wallet){
                $created = Carbon::create($wallet->expiry_date);

                $wallet->bundle_id = $bundle->id;
                $wallet->user_id = $user->id;
                $wallet->balance = $wallet->balance + $bundle->value;
                $wallet->expiry_date = $created->addDay($bundle->duration);
                $wallet->save();

                //Payment History
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->wallet_id = $wallet->id;
                $payment->bundle_id = $bundle->id;
                $payment->trans_ref = $paymentDetails['data']['reference'];
                $payment->amount = $paymentDetails['data']['amount']/100;
                $payment->save();


                event(new UserPayment($user,$payment,$bundle));
                return view('customer.payment',compact('status'));
            }
            else{
                $created = Carbon::now();
                //Update User Wallet
                $wallet = new Wallet();
                $wallet->bundle_id = $bundle->id;
                $wallet->user_id = $user->id;
                $wallet->balance = $wallet->balance + $bundle->value;
                $wallet->expiry_date = $created->addDay($bundle->duration);
                $wallet->save();

                //Payment History
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->wallet_id = $wallet->id;
                $payment->bundle_id = $bundle->id;
                $payment->trans_ref = $paymentDetails['data']['reference'];
                $payment->amount = $paymentDetails['data']['amount']/100;
                $payment->save();

                event(new UserPayment($user,$payment,$bundle));

                return view('customer.payment',compact('status'));
            }
        }
        else{
            $payment = new Payment();
            $payment->user_id = $user->id;
            $payment->wallet_id = 0;
            $payment->status = false;
            $payment->bundle_id = $bundle->id;
            $payment->trans_ref = $paymentDetails['data']['reference'];
            $payment->amount = 0;
            $payment->save();

            event(new UserPayment($user,$payment,$bundle));
            return view('customer.payment',compact('status'));
        }


    }

    public function paymentHistory(){
        $user  = $this->getUser();
        $pay = Payment::where('user_id',$user->id)->with('bundle')->paginate(10);
        return view('customer.payhistory', compact('pay'));
    }

    public function convHistory(){

        $user  = $this->getUser();
        $convs = Conversion::where('user_id',$user->id)->paginate(10);
        return view('customer.convhistory', compact('convs'));
    }

    private function getUser(){
        return Auth::user();
    }


    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
