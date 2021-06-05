@extends('layouts.app')
@section('hd')
<title>Profil</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-fluid">
    <div class="bg"></div>
    <div class="container-fluid text-center">
        <h1 class="display-4">Editare profil</h1>
    </div>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="/uploads/avatars/{{Auth::user()->imagine}}"
                        style="width:120px;height:120px;float:left;border-radius:50%;margin-right:25px;">
                    <h2 class="py-5">{{Auth::user()->nume}} {{Auth::user()->prenume}}</h2>
                    <hr>
                    <div class="card-body">
                        <div class="row mt-1">
                            @include('profile.inc.profile-accordion')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
