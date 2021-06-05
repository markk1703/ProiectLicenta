@extends('layouts.app')
@section('hd')
<title>Dashboard</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Dashboard</h1>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="rounded p-lg-2" id="blue-background">
                        <div class="d-flex flex-md-row align-items-center">
                            <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                                <p class="h4">40</p>
                                <div class="text-muted" id="count">Rețete adăugate</div>
                            </div>
                            <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                                <p class="h4">117</p>
                                <div class="text-muted" id="count">Urmăriri</div>
                            </div>
                            <div class="d-flex flex-column align-items-center px-lg-3 px-md-2 px-1" id="border-right">
                                <p class="h4">58</p>
                                <div class="text-muted" id="count">Urmăritori</div>
                            </div>
                            <div class="d-flex flex-column align-items-center px-lg-4 px-md-2 px-sm-1 px-2" id="border-right">
                                <p class="h4">03</p>
                                <div class="text-muted" id="count">Ratinguri date</div>
                            </div>
                            <div class="d-flex flex-column align-items-center px-lg-4 px-md-2 px-sm-1 px-2" id="border-right">
                                <p class="h4">05</p>
                                <div class="text-muted" id="count">Ratinguri primite</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endsection
