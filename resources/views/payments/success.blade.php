@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="card padding">
            <header>
                <h2>{{ __('Tu compra fue completada') }}</h2>
            </header>
            <div class="card-body">
                <p>{{ __('Enviamos un email a tu correo para que puedas estar al tanto de tu envío') }}</p>
            </div>
        </div>
    </div>

@endsection
