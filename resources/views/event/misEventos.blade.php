@extends('layouts.app')

@section('template_title')
    Mis Eventos
@endsection

@section('content')
    <section id="MisEventos">
        <div class="container mt-md-5 pt-md-5 mb-5 pb-5">
            <div class="text-center mt-2 mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Mis Eventos</h1>
                <h2 class="section-title-02 text-center display-6">Mis Eventos</h2>
            </div>
            @can('events.create')
            <div class="row">
                <div class="col mb-2">
                    <a href="{{ route('events.create') }}">
                        <button type="button" class="btn btn-success btn-lg mb-3">
                            <i class="fa-solid fa-plus"></i> Nuevo
                        </button>
                    </a>
                </div>
            </div>
        @endcan
@if(isset($events))
        <div class="row row-cols-lg-2 mt-md-5 mb-md-5">
            @foreach ($events as $event)
                <div class="col-12 justify-text-center mb-3">

                    <div class="card p-0 m-0">
                        <div class="row g-0 body-tarjeta row-card-principal ">
                            <div class="col-3 align-self-center justify-content-center text-center img-card-eventos">
                                <img src="{{ asset($event->image_evento) }}" class=" img-card-eventos"
                                    alt="Imagen del establecimiento" />
                                <div class="dark-filter"></div>
                            </div>
                            <div class="col-9 offset-3  align-self-center">
                                <div class="card-body ">
                                    <h5 class="card-title text-center mt-2 mb-2 bold">{{ $event->titulo_evento }}
                                    </h5>
                                    <div class="row justify-content-between grey">
                                        <div class="col-4">
                                            <p><i class="fa-regular fa-clock"></i> {{ $event->hora_evento->format('h:i') }}</p>
                                        </div>
                                        <div class="col text-end p-0 me-2">
                                            <p>{{ $event->fecha_evento->format('d/m/Y') }}</p>
                                        </div>
                                    </div>
                                    <p class="card-text mb-1 bold mt-2">{{ $event->category->nombre }}</p>

                                    @if (count($event->artists) > 0)
                                        <div class="row">
                                            <div class="col">
                                                <p><span class="card-text bold ">
                                                        Artistas:
                                                    </span>
                                                    @foreach ($event->artists as $artist)
                                                        <span class="artistas-nombres me-1">
                                                            {{ $artist->nombre }}
                                                        </span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                    <p class="card-text mb-1 grey">{{ $event->resumen }}
                                    </p>
                                    <div class="col grey">
                                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                            {{ $event->direccion }}</p>
                                    </div>


                                    <div class="col-12 text-end mt-2 "> <a data-bs-toggle="modal"
                                            data-bs-target="#showModalEventos{{ $event->id }}"
                                            class="btn btn-outline-info"><i class="fa-solid fa-plus"></i> Info</a></div>
                                </div>
                            </div>
                        </div>
                        @can('events.destroy')
                            <div class="row justify-content-center align-items-center mt-3 mb-3 ">

                                <div class="col ms-2 text-end">
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                        class="formulario-eliminar">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-volver"><i class="fa-solid fa-trash-can"></i>
                                            Eliminar</button>
                                    </form>
                                </div>
                            @endcan
                            @can('events.edit')
                                <div class="col me-2">
                                    <a class="btn btn-guardar" href="{{ route('events.edit', $event->id) }}"><i
                                            class="fa-solid fa-pen"></i>
                                        Editar </a>
                                </div>

                            </div>
                        @endcan
                    </div>
                </div>
                @include('components.modalEventos')
            @endforeach
        </div>
        @endif

            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $events->links() !!}
                </ul>
            </nav>
        </div>
    </section>
@endsection
