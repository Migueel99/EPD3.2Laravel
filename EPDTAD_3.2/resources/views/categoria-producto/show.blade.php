@extends('layouts.app')

@section('template_title')
    {{ $categoriaProducto->name ?? "{{ __('Show') Categoria Producto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Categoria Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria-productos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Categoria Id:</strong>
                            {{ $categoriaProducto->categoria_id }}
                        </div>
                        <div class="form-group">
                            <strong>Productos Id:</strong>
                            {{ $categoriaProducto->productos_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
