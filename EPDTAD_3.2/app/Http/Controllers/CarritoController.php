<?php

namespace App\Http\Controllers;

use App\Carrito;
use Illuminate\Http\Request;

/**
 * Class CarritoController
 * @package App\Http\Controllers
 */
class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carritos = Carrito::paginate();

        return view('carrito.index', compact('carritos'))
            ->with('i', (request()->input('page', 1) - 1) * $carritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carrito = new Carrito();
        return view('carrito.create', compact('carrito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Carrito::$rules);

        $carrito = Carrito::create($request->all());

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $carrito = Carrito::find($id);

        return view('carrito.show', compact('carrito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carrito = Carrito::find($id);

        return view('carrito.edit', compact('carrito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Carrito $carrito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carrito $carrito)
    {
        request()->validate(Carrito::$rules);

        $carrito->update($request->all());

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $carrito = Carrito::find($id)->delete();

        return redirect()->route('carritos.index')
            ->with('success', 'Carrito deleted successfully');
    }
}
