<div class="box box-info padding-1">
    <div class="box-body">

        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $producto->nombre, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $producto->descripcion, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('precio') }}
            {{ Form::text('precio', $producto->precio, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('precio') ? ' is-invalid' : ''), 'placeholder' => 'Precio']) }}
            {!! $errors->first('precio', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200 mt-2">
            <input type="file" name="imagen">
            {!! $errors->first('imagen', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm dark:text-gray-200">
            {{ Form::label('stock') }}
            {{ Form::text('stock', $producto->stock, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('stock') ? ' is-invalid' : ''), 'placeholder' => 'Stock']) }}
            {!! $errors->first('stock', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <div class="form-group">
            <label for="categorias">Categorías:</label>
            <select name="categorias[]" id="categorias" class="form-control" multiple>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <br>
    <table>
        <tr>
            <td>
                <div class="mx-auto" style="max-width: 800px;">
                    <a href="{{ route('productos.index') }}" class="btn btn-primary ">
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
