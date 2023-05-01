<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class InicioController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::paginate(9);
        $categorias = Categoria::paginate(9);

        return view('inicio', compact('productos','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

}
