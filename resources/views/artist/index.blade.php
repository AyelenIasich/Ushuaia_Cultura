@extends('layouts.app')

@section('template_title')
    Artist
@endsection

@section('content')
    <div class="container" id="lista-artistas">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-7 col-xl-5 mx-auto p-4 mb-5">
                <div class="card login-card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Artistas') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('artists.create') }}" class="btn btn-success  float-right"
                                    data-placement="left">
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
                                        <th>Nº</th>
                                        <th>Nombre</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($artists as $artist)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $artist->nombre }}</td>

                                                <td>
                                                    @hasanyrole('admin|creadorMurales|creadorEvento')
                                                    <form class="formulario-eliminar"
                                                        action="{{ route('artists.destroy', $artist->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="d-flex justify-content-end">
                                                            <button type="submit"
                                                                class="mb-2 mb-md-0 me-2 btn btn-sm btn-outline-delete"><i
                                                                    class="fa fa-fw fa-trash"></i></button>
                                                            <a class="btn mb-2 mb-md-0 btn-sm btn-success"
                                                                href="{{ route('artists.edit', $artist->id) }}"><i
                                                                    class="fa fa-fw fa-edit"></i></a>
                                                        </div>
                                                    </form>
                                                    @endhasanyrole
                                                </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <nav aria-label="Page navigation example" class="mt-3">
                    <ul class="pagination d-flex justify-content-end">
                        {!! $artists->links() !!}
                    </ul>
                </nav>

            </div>
        </div>
    </div>
@endsection
