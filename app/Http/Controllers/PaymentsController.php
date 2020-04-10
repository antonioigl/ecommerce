<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paypal;
use function array_filter;
use function array_values;
use function redirect;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopping_cart');
    }

    public function pay(Request $request)
    {
        $amount = $request->shopping_cart->amount();
        $paypal = new Paypal();
        $response = $paypal->charge($amount);

        $redirectLinks = array_filter($response->result->links, function($link){
            return $link->method == 'REDIRECT';
        });

        $redirectLinks = array_values($redirectLinks);

        return redirect($redirectLinks[0]->href);
    }

    public function execute(Request $request)
    {
        $paypal = new Paypal();
        $response = $paypal->execute($request->paymentId, $request->PayerID);

        return $response;
    }
}
