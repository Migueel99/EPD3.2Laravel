<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class RolController
 * @package App\Http\Controllers
 */
class RolController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show', 'create', 'store', 'edit', 'update', 'destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rols = Rol::paginate();

        return view('rol.index', compact('rols'))
            ->with('i', (request()->input('page', 1) - 1) * $rols->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rol = new Rol();
        return view('rol.create', compact('rol'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Rol::$rules);
        /*
        $rol = Rol::create($request->all());

        return redirect()->route('rols.index')
            ->with('success', 'Rol created successfully.');
        */
        try{
            DB::beginTransaction();
            $rol = Rol::create($request->all());
            DB::afterCommit(function() use ($rol){
                $rol->save();
            });
            DB::commit();
            return redirect()->route('rols.index')
                ->with('success', 'Rol created successfully.');
        }
        catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('rols.index')
                ->with('error', 'Rol created unsuccessfully.');
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
        $rol = Rol::find($id);

        return view('rol.show', compact('rol'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rol = Rol::find($id);

        return view('rol.edit', compact('rol'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Rol $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rol $rol)
    {
        request()->validate(Rol::$rules);

        $rol->update($request->all());

        return redirect()->route('rols.index')
            ->with('success', 'Rol updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rol = Rol::find($id)->delete();

        return redirect()->route('rols.index')
            ->with('success', 'Rol deleted successfully');
    }
}
