@extends('baseGaleria')


@section('oneArtista')
    <section class="container">
        <div class="row ">
            <div class="col">

            </div>
        </div>
        <div class="row artista_row mt-3 ">
            <div class="row d-md-none">
                <div class="col">
                    <div class="text-center mt-md-2 ">
                        <h1 class="section-title-01 display-4">{{ $artista->nombre }} {{ $artista->apellido }}</h1>
                        <h2 class="section-title-02 display-6">{{ $artista->nombre }} {{ $artista->apellido }}</h2>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 order-1">
                <div class="row d-none d-md-block">
                    <div class="col">
                        <div class="text-center  mt-md-2 ">
                            <h1 class="section-title-01 display-4">{{ $artista->nombre }} {{ $artista->apellido }}</h1>
                            <h2 class="section-title-02 display-6">{{ $artista->nombre }} {{ $artista->apellido }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        {{ $artista->titulo }}
                    </div>
                    <div class="col-12 mt-3">
                        {{ $artista->subtitulo }}
                    </div>
                    <div class="col-12 mt-3">
                        {{ $artista->descripcion }}
                    </div>

                </div>
                <div class="row mt-5 justify-content-end ">
                    <div class="col-2">
                        <div class="col redes  d-xl-inline-block">

                            <a href="{{ $artista->instagram }}"><i class="fa-brands fa-instagram"></i></a>

                        </div>
                    </div>

                    <div class="col-2  redes">
                        <a href="{{ $artista->facebook }}"><i class="fa-brands fa-facebook"></i></a>
                    </div>

                    <div class="col-2  redes">
                        <a class="correo-artista" data-bs-toggle="popover" data-bs-title="Correo"
                        data-bs-content="{{ $artista->correo }}" data-bs-placement="bottom"><i
                        class="fa-regular fa-envelope"></i></a>
                    </div>


                </div>
            </div>
            <div class="col-12  col-md-6 text-center">
                <div class="col pt-3">
                    <img src=" {{ asset('images') . '/' . $artista->images[0]->image }}"
                        class="img_responsive artista_img">
                </div>
            </div>
        </div>
    </section>
    @include('components.oneGaleria')
@endsection
