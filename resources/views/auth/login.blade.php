@extends('layouts.app')
<title>FastBite - Login</title>
<link href="{{ Vite::asset('resources/images/hamburguer.png') }}" rel="icon">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header"><br><p class="d-flex justify-content-center fs-3">{{ __('Login') }}</p></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <label for="name" class="form-label">{{ __('Nombre de Usuario') }}</label>

                                <div>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ __('El usuario o la contraseña no coinciden.') }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-8">
                                <label for="password" class="form-label">{{ __('Contraseña') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-5">
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-9 text-center">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Ingresar') }}
                                </button>
                            </div>
                        </div>
                    
                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="link-danger link-underline-danger" href="{{ route('password.request') }}">
                                    {{ __('¿Olvidaste tu contraseña?') }}
                                </a>
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-8 text-center">
                                <a class="link-danger link-underline-danger" href="{{ route('register') }}">
                                    {{ __('¿No tienes cuenta?') }}
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection