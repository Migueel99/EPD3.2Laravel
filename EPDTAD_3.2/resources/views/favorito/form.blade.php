<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
           <strong> {{ Form::label('user_id') }}</strong>
            {{ Form::text('user_id', $favorito->user_id, ['class' => 'form-control' . ($errors->has('user_id') ? ' is-invalid' : ''), 'placeholder' => 'User Id']) }}
            {!! $errors->first('user_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <strong>{{ Form::label('productos_id') }}</strong>
            {{ Form::text('productos_id', $favorito->productos_id, ['class' => 'form-control' . ($errors->has('productos_id') ? ' is-invalid' : ''), 'placeholder' => 'Productos Id']) }}
            {!! $errors->first('productos_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
</div>
<br>
    <table>
        <tr>
            <td>
                <div class="mx-auto" style="max-width: 800px;">
                    <a href="{{ route('favoritos.index') }}" class="btn btn-primary ">
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