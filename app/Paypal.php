<?php

namespace App;

use Illuminate\Support\Facades\Config;
use PayPal\Core\PayPalHttpClient;
use PayPal\v1\Payments\PaymentCreateRequest;
use PayPal\v1\Payments\PaymentExecuteRequest;
use PayPal\Core\SandboxEnvironment;
use PayPal\Core\PayPalEnvironment; //ProductionEnvironment for production calls

class Paypal
{
    public $client, $environment;

    public function __construct()
    {
        $clientid = Config::get('services.paypal.clientid');
        $secret = Config::get('services.paypal.secret');

        $this->environment = new SandboxEnvironment($clientid, $secret);

        $this->client = new PayPalHttpClient($this->environment);
    }

    // Solicitud de cobro
    public function buildPaymentRequest($amount)
    {
        $request = new PaymentCreateRequest();

        $body = [
            'intent' => 'sale',
            'transactions' => [
                [
                    'amount' => ['total' => $amount, 'currency' => 'USD']
                ]
            ],
            'payer' => [
              'payment_method' => 'paypal',
            ],
            'redirect_urls' => [
                'cancel_url' => '/',
                'return_url' => '/',
            ]
        ];
        $request->body = $body;

        return $request;
    }

    public function charge($amount){
        $this->client->execute($this->buildPaymentRequest($amount));
        $paypal = new Paypal();
        $paypal->charge($amount);
    }


    // Ejecución de cobro

}
