@extends('baseGaleria')

@section('content')
    <section id="wishlist-index">
        <div class="container pt-md-5 mb-5 pb-5">
            <div class="text-center mt-md-5 mb-md-5">
                <h1 class="section-title-01 text-center display-4">Mi Galería </h1>
                <h2 class="section-title-02 text-center display-6">Mi Galería</h2>
            </div>

            <div class="gallery-container">
                @foreach ($wishlist as $wish)
                    @if (isset($wish->obras_favoritas))
                        <div class="gallery__item wishlist-content">

                                <input type="hidden" class="wishlist_id" value="{{ $wish->id }}">
                                <div class="row justify-content-between p-0 m-0">
                                    <div class="col-6 ms-2 text-start p-0  mt-2  edition-delete ">
                                        <button class="btn btn-outline-eliminar wishlist-remove-btn ">
                                            <i class="fa-solid fa-trash-can big "></i>
                                        </button>
                                    </div>
                                </div>

                                <a data-bs-toggle="modal" data-bs-target=" #showModalGaleria{{ $wish->id }}"><img
                                        src=" {{ asset($wish->obras_favoritas->image_obra) }}" data-img-mostrar="0"
                                        alt="" class="gallery__img" /></a>

                        </div>


                        @include('wishlist.wishModalGaleria')
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
