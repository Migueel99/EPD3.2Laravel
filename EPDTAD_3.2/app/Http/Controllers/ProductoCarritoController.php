<?php

namespace App\Http\Controllers;

use App\Models\ProductoCarrito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoCarritoController
 * @package App\Http\Controllers
 */
class ProductoCarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productoCarritos = ProductoCarrito::paginate();

        return view('producto-carrito.index', compact('productoCarritos'))
            ->with('i', (request()->input('page', 1) - 1) * $productoCarritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productoCarrito = new ProductoCarrito();
        return view('producto-carrito.create', compact('productoCarrito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $productoCarrito = new ProductoCarrito();
        $productoCarrito->id_producto = $request->id_producto;
        $productoCarrito->id_carrito = $request->id_carrito;
        $productoCarrito->cantidad = $request->cantidad;
        $productoCarrito->save();
        return redirect()->route('inicio')
            ->with('success', 'ProductoCarrito created successfully.');
        */
        try{
            DB::beginTransaction();
            $productoCarrito = new ProductoCarrito();
            $productoCarrito->id_producto = $request->id_producto;
            $productoCarrito->id_carrito = $request->id_carrito;
            $productoCarrito->cantidad = $request->cantidad;

            DB::afterCommit(function() use ($productoCarrito){
                $productoCarrito->save();
            });
            DB::commit();
            return redirect()->route('inicio')
                ->with('success', 'ProductoCarrito created successfully.');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->route('inicio')
                ->with('error', 'Error al crear el productoCarrito.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productoCarrito = ProductoCarrito::find($id);

        return view('producto-carrito.show', compact('productoCarrito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoCarrito = ProductoCarrito::find($id);

        return view('producto-carrito.edit', compact('productoCarrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductoCarrito $productoCarrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoCarrito $productoCarrito)
    {
        $productoCarrito->cantidad = $request->cantidad;

        $productoCarrito->update();

        return redirect()->route('cart')
            ->with('success', 'ProductoCarrito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productoCarrito = ProductoCarrito::find($id)->delete();

        return redirect()->route('inicio');
    }

    public function obtenerProducto($id)
    {
        $productoCarrito = ProductoCarrito::find($id);
        return $productoCarrito;
    }
}
