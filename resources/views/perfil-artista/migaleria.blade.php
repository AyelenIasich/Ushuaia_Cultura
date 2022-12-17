
   @if (isset($artistaObras))
<div class="container-fluid">
    <section id="galeria" class="mb-5 pb-5">
        <div class="text-center mb-3 mt-md-2 mb-md-3">
            <h1 class="section-title-01 display-4">Galeria</h1>
            <h2 class="section-title-02 display-6">Galeria</h2>
        </div>
        @can('galerias.create')
            <div class="row  mb-5 justify-content-end ">
                <div class="col-lg-2 col-5 col-md-4 text-end pe-md-5 me-md-5">
                    <a href="{{ route('galerias.create') }}" class="btn   btn-success "><i class="fa-solid fa-plus"></i>
                        Nuevo</a>
                </div>
            </div>
        @endcan
        <div class="gallery-container">
            @foreach ($artistaObras as $obras)
                @foreach ($obras as $obra)
                    <div class="gallery__item">
                                <a data-bs-toggle="modal" data-bs-target="#showModal{{ $obra->id }}"><img
                                    src=" {{ asset($obra->image_obra)}}" data-img-mostrar="0"
                                    alt="" class="gallery__img" /></a>

                        <div class="row justify-content-between p-0 m-0">
                            <div class="col-6 ms-2 text-start p-0  mt-2  edition-delete ">
                                <form class="formulario-eliminar" action="{{ route('galerias.destroy', $obra->id) }}"
                                    method="POST">
                                    <button class="btn btn-outline-eliminar "><i class="fa-solid fa-trash-can big "></i>
                                    </button>
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>


                            <div class="col-6 text-end p-0 me-3 mt-2 edition-edit ">
                                <a class="btn btn-outline-eliminar" href="{{ route('galerias.edit', $obra->id) }}">
                                    <i class="fa-solid fa-pen big "></i>
                                </a>
                            </div>

                        </div>

                    </div>
                    @include('galeria.showModal')
                @endforeach
            @endforeach
        </div>
    </div>

</div>

@endif
