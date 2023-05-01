@extends('layouts.dashboard')

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">{{ __('Mostrar') }} Categoría</h2>


        <div class="content container-fluid">
            <div class="col-md-12">
                <div class="box-body">

                    <label class="block text-sm">
                        <strong class="text-gray-700 dark:text-gray-400">Nombre:</strong>
                        <strong class="text-gray-700 dark:text-gray-400">{{ $categoria->name }}</strong>
                    </label>
                    <label class="block text-sm">
                        <strong class="text-gray-700 dark:text-gray-400">Descripcion:</strong>
                        <strong class="text-gray-700 dark:text-gray-400">{{ $categoria->email }}</strong>
                    </label>

                </div>
                <div class="float-right">
                    <a href="{{ route('categorias.edit', $categoria->id) }}"><button class="btn btn-danger btn-sm mt-4"><i
                        class="fas fa-fw fa-edit"></i>Editar</button></a>

                    <a href="{{ route('categorias.index') }}"><button class="btn btn-primary btn-sm mt-4">Volver</button></a>
                </div>
            </div>
        </div>
    </div>
@endsection
