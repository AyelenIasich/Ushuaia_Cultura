@extends('layouts.app')

@section('template_title')
    Categories Murales
@endsection

@section('content')

<div class="container" id="categoria">
    <div class="row">
        <div class="col-12 col-md-8 col-lg-7 col-xl-6 mx-auto p-4 mb-5">
            <div class="card login-card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Categorías murales') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('categories-murales.create') }}" class="btn btn-success   float-right"
                                data-placement="left"><i class="fa-solid fa-plus"></i>
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
                                    <th>Descripción</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoriesMurales as $categoriesMurale)
                                    <tr>
                                        <td>{{ ++$i }}</td>

                                        <td>{{ $categoriesMurale->nombre }}</td>
                                        <td>{{ $categoriesMurale->descripcion }}</td>
                                        <td>
                                            <form class="formulario-eliminar" action="{{ route('categories-murales.destroy', $categoriesMurale->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="mb-2 mb-md-0 me-2 btn btn-sm btn-outline-delete"><i
                                                            class="fa fa-fw fa-trash"></i></button>
                                                    <a class="btn mb-2 mb-md-0 btn-sm btn-success"
                                                        href="{{ route('categories-murales.edit', $categoriesMurale->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i></a>
                                                </div>


                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $categoriesMurales->links() !!}
                </ul>
            </nav>


        </div>
    </div>
</div>


{{--
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categories Murale') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('categories-murales.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
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

                                        <th>Nombre</th>
                                        <th>Descripcion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categoriesMurales as $categoriesMurale)
                                        <tr>
                                            <td>{{ ++$i }}</td>

                                            <td>{{ $categoriesMurale->nombre }}</td>
                                            <td>{{ $categoriesMurale->descripcion }}</td>

                                            <td>
                                                <form
                                                    action="{{ route('categories-murales.destroy', $categoriesMurale->id) }}"
                                                    method="POST">

                                                    <a class="btn btn-sm btn-success"
                                                        href="{{ route('categories-murales.edit', $categoriesMurale->id) }}"><i
                                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i
                                                            class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categoriesMurales->links() !!}
            </div>
        </div>
    </div> --}}
@endsection
