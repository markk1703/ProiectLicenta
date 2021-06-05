@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Recenzii</h3>
                </div>
                <div class="card-body">
                  <table class="table table-sm">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Rating</th>
                        <th scope="col">ID Reteta</th>
                        <th scope="col">ID Utilizator</th>
                        <th scope="col">Data</th>
                        <th scope="col">Acțiuni</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($ratings as $rating)
                        <tr>
                        <th scope="row">{{$rating->id}}</th>
                        <td>{{$rating->rating}}</td>
                        <td>{{$rating->rateable_id}}</td>
                        <td>{{$rating->user_id}}</td>
                        <td>{{$rating->created_at}}</td>
                        <td><form action="{{route('admin.ratings.destroy',$rating->id)}}" method="POST">
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
