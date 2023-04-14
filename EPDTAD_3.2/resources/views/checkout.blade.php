<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])

</head>

<body>

    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="{{route('inicio')}}">
                        <h1 class="text-1000  fw-bold  text-gradient">MiniatureCars</h1>
                    </a>
                    <div class="card">
                        <div class="card-body">
                            @if (Auth::user()->carritos->productoCarritos->count() > 0)
                            @foreach (Auth::user()->carritos->productoCarritos as $producto)
                            <div class="row">
                                <div class="col-3">
                                    <img src="{{ asset('img/productos/' . $producto->producto->imagen) }}" alt="imagen" class="img-fluid">
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

                  
                            <span>Dirección de envio</span>
                            <p>{{Auth::user()->direcciones->first()->direccion}}</p>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pagar') }}" class="btn btn-primary btn-block">Checkout</a>
                        <hr>
                        <h2>Total: {{ Auth::user()->carritos->obtenerPrecio() }} €</h2>
                        @else
                        <h2>No hay productos en el carrito</h2>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>