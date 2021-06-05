@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">{{$user->nume}} {{$user->prenume}} ({{$user->username}})
                    <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </h3>
                <div class="card-body">
                    <form action="{{ route('admin.users.update',$user->id)}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>ID: {{$user->id}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Nume:</h5>
                                <input name="nume" value={{$user->nume}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Prenume:</h5>
                                <input name="prenume" value={{$user->prenume}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Username:</h5>
                                <input name="username" value={{$user->username}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Email:</h5>
                                <input name="email" value={{$user->email}}>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Rol:</h5>
                                <select name="rol" id="rol">
                                    <option value="2">Utilizator</option>
                                    <option value="1">Administrator</option>
                                  </select>
                            </div>
                        </div>
                </div>
                <button type="submit" class="btn btn-success mt-2">Actualizează</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
