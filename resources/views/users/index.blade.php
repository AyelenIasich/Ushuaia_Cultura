@extends('layouts.app')

@section('template_title')
    Lista de usuarios
@endsection

@section('content')
    <div class="container" id="lista-usuarios">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto p-4 mb-5">
                <div class="card login-card">
                    <div class="card-header mt-3">
                        <span id="card_title">
                            <h3>{{ __('Lista de Usuarios') }}</h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form class="d-flex" role="search" method="GET" action="{{route('users.index')}}">
                                    <input class="form-control me-2" name="busqueda" type="search" placeholder="jorge o jorge@example.com" aria-label="Search">
                                    <button class="btn btn-success" type="submit">Buscar</button>
                                  </form>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                <form class="formulario-eliminar"
                                                    action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="mb-2 mb-md-0 me-2 btn btn-sm btn-outline-delete"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                        <a class="btn mb-2 mb-md-0 btn-sm btn-success"
                                                            href="{{ route('users.edit', $user) }}"><i
                                                                class="fa fa-fw fa-edit"></i></a>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer pb-1">
                            <nav aria-label="Page navigation " class="mt-3 ">
                                <ul class="pagination d-flex justify-content-end">
                                    {!! $users->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
