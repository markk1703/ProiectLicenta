@extends('layouts.app')
@section('hd')
<title>Descoperă rețete</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Descoperă</h1>
    </div>
</div>
<div class="card discover scrollbar-ripe-malinka">
@include('retete.inc.galery-section')
</div>
@endsection
