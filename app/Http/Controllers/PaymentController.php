<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class PaymentController extends Controller
{
    public function pay(){
         $payLink = Auth::user()->chargeProduct($productId = 26859);
         return view('billing',[
             'payLink' =>$payLink
         ]);
    }
}
