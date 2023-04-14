<?php

namespace App\Http\Controllers;

use App\Models\Direccione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
/**
 * Class DireccioneController
 * @package App\Http\Controllers
 */
class DireccioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $direcciones = Direccione::paginate();

        return view('direccione.index', compact('direcciones'))
            ->with('i', (request()->input('page', 1) - 1) * $direcciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direccione = new Direccione();
        return view('direccione.create', compact('direccione'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Direccione::$rules);
        /*
        $direccione = Direccione::create($request->all());

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccione created successfully.');
        */
        try{
            DB::beginTransaction();
            $direccione = Direccione::create($request->all());
            DB::afterCommit(function() use ($direccione){
                $direccione->save();
            });
            DB::commit();
            return redirect()->route('direcciones.index')
                ->with('success', 'Direccione created successfully.');
        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('direcciones.index')
                ->with('success', 'Direccione created unsuccessfully.');
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
        $direccione = Direccione::find($id);

        return view('direccione.show', compact('direccione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $direccione = Direccione::find($id);

        return view('direccione.edit', compact('direccione'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Direccione $direccione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccione $direccione)
    {
        request()->validate(Direccione::$rules);

        $direccione->update($request->all());

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $direccione = Direccione::find($id)->delete();

        return redirect()->route('direcciones.index')
            ->with('success', 'Direccione deleted successfully');
    }
}
