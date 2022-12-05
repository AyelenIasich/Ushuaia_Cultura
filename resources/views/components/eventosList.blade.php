<section id="eventos">
    <div class="container mt-md-5 pt-md-5 mb-5 pb-5">
        <div class="text-center mt-2 mt-md-5 mb-md-5">
            <h1 class="section-title-01 text-center display-4">Eventos Artísticos</h1>
            <h2 class="section-title-02 text-center display-6">Eventos Artísticos</h2>
        </div>
        @if (Auth::check())
            <div class="row">
                <div class="col mb-2">
                    <button type="button" class="btn btn-success btn-lg mb-3">
                        <i class="fa-solid fa-plus"></i> Nuevo
                    </button>
                </div>
            </div>
        @endif
        <div class="row row-cols-lg-2 mt-md-5 mb-md-5">
            <div class="col-12 justify-text-center mb-3">
                <div class="card p-0 m-0">
                    <div class="row g-0 body-tarjeta row-card-principal ">
                        <div class="col-3 align-self-center justify-content-center text-center img-card-eventos">
                            {{-- Anterior estilo de la imagen --}}
                            {{-- <img src="prueba/museo.jfif" class="img-fluid rounded-start img-card-eventos"
                            alt="Imagen del establecimiento" /> --}}
                            <img src="prueba/museo.jfif" class=" img-card-eventos" alt="Imagen del establecimiento" />
                            <div class="dark-filter"></div>
                        </div>
                        <div class="col-9 offset-3  align-self-center">
                            <div class="card-body ">
                                <h5 class="card-title text-center mt-2 mb-2 bold">La ultima poesia del fin del mundo
                                </h5>
                                <div class="row justify-content-between grey">
                                    <div class="col-4">
                                        <p><i class="fa-regular fa-clock"></i> 12pm</p>
                                    </div>
                                    <div class="col text-end p-0 me-2">
                                        <p>Fecha: 12/11/2022</p>
                                    </div>
                                </div>
                                <p class="card-text mb-1 bold mt-2">Exposicion Artistica</p>
                                <p class="card-text mb-1 bold ">Artista: <span class="bold grey">Jorge Iasich</span></p>
                                <p class="card-text mb-1 grey"> Tematica: El encuentro del arte en el fin del mundo.</p>
                                <div class="col grey">
                                    <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i> Av. San Martín 1052 </p>
                                </div>


                                <div class="col-12 text-end mt-2 "> <a data-bs-toggle="modal"
                                        data-bs-target="#showModalEventos" class="btn btn-outline-info"><i
                                            class="fa-solid fa-plus"></i> Info</a></div>



                            </div>
                        </div>
                    </div>
                    @if (Auth::check())
                        <div
                            class="col-sm-8 offset-sm-3 col-md-5 offset-md-7 col-lg-7 offset-lg-5 col-xl-6 offset-xl-6 col-xxl-5 offset-xxl-7 mb-3 ps-1 align-self-center">
                            <button class="btn btn-eliminar"><i class="fa-solid fa-trash-can"></i> Eliminar</button>
                            <button class="btn btn-success ps-4 pe-4 ms-2">
                                <i class="fa-solid fa-pen"></i>
                                Editar
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('components.modalEventos')
    </div>
</section>
