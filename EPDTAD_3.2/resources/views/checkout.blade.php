<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])

</head>

<body>

    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="{{ route('inicio') }}">
                        <h1 class="text-1000  fw-bold  text-gradient">MiniatureCars</h1>
                    </a>
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->carritos->productoCarritos->count() > 0)
                                @foreach (Auth::user()->carritos->productoCarritos as $producto)
                                    <div class="row">
                                        <div class="col-3">
                                            <img src="{{ asset('img/productos/' . $producto->producto->imagen) }}"
                                                alt="imagen" class="img-fluid">
                                        </div>
                                        <div class="col-3">
                                            <h6 class="text-700">{{ $producto->producto->nombre }}</h6>
                                        </div>

                                        <div class="col-1">
                                            <p class="text-500">{{ $producto->cantidad }}</p>
                                        </div>

                                        <div class="col-2">
                                            <p class="text-500">{{ $producto->producto->precio * $producto->cantidad }}
                                            </p>
                                        </div>
                                    </div>
                                    <hr>
                                @endforeach
                        </div>
                        <div>
                            <span>{{ __('Selecciona una dirección de envío') }}:</span>
                            <select class="mb-3" name="direccion_id" id="direccion_id">
                                @foreach (Auth::user()->direcciones as $direccione)
                                    <option value="{{ $direccione->id }}">{{ $direccione->direccion }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pagar') }}"
                                class="btn btn-primary btn-fill text-primary btn-block">{{ __('Checkout') }}</a>
                            <hr>
                            <h2>Total: {{ Auth::user()->carritos->obtenerPrecio() }} €</h2>
                        @else
                            <h2>{{ __('No hay productos en el carrito') }}</h2>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-0 bg-1000">

        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3 ">
                <div class="col-sm-12 col-md-3 col-lg-4 col-xl-3 mx-auto mb-4 text-center">
                    <br>

                    <h5 class="lh-lg fw-bold text-500">
                        <p style="color: white;">Siguenos en RRSS</p>
                    </h5>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-instagram fa-w-14 fs-2 me-2" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="instagram" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 448 512" width="1em" color="white">
                            <path fill="#BDBDBD"
                                d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                            </path>
                        </svg>
                    </a>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-facebook fa-w-16 fs-2 mx-2" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="facebook" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" width="1em" color="white">
                            <path fill="#BDBDBD"
                                d="M504 256C504 119 393 8 256 8S8 119 8 256c0 123.78 90.69 226.38 209.25 245V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.28c-30.8 0-40.41 19.12-40.41 38.73V256h68.78l-11 71.69h-57.78V501C413.31 482.38 504 379.78 504 256z">
                            </path>
                        </svg>
                    </a>
                    <a href="#!">
                        <svg class="svg-inline--fa fa-twitter fa-w-16 fs-2 mx-2" aria-hidden="true" focusable="false"
                            data-prefix="fab" data-icon="twitter" role="img" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 512 512" width="1em" color="white">
                            <path fill="#BDBDBD"
                                d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                            </path>
                        </svg>
                    </a>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <br>
                    <h5 class="lh-lg fw-bold text-500">
                        <p style="color: white;">{{ _('Enlaces de interés') }}</p>
                    </h5>
                    <p style="color: white;"><a href="" class="text-reset">{{ __('Productos') }}</a></p>
                    <p style="color: white;"><a href="" class="text-reset">{{ __('Categorias') }}</a></p>
                    <p style="color: white;"><a href="img\descargas\CondicionesMiniatureCars.pdf"
                            download="CondicionesMiniatureCars.pdf" class="text-reset">Términos y condiciones</a>
                    </p>
                    <p style="color: white;"><a href="#!" class="text-reset"
                            onclick="alert('Si necesita ayuda, por favor, pongase en contacto a traves de MiniatureCars@gmail.com');">{{ __('Ayuda') }}</a>
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
                <p class="text-200 text-center">All rights Reserved &copy; MiniatureCars, 2023</p>
            </div>

        </div>


    </section>
</body>

</html>
