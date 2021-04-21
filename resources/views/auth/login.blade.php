@extends('layouts.app')
@section('hd')
<title>Login</title>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Autentificare') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nume utilizator/E-mail') }}</label> --}}

                            <div class="col-md-6">
                                <input id="username" type="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="E-mail sau nume de utilizator">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Parolă">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt mr-3"></i>
                                    {{ __('Conectare') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Ați uitat parola?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="col-m-2">
                            sau
                        </div>
                        <div class="col-m-2">
                            <a href="/auth/facebook" class="btn btn-secondary"><i class="fab fa-facebook-f mr-3"></i>Conectare cu Facebook</a>
                        </div>
                        <div class="col-m-2 pt-2">
                            <a href="/auth/google" class="btn btn-secondary"><i class="fab fa-google mr-3"></i>Conectare cu Google</a>
                        </div>
                
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
