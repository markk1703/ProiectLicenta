@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <div class="card-header"><h3>Postări</h3>
                <form action="{{route('admin.posts.create')}}" method="GET">
                  @csrf
                  <button type="submit" class="btn btn-success btn-sm"><i class="fas fa-plus mr-1"></i>Adaugă</button>
              </form>
              </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Denumire</th>
                        <th scope="col">ID utilizator</th>
                        <th scope="col">Data</th>
                        <th scope="col">Acțiuni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($retete as $reteta)
                        <tr>
                        <th scope="row">{{$reteta->id}}</th>
                        <td>{{$reteta->denumire}}</td>
                        <td>{{$reteta->utilizator_id}}</td>
                        <td>{{$reteta->created_at}}</td>
                        <td><form action="{{route('admin.posts.destroy',$reteta->id)}}" method="POST">
                          <a class="btn btn-info btn-sm"
                              href="{{route('admin.posts.show',$reteta->id)}}"><i class="fas fa-eye"></i></a>
                          <a class="btn btn-secondary btn-sm"
                              href="{{route('admin.posts.edit',$reteta->id)}}"><i class="fas fa-edit"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
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
