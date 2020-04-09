{!! Form::open([ 'method' => 'DELETE', 'route' => ['productos.destroy', $product->id], 'onsubmit' => 'return confirm("'. __('¿Estás seguro de eliminar este producto?') .'")']) !!}

    <input type="submit" value="{{__('Eliminar producto')}}" class="btn btn-danger">

{!! Form::close() !!}
