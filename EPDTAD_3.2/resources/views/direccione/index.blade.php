@extends('layouts.app')

@section('template_title')
    Direccione
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                
                            </span>

                             <div class="float-right">
                                <a href="{{ route('direcciones.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  <button
                                        class="flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                                        {{ __('Crear dirección') }}
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

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>

										<th>Direccion</th>
										<th>Nombre Usuario</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($direcciones as $direccione)
                                        <tr>

											<td>{{ $direccione->direccion }}</td>
											<td>{{ Auth::user()->name }}</td>

                                            <td>
                                                <form action="{{ route('direcciones.destroy',$direccione->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('direcciones.show',$direccione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('direcciones.edit',$direccione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $direcciones->links() !!}
            </div>
        </div>
    </div>
@endsection
