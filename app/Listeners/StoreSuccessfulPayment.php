<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionPaymentSucceeded;
use Illuminate\Support\Facades\Log;

class StoreSuccessfulPayment
{
   
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
         Log::info('yan afriyoko');
       
    }
}
