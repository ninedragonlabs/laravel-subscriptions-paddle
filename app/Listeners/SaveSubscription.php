<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionCreated;
use ProtoneMedia\LaravelPaddle\Events\SubscriptionUpdated;
use Illuminate\Support\Facades\Log;

class SaveSubscription
{
    /**
     * @param  SubscriptionCreated|SubscriptionUpdated  $event
     */
    public function handle($event)
    {
        Log::info('yan afriyoko');
    }
}
