<?php

namespace App\Listeners;

use App\Events\NewCustomerHasRegisteredEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeNewUserMail;

class WelcomeNewCustomerListener implements ShouldQueue
{
    public function handle(NewCustomerHasRegisteredEvent $event)
    {
        sleep(10);

        Mail::to($event->customer->email)->send(new WelcomeNewUserMail());
        
    }
}
