@extends('layouts.app')

@section('template_title')
    Producto Pedido
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Producto Pedido') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('producto-pedido.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Id Producto</th>
										<th>Id Pedido</th>
										<th>Cantidad</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productoPedidos as $productoPedido)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $productoPedido->id_producto }}</td>
											<td>{{ $productoPedido->id_pedido }}</td>
											<td>{{ $productoPedido->cantidad }}</td>

                                            <td>
                                                <form action="{{ route('producto-pedidos.destroy',$productoPedido->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('producto-pedidos.show',$productoPedido->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('producto-pedidos.edit',$productoPedido->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $productoPedidos->links() !!}
            </div>
        </div>
    </div>
@endsection
