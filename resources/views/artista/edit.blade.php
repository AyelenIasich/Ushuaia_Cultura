@extends('theme.base')

@section('content')

    <div class="container mt-5" >
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card-generica mb-4">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col text-center">
                                        <h4>Imagen del Carousel</h4>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col text-center">
                                        @if ($artista->cover_carousel)
                                            <div class="row">
                                                <div class="col mx-auto mt-3">
                                                 {{--    <img
                                                        src="{{ asset('cover') . '/' . $artista->cover_carousel }}"
                                                        class="img_responsive" style="max-height:150px;, max-width:150px;"> --}}
                                                        <img
                                                        src="{{ asset($artista->cover_carousel)}}"
                                                        class="img_responsive" style="max-height:150px;, max-width:150px;">
                                                </div>
                                                {{-- <form action="{{ url('/artistas' . '/deletecover/' . $artista->id) }}"
                                                    method="post">
                                                    <div class="row">
                                                        <div class="col text-end">
                                                            <button class="btn btn-outline-eliminar big "><i
                                                                    class="fa-solid fa-trash-can"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    @csrf
                                                    @method('delete')
                                                </form> --}}
                                            </div>

                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-generica">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col text-center">
                                        <h4>Imágenes personales</h4>
                                    </div>
                                </div>
                                @if (count($artista->images) > 0)
                                    <div class="row row-cols-2 ">
                                        @foreach ($artista->images as $img)
                                            <div class="col col-md-4 col-lg-6 mb-3  text-center  p-0 contenedor-delete">
                                                <form class="delete-icon"
                                                    action="{{ url('artistas' . '/deleteimage/' . $img->id) }}"
                                                    method="post">
                                                    <button class="btn  p-0 btn-outline-eliminar"><i
                                                            class="fa-solid fa-trash-can big"></i>
                                                    </button>
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                {{-- <img src=" {{ asset('images') . '/' . $img->image }}" class="img_responsive"
                                                    style="max-height:150px;, max-width:150px;"> --}}
                                                    <img src=" {{ asset($img->image)}}" class="img_responsive"
                                                    style="max-height:150px;, max-width:150px;">
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-11 col-lg-6 mx-auto form p-4 mb-5  " >
                <form method="POST" action="{{ route('artistas.update', $artista->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <h1 class="p">Edición de artista</h1>
                    @include('artista.form')
                </form>
            </div>
        </div>
    </div>
@endsection
