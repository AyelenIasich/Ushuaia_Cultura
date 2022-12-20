            <div class="modal fade" tabindex="-1" id="showModalWishModal{{ $wish->id }}">

                <div class="modal-dialog modal-dialog-centered ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body pt-0 product_data">
                            <div class="row pe-2 ps-2 row-modal-principal">
                                <div class="col-12 p-0 container-img-modal modal-evento-img">
                                    <img src="{{ asset($wish->murales_favoritos->image_mural) }}"
                                        class=" img-card-eventos-modal" alt="Imagen del evento" />
                                    <div class="dark-filter p-0"></div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <h5 class="modal-title">{{ $wish->murales_favoritos->titulo_mural }}</h5>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col mb-2 mt-2 ">
                                       <p class="card-text bold text-end ">{{ $wish->murales_favoritos->categoriesMurale->nombre }}
                                    </p>
                                </div>
                            </div>

                         @if (count($wish->murales_favoritos->artists) > 0)
                                <div class="row">
                                    <div class="col mb-2">

                                        <div class="row">
                                            <div class="col">
                                                <p>
                                                <div class="card-text bold d-inline-block ">
                                                    Artistas:
                                                </div>
                                                {{-- {{$wish->murales_favoritos->artists }} --}}
                                                @foreach ($wish->murales_favoritos->artists as $artist)
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


                            @if (asset($wish->murales_favoritos->descripcion_mural))
                                <div class="row mb-3">
                                    <div class="col">
                                        <p class="card-text mb-3 grey">{{ $wish->murales_favoritos->descripcion_mural }}
                                        </p>
                                    </div>
                                </div>
                            @endif
                           @if (!empty($wish->murales_favoritos->info_externa))
                                <div class="row mb-3">
                                    <div class="col">
                                        <p class="card-text mb-1 grey d-inline"> {{ $wish->murales_favoritos->info_externa }}
                                        </p><a href="{{ $wish->murales_favoritos->external_url }}" target="_blank"
                                            cursor="pointer"class="mural-enlace d-inline"
                                            aria-label='Ir a enlace externo'>{{ $wish->murales_favoritos->nombre_url }}</a>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col grey">
                                    <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                        {{ $wish->murales_favoritos->direccion }}
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
