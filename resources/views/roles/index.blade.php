@extends('layouts.app')

@section('template_title')
    Lista de roles
@endsection

@section('content')
    <div class="container" id="lista-roles">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-8 col-xl-6 mx-auto p-4 mb-5">
                <div class="card login-card">
                    <div class="card-header mt-3">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                <h3>{{ __('Lista de Roles') }}</h3>
                            </span>

                            <div class="float-right"> <a href="{{ route('roles.create') }}"
                                    class="btn btn-success  float-right" data-placement="left">
                                    <i class="fa-solid fa-plus"></i>
                                    {{ __('Nuevo') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($roles as $rol)
                                        <tr>
                                            <td>{{ $rol->id }}</td>
                                            <td>{{ $rol->name }}</td>
                                            <td>
                                                <form class="formulario-eliminar"
                                                    action="{{ route('roles.destroy', $rol->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <div class="d-flex justify-content-end">
                                                        <button type="submit"
                                                            class="mb-2 mb-md-0 me-2 btn btn-sm btn-outline-delete"><i
                                                                class="fa fa-fw fa-trash"></i></button>
                                                        <a class="btn mb-2 mb-md-0 btn-sm btn-success"
                                                            href="{{ route('roles.edit', $rol) }}"><i
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
                                    {!! $roles->links() !!}
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
