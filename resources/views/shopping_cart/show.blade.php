@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card padding">
            <header>
                <h2>{{__('Mi carrito de compras')}}</h2>
            </header>
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <products-shopping-component></products-shopping-component>
                    </div>
                    <div class="col-12 col-md-6 payments">
                        <p>{{__('Paga tu total fácilmente con cualquiera de estos métodos, a través de Paypal')}}</p>
                        <img src="/images/cards.png" alt="" width="120">
                        <img src="/images/paypal.png" alt="" width="120">
                        <div>
                            <a href="/pagar" class="btn btn-primary">{{ __('Proceder al pago') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
