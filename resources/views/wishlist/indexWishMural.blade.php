@extends('baseGaleria')

@section('template_title')
    Mis murales
@endsection
@section('content')
    <section id="murales-favoritos">
        <div class="container mt-md-5 pt-md-5 mb-5 pb-5">
            <div class="text-center mt-2 mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Murales favoritos</h1>
                <h2 class="section-title-02 text-center display-6">Murales favoritos</h2>
            </div>
            {{-- <div class="row row-cols-lg-2 mt-md-5 mb-md-5">
                @foreach ($wishlistMural as $wish)
                    @if (isset($wish->murales_favoritos))
                        <div class="col-12 justify-text-center mb-3">
                            <div class="card p-0 m-0 wishlist-content ">

                                <input type="hidden" class="wishlistmural_id" value="{{ $wish->id }}">
                                <div class="row justify-content-center align-items-center  ">
                                    <div class="col-6 ms-2 text-start p-0  mt-2  edition-delete ">
                                        <button class="btn btn-outline-eliminar wishlist-remove-btn-mural ">
                                            <i class="fa-solid fa-trash-can big "></i>
                                        </button>
                                    </div>
                                </div>

                                <div data-bs-toggle="modal" data-bs-target="#showModalWishModal{{ $wish->id }}">

                                    <div class="row g-0 body-tarjeta row-card-principal ">
                                        <div
                                            class="col-3 align-self-center justify-content-center text-center img-card-eventos">

                                            <img src="{{ asset($wish->murales_favoritos->image_mural) }}"
                                                class=" img-card-eventos" alt="Imagen del establecimiento" />
                                            <div class="dark-filter"></div>
                                        </div>
                                        <div class="col-9 offset-3  align-self-center">
                                            <div class="card-body ">
                                                        {{-- <h5 class="card-title text-center mt-2 mb-2 bold">{{ $wish->murales_favoritos->titulo_mural }}
                                                    </h5> --}}
                                            <p class="card-text text-end mb-0 bold mt-2">{{ $wish->murales_favoritos->categoriesMurale->nombre }}</p>


                                       
                                             @if (isset($wish->murales_favoritos->artists))
                                                  <div class="row">
                                                      <div class="col">
                                                            <p>@foreach ($wish->murales_favoritos->artists as $artist)<div class="artistas-nombres  me-1 d-inline">{{ $artist->nombre }}</div>@endforeach
                                                            </p>
                                                        </div>
                                                   </div>
                                                @endif

                                                <div class="col grey">
                                                    <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                                        {{ $wish->murales_favoritos->direccion }}</p>
                                                </div>



                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </div>

                        @include('wishlist.wishModalMural')
                    @endif
                @endforeach
            </div> --}}


            <div class="row row-cols-lg-3 row-cols-md-2 mt-md-5 mb-md-5">
                @foreach ($wishlistMural as $wish)
                    <div class="col-12 justify-text-center mb-3">
                        @if (isset($wish->murales_favoritos))
                        <div class="card p-0 m-0 wishlist-content">
                            <input type="hidden" class="wishlistmural_id" value="{{ $wish->id }}">

                            <div class="row justify-content-center align-items-center  ">
                                <div class="col-6 ms-2 text-start p-0  mt-2  edition-delete ">
                                    <button class="btn btn-outline-eliminar wishlist-remove-btn-mural ">
                                        <i class="fa-solid fa-trash-can big "></i>
                                    </button>
                                </div>
                            </div>

                            <div class=" p-0 m-0" data-bs-toggle="modal"  data-bs-target="#showModalWishModal{{ $wish->id }}">



                                <img src="{{ asset($wish->murales_favoritos->image_mural) }}" class="card-img-top mural-img" alt="Imagen del mural">
                                <div class="card-body ">
                                    <h5 class="card-title text-center mt-2 mb-2 bold">{{ $wish->murales_favoritos->titulo_mural }}
                                    </h5>
                                    <p class="card-text mb-1 bold mt-2">{{ $wish->murales_favoritos->categoriesMurale->nombre }}</p>

                                    {{-- @if (isset($murale->categoriesMurale->artists))
                                        <div class="row">
                                            <div class="col">
                                                <p><span class="card-text bold ">
                                                        Artistas:
                                                    </span>
                                                    @foreach ($murale->categoriesMurale->artists as $artist)
                                                        <span class="artistas-nombres me-1">
                                                            {{ $artist->nombre }}
                                                        </span>
                                                    @endforeach
                                                </p>
                                            </div>
                                        </div>
                                    @endif --}}

                                    <div class="col grey">
                                        <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                            {{ $wish->murales_favoritos->direccion }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('wishlist.wishModalMural')
                    @endif
                @endforeach
            </div>


            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">
                    {!! $wishlistMural->links() !!}
                </ul>
            </nav>

        </div>
    </section>
@endsection
