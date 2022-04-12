<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionPaymentSucceeded;
use Illuminate\Support\Facades\Log;
use App\Models\Subscription;


class StoreSuccessfulPayment
{
   
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(SubscriptionPaymentSucceeded $event)
    {
         Log::info('yan afriyoko');
       
    }
}
