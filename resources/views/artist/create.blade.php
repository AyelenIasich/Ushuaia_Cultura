@extends('layouts.app')

@section('template_title')
    Crear Artista
@endsection

@section('content')
    <section class="content container  pt-3">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
                @hasrole('artista')
                <form action="{{ route('artists.storePerfil') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="p">Ingreso de artista</h1>
                    @include('artist.form')
                </form>
                @else
                <form method="POST" action="{{ route('artists.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <h1 class="p mb-4">Ingresar Artista</h1>
                    @include('artist.form')
                </form>
                @endhasrole
            </div>
        </div>
    </section>
@endsection
