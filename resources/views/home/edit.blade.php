@extends('theme.base')

@section('content')
    <div class="container mt-5 pt-5" id="home-edit">
        <div class="row pt-4 pb-5 ">
            <div class="col-12 col-lg-4 mb-3">
                <div class="card-generica mb-4">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col text-center">
                                <h4>Imágenes del Carousel</h4>
                            </div>
                        </div>
                @if (count($homes->home_images) > 0)


                    <div class="row row-cols-2">
                        @foreach ($homes->home_images as $img)
                            <div class="col text-end">
                                <form action="{{ url('home' . '/deleteimage/' . $img->id) }}" method="post">
                                    <button class="btn btn-outline-eliminar p-0"><i class="fa-solid fa-trash-can"></i>
                                    </button>
                                    @csrf
                                    @method('delete')
                                </form>
                                <img src=" {{ asset('carousel') . '/' . $img->image }}" class="img_responsive img-peque"
                                  >
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            </div>
            </div>
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
                <form action="{{ url('/home/' . $homes->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    {{ method_field('PUT') }}
                    <h1 class="p">Edición de carousel</h1>
                    @include('home.form')
                </form>
            </div>
        </div>
    </div>
@endsection
