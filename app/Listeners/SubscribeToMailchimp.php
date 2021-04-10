<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Newsletter;

class SubscribeToMailchimp
{
    /**
     * Create the event listener.
     *
     * @return void
     */

    private $newletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newletter = $newsletter;
    }

    /**
     * Handle the event.
     *
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $name = explode(" ", $event->user->name);
        $fname = $name[0];
        $lname = isset($name[1]) ? $name[1] : "no lastname";
        Newsletter::subscribe($event->user->email,['FNAME'=>$fname,'LNAME'=>$lname]);
    }
}
