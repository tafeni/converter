<?php

namespace App\Events;

use App\Models\Payment;
use App\Models\Bundle;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserPayment
{
    use Dispatchable, InteractsWithSockets, SerializesModels;


    public $user, $payment, $bundle;

    public function __construct(User $user, Payment $payment, Bundle $bundle)
    {
        $this->user = $user;
        $this->payment = $payment;
        $this->bundle = $bundle;
    }


    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
