<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        $productos = Producto::paginate(9);

        return view('producto.index', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());
    }

    public function mostrarProducto(){

        $productos = Producto::paginate(9);

        return view('inicio', compact('productos'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $producto = new Producto();
        return view('producto.create', compact('producto'));
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
        $producto =  new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        if($request->hasFile("imagen")){
            $file = $request->file("imagen");
            $name = time().$file->getClientOriginalName();
            $file->move(public_path()."/img/productos",$name);
            $producto->imagen = $name;

        }
        $producto->stock = $request->input('stock');
        $producto->save();

        return redirect()->route('productos.index')
            ->with('success', 'Producto created successfully.');
        */
        try{
            DB::beginTransaction();
            $producto =  new Producto();
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');
            if($request->hasFile("imagen")){
                $file = $request->file("imagen");
                $name = time().$file->getClientOriginalName();
                $file->move(public_path()."/img/productos",$name);
                $producto->imagen = $name;

            }
            $producto->stock = $request->input('stock');
            //$producto->save();
            DB::afterCommit(function() use ($producto){
                $producto->save();
            });
            DB::commit();
            return redirect()->route('productos.index')
                ->with('success', 'Producto creado correctamente.');
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->route('productos.index')
                ->with('error', 'Error al crear el producto');
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
        $producto = Producto::find($id);

        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);

        return view('producto.edit', compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $producto->nombre = $request->input('nombre');
        $producto->descripcion = $request->input('descripcion');
        $producto->precio = $request->input('precio');
        if($request->hasFile("imagen")){
            $file = $request->file("imagen");
            $name = time().$file->getClientOriginalName();
            $file->move(public_path()."/img/productos",$name);
            $producto->imagen = $name;

        }
        $producto->stock = $request->input('stock');
        $producto->update();

        return redirect()->route('productos.index')
            ->with('success', 'Producto updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $producto = Producto::find($id)->delete();

        return redirect()->route('productos.index')
            ->with('success', 'Producto deleted successfully');
    }
}
