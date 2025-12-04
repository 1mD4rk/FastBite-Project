@extends('layouts.app')
<title>FastBite - Cambio de Contaseña</title>
<link href="{{ Vite::asset('resources/images/hamburguer.png') }}" rel="icon">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <a class="link-secondary link-underline-secondary mb-0" href="{{ route('login') }}"><- Volver al Login</a>
                    <p class="d-flex justify-content-center fs-3">{{ __('Cambio de contraseña') }}</p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-4 justify-content-center">
                            <div class="col-md-10">
                                <label for="email" class="form-label d-block">{{ __('Correo electrónico') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-6 text-center">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Enviar link del cambio de contraseña') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
