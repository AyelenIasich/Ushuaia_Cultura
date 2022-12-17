<div class="modal fade" tabindex="-1" id="showModalMural{{ $murale->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title">{{ $murale->titulo_mural }}</h5> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0 product_data">
                <div class="row pe-2 ps-2 row-modal-principal">
                    <div class="col-12 p-0 container-img-modal modal-evento-img">
                        <img src="{{ asset($murale->image_mural) }}" class=" img-card-eventos-modal"
                            alt="Imagen del evento" />
                        <div class="dark-filter p-0"></div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <h5 class="modal-title">{{ $murale->titulo_mural }}</h5>
                    </div>
                </div>
                {{-- categoria --}}
                <div class="row">
                    <div class="col mb-2 mt-2 text-end">
                        <p class="card-text bold ">{{ $murale->categoriesMurale->nombre }}</p>
                    </div>
                </div>

                @if (count($murale->artists) > 0)
                    <div class="row">
                        <div class="col mb-2">

                            <div class="row">
                                <div class="col">
                                    <p>
                                    <div class="card-text bold d-inline-block ">
                                        Artistas:
                                    </div>
                                    {{-- {{$murale->artists }} --}}
                                    @foreach ($murale->artists as $artist)
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
                @if (asset($murale->descripcion_mural))
                    <div class="row mb-3">
                        <div class="col">
                            <p class="card-text mb-3 grey">{{ $murale->descripcion_mural }}</p>
                        </div>
                    </div>
                @endif
                @if (!empty($murale->info_external))
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
                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i> {{ $murale->direccion }}
                        </p>
                    </div>
                </div>
                {{-- favorito --}}
                <div class="row">
                    <div class="col mt-5">
                        <div class="wishlist-content heart-event text-end ">
                            <input type="hidden" class="mural_id" value="{{ $murale->id }}">
                            @guest
                                <a class=" btn btn-success px-2 fs-6 mt-4 mt-md-0 mb-3 mb-md-0"
                                    href="{{ route('login') }}"><i class="fa fa-heart"></i> Favorito</a>
                            @else
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <button type="button"
                                    class="add-to-whishlist-btn-mural btn btn-success btn-block shadow "><i
                                        class="fa fa-heart"></i> Favorito</button>
                            @endguest
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
