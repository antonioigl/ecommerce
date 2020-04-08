{!! Form::open(['route' => [$product->url(), $product->id], 'method' => $product->method(), 'class' => 'app-form']) !!}

    <div>
        {!! Form::label('title', __('Título del producto')) !!}
        {!! Form::text('title', $product->title, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('description', __('Descripción del producto')) !!}
        {!! Form::textarea('description', $product->description, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('price', __('Precio del producto')) !!}
        {!! Form::number('price', $product->price, ['class' => 'form-control']) !!}
    </div>

    <div>
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div>

{!! Form::close() !!}
