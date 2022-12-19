<div class="container-fluid">
    <section id="artistas" class=" pb-5 pb-md-0">
        <div class="text-center mt-md-2 mb-md-5">
            <h1 class="section-title-01 display-4">Artistas Locales</h1>
            <h2 class="section-title-02 display-6">Artistas Locales</h2>
        </div>


        <!--================= SWIPER ARTISTS' CAROUSEL ==================-->

        @hasrole('admin')
            <div class="row  mb-3 justify-content-end ">
                <div class="col-lg-2 col-4 col-md-4 text-end me-3">
                    <a href="{{ route('artistas.create') }}" class="btn btn-success  "><i class="fa-solid fa-plus"></i>
                        Nuevo</a>
                </div>
            </div>
            @endhasrole
                <div id="artistasC">
                    <section class="mb-5">
                        <div class="swiper mySwiper">
                            <div class="swiper-wrapper">
                                @foreach ($artistas as $artista)
                                    @foreach ($artista as $artist)
                                        <div class="swiper-slide">
                                            <div class="card-tarjeta">
                                                <div class="row">
                                                    <div class="col-12">

                                                        <div class="row justify-content-between p-0 m-0">
                                                            @hasrole('admin')
                                                                <div class="col ms-2 text-start p-0 m-0 transform">
                                                                    {{-- LOCAL --}}
                                                                    <form action="{{ route('artistas.destroy', $artist->id) }}"
                                                                        class="formulario-eliminar" method="POST">


                                                                        <button class="btn btn-outline-eliminar "><i
                                                                                class="fa-solid fa-trash-can big "></i>
                                                                        </button>
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </div>
                                                            @endhasrole
                                                            @hasrole('admin')
                                                                <div class="col text-end p-0 me-2 enlace-edit transform">
                                                                    <a class="btn btn-outline-eliminar"
                                                                        href="{{ route('artistas.edit', $artist->id) }}">
                                                                        <i class="fa-solid fa-pen big "></i>
                                                                    </a>
                                                                </div>
                                                            @endhasrole
                                                        </div>

                                                        <div class="contenedor-imagen">
                                                            <div class="card_image">
                                                                    <img src=" {{ asset($artist->cover_carousel)}}"
                                                                    alt="Imagen de los artistas" />
                                                                <div class="col-12 ">
                                                                    <div class="enlace-galeria">
                                                                        <a href="{{ url('/artista/' . $artist->id) }}">
                                                                            Galeria</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="card_content">
                                                            <h3 class="card_title mt-3"> {{$artist->nombre}} </h3>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            </div>
                    </section>
                </div>
            </section>
        </div>
