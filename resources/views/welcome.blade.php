@extends('layouts.app')
@section('content')
    <body>
        <div class="jumbotron">
            <div class="container">
                <h1 class="display-4">Welcome!</h1>
                <p class="lead">Site retete</p>
                <hr class="my-4">
                <p>Retete culinare.</p>
                <p class="lead">
                    <a class="btn btn-primary btn-success" href="/login" role="button">Autentificare</a>
                    <a class="btn btn-primary btn-success" href="/register" role="button">Înregistrare</a>
                </p>
            </div>
        </div>
    </body>
@endsection
