<div class="modal fade" tabindex="-1" id="showModalGaleria{{ $wish->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content product_data">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12"> <img src="{{ asset($wish->obras_favoritas->image_obra) }}"
                            class="img_responsive one-image-galeria"></div>
                </div>

                <div class="row mt-3">

                    @if (isset($wish->obras_favoritas->fecha_creacion))
                        <div class="col text-end">
                            <p class="fecha-obra"><span class="importante">Fecha Creación:
                                </span>{{ $wish->obras_favoritas->fecha_creacion->format('Y') }}</p>
                        </div>
                    @endif
                </div>
                @if (isset($wish->obras_favoritas->titulo_obra))
                <div class="row">
                    <div class="col">
                        <p class="titulo-obra"><span class="importante">Título:
                        </span>{{ $wish->obras_favoritas->titulo_obra }}</p>
                    </div>

                </div>
                @endif
                @if (isset($wish->obras_favoritas->descripcion_obra))
                    <div class="row">
                        <div class="col">
                            <p class="fecha-obra"><span class="importante">
                                </span>{{ $wish->obras_favoritas->descripcion_obra }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
