@extends('layouts.app')

@section('template_title')
    Crear Roles
@endsection

@section('content')
    <section class="content container  pt-3" id="create-roles">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5 pb-5">
                {{-- <form method="POST" action="{{ route('roles.store') }}" role="form" enctype="multipart/form-data">
                    @csrf --}}
                    {!! Form::open(['route'=>'roles.store']) !!}
                    <h1 class="p mb-4">Crear rol</h1>
                    @include('roles.form')
                    <h3 class="p mt-4">Lista de permisos</h3>
                    {!! Form::close() !!}
                {{-- </form> --}}
            </div>
        </div>
    </section>
@endsection
