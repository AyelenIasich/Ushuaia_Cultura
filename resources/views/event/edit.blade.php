@extends('layouts.app')

@section('template_title')
    Edición Evento
@endsection

@section('content')
    <section>
        <div class="container mt-5  ">
            <div class="row">
                <div class="col-11 col-lg-6 mx-auto form p-4 mb-5  ">
                    <form method="POST" action="{{ route('events.update', $event->id) }}" role="form"
                        enctype="multipart/form-data">

                        {{ method_field('PATCH') }}
                        @csrf
                        <h1 class="p">Edición de evento</h1>
                        @include('event.form')
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
