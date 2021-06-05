@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">Adaugă un utilizator nou
                </h3>
                <div class="card-body">
                    <form action="{{ route('admin.users.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            {{-- <label for="nume" class="col-md-4 col-form-label text-md-right">{{ __('Nume') }}</label> --}}

                            <div class="col-md-6">
                                <input id="nume" type="text" class="form-control @error('nume') is-invalid @enderror" name="nume" value="{{ old('nume') }}" required autocomplete="family-name" autofocus placeholder="Nume de familie">

                                @error('nume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            {{-- <label for="prenume" class="col-md-4 col-form-label text-md-right">{{ __('Prenume') }}</label> --}}

                            <div class="col-md-6">
                                <input id="prenume" type="text" class="form-control @error('prenume') is-invalid @enderror" name="prenume" value="{{ old('prenume') }}" required autocomplete="given-name" autofocus placeholder="Prenume">

                                @error('prenume')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Nume utilizator') }}</label> --}}

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Nume de utilizator">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresa de E-mail') }}</label> --}}

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-mail">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parola') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Parolă nouă">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{-- <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmă Parola') }}</label> --}}

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirmă parola">
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Rol:</h5>
                                <select name="rol" id="rol" required>
                                    <option value="2">Utilizator</option>
                                    <option value="1">Administrator</option>
                                  </select>
                            </div>
                        </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Adaugă</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
