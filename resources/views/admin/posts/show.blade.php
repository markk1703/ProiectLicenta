@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>{{$reteta->denumire}}</h3>
                    <form action="{{route('admin.posts.destroy',$reteta->id)}}" method="POST">
                        <a class="btn btn-secondary btn-sm"
                            href="{{route('admin.posts.edit',$reteta->id)}}">Editeaza</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <div>Utilizator: {{$user->nume}} {{$user->prenume}} ({{$user->username}})</div>
                                <form action="{{route('admin.users.destroy',$user->id)}}" method="POST">
                                    <a class="btn btn-info btn-sm"
                                        href="{{route('admin.users.show',$user->id)}}">Vezi</a>
                                    <a class="btn btn-secondary btn-sm"
                                        href="{{route('admin.users.edit',$user->id)}}">Editeaza</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Șterge</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>ID: {{$reteta->id}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Denumire:</h5>
                                <div>{{$reteta->denumire}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Ingrediente:</h5>
                            <div>{{$reteta->ingrediente}}</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Mod de preparare:</h5>
                            <div>{{$reteta->mod_de_preparare}}</div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Taguri:</h5>
                            <div class="row">
                                @foreach($reteta->tags()->get() as $tag)
                                <h5 class="col"><a href="#" class="badge badge-info">{{$tag->name}}</a></h5>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <h5>Rating:</h5>
                                @if($reteta->usersRated()>0)
                                <div>{{number_format($reteta->averageRating(),2)}} stele din {{$reteta->usersRated()}}
                                    recenzii adăugate.</div>
                                @else
                                <h5>Încă nu există recenzii.</h5>
                                @endif
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Data creării:</h5>
                            <div>{{$reteta->created_at}}</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Ultima actualizare:</h5>
                            <div>{{$reteta->updated_at}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
