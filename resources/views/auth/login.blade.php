@extends('layouts.app')

@section('content')

    <div class="container" id="login">
        <div class="row justify-content-center mt-5">
            <div class="col-11 col-md-6 col-xl-5">
                <div class="login-class-container">
                    <div class="login-card">
                        <div class="login-card-header">
                            <div class="row ">
                                <div class="col-12 text-center mt-5 mb-4">
                                    <h1>Ingresar</h1>
                                </div>
                                <div class="col-12 text-center mb-3">
                                    <div>Ingrese para hacer uso de la plataforma</div>
                                </div>
                            </div>
                        </div>

                        {{-- <form method="POST" action="{{ route('login') }}"class="login-card-form"> --}}
                            <form method="POST"action="{{ secure_url('/login') }}" class="login-card-form">
                            @csrf



                            <div class="row mb-3">
                                <label for="email"
                                    class="col-10 col-md-8 mx-auto col-form-label ">{{ __('Email') }}</label>
                                <div class="col-10 col-md-8 mx-auto  form-item">

                                    <span class="form-item-icon material-symbols-rounded">email</span>
                                    <input type="email" id="email" placeholder="maria@gmail.com"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-10 col-md-8 mx-auto col-form-label ">{{ __('Contraseña') }}</label>
                                <div class="col-10 col-md-8 mx-auto  form-item">

                                    <span class="form-item-icon material-symbols-rounded">lock</span>
                                    <input type="password" id="password" placeholder="RmZgWLtJ!9pZurYe"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <div class="row mb-3">
                                <div class="col-5 col-md-4 ms-5 ps-md-5 offset-md-1 ">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Recuérdame') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-10 ms-5  col-md-5 ">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Olvide mi contraseña') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-10  col-md-8 mx-auto">
                                    <button type="submit" class="btn btn-ingresar">
                                        {{ __('Ingresar') }}
                                    </button>

                                </div>
                            </div>

                        </form>
                        <div class="row">
                            <div class="col text-center mb-5">
                                <div class="login-card-footer">
                                    ¿No tienes una cuenta? <a   href="{{ route('register') }}">Crea una cuenta gratuita</a>.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </div>

    </div>
@endsection
