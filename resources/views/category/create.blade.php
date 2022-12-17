@extends('layouts.app')

@section('template_title')
    Crear Categoría
@endsection

@section('content')
    <section class="container pt-3" id="categoria-create">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-11 col-md-8 col-lg-7   col-xl-5 mx-auto form p-4 mb-5">
                <form method="POST" action="{{ route('categories.store') }}" role="form" enctype="multipart/form-data">
                    @csrf
                    <h1 class="p">Ingreso de categoría</h1>
                    @include('category.form')
                </form>
            </div>
        </div>
    </section>
@endsection
