<div class="box box-info padding-1">
    <div class="box-body">
        
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('idcarrito') }}
            {{ Form::text('idcarrito', $carrito->id, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('idcarrito') ? ' is-invalid' : ''), 'placeholder' => 'ID Carrito']) }}
            {!! $errors->first('idcarrito', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('user_id') }}
            {{ Form::text('user_id', $carrito->user_id, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'ID usuario dueño']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </label>

    </div>

    <br>
    <table>
        <tr>
            <td>
                <div class="mx-auto" style="max-width: 800px;">
                    <a href="{{ route('carritos.index') }}" class="btn btn-primary ">
                        <button
                            class="flex items-center justify-between  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                            {{ __('Volver') }}
                            <span class="ml-2" aria-hidden="true"></span>
                        </button>
                    </a>
                </div>
            </td>
            <td>&nbsp;&nbsp;</td>
            <td>
                <div class="box-footer mt20">
                    <button type="submit"
                        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">{{ __('Enviar') }}
                        <span class="ml-2" aria-hidden="true"></span>
                    </button>
                </div>
            </td>
        </tr>
    </table>
</div>