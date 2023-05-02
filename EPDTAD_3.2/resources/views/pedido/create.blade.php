@extends('layouts.dashboard')

@section('template_title')
   Crear Pedido
@endsection

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Crear') }} Pedido        </h2>
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-body">
                        <form method="POST" action="{{ route('pedidos.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('pedido.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <table>
            <tr>
                <td>
                    <div class="mx-auto" style="max-width: 800px;">
                        <a href="{{ route('pedidos.index') }}" class="btn btn-primary ">
                            <button class="flex items-center justify-between  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                {{ __('Volver') }}
                                <span class="ml-2" aria-hidden="true"></span>
                            </button>
                        </a>
                    </div>
                </td>
                <td>&nbsp;&nbsp;</td>
                <td>
                    <div class="box-footer mt20">
                        <button type="submit"
                            class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">{{ __('Enviar') }}
                            <span class="ml-2" aria-hidden="true"></span>
                        </button>
                    </div>
                </td>
            </tr>
        </table>
    </section>
@endsection

