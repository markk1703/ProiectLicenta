@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-4">
            <div class="card">
                <div class="card-header">
                    <img src="/uploads/avatars/{{Auth::user()->imagine}}"
                        style="width:120px;height:120px;float:left;border-radius:50%;margin-right:25px;">
                    <h2 class="py-5">Actualizează-ți profilul</h2>
                    <hr>
                    <div class="card-body">
                        <div class="row mt-1">
                            <div class="col-md-4 mb-4">
                                <div>
                                    Imaginea de profil
                                </div>
                                <div class="text-muted small">
                                    Schimbă imaginea de profil
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <form enctype="multipart/form-data"
                                                action="{{ action('ProfileController@updateAvatar') }}" method="POST">
                                                @csrf
                                                <input type="file" name="imagine">
                                                <input type="hidden" name="_token" value="{{ csrf_token()}}">
                                                <input type="submit" class="pull-right btn btn-sm btn-success mt-3">
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <hr>
                        <form action="{{ action('ProfileController@updateProfile') }}" method="POST">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-4 mb-4">
                                    <div>
                                        Informații profil
                                    </div>
                                    <div class="text-muted small">
                                        Informații publice
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Nume</label>
                                                <input name="nume" class="form-control" value="{{Auth::user()->nume}}"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Prenume</label>
                                                <input name="prenume" class="form-control"
                                                    value="{{Auth::user()->prenume}}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Salvează</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="{{ action('ProfileController@updateEmail') }}" method="POST">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-4 mb-4">
                                    <div>
                                        Schimbă
                                    </div>
                                    <div class="text-muted small">
                                        adresa ta de e-mail
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Email</label>
                                                <input name="email" class="form-control" value="{{Auth::user()->email}}"
                                                    required>
                                            </div>
                                        </div>

                                    </div>
                                    <button type="submit" class="btn btn-success">Salvează</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <form action="{{ action('ProfileController@updateUsername') }}" method="POST">
                            @csrf
                            <div class="row mb-5">
                                <div class="col-md-4 mb-4">
                                    <div>
                                        Modifică
                                    </div>
                                    <div class="text-muted small">
                                        sau adaugă un nume de utilizator
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-control-label">Nume utilizator</label>
                                                <input name="username" class="form-control"
                                                    value="{{Auth::user()->username}}">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Salvează</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                            <div class="row mb-5">
                                <div class="col-md-4 mb-4">
                                    <div>
                                        Adaugă adresa
                                    </div>
                                    <div class="text-muted small">
                                        Județ și oraș
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <form method="POST" action="{{action('AdreseController@store')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Județ</label>
                                                    <select id="judet" name="judet">
                                                        <option>Alege judetul</option>
                                                        @foreach($judete as $judet => $id)
                                                        <option value="{{$id}}">
                                                            {{$judet}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="form-control-label">Localitate</label>
                                                    <select id="localitate" name="localitate">
                                                        <option>Alege</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-success" value="Adaugă"><br>
                                    </form>
                                </div>
                            </div>
                        <hr>

                        <div class="row mt-5">
                            <div class="col-md-4 mb-4">
                                <div>
                                    Parola
                                </div>
                                <div class="text-muted small">
                                    Completați câmpurile pentru a schimba parola
                                </div>
                            </div>
                            <div class="col-md-8">
                                <form action="{{ action('ProfileController@updatePassword') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Parola actuală</label>
                                                {{-- Daca exista o parola, este obligatorie introducerea ei --}}
                                                @if(Auth::user()->password)
                                                <input name="parola" class="form-control" type="password" required>
                                                @else
                                                <input name="parola" class="form-control" type="password">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Parola nouă</label>
                                                <input name="parolaNoua" class="form-control" type="password" required>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-control-label">Confirmă parola</label>
                                                <input name="parolaNoua_confirm" class="form-control" type="password"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success">Salvează</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#judet').change(function () {
                var judet_id = $(this).val();
                if (judet_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{url('get-city-list')}}?judet_id=" + judet_id,
                        success: function (res) {
                            if (res) {
                                $("#localitate").empty();
                                $("#localitate").append(
                                    '<option>Alege localitatea</option>');
                                $.each(res, function (key, val) {
                                    $("#localitate").append('<option value="' +
                                    val['nume'] + '">' + val['nume'] + '</option>');
                                });

                            } else {
                                $("#localitate").empty();
                            }
                        }
                    });
                } else {
                    $("#state").empty();
                    $("#city").empty();
                }
            });
        });

    </script>
    @endsection
