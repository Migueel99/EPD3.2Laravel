<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])
    <title>Perfil</title>
    <link rel="shortcut icon" href="{{ asset('favicon1.ico') }}" type="image/x-icon">
</head>

<body>
    <div class="container-fluid ">
        <section>
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
                <div class="container"><a class="navbar-brand d-inline-flex" href="{{ route('inicio') }}"><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">MiniatureCars</span></a>
                </div>
            </nav>


            <div class="row justify-content-md-center ">
                <div class="card-wrapper col-12 col-sm-12 col-md-8 col-lg-4 ">
                    <div class="brand text-center mb-3">
                        <a class="navbar-brand d-inline-flex" href="">
                            <h1 class="text-1000  fw-bold  text-gradient ">{{ __('Perfil de usuario') }}</h1>
                        </a>
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-4">
                                <div class="d-flex text-black">


                                    <div class="flex-grow-1 ms-3 ">
                                        <h5 class="mb-1"> {{ Auth::user()->name }}</h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;"><strong>{{ __('Email') }}
                                                :</strong> {{ Auth::user()->email }}
                                        </p>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;"><strong>{{ __('Teléfono') }}:
                                            </strong>{{ Auth::user()->telefono }}
                                        </p>
                                        <div>
                                            <span><strong>{{ __('Direcciones de envío') }}:</strong></span>
                                            @foreach (Auth::user()->direcciones as $direcciones)
                                            <p class="mb-2 pb-1" style="color: #2b2a2a;"><strong>Dirección:</strong>
                                                {{ $direcciones->direccion }}
                                                - {{ $direcciones->ciudad }} - {{ $direcciones->codigo_postal }} -
                                                {{ $direcciones->provincia }}
                                            </p>
                                            <p class="mb-2 pb-1"><strong>Teléfono:</strong> {{ $direcciones->telefono }}</p>

                                            <hr>
                                            @endforeach

                                            <button onclick="mostrarFormulario()" class="mb-2">Añadir dirección</button>
                                            <form id="formulario" style="display:none;" class="mt-2" method="POST" action="{{ route('direcciones.store') }}" role="form" enctype="multipart/form-data">
                                                {{ method_field('POST') }}
                                                @csrf
                                                {{ Form::hidden('user_id', Auth::user()->id) }}
                                                {{ Form::text('direccion', $direccione->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
                                                {{Form::text('ciudad', $direccione->ciudad, ['class' => 'form-control' . ($errors->has('ciudad') ? ' is-invalid' : ''), 'placeholder' => 'Ciudad'])}}
                                                {{Form::text('codigo_postal', $direccione->codigo_postal, ['class' => 'form-control' . ($errors->has('codigo_postal') ? ' is-invalid' : ''), 'placeholder' => 'Codigo Postal'])}}
                                                {{Form::text('provincia', $direccione->provincia, ['class' => 'form-control' . ($errors->has('provincia') ? ' is-invalid' : ''), 'placeholder' => 'Provincia'])}}
                                                {{Form::text('pais', $direccione->pais, ['class' => 'form-control' . ($errors->has('pais') ? ' is-invalid' : ''), 'placeholder' => 'Pais' ])}}
                                                {{Form::text('telefono', $direccione->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono' ])}}
                                                <div class="box-footer mt20 mt-2">
                                                    <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
                                                </div>

                                            </form>
                                        </div>

                                        <span><strong>{{ __('Idioma') }}:</strong></span>
                                        &nbsp;
                                        <a href="{{ route('set_language', ['es']) }}">{{ __('Spanish') }}</a>
                                        &nbsp;
                                        <a href="{{ route('set_language', ['en']) }}">{{ __('English') }}</a>

                                        <br><br>



                                    </div>

                                </div>
                                <div class="d-flex justify-content-center">
                                    <table>
                                        <tr>
                                            <td>
                                                <a href="{{ route('logout') }} " onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <button class="btn btn-primary mx-2  mb-2">Logout</button>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </a>
                                            </td>
                                            <td> &nbsp;&nbsp; </td>
                                            <td>
                                                @role('admin')
                                                <a href="{{ route('test') }}">
                                                    <button type="button" class="btn btn-primary mx-2  mb-2">{{ __('Dashboard') }}
                                                    </button>
                                                </a>
                                                @endrole
                                            </td>
                                            <td>&nbsp;&nbsp;</td>
                                            <td>
                                                <a href="{{ route('inicio') }}">
                                                    <button type="button" class="btn btn-primary mx-2  mb-2 ">{{ __('Volver') }}
                                                    </button>
                                                </a>
                                            </td>

                                            <td>
                                                <a href="{{ route('pedidosrealizados') }}">
                                                    <button type="button" class="btn btn-primary mx-2  mb-2 ">{{ __('Pedidos realizados') }}
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>



                                    </table>
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

    <br><br>
    <section class="py-0 bg-1000">
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3 ">
                <div class="col-sm-12 col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center">
                    <br>

                    <h5 class="lh-lg fw-bold text-500">
                        <p style="color: white;">{{ __('Síguenos en RRSS') }}</p>
                    </h5>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-instagram fa-w-14 fs-2 me-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" width="1em" color="white">
                            <path fill="#BDBDBD" d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-facebook fa-w-16 fs-2 mx-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" color="white">
                            <path fill="#BDBDBD" d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                            </path>
                        </svg>
                    </a>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-twitter fa-w-16 fs-2 mx-2" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" width="1em" color="white">
                            <path fill="#BDBDBD" d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <br>
                    <h5 class="lh-lg fw-bold text-500">
                        <p style="color: white;">{{ __('Enlaces de interés') }}</p>
                    </h5>
                    <p style="color: white;"><a href="" class="text-reset">{{ __('Productos') }}</a></p>
                    <p style="color: white;"><a href="" class="text-reset">{{ __('Categorías') }}</a></p>
                    <p style="color: white;"><a href="img\descargas\CondicionesMiniatureCars.pdf" download="CondicionesMiniatureCars.pdf" class="text-reset">{{ __('Términos y condiciones') }}</a>
                    </p>
                    <p style="color: white;"><a href="#!" class="text-reset" onclick="alert('Si necesita ayuda, por favor, pongase en contacto a traves de MiniatureCars@gmail.com');">{{ __('Ayuda') }}</a>
                    </p>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">
                    <br>
                    <h5 class="lh-lg fw-bold text-500">
                        <p style="color: white;">{{ __('Contacto') }}</p>
                    </h5>
                    <p style="color: white;"><i class="fas fa-home me-3 text-reset"></i> Sevilla, Sev 41005, SP</p>
                    <p style="color: white;">
                        <i class="fas fa-envelope me-3 text-reset"></i>
                        MiniatureCars@gmail.com
                    </p>
                    <p style="color: white;"><i class="fas fa-phone me-3 text-reset"></i> + 34 123 456 789</p>
                    <p style="color: white;"><i class="fas fa-print me-3 text-reset"></i> + 34 123 456 789</p>
                </div>
            </div>
        </div>
        </div>
        </div>
        <hr class="border border-800" />
        <div class="d-flex justify-content-center pb-3">
            <div class="col-lg-4 col-md-6 order-0">
                <p class="text-200 text-center">{{ __('All rights Reserved') }} &copy; MiniatureCars, 2023</p>
            </div>

        </div>


    </section>
</body>

</html>