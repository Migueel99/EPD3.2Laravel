@extends('layouts.dashboard')

@section('content')
    <div class="container d-flex">

        <div class="row align-items-center pt-10">
            <form class="col-12">
                <h2 style="font-weight: bold; font-size: 2em; margin-top: 30px; text-align:center "
                    class="text-1000 fs-3 fw-bold ms-2 text-gradient">Información de {{ $producto->nombre }}</h2>
            </form>
            <br>
            <form class="mx-auto" style="max-width: 800px;">
                <div class="d-flex flex-column">
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Nombre:</strong> {{ $producto->nombre }}</label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Descripción:</strong> {{ $producto->descripcion }}</label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Precio/Unidad:</strong> {{ $producto->precio }} €</label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Stock:</strong> {{ $producto->stock }}</label>
                    </div>
                    <div class="col-12 mb-3">
                        <label style="font-size: 1.5em;"><strong>Galería:</strong></label>
                        <div class="d-flex">
                            <img src="{{ asset('img/productos/' . $producto->imagen) }}" class="w-100" height="200"
                                alt="Imagen de {{ $producto->nombre }}" />
                        </div>
                    </div>
                </div>
                <br>
            </form>
            <div  class="mx-auto" style="max-width: 800px;">
                <a href="{{ route('productos.index') }}" class="btn btn-primary ">
                    <button
                        class="flex items-center justify-between  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        {{ __('Volver') }}
                        <span class="ml-2" aria-hidden="true"></span>
                    </button>
                </a>
            </div>
            
        </div>
    @endsection
