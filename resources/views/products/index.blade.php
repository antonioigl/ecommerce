@extends('layouts.app')

@section('content')
    <div>{{$shopping_cart->id}}</div>
    <div class="container">
        <div>
            <products-component></products-component>
        </div>
        <div class="actions text-center">
            {{ $products->links() }}
        </div>
    </div>

@endsection
