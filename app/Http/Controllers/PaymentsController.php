<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paypal;

class PaymentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('shopping_cart');
    }

    public function pay(Request $request)
    {
        return $request->shopping_cart->amount();
    }
}
