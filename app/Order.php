<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['recipient_name','line1','line2','city','country_code','state','postal_code',
        'email','shopping_cart_id','total','guide_number'];

    public static function createFromPaypalResponse($paypalResponse, $shooping_cart)
    {
        $payer = $paypalResponse->payer;

        $orderData = (array)$payer->payer_info->shopping_address;

        $orderData['email'] = $payer->payer_info->email;
        $orderData['total'] = $shooping_cart->amountInCents();
        $orderData['shooping_cart_id'] = $shooping_cart->id;

        return Order::create($orderData);

    }
}
