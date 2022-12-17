<div class="modal fade" tabindex="-1" id="showModal{{ $obra->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content product_data">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  ">
                    <div class="col-12"> <img src="{{ asset($obra->image_obra) }}"
                            class="img_responsive one-image-galeria"></div>
                </div>
                <div class="row mt-3 ">
                    @if (isset($obra->fecha_creacion))
                        <div class="col text-end">
                            <p class="fecha-obra"><span class="importante">Fecha Creación:
                                </span>{{ $obra->fecha_creacion->format('Y') }}</p>
                        </div>
                    @endif
                </div>
                @if (isset($obra->titulo_obra))
                    <div class="row">
                        <div class="col">

                            <p class="titulo-obra"><span class="importante">
                                </span>{{ $obra->titulo_obra }}</p>
                        </div>
                    </div>
                @endif
                @if (isset($obra->descripcion_obra))
                    <div class="row">
                        <div class="col">
                            <p class="fecha-obra"><span class="importante">
                                </span>{{ $obra->descripcion_obra }}</p>
                        </div>
                    </div>
                @endif
                <div class="wishlist-content">

                    <input type="hidden" class="obra_id" value="{{ $obra->id }}">

                    @guest
                        <div class="row">
                            <div class="col text-end">
                                <a class=" btn btn-success px-2 fs-6 mt-4 mt-md-0 mb-3 mb-md-0 text-end"
                                    href="{{ route('login') }}"><i class="fa fa-heart"></i> Favorito</a>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col text-end">
                                <meta name="csrf-token" content="{{ csrf_token() }}">
                                <button type="button" class="add-to-whishlist-btn btn btn-success btn-block shadow "><i
                                        class="fa fa-heart"></i> Favorito</button>
                            </div>
                        </div>

                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
