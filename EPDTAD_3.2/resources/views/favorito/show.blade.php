@extends('layouts.app')

@section('template_title')
    {{ $favorito->name ?? "{{ __('Show') Favorito" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Favorito</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('favoritos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>User Id:</strong>
                            {{ $favorito->user_id }}
                        </div>
                        <div class="form-group">
                            <strong>Productos Id:</strong>
                            {{ $favorito->productos_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
