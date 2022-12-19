@hasrole('admin')
    <div class="row">
        <div class="col mb-2">
            <a href="{{ route('events.create') }}">
                <button type="button" class="btn btn-success btn-lg mb-3">
                    <i class="fa-solid fa-plus"></i> Nuevo
                </button>
            </a>
        </div>
    </div>
@endhasrole

<div class="row row-cols-lg-2 mt-md-5 mb-md-5">
    @foreach ($events as $event)
        <div class="col-12 justify-text-center mb-3">

            <div class="card p-0 m-0" data-bs-toggle="modal"
            data-bs-target="#showModalEventos{{ $event->id }}">
                <div class="row g-0 body-tarjeta row-card-principal " >
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
                                <div class="col-5">
                                    <p><i class="fa-regular fa-clock"></i> {{ $event->hora_evento->format('h:i') }}</p>
                                </div>
                                <div class="col text-end p-0 me-2">
                                    <p>{{ $event->fecha_evento->format('d/m/Y') }}</p>
                                </div>
                            </div>
                            <p class="card-text mb-1 bold mt-2">{{ $event->category->nombre }}</p>

                            {{-- @if (count($event->artists) > 0)
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
                            @endif --}}
                            <p class="card-text mb-1 grey">{{ $event->resumen }}
                            </p>
                            <div class="col grey">
                                <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                    {{ $event->direccion }}</p>
                            </div>


                            {{-- <div class="col-12 text-end mt-2 "> <a data-bs-toggle="modal"
                                    data-bs-target="#showModalEventos{{ $event->id }}"
                                    class="btn btn-outline-info"><i class="fa-solid fa-plus"></i> Info</a></div> --}}
                        </div>
                    </div>
                </div>
                @hasrole('admin')
                    <div class="row justify-content-center align-items-center mt-3 mb-3 ">

                        <div class="col ms-2 text-end">
                            {{-- DESTROY LOCAL HTTP  --}}
                            <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                class="formulario-eliminar">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-volver"><i class="fa-solid fa-trash-can"></i>
                                    Eliminar</button>
                            </form>


                        </div>
                    @endhasrole
                    @hasrole('admin')
                        <div class="col me-2">
                            {{-- local --}}
                            <a class="btn btn-guardar" href="{{ route('events.edit', $event->id) }}"><i
                                    class="fa-solid fa-pen"></i>
                                Editar </a>


                        </div>

                    </div>
                @endhasrole
            </div>
        </div>
        @include('components.modalEventos')
    @endforeach
</div>
