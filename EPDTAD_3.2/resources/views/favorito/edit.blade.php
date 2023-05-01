@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Favorito
@endsection

@section('content')
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{ __('Actualizar') }} Producto </h2>
            <div class="content container-fluid">
                <div class="">
                    <div class="col-md-12">
    
                        @includeif('partials.errors')
    
                        <div class="card card-default">
                            
                            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                                <form method="POST" action="{{ route('favoritos.update', $favorito->id) }}" role="form"
                                    enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
    
                                    @include('favorito.form')
    
                                </form>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
