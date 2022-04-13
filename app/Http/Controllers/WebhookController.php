<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Paddle\Http\Controllers\WebhookController as CashierController;


class WebhookController extends CashierController
{
    public function handlePaymentSucceeded($payload)
    {
        logger('I can reach here!');
    }
}
