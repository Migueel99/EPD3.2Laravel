@extends('layouts.dashboard')

@section('content')
    <div class="container d-flex">

        <div class="row align-items-center pt-10 ">
            <form class="col-12">
                <h2 style="font-weight: bold; font-size: 2em; margin-top: 30px; text-align:center "
                    class="text-1000 fs-3 fw-bold ms-2 text-gradient">Información dirección {{$direccione->id}}</h2>
            </form>
            <br>
            <form class="mx-auto" style="max-width: 800px;">
                <div class="d-flex flex-column">
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Dirección completa:</strong>  {{ $direccione->direccion }}</label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>ID usuario:</strong> {{$direccione->user_id}} </label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Código Postal:</strong> {{$direccione->codigo_postal }} </label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Ciudad:</strong> {{$direccione->ciudad }} </label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Provincia:</strong> {{$direccione->provincia}} </label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>País:</strong> {{$direccione->pais }} </label>
                    </div>
                </div>
                <br>
            </form>
            <div  class="mx-auto" style="max-width: 800px;">
                <a href="{{ route('direcciones.index') }}" class="btn btn-primary ">
                    <button
                        class="flex items-center justify-between  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Volver') }}
                        <span class="ml-2" aria-hidden="true"></span>
                    </button>
                </a>
            </div>
            
        </div>
    @endsection
