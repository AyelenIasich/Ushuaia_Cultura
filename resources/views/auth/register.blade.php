@extends('layouts.app')

@section('content')
    <div class="container" id="registracion">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6 col-xl-5">
                <div class="login-card">
                    <div class="login-card-header">
                        <div class="row ">
                            <div class="col-12 text-center mt-5 mb-4">
                                <h1>Registrarse</h1>
                            </div>
                            <div class="col-12 text-center mb-3">
                                <div>Bienvenido!! Esperamos que disfrute la plataforma</div>
                            </div>
                        </div>
                    </div>


                    <form method="POST" action="{{ route('register') }}" class="login-card-form">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-10 col-md-8 mx-auto col-form-label">{{ __('Nombre') }}</label>

                            <div class="col-10 col-md-8 mx-auto  form-item">
                                <span class="form-item-icon material-symbols-rounded">account_circle</span>
                                <input id="name" type="text" placeholder="Maria"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="email" class="col-10 col-md-8 mx-auto col-form-label">{{ __('Email') }}</label>

                            <div class="col-10 col-md-8 mx-auto  form-item">
                                <span class="form-item-icon material-symbols-rounded">email</span>
                                <input id="email" type="email" placeholder="maria@gmail.com"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-10 col-md-8 mx-auto col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-10 col-md-8 mx-auto  form-item">
                                <span class="form-item-icon material-symbols-rounded">lock</span>
                                <input id="password" type="password" placeholder="RmZgWLtJ!9pZurYe"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label
                                for="password-confirm"class="col-10 col-md-8 mx-auto col-form-label">{{ __('Confirmar Password') }}</label>

                            <div class="col-10 col-md-8 mx-auto  form-item">
                                <span class="form-item-icon material-symbols-rounded">lock</span>
                                <input id="password-confirm" type="password" class="form-control" placeholder="RmZgWLtJ!9pZurYe"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-10 col-md-8 mx-auto mb-5 mt-3">
                                <button type="submit" class="btn btn-ingresar">
                                    {{ __('Registrarse') }}
                                </button>

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
