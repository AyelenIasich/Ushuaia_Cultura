@extends('layouts.app')

@section('template_title')
    Crear Roles
@endsection

@section('content')
    <section class="content container  pt-3" id="create-roles">
        <div class="row pt-4 pb-5 ">
            @includeif('partials.errors')
            <div class="col-10 col-md-7 col-lg-5 mx-auto form p-4 mb-5 pb-5">
                    {!! Form::model($role, ['route'=>['roles.update', $role], 'method'=>'put']) !!}
                    <h1 class="p mb-4">Editar Roles</h1>
                    @include('roles.form')
                    {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection
