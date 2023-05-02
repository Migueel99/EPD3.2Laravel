@extends('layouts.dashboard')

@section('template_title')
    {{ __('Create') }} dirección
@endsection

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Crear') }} dirección        </h2>
    <!-- CTA -->

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('direcciones.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('direccione.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
