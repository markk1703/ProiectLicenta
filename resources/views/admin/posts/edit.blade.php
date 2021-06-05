@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h3 class="card-header">{{$reteta->denumire}}
                    <form action="{{route('admin.posts.destroy',$reteta->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </form></h3>
                <div class="card-body">
                    <form action="{{ route('admin.posts.update',$reteta->id)}}" method="POST">
                        @csrf
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>ID:</h5>
                                <div>{{$reteta->id}}</div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <div class="form-group">
                                <h5>Denumire:</h5>
                                <textarea class="form-control" style="height:150px" id="denumire"
                                                name="denumire" required>{{$reteta->denumire}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Ingrediente:</h5>
                            <textarea class="form-control" style="height:150px" id="ingrediente"
                                                name="ingrediente" required>{{$reteta->ingrediente}}</textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-10">
                            <h5>Mod de preparare:</h5>
                            <textarea class="form-control" style="height:150px" id="preparare"
                                                name="preparare" required>{{$reteta->mod_de_preparare}}</textarea>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-success mt-2">Actualizează</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
