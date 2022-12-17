@extends('componentsHome')

@section('template_title')
    Totalidad de murales
@endsection
@section('content')
    <section id="murales">
        <div class="container mt-md-5 pt-md-5 mb-5 pb-5">
            <div class="text-center mt-2 mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Edición de murales</h1>
                <h2 class="section-title-02 text-center display-6">Edición de murales</h2>
            </div>

            <div class="row">
                <div class="col mb-2">
                    <a href="{{ route('murales.create') }}">
                        <button type="button" class="btn btn-success btn-lg mb-3">
                            <i class="fa-solid fa-plus"></i> Nuevo
                        </button>
                    </a>
                </div>
            </div>

            <div class="row row-cols-lg-3 row-cols-md-2 mt-md-5 mb-md-5">
                @foreach ($murales as $murale)
                    <div class="col-12 justify-text-center mb-3">

                        <div class="card">
                            <div class=" p-0 m-0" data-bs-toggle="modal" data-bs-target="#showModalMural{{ $murale->id }}">



                                <img src="{{ asset($murale->image_mural) }}" class="card-img-top mural-img" alt="Imagen del mural">
                                <div class="card-body ">
                                    <h5 class="card-title text-center mt-2 mb-2 bold">{{ $murale->titulo_mural }}
                                    </h5>
                                    <p class="card-text mb-1 bold mt-2">{{ $murale->categoriesMurale->nombre }}</p>

                                    {{-- @if (isset($murale->categoriesMurale->artists))
                                        <div class="row">
                                            <div class="col">
                                                <p><span class="card-text bold ">
                                                        Artistas:
                                                    </span>
                                                    @foreach ($murale->categoriesMurale->artists as $artist)
                                                        <span class="artistas-nombres me-1">
                                                            {{ $artist->nombre }}
                                                        </span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    @endif --}}

                                    <div class="col grey">
                                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                            {{ $murale->direccion }}</p>
                                    </div>
                                </div>
                            </div>

                            @hasrole('creadorMurales')
                                <div class="row justify-content-center align-items-center mt-3 mb-3 ">

                                    <div class="col ms-2 text-end">
                                        <form action="{{ route('murales.destroy', $murale->id) }}" method="POST"
                                            class="formulario-eliminar">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-volver"><i class="fa-solid fa-trash-can"></i>
                                                Eliminar</button>
                                        </form>
                                    </div>
                                @endhasrole
                                @hasrole('creadorMurales')
                                    <div class="col me-2">
                                        <a class="btn btn-guardar" href="{{ route('murales.edit', $murale->id) }}"><i
                                                class="fa-solid fa-pen"></i>
                                            Editar </a>
                                    </div>

                                </div>
                            @endhasrole


                        </div>



                    </div>
                    @include('components.muralModal')
                @endforeach
            </div>
            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $murales->links() !!}
                </ul>
            </nav>

        </div>
    </section>
@endsection
