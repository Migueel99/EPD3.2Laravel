<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('name') }}
            {{ Form::text('name', $user->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
            {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $user->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('two_factor_secret') }}
            {{ Form::text('two_factor_secret', $user->two_factor_secret, ['class' => 'form-control' . ($errors->has('two_factor_secret') ? ' is-invalid' : ''), 'placeholder' => 'Two Factor Secret']) }}
            {!! $errors->first('two_factor_secret', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('two_factor_recovery_codes') }}
            {{ Form::text('two_factor_recovery_codes', $user->two_factor_recovery_codes, ['class' => 'form-control' . ($errors->has('two_factor_recovery_codes') ? ' is-invalid' : ''), 'placeholder' => 'Two Factor Recovery Codes']) }}
            {!! $errors->first('two_factor_recovery_codes', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>