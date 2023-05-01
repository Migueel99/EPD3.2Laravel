<div class="box box-info padding-1">
    <div class="box-body">

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ Form::label('id_direccion') }}</span>
            {{ Form::text('id_direccion', $direccione->id, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('id_direccion') ? ' is-invalid' : ''), 'placeholder' => 'id_direccion']) }}
            {!! $errors->first('id_direccion', '<div class="invalid-feedback">:message</div>') !!}
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">{{ Form::label('direccion') }}</span>
            {{ Form::text('direccion', $direccione->direccion, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <br>
    </div>
</div>
