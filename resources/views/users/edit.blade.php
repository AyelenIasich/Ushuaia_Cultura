@extends('layouts.app')

@section('template_title')
    Asignación de roles
@endsection

@section('content')
    <div class="container" id="lista-artistas">
        <div class="row">
            <div class="col-12 col-md-8 col-lg-9 col-xl-5 mx-auto p-4 mb-5">
                <div class="card login-card">
                    <div class="card-header mt-3">
                        <span id="card_title">
                            <h3>{{ __('Asignación de roles') }}</h3>
                        </span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="table">
                                    <table class="table table-striped table-hover">
                                        <thead class="thead">
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <div class="row">
                                        <div class="col ">
                                            {{-- <form method="POST" action="{{ route('users.update', $user) }}" role="form">
                                                @csrf
                                                {{ method_field('PATCH') }} --}}
                                                {!! Form::model($user, ['route'=>['users.update', $user], 'method'=>'put']) !!}
                                                <div class="form-group mb-3 container-select grey">
                                                    <label for="roles">
                                                        <h5>Listado de Roles</h5>
                                                    </label>
                                                    @foreach ($roles as $role)
                                                        <div class="form-check ps-5 ">
                                                            <label>
                                                                {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'form-check-input']) !!}
                                                                {{ $role->name }}

                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    @if ($errors->has('roles'))
                                                        <span class="text-danger">
                                                            <strong>{{ $errors->first('roles') }}</strong>
                                                        </span>
                                                    @endif

                                                </div>

                                        </div>
                                    </div>
                                    {{-- <div class="row">
                                        <div class="col">
                                            @if (isset($user->roles))
                                                <div class="row">
                                                    <div class="col mt-3 grey">
                                                        <p>
                                                            Roles asignados:

                                                            @foreach ($user->roles as $rol)
                                                                <span class="artistas-nombres">
                                                                    {{ $rol->name }}
                                                                </span>
                                                            @endforeach
                                                        </p>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div> --}}
                                    <div class="row justify-content-center align-items-center mb-3 pt-2">
                                        <div class="col-6">


                                            <a href="/users" class="btn btn-outline-volver ">
                                                <i class="fa-solid fa-angle-left"></i> Volver</a>
                                        </div>
                                        <div class="col-6">
                                            <button class="btn btn-guardar  " type="submit">Asignar
                                                Rol</button>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}

                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2()
        })
    </script>
@endsection
