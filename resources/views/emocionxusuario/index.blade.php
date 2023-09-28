@extends('layouts.app')

@section('template_title')
    Emocionxusuario
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Emocionxusuario') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('emocionxusuarios.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Id Emocionxusuario</th>
										<th>Emocion</th>
										<th>Usuario</th>
										<th>Fecha creacion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($emocionxusuarios as $emocionxusuario)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $emocionxusuario->id_emocionxusuario }}</td>
											<td>{{ $emocionxusuario->emocion->nombre_emocion }}</td>
											<td>{{ $emocionxusuario->user->name }}</td>
											<td>{{ $emocionxusuario->created_at->format('d/m/y h:i:s A') }}</td>

                                            <td>
                                                <form action="{{ route('emocionxusuarios.destroy',$emocionxusuario->id_emocionxusuario) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('emocionxusuarios.show',$emocionxusuario->id_emocionxusuario) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('emocionxusuarios.edit',$emocionxusuario->id_emocionxusuario) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $emocionxusuarios->links() !!}
            </div>
        </div>
    </div>
@endsection
