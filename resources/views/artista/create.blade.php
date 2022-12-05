@extends('theme.base')

@section('content')
    <section class="container pt-3">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-11 col-md-8 col-lg-7   col-xl-5 mx-auto form p-4 mb-5">
                <form action="{{ route('artistas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="p">Ingreso de artista</h1>
                    @include('artista.form')
                </form>
            </div>
        </div>
    </section>
@endsection
