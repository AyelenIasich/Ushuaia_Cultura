@extends('baseGaleria')


@section('content')
    <section id="MisEventos">
        <div class="container ">


            <div class="text-center mt-2 mt-md-5">
                <h1 class="section-title-01 text-center display-4">Mi perfil</h1>
                <h2 class="section-title-02 text-center display-6">Mi perfil</h2>
            </div>

            @if (isset($artista->id))
            @else
                @can('artistas.create')
                    <div class="row">
                        <div class="col mb-2 text-end">
                            <a href="{{ route('artistas.create') }}">
                                <button type="button" class="btn btn-success  mb-3">
                                    <i class="fa-solid fa-plus"></i> Crear perfil
                                </button>
                            </a>
                        </div>
                    </div>
                @endcan
            @endif
            @foreach ($artistaObras as $obras)
                @if (count($obras) > 0)
                   <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-6  text-start">

                                <button data-bs-placement="top"
                                    data-bs-content="Podrá eliminar el perfil una vez borrada las fotos de la galeria"
                                    data-bs-title="Eliminar Perfil" data-bs-toggle="popover" class="btn btn-success"><i
                                        class="fa-solid fa-trash-can big "></i>
                                    Eliminar
                                </button>

                                </form>
                            </div>


                            <div class="col-6 text-end p-0  ">
                                <a class=" btn btn-success " href="{{ route('artistas.edit', $artista->id) }}">
                                    <i class="fa-solid fa-pen big "></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @if (isset($artista))
                @foreach ($artistaObras as $obras)
                    @if (count($obras) == 0)
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-6  text-start   ">
                                    <form class="formulario-eliminar" action="{{ route('artistas.destroy', $artista->id) }}"
                                        method="POST">
                                        <button class="btn btn-success  "><i class="fa-solid fa-trash-can big "></i>
                                            Eliminar
                                        </button>
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>


                                <div class="col-6 text-end p-0  ">
                                    <a class=" btn btn-success " href="{{ route('artistas.edit', $artista->id) }}">
                                        <i class="fa-solid fa-pen big "></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                <div class="row artista_row mt-3 ">
                    <div class="row d-md-none">
                        <div class="col">
                            <div class="text-center mt-5 mt-md-2 ">
                                <h1 class="section-title-01 display-4">{{ $artista->nombre }}</h1>
                                <h2 class="section-title-02 display-6">{{ $artista->nombre }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 order-1">
                        <div class="row d-none d-md-block">
                            <div class="col">
                                <div class="text-center  mt-md-2 ">
                                    <h1 class="section-title-01 display-4">{{ $artista->nombre }}</h1>
                                    <h2 class="section-title-02 display-6">{{ $artista->nombre }}</h2>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                        <div class="col text-end p-0  editar-artista ">
                       <a class=" btn btn-success " href="{{ route('artistas.edit', $artista->id) }}">
                           <i class="fa-solid fa-pen big "></i>
                       </a>
                   </div>
                   </div> --}}
                        <div class="row ps-md-5">
                            <div class="col-12 pt-5 pt-md-0">
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
                            <img src=" {{ asset($artista->images[0]->image) }}" class="img_responsive artista_img">
                        </div>
                    </div>
                </div>
            @endif


        </div>
    </section>

    @include('perfil-artista.migaleria')
@endsection
