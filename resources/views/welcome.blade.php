@extends('layouts.app')
@section('hd')
<title>{{ config('app.name', 'Laravel') }}</title>
@endsection
@section('content')
<!-- Background image -->
<div
class="p-5 text-center bg-image"
style="
  background-image: url('https://image.shutterstock.com/image-photo/italian-food-background-vine-tomatoes-260nw-162331463.jpg');
  height: 400px;
"
>
<div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
  <div class="d-flex justify-content-center align-items-center h-100">
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
  </div>
</div>
</div>
<!-- Background image -->
@endsection
