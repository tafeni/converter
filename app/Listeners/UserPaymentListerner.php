<?php

namespace App\Listeners;

use App\Events\UserPayment;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class UserPaymentListerner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    public function handle(UserPayment $event)
    {
        $payment = $event->payment;
        $user = $event->user;
        $bname = $event->bundle->name;
        Mail::send('email.payment', ['user' => $user->name,'payment'=>$payment,'bundle'=>$bname], function ($message) use ($user, $payment) {
            //$message->from('hi@yourdomain.com', 'John Doe');
            $message->subject('Bundle Subscription');
            $message->to($user->email);
        });
    }
}
