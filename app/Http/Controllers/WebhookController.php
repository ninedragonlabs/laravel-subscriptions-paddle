<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Paddle\Http\Controllers\WebhookController as CashierController;
use Illuminate\Support\Facades\Log;

class WebhookController extends CashierController
{
    /**
     * Handle payment succeeded.
     *
     * @param  array  $payload
     * @return void
     */
    public function handleSubscriptionPaymentSucceeded($payload)
    {
        Log::info('SubscriptionPaymentSucceeded',"haloo");
    }
}
