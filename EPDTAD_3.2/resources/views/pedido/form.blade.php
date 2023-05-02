<div class="box box-info padding-1">
    <div class="box-body">

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('id_carrito') }}</strong></span>
            {{ Form::text('id_carrito', $pedido->id_carrito, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('id_carrito') ? ' is-invalid' : ''), 'placeholder' => 'id_carrito']) }}
            {!! $errors->first('id_carrito', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            <strong>{{ Form::label('estado') }}</strong>
            {{ Form::text('estado', $pedido->estado, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            <strong>{{ Form::label('Dirección') }}</strong>
            {{ Form::text('direcc', $pedido->direccion, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('direcc') ? ' is-invalid' : ''), 'placeholder' => 'direcc']) }}
            {!! $errors->first('direcc', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            <strong>{{ Form::label('total') }}</strong>
            {{ Form::text('total', $pedido->total, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('two_factor_secret') ? ' is-invalid' : ''), 'placeholder' => 'total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </label>


    </div>
    <br>



</div>
