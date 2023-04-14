@extends('layouts.app')

@section('template_title')
    {{ $productoCarrito->name ?? "{{ __('Show') Producto Carrito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto Carrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto-carrito.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $productoCarrito->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Id Carrito:</strong>
                            {{ $productoCarrito->id_carrito }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
