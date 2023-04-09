@extends('layouts.app')

@section('template_title')
    {{ $productoPedido->name ?? "{{ __('Show') Producto Pedido" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Producto Pedido</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('producto-pedidos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Producto:</strong>
                            {{ $productoPedido->id_producto }}
                        </div>
                        <div class="form-group">
                            <strong>Id Pedido:</strong>
                            {{ $productoPedido->id_pedido }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $productoPedido->cantidad }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
