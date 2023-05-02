<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pedido;
use App\Models\ProductoPedido;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;





/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only('edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        return view('user.create', compact('user'));
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
            $user = User::create($request->all());
            DB::afterCommit(function () use ($user) {
                $user->save();
            });
            DB::commit();
            return redirect()->route('users.index')
                ->with('success', 'Usuario creado correctamente.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('users.index')
                ->with('error', 'Error al crear el usuario.');
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
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

        if(!Auth::user()->hasRole('admin')){
            if(Auth::user()==$user){
                $user->update($request->all());
                session()->put('applocale', $user->idioma);
                return redirect()->route('inicio')
                    ->with('success', 'User updated successfully');
            }
        }else{
        
        $user->update($request->all());
        session()->put('applocale', $user->idioma);
        return redirect()->route('inicio')
            ->with('success', 'User updated successfully');
        }
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();

        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function checkout()
    {
        $pedido = new Pedido();
        $pedido->estado = 'En proceso';
        $pedido->direccion = Auth::user()->direcciones->first()->direccion;
        $pedido->user_id = Auth::user()->id;
        $pedido->total = 0;
        $pedido->save();
        $carrito = Auth::user()->carritos->first();
        $productos = $carrito->productoCarritos;
        $total = 0;
        foreach ($productos as $producto) {
            $pp = new ProductoPedido();
            $p = $producto->producto;
            if($p->stock < $producto->cantidad){
                return redirect()->route('inicio')
                    ->with('error', 'No hay suficiente stock de '.$p->nombre);
            }
            $p->stock = $p->stock - $producto->cantidad;
            $pp->id_producto = $producto->id;
            $pp->id_pedido = $pedido->id;
            $pp->cantidad = $producto->cantidad;
            $pp->save();
            $p->update();
            $total += $producto->precio * $producto->cantidad;
        }
        $pedido->total = $total;
        $pedido->update();
        Mail::to(Auth::user()->email)->send(new OrderConfirmation);

        return redirect()->route('inicio')
            ->with('success', 'Pedido realizado correctamente');
       
    }
}
