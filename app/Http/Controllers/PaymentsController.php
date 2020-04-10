<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use App\Paypal;
use Illuminate\Support\Facades\URL;
use function array_filter;
use function array_values;
use function redirect;
use function session;
use function view;

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

        if ($response->statusCode == 200){

            $order = Order::createFromPaypalResponse($response->result, $request->shooping_cart);
            if ($order) {
                session()->forget('shooping_cart_id');
                return view('payments.success', ['shopping_cart' => $request->shopping_cart, 'order' => $order]);
            }
        }
        else{
            redirect(URL::route('shooping_cart.shor'));
        }
    }
}
