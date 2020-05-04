<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;

class WelcomeNewCustomerListener
{
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
        
    }
}
