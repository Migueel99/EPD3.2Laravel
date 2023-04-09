@extends('layouts.app')

@section('template_title')
    {{ $rol->name ?? "{{ __('Show') Rol" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Rol</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('rols.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $rol->name }}
                        </div>
                        <div class="form-group">
                            <strong>Description:</strong>
                            {{ $rol->description }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
