<div class="modal fade" tabindex="-1" id="showModalEvent{{ $wish->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $wish->eventos_favoritas->titulo_evento }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 product_data">
                <div class="row pe-2 ps-2 row-modal-principal">
                    <div class="col-12 p-0 container-img-modal modal-evento-img">
                        <img src="{{ asset($wish->eventos_favoritas->image_evento) }}" class=" img-card-eventos-modal"
                            alt="Imagen del evento" />
                        <div class="dark-filter p-0"></div>
                    </div>
                </div>
                <div class="row justify-content-between grey  mt-3">
                    <div class="col-4">
                        <p><i class="fa-regular fa-clock"></i> {{ $wish->eventos_favoritas->hora_evento->format('h:i') }}</p>
                    </div>
                    <div class="col text-end p-0 me-2">
                        <p>Fecha: {{ $wish->eventos_favoritas->fecha_evento->format('d/m/Y') }}</p>
                    </div>
                </div>

                <div class="row">
                    {{-- categoria --}}
                    <div class="col mb-2 mt-2 ">
                        <p class="card-text bold ">{{ $wish->eventos_favoritas->category->nombre }}</p>
                    </div>
                </div>
                @if (count($wish->eventos_favoritas->artists) > 0)
                    <div class="row">
                        <div class="col mb-2">

                            <div class="row">
                                <div class="col">
                                    <p><div class="card-text bold d-inline-block ">
                                            Artistas:
                                    </div>
                                        @foreach ($wish->eventos_favoritas->artists as $artist)
                                            <div class="artistas-nombres me-1 d-inline-block ">
                                                {{ $artist->nombre }}
                                            </div>
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                {{-- descripcion --}}
                @if (asset($wish->eventos_favoritas->descripcion_evento))
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text mb-3 grey">{{ $wish->eventos_favoritas->descripcion_evento }}</p>
                        </div>
                    </div>
                @endif
                @if (!empty($wish->eventos_favoritas->info_external))
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text mb-1 grey"> {{ $wish->eventos_favoritas->info_external }}</p><a
                                href="{{ $wish->eventos_favoritas->external_url }}" target="_blank" cursor="pointer"
                                aria-label='Ir a enlace externo'>{{ $wish->eventos_favoritas->nombre_url }}</a>
                        </div>
                    </div>
                @endif
                {{-- ubicacion --}}
                <div class="row">
                    <div class="col grey">
                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                            {{ $wish->eventos_favoritas->institucion }} {{ $wish->eventos_favoritas->direccion }} </p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
