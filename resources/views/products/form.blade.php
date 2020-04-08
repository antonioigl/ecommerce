{!! Form::open(['url' => '/productos', 'class' => 'app-form']) !!}

    <div>
        {!! Form::label('title', __('Título del producto')) !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('description', __('Descripción del producto')) !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div>
        {!! Form::label('price', __('Precio del producto')) !!}
        {!! Form::number('price', 0, ['class' => 'form-control']) !!}
    </div>

    <div>
        <input type="submit" value="Guardar" class="btn btn-primary">
    </div>

{!! Form::close() !!}
