@extends('layouts.welcome-layout')
@section('hd')
<title>{{ config('app.name', 'Laravel') }}</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="bg" id="welcome-bg"></div>
  <div class="container-fluid text-center" id="welcome-inside">
    <div class="container">
        <h1 class="display-4">Bine ai venit</h1>
        <hr class="my-4">
        <p class="lead">
            <a class="btn btn-primary btn-success" href="/login" role="button"><i
                    class="fas fa-sign-in-alt mr-3"></i>Conectare</a>
            <a class="btn btn-primary btn-success" href="/register" role="button"><i class="fas fa-user-plus mr-3"></i>Înregistrare</a>
        </p>
    </div>
  </div>
</div>
@endsection
