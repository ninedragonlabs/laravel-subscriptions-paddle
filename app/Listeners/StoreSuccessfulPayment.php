<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use ProtoneMedia\LaravelPaddle\Events\PaymentSucceeded;
use Illuminate\Support\Facades\Log;

class StoreSuccessfulPayment
{
   
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PaymentSucceeded $event)
    {
        Log::info('PaymentSucceeded',$event->all());
    }
}
