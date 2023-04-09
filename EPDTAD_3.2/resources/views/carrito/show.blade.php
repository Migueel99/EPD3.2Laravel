@extends('layouts.app')

@section('template_title')
    {{ $carrito->name ?? "{{ __('Show') Carrito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Carrito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carritos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $carrito->user_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
