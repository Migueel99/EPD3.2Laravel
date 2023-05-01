@extends('layouts.dashboard')

@section('template_title')
    {{ __('Update') }} Pedido
@endsection

@section('content')
<div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
        {{ __('Actualizar') }} Pedido {{$pedido->id}}  </h2>
    <!-- CTA -->
    <!--
    <a class="flex items-center justify-between p-4 mb-8 text-sm font-semibold text-purple-100 bg-purple-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-purple"
        href="">
        <div class="flex items-center">
            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                </path>
            </svg>
            <span>Podemos poner algo</span>
        </div>
        <span>View more &RightArrow;</span>
    </a>
-->
    <div class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <form method="POST" action="{{ route('pedidos.update', $pedido->id) }}" role="form"
                            enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('pedido.form')

                        </form>
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
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
