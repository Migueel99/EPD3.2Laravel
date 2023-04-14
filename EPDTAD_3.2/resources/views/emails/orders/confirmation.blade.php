
    Hola {{ Auth::user()->name }}, gracias por realizar el pedido

    
    @for($i=0; $i < count($productos); $i++)
        <p>Producto: {{$productos[$i]->producto->nombre}}</p>
        <p>Precio: {{$productos[$i]->producto->precio}}</p>
        <p>Cantidad: {{$productos[$i]->cantidad}}</p>
        <p>Subtotal: {{$productos[$i]->cantidad * $productos[$i]->producto->precio}}</p>
    @endfor




    Gracias,<br>
    {{ config('app.name') }}
