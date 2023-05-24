<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\CategoriaProducto;
use Illuminate\Pagination\LengthAwarePaginator;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class ProductoController
 * @package App\Http\Controllers
 */
class ProductoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }


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

    public function mostrarProducto()
    {

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
        $categorias = Categoria::all();
        $producto = new Producto();
        return view('producto.create', compact('producto', 'categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $producto = new Producto();
            $producto->nombre = $request->input('nombre');
            $producto->descripcion = $request->input('descripcion');
            $producto->precio = $request->input('precio');

            if ($request->hasFile("imagen")) {
                $file = $request->file("imagen");
                $name = time() . $file->getClientOriginalName();
                $file->move(public_path() . "/img/productos", $name);
                $producto->imagen = $name;
            }
            $producto->stock = $request->input('stock');
            $producto->favoritos = 0;
            $producto->save();
            $categoria = new CategoriaProducto();
          for ($i = 0; $i < count($request->input('categorias')); $i++) {
                if (CategoriaProducto::where('categoria_id', $request->input('categorias')[$i])->where('productos_id', $producto->id)->first() == null) {
                    $categoria = new CategoriaProducto();
                    $categoria->categoria_id = $request->input('categorias')[$i];
                    $categoria->productos_id = $producto->id;
                    $categoria->save();
                }
            }

            DB::commit();
            return redirect()->route('productos.index')
                ->with('success', 'Producto creado correctamente.');
        } catch (\Exception $e) {

          
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
        $categorias = Categoria::all();

        $producto = Producto::find($id);
        $categorias = Categoria::all();

        return view('producto.edit', compact('producto', 'categorias'));
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
        if ($request->hasFile("imagen")) {
            $file = $request->file("imagen");
            $name = time() . $file->getClientOriginalName();
            $file->move(public_path() . "/img/productos", $name);
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

    public function productosPorCategoria($idCategoria)
    {
        // Busca la categoría por su ID
        $categoria = CategoriaProducto::where('categoria_id', $idCategoria)->get();

        // Obtener la colección de productos y paginarlos
        $productos = Producto::whereIn('id', $categoria->pluck('productos_id'))
                        ->paginate(10);
    
        $categoria = Categoria::find($idCategoria);

        $categorias = Categoria::all();

        
        return view('pcategoria', compact('productos', 'categoria', 'categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $productos->perPage());


            
    }
}
