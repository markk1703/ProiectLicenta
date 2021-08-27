@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card my-3">
                <div class="card-header"><h3>Utilizatori existenți</h3>
                  <form action="{{route('admin.users.create')}}" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus mr-1"></i>Adaugă</button>
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
                              href="{{route('admin.users.show',$user->id)}}"><i class="fas fa-eye"></i></a>
                          <a class="btn btn-secondary btn-sm"
                              href="{{route('admin.users.edit',$user->id)}}"><i class="fas fa-edit"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                      </form>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
            </div>{{ $users->links() }}
        </div>
    </div>
</div>
@endsection
