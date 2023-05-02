<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])

</head>

<body>

    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="">
                        <h1 class="text-1000  fw-bold  text-gradient">MiniatureCars</h1>
                        <br>

                    </a>
                    <h4>Editar el perfil</h4>
                    <div class="card" style="border-radius: 15px;">

                        <form method="POST" action="{{ route('users.update', Auth::user()->id) }}" role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            <label class="block text-sm mt-2">
                                <span class="text-gray-700  dark:text-gray-400">{{ Form::label('name') }}</span>
                                {{ Form::text('name', Auth::user()->name, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name']) }}
                                {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                            </label>
                            <label class="block text-sm dark:text-gray-200">
                                {{ Form::label('email') }}
                                {{ Form::text('email', Auth::user()->email, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
                                {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
                            </label>
                            <label class="block text-sm dark:text-gray-200">
                                {{ Form::label('Teléfono') }}
                                {{ Form::text('telefono', Auth::user()->telefono, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('two_factor_secret') ? ' is-invalid' : ''), 'placeholder' => 'Teléfono']) }}
                                {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
                            </label>

                            <br>

                            <label class="block text-sm dark:text-gray-200">
                                {{ Form::label('idioma') }}
                                {{ Form::select('idioma', ['es' => 'Español', 'en' => 'Inglés'], Auth::user()->idioma, ['class' => 'block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input' . ($errors->has('idioma') ? ' is-invalid' : '')]) }}
                                {!! $errors->first('idioma', '<div class="invalid-feedback">:message</div>') !!}
                            </label>
                            <div class="box-footer mt20">
                                <input type="submit" class="btn btn-danger mb-3" value="{{ __('Editar') }}">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>