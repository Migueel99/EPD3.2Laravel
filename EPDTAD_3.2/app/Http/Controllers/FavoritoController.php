<?php

namespace App\Http\Controllers;

use App\Models\Favorito;
use App\Models\Producto;

use Illuminate\Http\Request;

/**
 * Class FavoritoController
 * @package App\Http\Controllers
 */
class FavoritoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
        ;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $favoritos = Favorito::paginate();

        return view('favorito.index', compact('favoritos'))
            ->with('i', (request()->input('page', 1) - 1) * $favoritos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $favorito = new Favorito();
        return view('favorito.create', compact('favorito'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $favorito = new Favorito();

        $favorito->user_id = $request->user_id;
        $favorito->productos_id = $request->productos_id;


        $producto = Producto::find($request->productos_id);
        $producto->favoritos = $producto->favoritos + 1;
        $producto->update();
        $favorito->save();

        return redirect()->route('inicio')
            ->with('success', 'Favorito created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorito = Favorito::find($id);

        return view('favorito.show', compact('favorito'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $favorito = Favorito::find($id);

        return view('favorito.edit', compact('favorito'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Favorito $favorito
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favorito $favorito)
    {
        request()->validate(Favorito::$rules);

        $favorito->update($request->all());

        return redirect()->route('favoritos.index')
            ->with('success', 'Favorito updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $favorito = Favorito::find($id);
        $producto = Producto::find($favorito->productos_id);
        $producto->favoritos = $producto->favoritos - 1;
        $producto->update();

        $favorito = Favorito::find($id)->delete();

        return redirect()->route('inicio')
            ->with('success', 'Favorito deleted successfully');
    }
}
