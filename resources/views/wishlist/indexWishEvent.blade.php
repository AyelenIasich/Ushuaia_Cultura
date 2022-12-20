@extends('baseGaleria')

@section('content')
    <section id="wishlist-indexevent">
        <div class="container pt-md-5 mb-5 pb-5">
            <div class="text-center mt-md-5 pt-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Mis Eventos </h1>
                <h2 class="section-title-02 text-center display-6">Mis Eventos</h2>
            </div>

            <div class="row row-cols-lg-2 mt-md-5 mb-md-5">

                @foreach ($wishlistEvent as $wish)
                    @if (isset($wish->eventos_favoritas))
                        <div class="col-12 justify-text-center mb-3">
                            <div class="card p-0 m-0 wishlist-content">

                                <input type="hidden" class="wishlistevent_id" value="{{ $wish->id }}">
                                <div class="row justify-content-center align-items-center ">
                                    <div class="col-6 ms-2 text-start p-0  mt-2  edition-delete "> <button
                                            class="btn btn-outline-eliminar wishlist-remove-btn-event "><i
                                                class="fa-solid fa-trash-can big "></i>
                                        </button>
                                        </form>
                                    </div>

                                </div>
                                <div data-bs-toggle="modal" data-bs-target="#showModalEvent{{ $wish->id }}">

                                    <div class="row g-0 body-tarjeta row-card-principal ">
                                        <div
                                            class="col-3 align-self-center justify-content-center text-center img-card-eventos">
                                            <img src="{{ asset($wish->eventos_favoritas->image_evento) }}"
                                                class=" img-card-eventos" alt="Imagen del establecimiento" />
                                            <div class="dark-filter"></div>
                                        </div>
                                        <div class="col-9 offset-3  align-self-center">
                                            <div class="card-body ">
                                                <h5 class="card-title text-center mt-2 mb-2 bold">
                                                    {{ $wish->eventos_favoritas->titulo_evento }}
                                                </h5>
                                                <div class="row justify-content-between grey">
                                                    <div class="col-5">
                                                        <p><i class="fa-regular fa-clock"></i>
                                                            {{ $wish->eventos_favoritas->hora_evento->format('h:i') }}</p>
                                                    </div>
                                                    <div class="col text-end p-0 me-2">
                                                        <p>{{ $wish->eventos_favoritas->fecha_evento->format('d/m/Y') }}</p>
                                                    </div>
                                                </div>
                                                <p class="card-text mb-1 bold mt-2">
                                                    {{ $wish->eventos_favoritas->category->nombre }}</p>
                                                {{--
                                            @if (count($wish->eventos_favoritas->artists) > 0)
                                                <div class="row">
                                                    <div class="col">
                                                        <p><span class="card-text bold ">
                                                                Artistas:
                                                            </span>
                                                            @foreach ($wish->eventos_favoritas->artists as $artist)
                                                                <div class="artistas-nombres me-1">
                                                                    {{ $wish->eventos_favoritas->nombre }}
                                                                </div>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif --}}
                                                <p class="card-text mb-1 grey">{{ $wish->eventos_favoritas->resumen }}
                                                </p>
                                                <div class="col grey">
                                                    <p class="card-text text-end"><i class="fa-solid fa-location-pin"></i>
                                                        {{ $wish->eventos_favoritas->direccion }}</p>
                                                </div>
                                            </div>
                                        </div>





                                    </div>
                                </div>
                            </div>

                        </div>
                        @include('wishlist.wishModalEvent')
                    @endif
                @endforeach
            </div>
            <nav aria-label="Page navigation " class="mt-3">
                <ul class="pagination d-flex justify-content-end">

                </ul>
            </nav>
        </div>
    </section>
@endsection
