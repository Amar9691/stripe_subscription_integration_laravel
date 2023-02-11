<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Plan;
use App\User;
use Auth;
use App\subscription;
use Laravel\Cashier\invoice;
use Illuminate\Http\Response;


class PayController extends Controller
{
    
    
    public function payment(Request $request, Response $response)
   {

   	      \Stripe\Stripe::setApiKey('your-stripe-key');

    	  $session = \Stripe\Checkout\Session::create([
                   
                    'payment_method_types' => ['card'],
                    'line_items' => [[
                    'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                    'name' => 'T-shirt',
                                      ],
                    'unit_amount' => 2000,
                     ],
                    'quantity' => 2,
                     ]],
                    'mode' => 'payment',
                    'success_url' => 'http://localhost/paystripe/home',
                    'cancel_url' => 'https://localhost/paystripe/home',
                     ]);

           
           return response([ 'id'=> $session->id
          ]);



    }

    public function index()
    {
      return view('payinteger');
    }
    
   
}
