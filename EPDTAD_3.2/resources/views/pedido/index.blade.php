@extends('layouts.dashboard')

@section('template_title')
    Pedido
@endsection

@section('content')
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="container px-6 mx-auto grid card">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Lista de Pedidos </h2>
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary  float-right"
                                    data-placement="left">

                                    <button
                                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        Crear Pedido
                                        <span class="ml-2" aria-hidden="true">+</span>
                                    </button>
                                </a>

                            </div>

                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
                    <br>

                    <div class=" w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                        <th class="px-4 py-3 text-center">ID</th>

                                        <th class="px-4 py-3 text-center">ID carrito</th>
                                        <th class="px-4 py-3">Estado</th>
                                        <th class="px-4 py-3 text-center">Total</th>
                                        <th class="px-4 py-3 text-center">Acciones</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($pedidos as $pedido)
                                        <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3 text-center">{{ $pedido->id }}</td>
                                            <td class="px-4 py-3 text-center">{{ $pedido->carrito_id }}</td>
                                            <td class="px-4 py-3">{{ $pedido->estado }}</td>
                                            <td class="px-4 py-3 text-center">{{ $pedido->total }}</td>
                                            <td class="px-4 py-3 text-center">
                                                <form action="{{ route('pedidos.destroy', $pedido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary "
                                                        href="{{ route('pedidos.show', $pedido->id) }}"><i
                                                            class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('pedidos.edit', $pedido->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>
                                                        {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $pedidos->links() !!}
            </div>
        </div>
    </div>
@endsection
