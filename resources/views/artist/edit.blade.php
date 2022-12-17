@extends('layouts.app')

@section('template_title')
    Edición Artista
@endsection

@section('content')
    <section>
        <div class="container mt-5" id="edit-categoria">
            <div class="row">
                <div class="col-11 col-lg-6 mx-auto form p-4 mb-5  ">
                    <form method="POST" action="{{ route('artists.update', $artist->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        <h1 class="p">Edición de artista</h1>
                        @include('artist.form')

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
