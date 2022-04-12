<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use ProtoneMedia\LaravelPaddle\Events\PaymentSucceeded;
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
    public function handle(PaymentSucceeded $event)
    {
        Subscription::create([
            'user_id' =>$event->passthrough['user_id'],
            'status'=>'active'
        ]);
        Log::info('PaymentSucceeded',$event->all());
    }
}
