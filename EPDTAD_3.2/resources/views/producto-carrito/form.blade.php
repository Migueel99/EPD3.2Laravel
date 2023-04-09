<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_producto') }}
            {{ Form::text('id_producto', $productoCarrito->id_producto, ['class' => 'form-control' . ($errors->has('id_producto') ? ' is-invalid' : ''), 'placeholder' => 'Id Producto']) }}
            {!! $errors->first('id_producto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_carrito') }}
            {{ Form::text('id_carrito', $productoCarrito->id_carrito, ['class' => 'form-control' . ($errors->has('id_carrito') ? ' is-invalid' : ''), 'placeholder' => 'Id Carrito']) }}
            {!! $errors->first('id_carrito', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>