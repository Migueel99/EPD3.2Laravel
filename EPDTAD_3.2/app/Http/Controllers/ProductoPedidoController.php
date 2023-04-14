<?php

namespace App\Http\Controllers;

use App\Models\ProductoPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class ProductoPedidoController
 * @package App\Http\Controllers
 */
class ProductoPedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productoPedidos = ProductoPedido::paginate();

        return view('producto-pedido.index', compact('productoPedidos'))
            ->with('i', (request()->input('page', 1) - 1) * $productoPedidos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productoPedido = new ProductoPedido();
        return view('producto-pedido.create', compact('productoPedido'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ProductoPedido::$rules);
        /*
        $productoPedido = ProductoPedido::create($request->all());

        return redirect()->route('producto-pedidos.index')
            ->with('success', 'ProductoPedido created successfully.');
        */
        try{
            DB::beginTransaction();
            $productoPedido = ProductoPedido::create($request->all());
            DB::afterCommit(function() use ($productoPedido){
                $productoPedido->save();
            });
            DB::commit();
            return redirect()->route('producto-pedidos.index')
                ->with('success', 'ProductoPedido creado correctamente.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('producto-pedidos.index')
                ->with('error', 'Error al crear el ProductoPedido.');
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
        $productoPedido = ProductoPedido::find($id);

        return view('producto-pedido.show', compact('productoPedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productoPedido = ProductoPedido::find($id);

        return view('producto-pedido.edit', compact('productoPedido'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ProductoPedido $productoPedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductoPedido $productoPedido)
    {
        request()->validate(ProductoPedido::$rules);

        $productoPedido->update($request->all());

        return redirect()->route('producto-pedidos.index')
            ->with('success', 'ProductoPedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $productoPedido = ProductoPedido::find($id)->delete();

        return redirect()->route('producto-pedidos.index')
            ->with('success', 'ProductoPedido deleted successfully');
    }
}
