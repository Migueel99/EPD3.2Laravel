<?php

namespace App\Http\Controllers;


use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()){
            session()->put('applocale', Auth::user()->idioma);
        }

        return view('inicio', compact('productos', 'categorias'))->with('applocale', session('applocale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
}
