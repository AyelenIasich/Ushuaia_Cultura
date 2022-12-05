<div class="modal fade" tabindex="-1" id="showModal{{ $obra->id }}">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row  ">
                    <div class="col-12"> <img src="{{ asset('obras') . '/' . $obra->image_obra }}"
                            class="img_responsive one-image-galeria"></div>
                </div>
                <div class="row mt-3 justify-content-between">
                    <div class="col-6">
                        <p class="titulo-obra"><span class="importante">Título:
                        </span>{{ $obra->titulo_obra }}</p>
                    </div>
                    @if (isset($obra->descripcion_obra))
                        <div class="col-6">
                            <p class="fecha-obra"><span class="importante">Fecha Creación:
                                </span>{{ $obra->fecha_creacion }}</p>
                        </div>
                    @endif
                </div>
                @if (isset($obra->descripcion_obra))
                    <div class="row">
                        <div class="col">
                            <p class="fecha-obra"><span class="importante">Descripción:
                                </span>{{ $obra->descripcion_obra }}</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
