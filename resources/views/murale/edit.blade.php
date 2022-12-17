@extends('layouts.app')

@section('template_title')
    Edición Mural
@endsection

@section('content')

<section>
    <div class="container mt-5  ">
        <div class="row">
            <div class="col-11 col-lg-6 mx-auto form p-4 mb-5  ">
                <form method="POST" action="{{route('murales.update', $murale->id) }}" role="form"
                    enctype="multipart/form-data">
                    {{ method_field('PATCH') }}
                    @csrf
                    <h1 class="p">Edición de mural</h1>
                    @include('murale.form')
                </form>
            </div>
        </div>
    </div>
</section>


    {{-- <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Murale</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('murales.update', $murale->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('murale.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
