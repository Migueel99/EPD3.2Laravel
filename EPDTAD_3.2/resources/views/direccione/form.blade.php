<div class="box box-info padding-1">
    <div class="box-body">

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('iD_dirección') }}</strong></span>
            {{ Form::text('id_direccion', $direccione->id, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('id_direccion') ? ' is-invalid' : ''), 'placeholder' => 'id_direccion']) }}
            {!! $errors->first('id_direccion', '<div class="invalid-feedback">:message</div>') !!}
        </label>

        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('dirección') }}</strong></span>
            {{ Form::text('direccion', $direccione->direccion, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('Código Postal') }}</strong></span>
            {{ Form::text('cp', $direccione->codigo_postal, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('cp') ? ' is-invalid' : ''), 'placeholder' => 'cp']) }}
            {!! $errors->first('cp', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('ciudad') }}</strong></span>
            {{ Form::text('ciudad', $direccione->codigo_postal, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'ciudad']) }}
            {!! $errors->first('ciudad', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('provincia') }}</strong></span>
            {{ Form::text('cp', $direccione->provincia, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'provincia']) }}
            {!! $errors->first('cp', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"><strong>{{ Form::label('pais') }}</strong></span>
            {{ Form::text('pais', $direccione->pais, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('pais') ? ' is-invalid' : ''), 'placeholder' => 'pais']) }}
            {!! $errors->first('pais', '<div class="invalid-feedback">:message</div>') !!}
        </label>
        <br>
    </div>
    <br>
    
</div>
