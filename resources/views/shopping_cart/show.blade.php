@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card padding">
            <header>
                <h2>{{__('Mi carrito de compras')}}</h2>
            </header>
            <div class="card-body">
                @foreach ($shopping_cart->products as $product)
                    <div>
                        <h4>{{$product->title}}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
