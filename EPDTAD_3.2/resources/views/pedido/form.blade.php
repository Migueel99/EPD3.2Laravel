<div class="">
    <div class="box-body">

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ Form::label('id_carrito') }}</span>
            {{ Form::text('id_carrito', $pedido->id_carrito, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('id_carrito') ? ' is-invalid' : ''), 'placeholder' => 'id_carrito']) }}
            {!! $errors->first('id_carrito', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $pedido->estado, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('total') }}
            {{ Form::text('total', $pedido->total, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('two_factor_secret') ? ' is-invalid' : ''), 'placeholder' => 'total']) }}
            {!! $errors->first('total', '<div class="invalid-feedback">:message</div>') !!}
        </label>


    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit"
            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">{{ __('Enviar') }}</button>
    </div>
</div>
