@extends('layouts.app')

@section('template_title')
    Update Galeria
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row pt-4 pb-5 ">
            <div class="col-12 col-md-7 col-lg-10 mx-auto">

                @includeif('partials.errors')

                <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
                    <form method="POST" action="{{ route('galerias.update', $galeria->id) }}" role="form"
                        enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        @csrf
                        <h1 class="p mb-4">Edición de obra</h1>
                        @include('galeria.form')

                    </form>

                </div>
            </div>
        </div>
    </section>
@endsection
