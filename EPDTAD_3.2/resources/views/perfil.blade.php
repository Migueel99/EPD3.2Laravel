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
                    </a>
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-4">
                            <div class="d-flex text-black">

                                
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="mb-1">Perfil de {{ Auth::user()->name }}</h5>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Email: {{ Auth::user()->email }}</p>
                                    <p class="mb-2 pb-1" style="color: #2b2a2a;">Telf:{{ Auth::user()->telefono }}</p>
                                    <div>
                                        <span>Direcciones de envío:</span>
                                        @foreach (Auth::user()->direcciones as $direcciones)
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $direcciones->direccion }}</p>
                                        @endforeach

                                       <button onclick="mostrarFormulario()" class="mb-2" >Añadir dirección</button>
                                        <form id="formulario" style="display:none;" class="mt-2" method="POST" action="{{ route('direcciones.store') }}" role="form" enctype="multipart/form-data">
                                            {{ method_field('POST') }}
                                            @csrf
                                            {{ Form::hidden('user_id', Auth::user()->id) }}
                                            {{ Form::text('direccion', $direccione->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                            <div class="box-footer mt20 mt-2">
                                                <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                            </div>

                                        </form>
                                    </div>
                                    <div>
                                        <a href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <button class="btn btn-primary mx-2 px-auto">Logout</button>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </a>
                                        <a href="{{ route('inicio') }}"><button type="button" class="btn btn-primary mx-2 px-auto">Volver</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        function mostrarFormulario() {
            var formulario = document.getElementById("formulario");
            formulario.style.display = "block";
            
          
        }
    </script>

</body>

</html>