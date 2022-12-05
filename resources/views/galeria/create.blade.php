@extends('layouts.app')

@section('template_title')
    Create Galeria
@endsection

@section('content')
    <section class="content container  pt-3">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5">
                <form action="{{ route('galerias.store') }}" role="form" method="POST" enctype="multipart/form-data">
                    @csrf
                    <h1 class="p mb-4">Ingreso de obra</h1>
                    @include('galeria.form')
                </form>
            </div>
        </div>
    </section>
@endsection
