<div class="container-fluid">
    <section id="galeria">
        <div class="text-center mb-3 mt-md-2 mb-md-3">
            <h1 class="section-title-01 display-4">Galeria</h1>
            <h2 class="section-title-02 display-6">Galeria</h2>
        </div>
        @if (Auth::check())
            <div class="row  mb-3 justify-content-end ">
                <div class="col-lg-2 col-4 col-md-4">
                    <a href="{{ route('galerias.create') }}" class="btn btn-success "><i class="fa-solid fa-plus"></i>
                        Nuevo</a>
                </div>
            </div>
        @endif
        <div class="gallery-container">
            @foreach ($artistaObras as $obras)
                @foreach ($obras as $obra)
                    <div class="gallery__item">
                        <a data-bs-toggle="modal"
                                data-bs-target="#showModal{{ $obra->id }}"><img src=" {{ asset('obras') . '/' . $obra->image_obra }}" data-img-mostrar="0"
                                alt="" class="gallery__img" /></a>
                        @if (Auth::check())
                        <div class="enlace-edit"><a href="{{ route('galerias.edit', $obra->id) }}">
                                <i class="fa-solid fa-pen"></i>
                            </a>

                        </div>
                        @endif
                    </div>
                    @include('galeria.showModal')
                @endforeach
            @endforeach
        </div>
</div>
