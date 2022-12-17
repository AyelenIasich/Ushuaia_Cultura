<div class="modal fade" tabindex="-1" id="showModalEventos{{ $event->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $event->titulo_evento }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 product_data">
                <div class="row pe-2 ps-2 row-modal-principal">
                    <div class="col-12 p-0 container-img-modal modal-evento-img">
                        <img src="{{ asset($event->image_evento) }}" class=" img-card-eventos-modal"
                            alt="Imagen del evento" />
                        <div class="dark-filter p-0"></div>
                    </div>
                </div>
                <div class="row justify-content-between grey  mt-3">
                    <div class="col-4">
                        <p><i class="fa-regular fa-clock"></i> {{ $event->hora_evento->format('h:i') }}</p>
                    </div>
                    <div class="col text-end p-0 me-2">
                        <p>Fecha: {{ $event->fecha_evento->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div class="row">
                    {{-- categoria --}}
                    <div class="col mb-2 mt-2 ">
                        <p class="card-text bold ">{{ $event->category->nombre }}</p>
                    </div>
                </div>
                @if (count($event->artists) > 0)
                    <div class="row">
                        <div class="col mb-2">

                            <div class="row">
                                <div class="col">
                                    <p><div class="card-text bold d-inline-block ">
                                            Artistas:
                                    </div>
                                        @foreach ($event->artists as $artist)
                                            <div class="artistas-nombres me-1 d-inline-block ">
                                                {{ $artist->nombre }} {{ $artist->apellido }}
                                            </div>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- descripcion --}}
                @if (asset($event->descripcion_evento))
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text mb-3 grey">{{ $event->descripcion_evento }}</p>
                        </div>
                    </div>
                @endif
                @if (!empty($event->info_external))
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text mb-1 grey"> {{ $event->info_external }}</p><a
                                href="{{ $event->external_url }}" target="_blank" cursor="pointer"
                                aria-label='Ir a enlace externo'>{{ $event->nombre_url }}</a>
                        </div>
                    </div>
                @endif
                {{-- ubicacion --}}
                <div class="row">
                    <div class="col grey">
                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                            {{ $event->institucion }} {{ $event->direccion }} </p>
                    </div>
                </div>
                {{-- favorito --}}
                <div class="row">
                    <div class="col mt-5">
                        <div class="wishlist-content heart-event text-end ">


                            <input type="hidden" class="event_id" value="{{ $event->id }}">

                            @guest
                                <a class=" btn btn-success px-2 fs-6 mt-4 mt-md-0 mb-3 mb-md-0"
                                    href="{{ route('login') }}"><i class="fa fa-heart"></i> Favorito</a>
                            @else
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <button type="button"
                                    class="add-to-whishlist-btn-event btn btn-success btn-block shadow "><i
                                        class="fa fa-heart"></i> Favorito</button>
                            @endguest
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
