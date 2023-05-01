@extends('layouts.dashboard')

@section('template_title')
    Favorito
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="container px-6 mx-auto grid card">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Lista de favoritos </h2>
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('favoritos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear favorito') }}
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
                                <thead >
                                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800 ">
                                        <th class="px-4 py-3 text-center">No</th>
                                    
										<th class="px-4 py-3 text-center">User Id</th>
										<th class="px-4 py-3 text-center">Productos Id</th>
                                        <th class="px-4 py-3 text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @foreach ($favoritos as $favorito)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                            <td class="px-4 py-3  text-center">{{ ++$i }}</td>
                                            
											<td class="px-4 py-3  text-center">{{ $favorito->user_id }}</td>
											<td class="px-4 py-3  text-center">{{ $favorito->productos_id }}</td>

                                            <td class="px-4 py-3  text-center">
                                                <form action="{{ route('favoritos.destroy',$favorito->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('favoritos.show',$favorito->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('favoritos.edit',$favorito->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $favoritos->links() !!}
            </div>
        </div>
    </div>
@endsection
