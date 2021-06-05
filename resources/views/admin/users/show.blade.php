@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">{{$user->nume}} {{$user->prenume}} ({{$user->username}})
                    <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                        <a class="btn btn-secondary btn-sm"
                            href="{{route('admin.users.edit',$user->id)}}">Editeaza</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                    </form>
                </h3>
                <div class="card-body">
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
                                <div>{{$user->nume}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Prenume:</h5>
                                <div>{{$user->prenume}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Username:</h5>
                                <div>{{$user->username}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Email:</h5>
                                <div>{{$user->email}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Rol:</h5>
                                <div>
                                    @if($user->rol_id==2) user
                                    @elseif($user->rol_id==1) administrator
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h5>Postari:</h5>
                    @foreach($retete as $reteta)
                        <div class="row mb-2"><div class="col">{{$reteta->denumire}}</div>
                            <form class="col" action="{{route('admin.posts.destroy',$reteta->id)}}" method="POST">
                            <a class="btn btn-info btn-sm"
                                href="{{route('admin.posts.show',$reteta->id)}}">Vezi</a>
                            <a class="btn btn-secondary btn-sm"
                                href="{{route('admin.posts.edit',$reteta->id)}}">Editeaza</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                        </form></div>
                    @endforeach
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
