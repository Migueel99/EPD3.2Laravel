<html>

<head>
    @vite(['resources/css/theme.css', 'resources/js/bootstrap.js'])

</head>

<body>

    <div class="container-fluid pb-5">
        <div class="row justify-content-md-center">
            <div class="card-wrapper col-12 col-md-4 mt-5">
                <div class="brand text-center mb-3">
                    <a class="navbar-brand d-inline-flex" href="index.html">
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
                                        @if ($producto->cantidad >= $producto->producto->stock)
                                            <div class="col-1">
                                                <button disabled style="border:none; border-radius:50%">+</button>
                                            </div>
                                        @else
                                            <div class="col-1">
                                                <a href=""
                                                    onclick="event.preventDefault(); document.getElementById('{{'sumar-form-'.$producto->id}}').submit();">
                                                    <button style="border:none; border-radius:50%">+</button>
                                                </a>
                                            </div>
                                            <form id="{{'sumar-form-'.$producto->id}}" style="display:none" method="POST" action="{{ route('producto-carrito.update', $producto->id) }}" role="form"
                                                enctype="multipart/form-data">
                                                {{ method_field('PATCH') }}
                                                @csrf
    
                                                    {{ Form::hidden('cantidad', $producto->cantidad + 1) }}
                                                </form>
                                        @endif
                                        <div class="col-1">
                                            <p class="text-500">{{ $producto->cantidad }}</p>
                                        </div>

                                        <div class="col-1">

                                            <a href=""
                                                onclick="event.preventDefault(); document.getElementById('{{'restar-form-'.$producto->id}}').submit();">
                                                <button style="border:none; border-radius:50%">-</button>
                                            </a>
                                        </div>


                                        @if ($producto->cantidad > 1)
                                        <form id="{{'restar-form-'.$producto->id}}" style="display:none" method="POST" action="{{ route('producto-carrito.update', $producto->id) }}" role="form"
                                            enctype="multipart/form-data">
                                            {{ method_field('PATCH') }}
                                            @csrf

                                                {{ Form::hidden('cantidad', $producto->cantidad - 1) }}
                                            </form>
                                        @else
                                            <form id="{{'restar-form-'.$producto->id}}" style="display:none"
                                                action="{{ route('producto-carrito.destroy', $producto->id) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif

                                        <div class="col-2">
                                            <p class="text-500">{{ $producto->producto->precio * $producto->cantidad }}
                                            </p>
                                        </div>



                                    </div>
                                    <hr>
                                @endforeach
                        </div>

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
