@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Utilizatori</h3>
                  <form action="{{route('admin.users.create')}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm">Adaugă</button>
                </form>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Nume</th>
                        <th scope="col">Prenume</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Data</th>
                        <th scope="col">Acțiuni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                        <th scope="row">{{$user->id}}</th>
                        <td>{{$user->username}}</td>
                        <td>{{$user->nume}}</td>
                        <td>{{$user->prenume}}</td>
                        <td>{{$user->rol_id}}</td>
                        <td>{{$user->created_at}}</td>
                        <td><form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                          <a class="btn btn-info btn-sm"
                              href="{{route('admin.users.show',$user->id)}}">Vezi</a>
                          <a class="btn btn-secondary btn-sm"
                              href="{{route('admin.users.edit',$user->id)}}">Editează</a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                      </form>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
