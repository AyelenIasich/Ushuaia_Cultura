{{-- <div class="modal fade" tabindex="-1" id="showModal{{ $obra->id }}"> --}}
<div class="modal fade" tabindex="-1" id="showModalEventos">
    <div class="modal-dialog modal-dialog-centered ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">La ultima poesia del fin del mundo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body pt-0">
                <div class="row pe-2 ps-2">
                    <div class="col-12 p-0 container-img-modal">
                        <img src="prueba/museo.jfif" class=" img-card-eventos-modal" alt="Imagen del establecimiento" />
                        <div class="dark-filter p-0"></div>
                    </div>
                </div>
                <div class="row justify-content-between grey  mt-3">
                    <div class="col-4">
                        <p><i class="fa-regular fa-clock"></i> 12pm</p>
                    </div>
                    <div class="col text-end p-0 me-2">
                        <p>Fecha: 12/11/2022</p>
                    </div>
                </div>

                <div class="row">
                    {{-- categoria --}}
                    <div class="col mb-2 mt-2 ">
                        <p class="card-text bold ">Exposicion Artistica</p>
                    </div>
                </div>
                <div class="row">
                    {{-- artista_id apellido y nombre de los artistas --}}
                    <div class="col mb-3">
                        <p class="card-text  bold ">Artista: <span class="bold grey">Jorge Iasich</span></p>
                    </div>
                </div>
                {{-- descripcion --}}
                <div class="row mb-3">
                    <div class="col">
                        <p class="card-text mb-3 grey"> Many desktop publishing packages and web page editors now use
                            Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many
                            web sites still in their infancy. Various versions have evolved over the years, sometimes by
                            accident, sometimes on purpose (injected humour and the like). </p>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <p class="card-text mb-1 grey"> Mas Informacion sobre el encuentro: www.htsnfe.cin</p>
                    </div>
                </div>

                {{-- ubicacion --}}
                <div class="row">
                    <div class="col grey">
                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i> Museo
                            Maritimo: Av. San Martín 1052 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
