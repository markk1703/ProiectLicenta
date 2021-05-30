@extends('layouts.app')

@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Confirmați-vă identitatea</h1>
    </div>
  </div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verificați-vă adresa de Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nou link de verificare a fost trimis la adresa dvs. de email.') }}
                        </div>
                    @endif

                    {{ __('Înainte de a continua, vă rugăm să vă verificați adresa de email pentru link-ul de confirmare.') }}
                    {{ __('Dacă nu ați primit un email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('dați click aici pentru primi altul') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
